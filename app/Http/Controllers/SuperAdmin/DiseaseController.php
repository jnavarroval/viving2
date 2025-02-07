<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Exports\SuperAdmin\DiseasesExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\SuperAdmin\Diseases\CreateRequest;
use App\Http\Requests\ImportRequest;
use App\Imports\SuperAdmin\DiseasesImport;
use App\Models\Disease;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;

class DiseaseController extends Controller
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
            $diseases =  Disease::withAll();
            if ($req->trash && $req->trash == 'with') {
                $diseases =  $diseases->withTrashed();
            }
            if ($req->trash && $req->trash == 'only') {
                $diseases =  $diseases->onlyTrashed();
            }
            if ($req->column && $req->column != null && $req->search != null) {
                $diseases = $diseases->whereLike($req->column, $req->search);
            } else if ($req->search && $req->search != null) {

                $diseases = $diseases->whereLike(['name', 'description'], $req->search);
            }
            if ($req->sort_field != null && $req->sort_type != null) {
                $diseases = $diseases->OrderBy($req->sort_field, $req->sort_type);
            } else {
                $diseases = $diseases->OrderBy('id', 'desc');
            }
            if ($export != null) { // for export do not paginate
                $diseases = $diseases->get();
                return $diseases;
            }
            $diseases = $diseases->get();
            return $diseases;
        }
        $diseases = Disease::withAll()->orderBy('id', 'desc')->get();
        return $diseases;
    }


    /*********View All Diseases  ***********/
    public function index(Request $request)
    {
        $diseases = $this->getter($request);
        return view('super_admins.diseases.index')->with('diseases', $diseases);
    }

    /*********View Create Form of Disease  ***********/
    public function create()
    {
        return view('super_admins.diseases.create');
    }

    /*********Store Disease  ***********/
    public function store(CreateRequest $request)
    {
        $data = $request->all();
        try {
            DB::beginTransaction();
            if (!$request->is_active) {
                $data['is_active'] = 0;
            }

            $data['image'] = uploadCroppedFile($request,'image','diseases');
            Disease::create($request->all());
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->route('super_admin.diseases.index')->with('message', 'Something Went Wrong')->with('message_type', 'error');
        }
        return redirect()->route('super_admin.diseases.index')->with('message', 'Disease Created Successfully')->with('message_type', 'success');
    }

    /*********View Disease  ***********/
    public function show(Disease $disease)
    {
        return view('super_admins.diseases.show', compact('disease'));
    }

    /*********View Edit Form of Disease  ***********/
    public function edit(Disease $disease)
    {
        return view('super_admins.diseases.edit', compact('disease'));
    }

    /*********Update Disease  ***********/
    public function update(CreateRequest $request, Disease $disease)
    {
        $data = $request->all();
        try {
            DB::beginTransaction();
            if (!$request->is_active) {
                $data['is_active'] = 0;
            }
            if ($request->image) {
                $data['image'] = uploadCroppedFile($request,'image','diseases',$disease->image);
            } else {
                $data['image'] = $disease->image;
            }
            $disease->update($data);
            $disease = Disease::find($disease->id);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->route('super_admin.diseases.index')->with('message', 'Something Went Wrong')->with('message_type', 'error');
        }
        return redirect()->route('super_admin.diseases.index')->with('message', 'Disease Updated Successfully')->with('message_type', 'success');
    }

    /********* Export  CSV And Excel  **********/
    public function export(Request $request)
    {
        $diseases = $this->getter($request, "export");
        if (in_array($request->export, ['csv,xlsx'])) {
            $extension = $request->export;
        } else {
            $extension = 'xlsx';
        }
        $filename = "diseases." . $extension;
        return Excel::download(new DiseasesExport($diseases), $filename);
    }
    /********* Import CSV And Excel  **********/
    public function import(ImportRequest $request)
    {
        $file = $request->file('file');
        Excel::import(new DiseasesImport, $file);
        return redirect()->back()->with('message', 'Blog Categories imported Successfully')->with('message_type', 'success');
    }


    /*********Soft DELETE Disease ***********/
    public function destroy(Disease $disease)
    {
        // if ($disease->Has('posts')) {
        //     $disease->news()->delete();
        // }
        $disease->delete();
        return redirect()->back()->with('message', 'Disease Deleted Successfully')->with('message_type', 'success');
    }

    /*********Permanently DELETE Disease ***********/
    public function destroyPermanently(Request $request, $disease)
    {
        $disease = Disease::withTrashed()->find($disease);
        if ($disease) {
            if ($disease->trashed()) {
                if ($disease->image && file_exists(public_path($disease->image))) {
                    unlink(public_path($disease->image));
                }
                $disease->forceDelete();
                return redirect()->back()->with('message', 'Blog Category Deleted Successfully')->with('message_type', 'success');
            } else {
                return redirect()->back()->with('message', 'Blog Category is Not in Trash')->with('message_type', 'error');
            }
        } else {
            return redirect()->back()->with('message', 'Blog Category Not Found')->with('message_type', 'error');
        }
    }
    /********* Restore Disease***********/
    public function restore(Request $request, $disease)
    {
        $disease = Disease::withTrashed()->find($disease);
        if ($disease->trashed()) {
            $disease->restore();
            return redirect()->back()->with('message', 'Blog Category Restored Successfully')->with('message_type', 'success');
        } else {
            return redirect()->back()->with('message', 'Blog Category Not Found')->with('message_type', 'error');
        }
    }
}
