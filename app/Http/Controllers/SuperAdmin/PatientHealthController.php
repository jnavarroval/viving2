<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Exports\SuperAdmin\PatientHealthsExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\SuperAdmin\PatientHealth\CreateRequest;
use App\Http\Requests\ImportRequest;
use App\Imports\SuperAdmin\PatientHealthsImport;
use App\Models\PatientHealth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;

class PatientHealthController extends Controller
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
            $patient_healths =  PatientHealth::withAll();
            if ($req->trash && $req->trash == 'with') {
                $patient_healths =  $patient_healths->withTrashed();
            }
            if ($req->trash && $req->trash == 'only') {
                $patient_healths =  $patient_healths->onlyTrashed();
            }
            if ($req->column && $req->column != null && $req->search != null) {
                $patient_healths = $patient_healths->whereLike($req->column, $req->search);
            } else if ($req->search && $req->search != null) {

                $patient_healths = $patient_healths->whereLike(['name', 'description'], $req->search);
            }
            if ($req->sort_field != null && $req->sort_type != null) {
                $patient_healths = $patient_healths->OrderBy($req->sort_field, $req->sort_type);
            } else {
                $patient_healths = $patient_healths->OrderBy('id', 'desc');
            }
            if ($export != null) { // for export do not paginate
                $patient_healths = $patient_healths->get();
                return $patient_healths;
            }
            $patient_healths = $patient_healths->get();
            return $patient_healths;
        }
        $patient_healths = PatientHealth::withAll()->orderBy('id', 'desc')->get();
        return $patient_healths;
    }


    /*********View All PatientHealth  ***********/
    public function index(Request $request)
    {
        $patient_healths = $this->getter($request);
        return view('super_admins.patient_healths.index')->with('patient_healths', $patient_healths);
    }

    /*********View Create Form of PatientHealth  ***********/
    public function create()
    {
        return view('super_admins.patient_healths.create');
    }

    /*********Store PatientHealth  ***********/
    public function store(CreateRequest $request)
    {
        $data = $request->all();
        try {
            DB::beginTransaction();
            if (!$request->is_active) {
                $data['is_active'] = 0;
            }

            $data['image'] = uploadCroppedFile($request,'image','patient_healths');
            PatientHealth::create($request->all());
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->route('super_admin.patient_healths.index')->with('message', 'Something Went Wrong')->with('message_type', 'error');
        }
        return redirect()->route('super_admin.patient_healths.index')->with('message', 'PatientHealth Created Successfully')->with('message_type', 'success');
    }

    /*********View PatientHealth  ***********/
    public function show(PatientHealth $patient_health)
    {
        return view('super_admins.patient_healths.show', compact('patient_health'));
    }

    /*********View Edit Form of PatientHealth  ***********/
    public function edit(PatientHealth $patient_health)
    {
        return view('super_admins.patient_healths.edit', compact('patient_health'));
    }

    /*********Update PatientHealth  ***********/
    public function update(CreateRequest $request, PatientHealth $patient_health)
    {
        $data = $request->all();
        try {
            DB::beginTransaction();
            if (!$request->is_active) {
                $data['is_active'] = 0;
            }
            if ($request->image) {
                $data['image'] = uploadCroppedFile($request,'image','patient_healths',$patient_health->image);
            } else {
                $data['image'] = $patient_health->image;
            }
            $patient_health->update($data);
            $patient_health = PatientHealth::find($patient_health->id);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->route('super_admin.patient_healths.index')->with('message', 'Something Went Wrong')->with('message_type', 'error');
        }
        return redirect()->route('super_admin.patient_healths.index')->with('message', 'PatientHealth Updated Successfully')->with('message_type', 'success');
    }

    /********* Export  CSV And Excel  **********/
    public function export(Request $request)
    {
        $patient_healths = $this->getter($request, "export");
        if (in_array($request->export, ['csv,xlsx'])) {
            $extension = $request->export;
        } else {
            $extension = 'xlsx';
        }
        $filename = "patient_healths." . $extension;
        return Excel::download(new PatientHealthsExport($patient_healths), $filename);
    }
    /********* Import CSV And Excel  **********/
    public function import(ImportRequest $request)
    {
        $file = $request->file('file');
        Excel::import(new PatientHealthsImport, $file);
        return redirect()->back()->with('message', 'Blog Categories imported Successfully')->with('message_type', 'success');
    }


    /*********Soft DELETE PatientHealth ***********/
    public function destroy(PatientHealth $patient_health)
    {
        // if ($patient_health->Has('posts')) {
        //     $patient_health->news()->delete();
        // }
        $patient_health->delete();
        return redirect()->back()->with('message', 'PatientHealth Deleted Successfully')->with('message_type', 'success');
    }

    /*********Permanently DELETE PatientHealth ***********/
    public function destroyPermanently(Request $request, $patient_health)
    {
        $patient_health = PatientHealth::withTrashed()->find($patient_health);
        if ($patient_health) {
            if ($patient_health->trashed()) {
                if ($patient_health->image && file_exists(public_path($patient_health->image))) {
                    unlink(public_path($patient_health->image));
                }
                $patient_health->forceDelete();
                return redirect()->back()->with('message', 'Blog Category Deleted Successfully')->with('message_type', 'success');
            } else {
                return redirect()->back()->with('message', 'Blog Category is Not in Trash')->with('message_type', 'error');
            }
        } else {
            return redirect()->back()->with('message', 'Blog Category Not Found')->with('message_type', 'error');
        }
    }
    /********* Restore PatientHealth***********/
    public function restore(Request $request, $patient_health)
    {
        $patient_health = PatientHealth::withTrashed()->find($patient_health);
        if ($patient_health->trashed()) {
            $patient_health->restore();
            return redirect()->back()->with('message', 'Blog Category Restored Successfully')->with('message_type', 'success');
        } else {
            return redirect()->back()->with('message', 'Blog Category Not Found')->with('message_type', 'error');
        }
    }
}
