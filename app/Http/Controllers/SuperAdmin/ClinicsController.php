<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Exports\SuperAdmin\ClinicsExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\SuperAdmin\Clinics\CreateRequest;
use App\Http\Requests\ImportRequest;
use App\Http\Requests\SuperAdmin\Clinics\UpdateRequest;
use App\Imports\SuperAdmin\ClinicsImport;
use App\Http\Resources\Web\ClinicsResource;
use Inertia\Inertia;
use App\Models\Clinic;
use App\Models\PricingPlan;
use App\Models\ClinicCategory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;
use Session;

class ClinicsController extends Controller
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
            $clinics =  Clinic::withAll();
            if ($req->trash && $req->trash == 'with') {
                $clinics =  $clinics->withTrashed();
            }
            if ($req->trash && $req->trash == 'only') {
                $clinics =  $clinics->onlyTrashed();
            }
            if ($req->column && $req->column != null && $req->search != null) {
                $clinics = $clinics->whereLike($req->column, $req->search);
            } else if ($req->search && $req->search != null) {

                $clinics = $clinics->whereLike(['name', 'description'], $req->search);
            }
            if ($req->sort_field != null && $req->sort_type != null) {
                $clinics = $clinics->OrderBy($req->sort_field, $req->sort_type);
            } else {
                $clinics = $clinics->OrderBy('is_approved', 'ASC');

            }
            if ($export != null) { // for export do not paginate
                $clinics = $clinics->get();
                return $clinics;
            }
            $clinics = $clinics->get();
            return $clinics;
        }
        $clinics = Clinic::withAll()->OrderBy('is_approved', 'ASC')->get();
        return $clinics;
    }


    /*********View All Clinics  ***********/
    public function index(Request $request)
    {
        $clinics = $this->getter($request);
        return view('super_admins.clinics.index')->with('clinics', $clinics);
    }

    /*********View Create Form of Clinic  ***********/
    public function create()
    {

        $pricing_plans = PricingPlan::Clinic()->get();
        $clinic_categories = ClinicCategory::active()->get();
        return view('super_admins.clinics.create',compact('pricing_plans' , 'clinic_categories'));
    }

    /*********Store Clinic  ***********/
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
            $data['image'] = uploadCroppedFile($request,'image','clinics');

            $clinic = Clinic::create($data);
            $user = User::where('email',$request->email)->first();
            if($user){
                $user->roles()->attach(['clinic']);
                $clinic->update(['user_id' => $user->id]);
            }
            else{
                $user = $clinic->user()->create([
                    'name' => $clinic->name,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                ]);
                $user->markEmailAsVerified();
                $clinic->update(['user_id' => $user->id]);
                $user->roles()->attach(['clinic']);
            }
            $clinic->clinic_categories()->attach($request->clinic_category_ids);
            $clinic->save();
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->route('super_admin.clinics.index')->with('message', 'Something Went Wrong')->with('message_type', 'error');
        }
        return redirect()->route('super_admin.clinics.index')->with('message', 'Clinic Created Successfully')->with('message_type', 'success');
    }

    /*********View Clinic  ***********/
    public function show(Clinic $clinic)
    {
        return view('super_admins.clinics.show', compact('clinic'));
    }

    /*********View Edit Form of Clinic  ***********/
    public function edit(Clinic $clinic)
    {
        $clinic_categories = ClinicCategory::active()->get();
        $pricing_plans = PricingPlan::Clinic()->get();
        return view('super_admins.clinics.edit', compact('clinic','pricing_plans' , 'clinic_categories'));
    }

    /*********Update Clinic  ***********/
    public function update(UpdateRequest $request, Clinic $clinic)
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
            if ($request->image) {
                $data['image'] = uploadCroppedFile($request,'image','clinics',$clinic->image);

            } else {
                $data['image'] = $clinic->image;
            }
            if(isset($request->clinic_category_ids)){
                $clinic->clinic_categories()->sync($request->clinic_category_ids);
            }
            $clinic->update($data);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->route('super_admin.clinics.index')->with('message', 'Something Went Wrong')->with('message_type', 'error');
        }
        return redirect()->route('super_admin.clinics.index')->with('message', 'Clinic Updated Successfully')->with('message_type', 'success');
    }

    /********* Export  CSV And Excel  **********/
    public function export(Request $request)
    {
        $clinics = $this->getter($request, "export");
        if (in_array($request->export, ['csv,xlsx'])) {
            $extension = $request->export;
        } else {
            $extension = 'xlsx';
        }
        $filename = "clinics." . $extension;
        return Excel::download(new ClinicsExport($clinics), $filename);
    }
    /********* Import CSV And Excel  **********/
    public function import(ImportRequest $request)
    {
        $file = $request->file('file');
        Excel::import(new ClinicsImport, $file);
        return redirect()->back()->with('message', 'Blog Categories imported Successfully')->with('message_type', 'success');
    }


    /*********Soft DELETE Clinic ***********/
    public function destroy(Clinic $clinic)
    {
        $clinic->delete();
        return redirect()->back()->with('message', 'Clinic Deleted Successfully')->with('message_type', 'success');
    }

    /*********Permanently DELETE Clinic ***********/
    public function destroyPermanently(Request $request, $clinic)
    {
        $clinic = Clinic::withTrashed()->find($clinic);
        if ($clinic) {
            if ($clinic->trashed()) {
                if ($clinic->image && file_exists(public_path($clinic->image))) {
                    unlink(public_path($clinic->image));
                }
                $clinic->forceDelete();
                return redirect()->back()->with('message', 'Clinic Deleted Successfully')->with('message_type', 'success');
            } else {
                return redirect()->back()->with('message', 'Clinic is Not in Trash')->with('message_type', 'error');
            }
        } else {
            return redirect()->back()->with('message', 'Clinic Not Found')->with('message_type', 'error');
        }
    }
    /********* Restore Clinic***********/
    public function restore(Request $request, $clinic)
    {
        $clinic = Clinic::withTrashed()->find($clinic);
        if ($clinic->trashed()) {
            $clinic->restore();
            return redirect()->back()->with('message', 'Clinic Restored Successfully')->with('message_type', 'success');
        } else {
            return redirect()->back()->with('message', 'Clinic Not Found')->with('message_type', 'error');
        }
    }
        /*********Approve Clinic ***********/
        public function approve(Clinic $clinic)
        {
            if(!$clinic->is_approved){
                $clinic->update(['is_approved' => 1,'approved_at' => now()]);
            }
            return redirect()->back()->with('message', 'Clinic Approved Successfully')->with('message_type', 'success');
        }


        public function profile(Request $request,$clinic)
        {
            $clinic = Clinic::withChildrens()->withAll()->where('id',$clinic)->first();
            if(!$clinic){
                abort(404);
            }
            $clinic = new ClinicsResource($clinic);
            return Inertia::render('Clinics/Profile',[
                'clinic' => $clinic
            ]);
        }

        public function bulkActionClinics(Request $request , $type)
        {
            if ($type == 'approve') {
                Clinic::whereIn('id', $request->selected_ids)->update([
                    'is_approved' => 1
                ]);
            } elseif ($type == 'disapprove') {
                Clinic::whereIn('id', $request->selected_ids)->update([
                    'is_approved' => 0
                ]);
            }
            elseif ($type == 'inactive') {
                Clinic::whereIn('id', $request->selected_ids)->update([
                    'is_active' => 0
                ]);
            } elseif ($type == 'active') {
                Clinic::whereIn('id', $request->selected_ids)->update([
                    'is_active' => 1
                ]);
            } elseif ($type == 'delete') {
                foreach ($request->selected_ids as $userId){
                    $business = Clinic::where('id' , $userId)->first();
                    $this->destroy($business);
                }
            } elseif ($type == 'feature') {
                Clinic::whereIn('id', $request->selected_ids)->update([
                    'is_featured' => 1
                ]);
            } else {
                Session::flash('message', 'Some Thing Went Wrong !');
                return response()->json('Success', 200);
            }
            Session::flash('message', 'Updated Successfully');
            return response()->json('Success', 200);
        }
}
