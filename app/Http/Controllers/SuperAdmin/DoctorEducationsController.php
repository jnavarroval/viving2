<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Exports\SuperAdmin\DoctorEducationsExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\SuperAdmin\DoctorEducations\CreateRequest;
use App\Http\Requests\ImportRequest;
use App\Imports\SuperAdmin\DoctorEducationsImport;
use App\Models\DoctorEducation;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class DoctorEducationsController extends Controller
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
            $doctor_educations =  $doctor->doctor_educations();
            if ($req->trash && $req->trash == 'with') {
                $doctor_educations =  $doctor_educations->withTrashed();
            }
            if ($req->trash && $req->trash == 'only') {
                $doctor_educations =  $doctor_educations->onlyTrashed();
            }
            if ($req->column && $req->column != null && $req->search != null) {
                $doctor_educations = $doctor_educations->whereLike($req->column, $req->search);
            } else if ($req->search && $req->search != null) {

                $doctor_educations = $doctor_educations->whereLike(['name', 'description'], $req->search);
            }
            if ($req->sort_field != null && $req->sort_type != null) {
                $doctor_educations = $doctor_educations->OrderBy($req->sort_field, $req->sort_type);
            } else {
                $doctor_educations = $doctor_educations->OrderBy('id', 'desc');
            }
            if ($export != null) { // for export do not paginate
                $doctor_educations = $doctor_educations->get();
                return $doctor_educations;
            }
            $doctor_educations = $doctor_educations->get();
            return $doctor_educations;
        }
        $doctor_educations = $doctor->doctor_educations()->withAll()->orderBy('id', 'desc')->get();
        return $doctor_educations;
    }


    /*********View All DoctorEducations  ***********/
    public function index(Request $request , Doctor $doctor)
    {
        $doctor_educations = $this->getter($request , null , $doctor);
        return view('super_admins.doctors.doctor_educations.index' , compact('doctor_educations' , 'doctor'));
    }

    /*********View Create Form of DoctorEducation  ***********/
    public function create(Doctor $doctor)
    {
        return view('super_admins.doctors.doctor_educations.create', compact('doctor'));
    }

    /*********Store DoctorEducation  ***********/
    public function store(CreateRequest $request , Doctor $doctor)
    {
        $data = $request->all();
        try {
            DB::beginTransaction();
            if (!$request->is_active) {
                $data['is_active'] = 0;
            }
            $data = $request->all();
            $data['image'] = uploadFile($request,'file','doctor_educations');
            $doctor_education = $doctor->doctor_educations()->create($data);
            $doctor_education = $doctor->doctor_educations()->withAll()->find($doctor_education->id);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->route('super_admin.doctor_educations.index' , $doctor->id)->with('message', 'Something Went Wrong')->with('message_type', 'error');
        }
        return redirect()->route('super_admin.doctor_educations.index' , $doctor->id)->with('message', 'Education Created Successfully')->with('message_type', 'success');
    }

    /*********View DoctorEducation  ***********/
    public function show(Doctor $doctor ,DoctorEducation $doctor_education)
    {
        if($doctor->id != $doctor_education->doctor_id){
            return redirect()->back()->with('message', 'DoctorEducation Not Found')->with('message_type', 'error');
        }
        return view('super_admins.doctors.doctor_educations.show', compact('doctor_education' , 'doctor'));
    }

    /*********View Edit Form of DoctorEducation  ***********/
    public function edit(Doctor $doctor ,DoctorEducation $doctor_education)
    {
        if($doctor->id != $doctor_education->doctor_id){
            return redirect()->back()->with('message', 'DoctorEducation Not Found')->with('message_type', 'error');
        }
        return view('super_admins.doctors.doctor_educations.edit', compact('doctor_education', 'doctor'));
    }

    /*********Update DoctorEducation  ***********/
    public function update(CreateRequest $request,Doctor $doctor , DoctorEducation $doctor_education)
    {
        if($doctor->id != $doctor_education->doctor_id){
            return redirect()->back()->with('message', 'DoctorEducation Not Found')->with('message_type', 'error');
        }
        $data = $request->all();
        try {
            DB::beginTransaction();
            if (!$request->is_active) {
                $data['is_active'] = 0;
            }
            $data = $request->all();
            if ($request->file) {
                $data['image'] = uploadFile($request,'file','doctor_educations',$doctor_education->image);
            } else {
                $data['image'] = $doctor_education->image;
            }
            $doctor_education->update($data);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->route('super_admin.doctor_educations.index' , $doctor->id)->with('message', 'Something Went Wrong')->with('message_type', 'error');
        }
        return redirect()->route('super_admin.doctor_educations.index' , $doctor->id)->with('message', 'DoctorEducation Updated Successfully')->with('message_type', 'success');
    }

    /********* Export  CSV And Excel  **********/
    public function export(Request $request)
    {
        $doctor_educations = $this->getter($request, "export");
        if (in_array($request->export, ['csv,xlsx'])) {
            $extension = $request->export;
        } else {
            $extension = 'xlsx';
        }
        $filename = "doctor_educations." . $extension;
        return Excel::download(new DoctorEducationsExport($doctor_educations), $filename);
    }
    /********* Import CSV And Excel  **********/
    public function import(ImportRequest $request)
    {
        $file = $request->file('file');
        Excel::import(new DoctorEducationsImport, $file);
        return redirect()->back()->with('message', 'DoctorEducation Categories imported Successfully')->with('message_type', 'success');
    }


    /*********Soft DELETE DoctorEducation ***********/
    public function destroy(Doctor $doctor ,DoctorEducation $doctor_education)
    {
        if($doctor->id != $doctor_education->doctor_id){
            return redirect()->back()->with('message', 'DoctorEducation Not Found')->with('message_type', 'error');
        }
        $doctor_education->delete();
        return redirect()->back()->with('message', 'DoctorEducation Deleted Successfully')->with('message_type', 'success');
    }

    /*********Permanently DELETE DoctorEducation ***********/
    public function destroyPermanently(Request $request,Doctor $doctor ,$doctor_education)
    {
        $doctor_education = DoctorEducation::withTrashed()->find($doctor_education);
        if ($doctor_education) {
            if ($doctor_education->trashed()) {
                if ($doctor_education->image && file_exists(public_path($doctor_education->image))) {
                    unlink(public_path($doctor_education->image));
                }
                $doctor_education->forceDelete();
                return redirect()->back()->with('message', 'DoctorEducation Deleted Successfully')->with('message_type', 'success');
            } else {
                return redirect()->back()->with('message', 'DoctorEducation is Not in Trash')->with('message_type', 'error');
            }
        } else {
            return redirect()->back()->with('message', 'DoctorEducation Not Found')->with('message_type', 'error');
        }
    }
    /********* Restore DoctorEducation***********/
    public function restore(Request $request,Doctor $doctor, $doctor_education)
    {
        $doctor_education = DoctorEducation::withTrashed()->find($doctor_education);
        if ($doctor_education->trashed()) {
            $doctor_education->restore();
            return redirect()->back()->with('message', 'DoctorEducation Restored Successfully')->with('message_type', 'success');
        } else {
            return redirect()->back()->with('message', 'DoctorEducation Not Found')->with('message_type', 'error');
        }
    }
}
