<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Exports\SuperAdmin\DoctorEducationsExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\SuperAdmin\DoctorExperience\CreateRequest;
use App\Http\Requests\ImportRequest;
use App\Imports\SuperAdmin\DoctorEducationsImport;
use App\Models\DoctorExperience;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class DoctorExperiencesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    /********* Getter For Pagination, Searching And Sorting  ***********/
    public function getter($req = null, $export = null , $doctor)
    {
        if ($req != null) {
            $doctor_experiences =  $doctor->doctor_experiences();
            if ($req->trash && $req->trash == 'with') {
                $doctor_experiences =  $doctor_experiences->withTrashed();
            }
            if ($req->trash && $req->trash == 'only') {
                $doctor_experiences =  $doctor_experiences->onlyTrashed();
            }
            if ($req->column && $req->column != null && $req->search != null) {
                $doctor_experiences = $doctor_experiences->whereLike($req->column, $req->search);
            } else if ($req->search && $req->search != null) {

                $doctor_experiences = $doctor_experiences->whereLike(['name', 'description'], $req->search);
            }
            if ($req->sort_field != null && $req->sort_type != null) {
                $doctor_experiences = $doctor_experiences->OrderBy($req->sort_field, $req->sort_type);
            } else {
                $doctor_experiences = $doctor_experiences->OrderBy('id', 'desc');
            }
            if ($export != null) { // for export do not paginate
                $doctor_experiences = $doctor_experiences->get();
                return $doctor_experiences;
            }
            $doctor_experiences = $doctor_experiences->get();
            return $doctor_experiences;
        }
        $doctor_experiences = $doctor->doctor_experiences()->withAll()->orderBy('id', 'desc')->get();
        return $doctor_experiences;
    }


    /*********View All DoctorExperience  ***********/
    public function index(Request $request , Doctor $doctor)
    {
        $doctor_experiences = $this->getter($request , null , $doctor);
        return view('super_admins.doctors.doctor_experiences.index' , compact('doctor_experiences' , 'doctor'));
    }

    /*********View Create Form of DoctorExperience  ***********/
    public function create(Doctor $doctor)
    {
        return view('super_admins.doctors.doctor_experiences.create', compact('doctor'));
    }

    /*********Store DoctorExperience  ***********/
    public function store(CreateRequest $request , Doctor $doctor)
    {
        $data = $request->all();
        try {
            DB::beginTransaction();
            if (!$request->is_active) {
                $data['is_active'] = 0;
            }
            $data = $request->all();
            $data['image'] = uploadFile($request,'file','doctor_experiences');
            $doctor_experience = $doctor->doctor_experiences()->create($data);
            $doctor_experience = $doctor->doctor_experiences()->withAll()->find($doctor_experience->id);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->route('super_admin.doctor_experiences.index' , $doctor->id)->with('message', 'Something Went Wrong')->with('message_type', 'error');
        }
        return redirect()->route('super_admin.doctor_experiences.index' , $doctor->id)->with('message', 'Experience Created Successfully')->with('message_type', 'success');
    }

    /*********View DoctorExperience  ***********/
    public function show(Doctor $doctor ,DoctorExperience $doctor_experience)
    {
        if($doctor->id != $doctor_experience->doctor_id){
            return redirect()->back()->with('message', 'DoctorExperience Not Found')->with('message_type', 'error');
        }
        return view('super_admins.doctors.doctor_experiences.show', compact('doctor_experience' , 'doctor'));
    }

    /*********View Edit Form of DoctorExperience  ***********/
    public function edit(Doctor $doctor ,DoctorExperience $doctor_experience)
    {
        if($doctor->id != $doctor_experience->doctor_id){
            return redirect()->back()->with('message', 'DoctorExperience Not Found')->with('message_type', 'error');
        }
        return view('super_admins.doctors.doctor_experiences.edit', compact('doctor_experience', 'doctor'));
    }

    /*********Update DoctorExperience  ***********/
    public function update(CreateRequest $request,Doctor $doctor , DoctorExperience $doctor_experience)
    {
        if($doctor->id != $doctor_experience->doctor_id){
            return redirect()->back()->with('message', 'DoctorExperience Not Found')->with('message_type', 'error');
        }
        $data = $request->all();
        try {
            DB::beginTransaction();
            if (!$request->is_active) {
                $data['is_active'] = 0;
            }
            $data = $request->all();
            if ($request->file) {
                $data['image'] = uploadFile($request,'file','doctor_experiences',$doctor_experience->image);
            } else {
                $data['image'] = $doctor_experience->image;
            }
            $doctor_experience->update($data);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->route('super_admin.doctor_experiences.index' , $doctor->id)->with('message', 'Something Went Wrong')->with('message_type', 'error');
        }
        return redirect()->route('super_admin.doctor_experiences.index' , $doctor->id)->with('message', 'DoctorExperience Updated Successfully')->with('message_type', 'success');
    }

    /********* Export  CSV And Excel  **********/
    public function export(Request $request)
    {
        $doctor_experiences = $this->getter($request, "export");
        if (in_array($request->export, ['csv,xlsx'])) {
            $extension = $request->export;
        } else {
            $extension = 'xlsx';
        }
        $filename = "doctor_experiences." . $extension;
        return Excel::download(new DoctorEducationsExport($doctor_experiences), $filename);
    }
    /********* Import CSV And Excel  **********/
    public function import(ImportRequest $request)
    {
        $file = $request->file('file');
        Excel::import(new DoctorEducationsImport, $file);
        return redirect()->back()->with('message', 'DoctorExperience Categories imported Successfully')->with('message_type', 'success');
    }


    /*********Soft DELETE DoctorExperience ***********/
    public function destroy(Doctor $doctor ,DoctorExperience $doctor_experience)
    {
        if($doctor->id != $doctor_experience->doctor_id){
            return redirect()->back()->with('message', 'DoctorExperience Not Found')->with('message_type', 'error');
        }
        $doctor_experience->delete();
        return redirect()->back()->with('message', 'DoctorExperience Deleted Successfully')->with('message_type', 'success');
    }

    /*********Permanently DELETE DoctorExperience ***********/
    public function destroyPermanently(Request $request,Doctor $doctor ,$doctor_experience)
    {
        $doctor_experience = DoctorExperience::withTrashed()->find($doctor_experience);
        if ($doctor_experience) {
            if ($doctor_experience->trashed()) {
                if ($doctor_experience->image && file_exists(public_path($doctor_experience->image))) {
                    unlink(public_path($doctor_experience->image));
                }
                $doctor_experience->forceDelete();
                return redirect()->back()->with('message', 'DoctorExperience Deleted Successfully')->with('message_type', 'success');
            } else {
                return redirect()->back()->with('message', 'DoctorExperience is Not in Trash')->with('message_type', 'error');
            }
        } else {
            return redirect()->back()->with('message', 'DoctorExperience Not Found')->with('message_type', 'error');
        }
    }
    /********* Restore DoctorExperience***********/
    public function restore(Request $request,Doctor $doctor, $doctor_experience)
    {
        $doctor_experience = DoctorExperience::withTrashed()->find($doctor_experience);
        if ($doctor_experience->trashed()) {
            $doctor_experience->restore();
            return redirect()->back()->with('message', 'DoctorExperience Restored Successfully')->with('message_type', 'success');
        } else {
            return redirect()->back()->with('message', 'DoctorExperience Not Found')->with('message_type', 'error');
        }
    }
}
