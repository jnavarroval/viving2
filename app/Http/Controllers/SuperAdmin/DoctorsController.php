<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Exports\SuperAdmin\DoctorsExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\SuperAdmin\Doctors\CreateRequest;
use App\Http\Requests\ImportRequest;
use App\Http\Requests\SuperAdmin\Doctors\UpdateRequest;
use App\Imports\SuperAdmin\DoctorsImport;
use App\Http\Resources\Web\DoctorsResource;
use Inertia\Inertia;
use App\Models\Doctor;
use App\Models\Clinic;
use App\Models\DoctorMainCategory;
use App\Models\DoctorCategory;
use App\Models\PricingPlan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;
use Session;

class DoctorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    /********* Getter For Pagination, Searching And Sorting  ***********/
    public function getter($req = null, $export = null)
    {
        if ($req != null) {
            $doctors =  Doctor::withAll();
            if ($req->trash && $req->trash == 'with') {
                $doctors =  $doctors->withTrashed();
            }
            if ($req->trash && $req->trash == 'only') {
                $doctors =  $doctors->onlyTrashed();
            }
            if ($req->column && $req->column != null && $req->search != null) {
                    $doctors = $doctors->whereLike($req->column, $req->search);

            } else if ($req->search && $req->search != null) {

                $doctors = $doctors->whereLike(['name', 'description'], $req->search);
            }
            if ($req->sort_field != null && $req->sort_type != null) {
                $doctors = $doctors->OrderBy($req->sort_field, $req->sort_type);
            } else {
                $doctors = $doctors->OrderBy('is_approved', 'ASC');

            }
            if ($export != null) { // for export do not paginate
                $doctors = $doctors->get();
                return $doctors;
            }
            $doctors = $doctors->get();
            return $doctors;
        }
        $doctors = Doctor::withAll()->OrderBy('is_approved', 'ASC')->get();
        return $doctors;
    }


    /*********View All Doctors  ***********/
    public function index(Request $request)
    {
        $doctors = $this->getter($request);
        $clinics = Clinic::approved()->active()->get();
        return view('super_admins.doctors.index' , compact('doctors' , 'clinics'));
    }

    /*********View Create Form of Doctor  ***********/
    public function create()
    {
        $clinics = Clinic::active()->approved()->get();
        $doctor_categories = DoctorCategory::active()->get();
        $pricing_plans = PricingPlan::doctor()->get();
        return view('super_admins.doctors.create',compact('pricing_plans' , 'clinics' , 'doctor_categories'));
    }

    /*********Store Doctor  ***********/
    public function store(CreateRequest $request)
    {
        $data = $request->all();
        try {
            DB::beginTransaction();
            if (!$request->is_active) {
                $data['is_active'] = 0;
            }
            if (!$request->is_featured) {
                $data['is_featured'] = 0;
            }
            if (!$request->is_premium) {
                $data['is_premium'] = 0;
            }
            $data['image'] = uploadCroppedFile($request,'image','doctors');

            $doctor = Doctor::create($data);
            $user = User::where('email',$request->email)->first();
            if($user){
                $user->roles()->attach(['doctor']);
                $doctor->update(['user_id' => $user->id]);
            }
            else{
                $user = $doctor->user()->create([
                    'name' => $doctor->name,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                ]);
                $user->markEmailAsVerified();
                $doctor->update(['user_id' => $user->id]);
                $user->roles()->attach(['doctor']);
            }
            $doctor->doctor_categories()->attach($request->doctor_category_ids);
            $doctor->save();
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->route('super_admin.doctors.index')->with('message', 'Something Went Wrong')->with('message_type', 'error');
        }
        return redirect()->route('super_admin.doctors.index')->with('message', 'Doctor Created Successfully')->with('message_type', 'success');
    }

    /*********View Doctor  ***********/
    public function show(Doctor $doctor)
    {
        $doctor = Doctor::withAll()->find($doctor->id);
        return view('super_admins.doctors.show', compact('doctor'));
    }

    /*********View Edit Form of Doctor  ***********/
    public function edit(Doctor $doctor)
    {
        $pricing_plans = PricingPlan::doctor()->get();
        $doctor_categories = DoctorCategory::active()->get();
        $clinics = Clinic::active()->approved()->get();
        return view('super_admins.doctors.edit', compact('doctor','pricing_plans' , 'clinics' , 'doctor_categories'));
    }

    /*********Update Doctor  ***********/
    public function update(UpdateRequest $request, Doctor $doctor)
    {
        $data = $request->all();
        try {
            DB::beginTransaction();
            if (!$request->is_active) {
                $data['is_active'] = 0;
            }
            if (!$request->is_featured) {
                $data['is_featured'] = 0;
            }
            if (!$request->is_premium) {
                $data['is_premium'] = 0;
            }
            if ($request->image) {
                $data['image'] = uploadCroppedFile($request,'image','doctors',$doctor->image);

            } else {
                $data['image'] = $doctor->image;
            }
            if(isset($request->doctor_category_ids)){
                $doctor->doctor_categories()->sync($request->doctor_category_ids);
            }
            $doctor->update($data);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->route('super_admin.doctors.index')->with('message', 'Something Went Wrong')->with('message_type', 'error');
        }
        return redirect()->route('super_admin.doctors.index')->with('message', 'Doctor Updated Successfully')->with('message_type', 'success');
    }

    /********* Export  CSV And Excel  **********/
    public function export(Request $request)
    {
        $doctors = $this->getter($request, "export");
        if (in_array($request->export, ['csv,xlsx'])) {
            $extension = $request->export;
        } else {
            $extension = 'xlsx';
        }
        $filename = "doctors." . $extension;
        return Excel::download(new DoctorsExport($doctors), $filename);
    }
    /********* Import CSV And Excel  **********/
    public function import(ImportRequest $request)
    {
        $file = $request->file('file');
        Excel::import(new DoctorsImport, $file);
        return redirect()->back()->with('message', 'Blog Categories imported Successfully')->with('message_type', 'success');
    }

    public function viewBlogs(Doctor $doctor)
    {
        $doctor_blogs = $doctor->doctor_posts()->get();
        $doctor_id = $doctor->id;
        return view('super_admins.doctors.show_blogs', compact('doctor_blogs' , 'doctor_id'));
    }
    public function viewEvents(Doctor $doctor)
    {
        $doctor_events = $doctor->doctor_events()->get();
        $doctor_id = $doctor->id;
        return view('super_admins.doctors.show_events', compact('doctor_events' , 'doctor_id'));
    }
    public function viewSocialLinks(Doctor $doctor)
    {
        $doctor_settings = $doctor->doctor_settings()->get();
        $doctor_id = $doctor->id;
        return view('super_admins.doctors.show_social', compact('doctor_settings' , 'doctor_id'));
    }

    public function profile(Request $request,$doctor)
    {
        $doctor = doctor::withChildrens()->withAll()->where('id',$doctor)->first();
        if(!$doctor){
            abort(404);
        }
        $doctor = new DoctorsResource($doctor);
        return Inertia::render('Doctors/Profile',[
            'doctor' => $doctor
        ]);
    }


    /*********Soft DELETE Doctor ***********/
    public function destroy(Doctor $doctor)
    {
        $doctor->delete();
        return redirect()->back()->with('message', 'Doctor Deleted Successfully')->with('message_type', 'success');
    }

    /*********Permanently DELETE Doctor ***********/
    public function destroyPermanently(Request $request, $doctor)
    {
        $doctor = Doctor::withTrashed()->find($doctor);
        if ($doctor) {
            if ($doctor->trashed()) {
                if ($doctor->image && file_exists(public_path($doctor->image))) {
                    unlink(public_path($doctor->image));
                }
                $doctor->forceDelete();
                return redirect()->back()->with('message', 'Doctor Deleted Successfully')->with('message_type', 'success');
            } else {
                return redirect()->back()->with('message', 'Doctor is Not in Trash')->with('message_type', 'error');
            }
        } else {
            return redirect()->back()->with('message', 'Doctor Not Found')->with('message_type', 'error');
        }
    }
    /********* Restore Doctor***********/
    public function restore(Request $request, $doctor)
    {
        $doctor = Doctor::withTrashed()->find($doctor);
        if ($doctor->trashed()) {
            $doctor->restore();
            return redirect()->back()->with('message', 'Doctor Restored Successfully')->with('message_type', 'success');
        } else {
            return redirect()->back()->with('message', 'Doctor Not Found')->with('message_type', 'error');
        }
    }
        /*********Approve Doctor ***********/
        public function approve(Doctor $doctor)
        {
            if(!$doctor->is_approved){
                $doctor->update(['is_approved' => 1,'approved_at' => now()]);
            }
        // NotificationSettingsController::fireNotificationEvent($doctor,'approve_or_reject_doctor',[[$doctor]],'super_admin/doctors','Doctor Approved Successfully');

            return redirect()->back()->with('message', 'Doctor Approved Successfully')->with('message_type', 'success');
        }
        public function bulkActionDoctors(Request $request , $type)
        {
            if($type == 'approve'){
                Doctor::whereIn('id' , $request->selected_ids)->update([
                    'is_approved' => 1
                ]);
            }
            elseif ($type == 'disapprove') {
                Doctor::whereIn('id', $request->selected_ids)->update([
                    'is_approved' => 0
                ]);
            }
            elseif($type == 'inactive'){
                Doctor::whereIn('id' , $request->selected_ids)->update([
                    'is_active' => 0
                ]);
            }
            elseif($type == 'active'){
                Doctor::whereIn('id' , $request->selected_ids)->update([
                    'is_active' => 1
                ]);
            }
            elseif($type == 'delete'){
                foreach ($request->selected_ids as $userId){
                    $doctor = Doctor::where('id' , $userId)->first();
                    $this->destroy($doctor);
                }
            }
            elseif($type == 'feature'){
                Doctor::whereIn('id' , $request->selected_ids)->update([
                    'is_featured' => 1
                ]);
            }
            else{
                Session::flash('message', 'Some Thing Went Wrong !');
                return response()->json('Success' , 200);
            }
            Session::flash('message', 'Updated Successfully');
            return response()->json('Success' , 200);
        }
}
