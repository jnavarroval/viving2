<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Exports\SuperAdmin\ClinicMainCategoriesExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\SuperAdmin\ClinicMainCategories\CreateRequest;
use App\Http\Requests\ImportRequest;
use App\Imports\SuperAdmin\ClinicMainCategoriesImport;
use App\Models\ClinicMainCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;

class ClinicMainCategoriesController extends Controller
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
            $clinic_main_categories =  ClinicMainCategory::withAll();
            if ($req->trash && $req->trash == 'with') {
                $clinic_main_categories =  $clinic_main_categories->withTrashed();
            }
            if ($req->trash && $req->trash == 'only') {
                $clinic_main_categories =  $clinic_main_categories->onlyTrashed();
            }
            if ($req->column && $req->column != null && $req->search != null) {
                $clinic_main_categories = $clinic_main_categories->whereLike($req->column, $req->search);
            } else if ($req->search && $req->search != null) {

                $clinic_main_categories = $clinic_main_categories->whereLike(['name', 'description'], $req->search);
            }
            if ($req->sort_field != null && $req->sort_type != null) {
                $clinic_main_categories = $clinic_main_categories->OrderBy($req->sort_field, $req->sort_type);
            } else {
                $clinic_main_categories = $clinic_main_categories->OrderBy('id', 'desc');
            }
            if ($export != null) { // for export do not paginate
                $clinic_main_categories = $clinic_main_categories->get();
                return $clinic_main_categories;
            }
            $clinic_main_categories = $clinic_main_categories->get();
            return $clinic_main_categories;
        }
        $clinic_main_categories = ClinicMainCategory::withAll()->orderBy('id', 'desc')->get();
        return $clinic_main_categories;
    }


    /*********View All ClinicMainCategories  ***********/
    public function index(Request $request)
    {
        $clinic_main_categories = $this->getter($request);
        return view('super_admins.clinic_main_categories.index')->with('clinic_main_categories', $clinic_main_categories);
    }

    /*********View Create Form of ClinicMainCategory  ***********/
    public function create()
    {

        return view('super_admins.clinic_main_categories.create');
    }

    /*********Store ClinicMainCategory  ***********/
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
            $data['image'] = uploadCroppedFile($request,'image','clinic_main_categories');
            $data['icon'] = uploadCroppedFile($request,'icon','clinic_main_categories');

            $clinic_main_category = ClinicMainCategory::create($data);
            $clinic_main_category->slug = Str::slug($clinic_main_category->name . ' ' . $clinic_main_category->id, '-');
            $clinic_main_category->save();
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->route('super_admin.clinic_main_categories.index')->with('message', 'Something Went Wrong')->with('message_type', 'error');
        }
        return redirect()->route('super_admin.clinic_main_categories.index')->with('message', 'ClinicMainCategory Created Successfully')->with('message_type', 'success');
    }

    /*********View ClinicMainCategory  ***********/
    public function show(ClinicMainCategory $clinic_main_category)
    {
        return view('super_admins.clinic_main_categories.show', compact('clinic_main_category'));
    }

    /*********View Edit Form of ClinicMainCategory  ***********/
    public function edit(ClinicMainCategory $clinic_main_category)
    {
        return view('super_admins.clinic_main_categories.edit', compact('clinic_main_category'));
    }

    /*********Update ClinicMainCategory  ***********/
    public function update(CreateRequest $request, ClinicMainCategory $clinic_main_category)
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
                $data['image'] = uploadCroppedFile($request,'image','clinic_main_categories',$clinic_main_category->image);
            } else {
                $data['image'] = $clinic_main_category->image;
            }
            if ($request->icon) {
                $data['icon'] = uploadCroppedFile($request,'icon','clinic_main_categories',$clinic_main_category->icon);
            } else {
                $data['icon'] = $clinic_main_category->icon;
            }
            $clinic_main_category->update($data);
            $clinic_main_category = ClinicMainCategory::find($clinic_main_category->id);
            $slug = Str::slug($clinic_main_category->name . ' ' . $clinic_main_category->id, '-');
            $clinic_main_category->update([
                'slug' => $slug
            ]);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->route('super_admin.clinic_main_categories.index')->with('message', 'Something Went Wrong')->with('message_type', 'error');
        }
        return redirect()->route('super_admin.clinic_main_categories.index')->with('message', 'ClinicMainCategory Updated Successfully')->with('message_type', 'success');
    }

    /********* Export  CSV And Excel  **********/
    public function export(Request $request)
    {
        $clinic_main_categories = $this->getter($request, "export");
        if (in_array($request->export, ['csv,xlsx'])) {
            $extension = $request->export;
        } else {
            $extension = 'xlsx';
        }
        $filename = "clinic_main_categories." . $extension;
        return Excel::download(new ClinicMainCategoriesExport($clinic_main_categories), $filename);
    }
    /********* Import CSV And Excel  **********/
    public function import(ImportRequest $request)
    {
        $file = $request->file('file');
        Excel::import(new ClinicMainCategoriesImport, $file);
        return redirect()->back()->with('message', 'Clinic Main Categories imported Successfully')->with('message_type', 'success');
    }


    /*********Soft DELETE ClinicMainCategory ***********/
    public function destroy(ClinicMainCategory $clinic_main_category)
    {
        $clinic_main_category->delete();
        return redirect()->back()->with('message', 'ClinicMainCategory Deleted Successfully')->with('message_type', 'success');
    }

    /*********Permanently DELETE ClinicMainCategory ***********/
    public function destroyPermanently(Request $request, $clinic_main_category)
    {
        $clinic_main_category = ClinicMainCategory::withTrashed()->find($clinic_main_category);
        if ($clinic_main_category) {
            if ($clinic_main_category->trashed()) {
                if ($clinic_main_category->image && file_exists(public_path($clinic_main_category->image))) {
                    unlink(public_path($clinic_main_category->image));
                }
                $clinic_main_category->forceDelete();
                return redirect()->back()->with('message', 'Clinic Main Category Deleted Successfully')->with('message_type', 'success');
            } else {
                return redirect()->back()->with('message', 'Clinic Main Category is Not in Trash')->with('message_type', 'error');
            }
        } else {
            return redirect()->back()->with('message', 'Clinic Main Category Not Found')->with('message_type', 'error');
        }
    }
    /********* Restore ClinicMainCategory***********/
    public function restore(Request $request, $clinic_main_category)
    {
        $clinic_main_category = ClinicMainCategory::withTrashed()->find($clinic_main_category);
        if ($clinic_main_category->trashed()) {
            $clinic_main_category->restore();
            return redirect()->back()->with('message', 'Clinic Main Category Restored Successfully')->with('message_type', 'success');
        } else {
            return redirect()->back()->with('message', 'Clinic Main Category Not Found')->with('message_type', 'error');
        }
    }
}
