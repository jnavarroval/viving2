<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Exports\SuperAdmin\DoctorEducationsExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\SuperAdmin\ClinicCertifications\CreateRequest;
use App\Http\Requests\ImportRequest;
use App\Imports\SuperAdmin\ClinicEducationsImport;
use App\Models\Certification;
use App\Models\Clinic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class ClinicCertificationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    /********* Getter For Pagination, Searching And Sorting  ***********/
    public function getter($req = null, $export = null , $clinic)
    {
        if ($req != null) {
            $clinic_certifications =  $clinic->clinic_certifications();
            if ($req->trash && $req->trash == 'with') {
                $clinic_certifications =  $clinic_certifications->withTrashed();
            }
            if ($req->trash && $req->trash == 'only') {
                $clinic_certifications =  $clinic_certifications->onlyTrashed();
            }
            if ($req->column && $req->column != null && $req->search != null) {
                $clinic_certifications = $clinic_certifications->whereLike($req->column, $req->search);
            } else if ($req->search && $req->search != null) {

                $clinic_certifications = $clinic_certifications->whereLike(['name', 'description'], $req->search);
            }
            if ($req->sort_field != null && $req->sort_type != null) {
                $clinic_certifications = $clinic_certifications->OrderBy($req->sort_field, $req->sort_type);
            } else {
                $clinic_certifications = $clinic_certifications->OrderBy('id', 'desc');
            }
            if ($export != null) { // for export do not paginate
                $clinic_certifications = $clinic_certifications->get();
                return $clinic_certifications;
            }
            $clinic_certifications = $clinic_certifications->get();
            return $clinic_certifications;
        }
        $clinic_certifications = $clinic->clinic_certifications()->withAll()->orderBy('id', 'desc')->get();
        return $clinic_certifications;
    }


    /*********View All ClinicCertifications  ***********/
    public function index(Request $request , Clinic $clinic)
    {
        $clinic_certifications = $this->getter($request , null , $clinic);
        return view('super_admins.clinics.clinic_certifications.index' , compact('clinic_certifications' , 'clinic'));
    }

    /*********View Create Form of Certification  ***********/
    public function create(Clinic $clinic)
    {
        return view('super_admins.clinics.clinic_certifications.create', compact('clinic'));
    }

    /*********Store Certification  ***********/
    public function store(CreateRequest $request , Clinic $clinic)
    {
        $data = $request->all();
        try {
            DB::beginTransaction();
            if (!$request->is_active) {
                $data['is_active'] = 0;
            }
            $data = $request->all();
            $data['image'] = uploadFile($request,'file','clinic_certifications');
            $clinic_certification = $clinic->clinic_certifications()->create($data);
            $clinic_certification = $clinic->clinic_certifications()->withAll()->find($clinic_certification->id);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->route('super_admin.clinic_certifications.index' , $clinic->id)->with('message', 'Something Went Wrong')->with('message_type', 'error');
        }
        return redirect()->route('super_admin.clinic_certifications.index' , $clinic->id)->with('message', 'Certificate Created Successfully')->with('message_type', 'success');
    }

    /*********View Certification  ***********/
    public function show(Clinic $clinic ,Certification $clinic_certification)
    {
        if($clinic->id != $clinic_certification->clinic_id){
            return redirect()->back()->with('message', 'Certification Not Found')->with('message_type', 'error');
        }
        return view('super_admins.clinics.clinic_certifications.show', compact('clinic_certification' , 'clinic'));
    }

    /*********View Edit Form of Certification  ***********/
    public function edit(Clinic $clinic ,Certification $clinic_certification)
    {
        if($clinic->id != $clinic_certification->clinic_id){
            return redirect()->back()->with('message', 'Certification Not Found')->with('message_type', 'error');
        }
        return view('super_admins.clinics.clinic_certifications.edit', compact('clinic_certification', 'clinic'));
    }

    /*********Update Certification  ***********/
    public function update(CreateRequest $request,Clinic $clinic , Certification $clinic_certification)
    {
        if($clinic->id != $clinic_certification->clinic_id){
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
                $data['image'] = uploadFile($request,'file','clinic_certifications',$clinic_certification->image);
            } else {
                $data['image'] = $clinic_certification->image;
            }
            $clinic_certification->update($data);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->route('super_admin.clinic_certifications.index' , $clinic->id)->with('message', 'Something Went Wrong')->with('message_type', 'error');
        }
        return redirect()->route('super_admin.clinic_certifications.index' , $clinic->id)->with('message', 'Certification Updated Successfully')->with('message_type', 'success');
    }

    /********* Export  CSV And Excel  **********/
    public function export(Request $request)
    {
        $clinic_certifications = $this->getter($request, "export");
        if (in_array($request->export, ['csv,xlsx'])) {
            $extension = $request->export;
        } else {
            $extension = 'xlsx';
        }
        $filename = "clinic_certifications." . $extension;
        return Excel::download(new DoctorEducationsExport($clinic_certifications), $filename);
    }
    /********* Import CSV And Excel  **********/
    public function import(ImportRequest $request)
    {
        $file = $request->file('file');
        Excel::import(new ClinicEducationsImport, $file);
        return redirect()->back()->with('message', 'Certification Categories imported Successfully')->with('message_type', 'success');
    }


    /*********Soft DELETE Certification ***********/
    public function destroy(Clinic $clinic ,Certification $clinic_certification)
    {
        if($clinic->id != $clinic_certification->clinic_id){
            return redirect()->back()->with('message', 'Certification Not Found')->with('message_type', 'error');
        }
        $clinic_certification->delete();
        return redirect()->back()->with('message', 'Certification Deleted Successfully')->with('message_type', 'success');
    }

    /*********Permanently DELETE Certification ***********/
    public function destroyPermanently(Request $request,Clinic $clinic ,$clinic_certification)
    {
        $clinic_certification = Certification::withTrashed()->find($clinic_certification);
        if ($clinic_certification) {
            if ($clinic_certification->trashed()) {
                if ($clinic_certification->image && file_exists(public_path($clinic_certification->image))) {
                    unlink(public_path($clinic_certification->image));
                }
                $clinic_certification->forceDelete();
                return redirect()->back()->with('message', 'Certification Deleted Successfully')->with('message_type', 'success');
            } else {
                return redirect()->back()->with('message', 'Certification is Not in Trash')->with('message_type', 'error');
            }
        } else {
            return redirect()->back()->with('message', 'Certification Not Found')->with('message_type', 'error');
        }
    }
    /********* Restore Certification***********/
    public function restore(Request $request,Clinic $clinic, $clinic_certification)
    {
        $clinic_certification = Certification::withTrashed()->find($clinic_certification);
        if ($clinic_certification->trashed()) {
            $clinic_certification->restore();
            return redirect()->back()->with('message', 'Certification Restored Successfully')->with('message_type', 'success');
        } else {
            return redirect()->back()->with('message', 'Certification Not Found')->with('message_type', 'error');
        }
    }
}
