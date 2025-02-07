<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Exports\SuperAdmin\DoctorCategoriesExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\SuperAdmin\DoctorCategories\CreateRequest;
use App\Http\Requests\ImportRequest;
use App\Imports\SuperAdmin\DoctorCategoriesImport;
use App\Models\DoctorCategory;
use App\Models\DoctorMainCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;

class DoctorCategoriesController extends Controller
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
            $doctor_categories =  DoctorCategory::withAll();
            if ($req->trash && $req->trash == 'with') {
                $doctor_categories =  $doctor_categories->withTrashed();
            }
            if ($req->trash && $req->trash == 'only') {
                $doctor_categories =  $doctor_categories->onlyTrashed();
            }
            if ($req->column && $req->column != null && $req->search != null) {
                $doctor_categories = $doctor_categories->whereLike($req->column, $req->search);
            } else if ($req->search && $req->search != null) {

                $doctor_categories = $doctor_categories->whereLike(['name', 'description'], $req->search);
            }
            if ($req->sort_field != null && $req->sort_type != null) {
                $doctor_categories = $doctor_categories->OrderBy($req->sort_field, $req->sort_type);
            } else {
                $doctor_categories = $doctor_categories->OrderBy('id', 'desc');
            }
            if ($export != null) { // for export do not paginate
                $doctor_categories = $doctor_categories->get();
                return $doctor_categories;
            }
            $doctor_categories = $doctor_categories->get();
            return $doctor_categories;
        }
        $doctor_categories = DoctorCategory::withAll()->orderBy('id', 'desc')->get();
        return $doctor_categories;
    }


    /*********View All DoctorCategories  ***********/
    public function index(Request $request)
    {
        $doctor_categories = $this->getter($request);
        return view('super_admins.doctor_categories.index')->with('doctor_categories', $doctor_categories);
    }

    /*********View Create Form of DoctorCategory  ***********/
    public function create()
    {
        $doctor_main_categories = DoctorMainCategory::active()->get();

        return view('super_admins.doctor_categories.create',compact('doctor_main_categories'));
    }

    /*********Store DoctorCategory  ***********/
    public function store(CreateRequest $request)
    {
        $data = $request->all();
        try {
            DB::beginTransaction();
            if (!$request->is_active) {
                $data['is_active'] = 0;
            }
            $data['image'] = uploadCroppedFile($request,'image','doctor_categories');

            $doctor_category = DoctorCategory::create($data);
            $doctor_category->slug = Str::slug($doctor_category->name . ' ' . $doctor_category->id, '-');
            $doctor_category->save();
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->route('super_admin.doctor_categories.index')->with('message', 'Something Went Wrong')->with('message_type', 'error');
        }
        return redirect()->route('super_admin.doctor_categories.index')->with('message', 'DoctorCategory Created Successfully')->with('message_type', 'success');
    }

    /*********View DoctorCategory  ***********/
    public function show(DoctorCategory $doctor_category)
    {
        return view('super_admins.doctor_categories.show', compact('doctor_category'));
    }

    /*********View Edit Form of DoctorCategory  ***********/
    public function edit(DoctorCategory $doctor_category)
    {
        $doctor_main_categories = DoctorMainCategory::active()->get();

        return view('super_admins.doctor_categories.edit', compact('doctor_category','doctor_main_categories'));
    }

    /*********Update DoctorCategory  ***********/
    public function update(CreateRequest $request, DoctorCategory $doctor_category)
    {
        $data = $request->all();
        try {
            DB::beginTransaction();
            if (!$request->is_active) {
                $data['is_active'] = 0;
            }
            if ($request->image) {
                $data['image'] = uploadCroppedFile($request,'image','doctor_categories',$doctor_category->image);
            } else {
                $data['image'] = $doctor_category->image;
            }
            $doctor_category->update($data);
            $doctor_category = DoctorCategory::find($doctor_category->id);
            $slug = Str::slug($doctor_category->name . ' ' . $doctor_category->id, '-');
            $doctor_category->update([
                'slug' => $slug
            ]);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->route('super_admin.doctor_categories.index')->with('message', 'Something Went Wrong')->with('message_type', 'error');
        }
        return redirect()->route('super_admin.doctor_categories.index')->with('message', 'DoctorCategory Updated Successfully')->with('message_type', 'success');
    }

    /********* Export  CSV And Excel  **********/
    public function export(Request $request)
    {
        $doctor_categories = $this->getter($request, "export");
        if (in_array($request->export, ['csv,xlsx'])) {
            $extension = $request->export;
        } else {
            $extension = 'xlsx';
        }
        $filename = "doctor_categories." . $extension;
        return Excel::download(new DoctorCategoriesExport($doctor_categories), $filename);
    }
    /********* Import CSV And Excel  **********/
    public function import(ImportRequest $request)
    {
        $file = $request->file('file');
        Excel::import(new DoctorCategoriesImport, $file);
        return redirect()->back()->with('message', 'Blog Categories imported Successfully')->with('message_type', 'success');
    }


    /*********Soft DELETE DoctorCategory ***********/
    public function destroy(DoctorCategory $doctor_category)
    {
        $doctor_category->delete();
        return redirect()->back()->with('message', 'DoctorCategory Deleted Successfully')->with('message_type', 'success');
    }

    /*********Permanently DELETE DoctorCategory ***********/
    public function destroyPermanently(Request $request, $doctor_category)
    {
        $doctor_category = DoctorCategory::withTrashed()->find($doctor_category);
        if ($doctor_category) {
            if ($doctor_category->trashed()) {
                if ($doctor_category->image && file_exists(public_path($doctor_category->image))) {
                    unlink(public_path($doctor_category->image));
                }
                $doctor_category->forceDelete();
                return redirect()->back()->with('message', 'Blog Category Deleted Successfully')->with('message_type', 'success');
            } else {
                return redirect()->back()->with('message', 'Blog Category is Not in Trash')->with('message_type', 'error');
            }
        } else {
            return redirect()->back()->with('message', 'Blog Category Not Found')->with('message_type', 'error');
        }
    }
    /********* Restore DoctorCategory***********/
    public function restore(Request $request, $doctor_category)
    {
        $doctor_category = DoctorCategory::withTrashed()->find($doctor_category);
        if ($doctor_category->trashed()) {
            $doctor_category->restore();
            return redirect()->back()->with('message', 'Blog Category Restored Successfully')->with('message_type', 'success');
        } else {
            return redirect()->back()->with('message', 'Blog Category Not Found')->with('message_type', 'error');
        }
    }
}
