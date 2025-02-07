<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Exports\SuperAdmin\PatientsExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\SuperAdmin\Patients\CreateRequest;
use App\Http\Requests\ImportRequest;
use App\Http\Requests\SuperAdmin\Patients\UpdateRequest;
use App\Imports\SuperAdmin\PatientsImport;
use App\Models\Patient;
use App\Models\PricingPlan;
use App\Models\Role;
use App\Models\Subscription;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;

class PatientsController extends Controller
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
            $patients =  Patient::withAll();
            if ($req->trash && $req->trash == 'with') {
                $patients =  $patients->withTrashed();
            }
            if ($req->trash && $req->trash == 'only') {
                $patients =  $patients->onlyTrashed();
            }
            if ($req->column && $req->column != null && $req->search != null) {
                $patients = $patients->whereLike($req->column, $req->search);
            } else if ($req->search && $req->search != null) {

                $patients = $patients->whereLike(['name', 'description'], $req->search);
            }
            if ($req->sort_field != null && $req->sort_type != null) {
                $patients = $patients->OrderBy($req->sort_field, $req->sort_type);
            } else {
                $patients = $patients->OrderBy('id', 'desc');

            }
            if ($export != null) { // for export do not paginate
                $patients = $patients->get();
                return $patients;
            }
            $patients = $patients->get();
            return $patients;
        }
        $patients = Patient::withAll()->OrderBy('id', 'desc')->get();
        return $patients;
    }


    /*********View All Patients  ***********/
    public function index(Request $request)
    {
        $patients = $this->getter($request);
        return view('super_admins.patients.index')->with('patients', $patients);
    }

    /*********View Create Form of Patient  ***********/
    public function create()
    {
        return view('super_admins.patients.create');
    }

    /*********Store Patient  ***********/
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
            $data['image'] = uploadCroppedFile($request,'image','patients');

            $patient = Patient::create($data);
            $user = User::where('email',$request->email)->first();
            if($user){
                $user->roles()->attach(['patient']);
                $patient->update(['user_id' => $user->id]);
            }
            else{
                $user = $patient->user()->create([
                    'name' => $patient->name,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                ]);
                $user->markEmailAsVerified();
                $patient->update(['user_id' => $user->id]);
                $user->roles()->attach(['patient']);
            }
            $patient->save();
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->route('super_admin.patients.index')->with('message', 'Something Went Wrong')->with('message_type', 'error');
        }
        return redirect()->route('super_admin.patients.index')->with('message', 'Patient Created Successfully')->with('message_type', 'success');
    }

    /*********View Patient  ***********/
    public function show(Patient $patient)
    {
        return view('super_admins.patients.show', compact('patient'));
    }

    /*********View Edit Form of Patient  ***********/
    public function edit(Patient $patient)
    {
        return view('super_admins.patients.edit', compact('patient'));
    }

    /*********Update Patient  ***********/
    public function update(UpdateRequest $request, Patient $patient)
    {
        $data = $request->all();
        try {
            DB::beginTransaction();
            if (!$request->is_active) {
                $data['is_active'] = 0;
            }
            if ($request->image) {
                $data['image'] = uploadCroppedFile($request,'image','patients',$patient->image);

            } else {
                $data['image'] = $patient->image;
            }
            $patient->update($data);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->route('super_admin.patients.index')->with('message', 'Something Went Wrong')->with('message_type', 'error');
        }
        return redirect()->route('super_admin.patients.index')->with('message', 'Patient Updated Successfully')->with('message_type', 'success');
    }

    /********* Export  CSV And Excel  **********/
    public function export(Request $request)
    {
        $patients = $this->getter($request, "export");
        if (in_array($request->export, ['csv,xlsx'])) {
            $extension = $request->export;
        } else {
            $extension = 'xlsx';
        }
        $filename = "patients." . $extension;
        return Excel::download(new PatientsExport($patients), $filename);
    }
    /********* Import CSV And Excel  **********/
    public function import(ImportRequest $request)
    {
        $file = $request->file('file');
        Excel::import(new PatientsImport, $file);
        return redirect()->back()->with('message', 'Patients imported Successfully')->with('message_type', 'success');
    }


    /*********Soft DELETE Patient ***********/
    public function destroy(Patient $patient)
    {
        $user = $patient->user;
        $user->roles()->detach([Role::$Patient]);
        if(!$user->hasRole(Role::$Clinic) && !$user->hasRole(Role::$Doctor) && !$user->hasRole(Role::$SuperAdmin)){
            $user->delete();
        }
        $patient->delete();
        return redirect()->back()->with('message', 'Patient Deleted Successfully')->with('message_type', 'success');
    }

    /*********Permanently DELETE Patient ***********/
    public function destroyPermanently(Request $request, $patient)
    {
        $patient = Patient::withTrashed()->find($patient);
        if ($patient) {
            if ($patient->trashed()) {
                if ($patient->image && file_exists(public_path($patient->image))) {
                    unlink(public_path($patient->image));
                }
                $patient->forceDelete();
                return redirect()->back()->with('message', 'Patient Deleted Successfully')->with('message_type', 'success');
            } else {
                return redirect()->back()->with('message', 'Patient is Not in Trash')->with('message_type', 'error');
            }
        } else {
            return redirect()->back()->with('message', 'Patient Not Found')->with('message_type', 'error');
        }
    }
    /********* Restore Patient***********/
    public function restore(Request $request, $patient)
    {
        $patient = Patient::withTrashed()->find($patient);
        if ($patient->trashed()) {
            $patient->restore();
            return redirect()->back()->with('message', 'Patient Restored Successfully')->with('message_type', 'success');
        } else {
            return redirect()->back()->with('message', 'Patient Not Found')->with('message_type', 'error');
        }
    }
        /*********Approve Patient ***********/
        public function approve(Patient $patient)
        {
            if(!$patient->is_approved){
                $patient->update(['is_approved' => 1,'approved_at' => now()]);
            }
        NotificationSettingsController::fireNotificationEvent($patient,'approve_or_reject_patient',[[$patient]],'super_admin/patients','patient Approved Successfully');

            return redirect()->back()->with('message', 'Patient Approved Successfully')->with('message_type', 'success');
        }
}
