<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Exports\SuperAdmin\DoctorEducationsExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\SuperAdmin\DoctorCertifications\CreateRequest;
use App\Http\Requests\ImportRequest;
use App\Imports\SuperAdmin\DoctorEducationsImport;
use App\Models\Certification;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class DoctorCertificationsController extends Controller
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
            $doctor_certifications =  $doctor->doctor_certifications();
            if ($req->trash && $req->trash == 'with') {
                $doctor_certifications =  $doctor_certifications->withTrashed();
            }
            if ($req->trash && $req->trash == 'only') {
                $doctor_certifications =  $doctor_certifications->onlyTrashed();
            }
            if ($req->column && $req->column != null && $req->search != null) {
                $doctor_certifications = $doctor_certifications->whereLike($req->column, $req->search);
            } else if ($req->search && $req->search != null) {

                $doctor_certifications = $doctor_certifications->whereLike(['name', 'description'], $req->search);
            }
            if ($req->sort_field != null && $req->sort_type != null) {
                $doctor_certifications = $doctor_certifications->OrderBy($req->sort_field, $req->sort_type);
            } else {
                $doctor_certifications = $doctor_certifications->OrderBy('id', 'desc');
            }
            if ($export != null) { // for export do not paginate
                $doctor_certifications = $doctor_certifications->get();
                return $doctor_certifications;
            }
            $doctor_certifications = $doctor_certifications->get();
            return $doctor_certifications;
        }
        $doctor_certifications = $doctor->doctor_certifications()->withAll()->orderBy('id', 'desc')->get();
        return $doctor_certifications;
    }


    /*********View All DoctorCertifications  ***********/
    public function index(Request $request , Doctor $doctor)
    {
        $doctor_certifications = $this->getter($request , null , $doctor);
        return view('super_admins.doctors.doctor_certifications.index' , compact('doctor_certifications' , 'doctor'));
    }

    /*********View Create Form of Certification  ***********/
    public function create(Doctor $doctor)
    {
        return view('super_admins.doctors.doctor_certifications.create', compact('doctor'));
    }

    /*********Store Certification  ***********/
    public function store(CreateRequest $request , Doctor $doctor)
    {
        $data = $request->all();
        try {
            DB::beginTransaction();
            if (!$request->is_active) {
                $data['is_active'] = 0;
            }
            $data = $request->all();
            $data['image'] = uploadFile($request,'file','doctor_certifications');
            $doctor_certification = $doctor->doctor_certifications()->create($data);
            $doctor_certification = $doctor->doctor_certifications()->withAll()->find($doctor_certification->id);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->route('super_admin.doctor_certifications.index' , $doctor->id)->with('message', 'Something Went Wrong')->with('message_type', 'error');
        }
        return redirect()->route('super_admin.doctor_certifications.index' , $doctor->id)->with('message', 'Certificate Created Successfully')->with('message_type', 'success');
    }

    /*********View Certification  ***********/
    public function show(Doctor $doctor ,Certification $doctor_certification)
    {
        if($doctor->id != $doctor_certification->doctor_id){
            return redirect()->back()->with('message', 'Certification Not Found')->with('message_type', 'error');
        }
        return view('super_admins.doctors.doctor_certifications.show', compact('doctor_certification' , 'doctor'));
    }

    /*********View Edit Form of Certification  ***********/
    public function edit(Doctor $doctor ,Certification $doctor_certification)
    {
        if($doctor->id != $doctor_certification->doctor_id){
            return redirect()->back()->with('message', 'Certification Not Found')->with('message_type', 'error');
        }
        return view('super_admins.doctors.doctor_certifications.edit', compact('doctor_certification', 'doctor'));
    }

    /*********Update Certification  ***********/
    public function update(CreateRequest $request,Doctor $doctor , Certification $doctor_certification)
    {
        if($doctor->id != $doctor_certification->doctor_id){
            return redirect()->back()->with('message', 'Certification Not Found')->with('message_type', 'error');
        }
        $data = $request->all();
        try {
            DB::beginTransaction();
            if (!$request->is_active) {
                $data['is_active'] = 0;
            }
            $data = $request->all();
            if ($request->file) {
                $data['image'] = uploadFile($request,'file','doctor_certifications',$doctor_certification->image);
            } else {
                $data['image'] = $doctor_certification->image;
            }
            $doctor_certification->update($data);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->route('super_admin.doctor_certifications.index' , $doctor->id)->with('message', 'Something Went Wrong')->with('message_type', 'error');
        }
        return redirect()->route('super_admin.doctor_certifications.index' , $doctor->id)->with('message', 'Certification Updated Successfully')->with('message_type', 'success');
    }

    /********* Export  CSV And Excel  **********/
    public function export(Request $request)
    {
        $doctor_certifications = $this->getter($request, "export");
        if (in_array($request->export, ['csv,xlsx'])) {
            $extension = $request->export;
        } else {
            $extension = 'xlsx';
        }
        $filename = "doctor_certifications." . $extension;
        return Excel::download(new DoctorEducationsExport($doctor_certifications), $filename);
    }
    /********* Import CSV And Excel  **********/
    public function import(ImportRequest $request)
    {
        $file = $request->file('file');
        Excel::import(new DoctorEducationsImport, $file);
        return redirect()->back()->with('message', 'Certification Categories imported Successfully')->with('message_type', 'success');
    }


    /*********Soft DELETE Certification ***********/
    public function destroy(Doctor $doctor ,Certification $doctor_certification)
    {
        if($doctor->id != $doctor_certification->doctor_id){
            return redirect()->back()->with('message', 'Certification Not Found')->with('message_type', 'error');
        }
        $doctor_certification->delete();
        return redirect()->back()->with('message', 'Certification Deleted Successfully')->with('message_type', 'success');
    }

    /*********Permanently DELETE Certification ***********/
    public function destroyPermanently(Request $request,Doctor $doctor ,$doctor_certification)
    {
        $doctor_certification = Certification::withTrashed()->find($doctor_certification);
        if ($doctor_certification) {
            if ($doctor_certification->trashed()) {
                if ($doctor_certification->image && file_exists(public_path($doctor_certification->image))) {
                    unlink(public_path($doctor_certification->image));
                }
                $doctor_certification->forceDelete();
                return redirect()->back()->with('message', 'Certification Deleted Successfully')->with('message_type', 'success');
            } else {
                return redirect()->back()->with('message', 'Certification is Not in Trash')->with('message_type', 'error');
            }
        } else {
            return redirect()->back()->with('message', 'Certification Not Found')->with('message_type', 'error');
        }
    }
    /********* Restore Certification***********/
    public function restore(Request $request,Doctor $doctor, $doctor_certification)
    {
        $doctor_certification = Certification::withTrashed()->find($doctor_certification);
        if ($doctor_certification->trashed()) {
            $doctor_certification->restore();
            return redirect()->back()->with('message', 'Certification Restored Successfully')->with('message_type', 'success');
        } else {
            return redirect()->back()->with('message', 'Certification Not Found')->with('message_type', 'error');
        }
    }
}
