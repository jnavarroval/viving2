<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Exports\SuperAdmin\ClinicCategoriesExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\SuperAdmin\ClinicCategories\CreateRequest;
use App\Http\Requests\ImportRequest;
use App\Imports\SuperAdmin\ClinicCategoriesImport;
use App\Models\ClinicCategory;
use App\Models\ClinicMainCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;

class ClinicCategoriesController extends Controller
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
            $clinic_categories =  ClinicCategory::withAll();
            if ($req->trash && $req->trash == 'with') {
                $clinic_categories =  $clinic_categories->withTrashed();
            }
            if ($req->trash && $req->trash == 'only') {
                $clinic_categories =  $clinic_categories->onlyTrashed();
            }
            if ($req->column && $req->column != null && $req->search != null) {
                $clinic_categories = $clinic_categories->whereLike($req->column, $req->search);
            } else if ($req->search && $req->search != null) {

                $clinic_categories = $clinic_categories->whereLike(['name', 'description'], $req->search);
            }
            if ($req->sort_field != null && $req->sort_type != null) {
                $clinic_categories = $clinic_categories->OrderBy($req->sort_field, $req->sort_type);
            } else {
                $clinic_categories = $clinic_categories->OrderBy('id', 'desc');
            }
            if ($export != null) { // for export do not paginate
                $clinic_categories = $clinic_categories->get();
                return $clinic_categories;
            }
            $clinic_categories = $clinic_categories->get();
            return $clinic_categories;
        }
        $clinic_categories = ClinicCategory::withAll()->orderBy('id', 'desc')->get();
        return $clinic_categories;
    }


    /*********View All ClinicCategories  ***********/
    public function index(Request $request)
    {
        $clinic_categories = $this->getter($request);
        return view('super_admins.clinic_categories.index')->with('clinic_categories', $clinic_categories);
    }

    /*********View Create Form of ClinicCategory  ***********/
    public function create()
    {
        $clinic_main_categories = ClinicMainCategory::active()->get();
        return view('super_admins.clinic_categories.create',compact('clinic_main_categories'));
    }

    /*********Store ClinicCategory  ***********/
    public function store(CreateRequest $request)
    {
        $data = $request->all();
        try {
            DB::beginTransaction();
            if (!$request->is_active) {
                $data['is_active'] = 0;
            }
            $data['image'] = uploadCroppedFile($request,'image','clinic_categories');

            $clinic_category = ClinicCategory::create($data);
            $clinic_category->slug = Str::slug($clinic_category->name . ' ' . $clinic_category->id, '-');
            $clinic_category->save();
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->route('super_admin.clinic_categories.index')->with('message', 'Something Went Wrong')->with('message_type', 'error');
        }
        return redirect()->route('super_admin.clinic_categories.index')->with('message', 'ClinicCategory Created Successfully')->with('message_type', 'success');
    }

    /*********View ClinicCategory  ***********/
    public function show(ClinicCategory $clinic_category)
    {
        return view('super_admins.clinic_categories.show', compact('clinic_category'));
    }

    /*********View Edit Form of ClinicCategory  ***********/
    public function edit(ClinicCategory $clinic_category)
    {
        $clinic_main_categories = ClinicMainCategory::active()->get();
        return view('super_admins.clinic_categories.edit', compact('clinic_category','clinic_main_categories'));
    }

    /*********Update ClinicCategory  ***********/
    public function update(CreateRequest $request, ClinicCategory $clinic_category)
    {
        $data = $request->all();
        try {
            DB::beginTransaction();
            if (!$request->is_active) {
                $data['is_active'] = 0;
            }
            if ($request->image) {
                $data['image'] = uploadCroppedFile($request,'image','clinic_categories',$clinic_category->image);
            } else {
                $data['image'] = $clinic_category->image;
            }
            $clinic_category->update($data);
            $clinic_category = ClinicCategory::find($clinic_category->id);
            $slug = Str::slug($clinic_category->name . ' ' . $clinic_category->id, '-');
            $clinic_category->update([
                'slug' => $slug
            ]);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->route('super_admin.clinic_categories.index')->with('message', 'Something Went Wrong')->with('message_type', 'error');
        }
        return redirect()->route('super_admin.clinic_categories.index')->with('message', 'ClinicCategory Updated Successfully')->with('message_type', 'success');
    }

    /********* Export  CSV And Excel  **********/
    public function export(Request $request)
    {
        $clinic_categories = $this->getter($request, "export");
        if (in_array($request->export, ['csv,xlsx'])) {
            $extension = $request->export;
        } else {
            $extension = 'xlsx';
        }
        $filename = "clinic_categories." . $extension;
        return Excel::download(new ClinicCategoriesExport($clinic_categories), $filename);
    }
    /********* Import CSV And Excel  **********/
    public function import(ImportRequest $request)
    {
        $file = $request->file('file');
        Excel::import(new ClinicCategoriesImport, $file);
        return redirect()->back()->with('message', 'Blog Categories imported Successfully')->with('message_type', 'success');
    }


    /*********Soft DELETE ClinicCategory ***********/
    public function destroy(ClinicCategory $clinic_category)
    {
        $clinic_category->delete();
        return redirect()->back()->with('message', 'ClinicCategory Deleted Successfully')->with('message_type', 'success');
    }

    /*********Permanently DELETE ClinicCategory ***********/
    public function destroyPermanently(Request $request, $clinic_category)
    {
        $clinic_category = ClinicCategory::withTrashed()->find($clinic_category);
        if ($clinic_category) {
            if ($clinic_category->trashed()) {
                if ($clinic_category->image && file_exists(public_path($clinic_category->image))) {
                    unlink(public_path($clinic_category->image));
                }
                $clinic_category->forceDelete();
                return redirect()->back()->with('message', 'Blog Category Deleted Successfully')->with('message_type', 'success');
            } else {
                return redirect()->back()->with('message', 'Blog Category is Not in Trash')->with('message_type', 'error');
            }
        } else {
            return redirect()->back()->with('message', 'Blog Category Not Found')->with('message_type', 'error');
        }
    }
    /********* Restore ClinicCategory***********/
    public function restore(Request $request, $clinic_category)
    {
        $clinic_category = ClinicCategory::withTrashed()->find($clinic_category);
        if ($clinic_category->trashed()) {
            $clinic_category->restore();
            return redirect()->back()->with('message', 'Blog Category Restored Successfully')->with('message_type', 'success');
        } else {
            return redirect()->back()->with('message', 'Blog Category Not Found')->with('message_type', 'error');
        }
    }
}
