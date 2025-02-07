<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Exports\SuperAdmin\DoctorMainCategoriesExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\SuperAdmin\DoctorMainCategories\CreateRequest;
use App\Http\Requests\ImportRequest;
use App\Imports\SuperAdmin\DoctorMainCategoriesImport;
use App\Models\DoctorMainCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;

class DoctorMainCategoriesController extends Controller
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
            $doctor_main_categories =  DoctorMainCategory::withAll();
            if ($req->trash && $req->trash == 'with') {
                $doctor_main_categories =  $doctor_main_categories->withTrashed();
            }
            if ($req->trash && $req->trash == 'only') {
                $doctor_main_categories =  $doctor_main_categories->onlyTrashed();
            }
            if ($req->column && $req->column != null && $req->search != null) {
                $doctor_main_categories = $doctor_main_categories->whereLike($req->column, $req->search);
            } else if ($req->search && $req->search != null) {

                $doctor_main_categories = $doctor_main_categories->whereLike(['name', 'description'], $req->search);
            }
            if ($req->sort_field != null && $req->sort_type != null) {
                $doctor_main_categories = $doctor_main_categories->OrderBy($req->sort_field, $req->sort_type);
            } else {
                $doctor_main_categories = $doctor_main_categories->OrderBy('id', 'desc');
            }
            if ($export != null) { // for export do not paginate
                $doctor_main_categories = $doctor_main_categories->get();
                return $doctor_main_categories;
            }
            $doctor_main_categories = $doctor_main_categories->get();
            return $doctor_main_categories;
        }
        $doctor_main_categories = DoctorMainCategory::withAll()->orderBy('id', 'desc')->get();
        return $doctor_main_categories;
    }


    /*********View All DoctorMainCategories  ***********/
    public function index(Request $request)
    {
        $doctor_main_categories = $this->getter($request);
        return view('super_admins.doctor_main_categories.index')->with('doctor_main_categories', $doctor_main_categories);
    }

    /*********View Create Form of DoctorMainCategory  ***********/
    public function create()
    {

        return view('super_admins.doctor_main_categories.create');
    }

    /*********Store DoctorMainCategory  ***********/
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
            $data['image'] = uploadCroppedFile($request,'image','doctor_main_categories');
            $data['icon'] = uploadCroppedFile($request,'icon','doctor_main_categories');

            $doctor_main_category = DoctorMainCategory::create($data);
            $doctor_main_category->slug = Str::slug($doctor_main_category->name . ' ' . $doctor_main_category->id, '-');
            $doctor_main_category->save();
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->route('super_admin.doctor_main_categories.index')->with('message', 'Something Went Wrong')->with('message_type', 'error');
        }
        return redirect()->route('super_admin.doctor_main_categories.index')->with('message', 'DoctorMainCategory Created Successfully')->with('message_type', 'success');
    }

    /*********View DoctorMainCategory  ***********/
    public function show(DoctorMainCategory $doctor_main_category)
    {
        return view('super_admins.doctor_main_categories.show', compact('doctor_main_category'));
    }

    /*********View Edit Form of DoctorMainCategory  ***********/
    public function edit(DoctorMainCategory $doctor_main_category)
    {
        return view('super_admins.doctor_main_categories.edit', compact('doctor_main_category'));
    }

    /*********Update DoctorMainCategory  ***********/
    public function update(CreateRequest $request, DoctorMainCategory $doctor_main_category)
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
                $data['image'] = uploadCroppedFile($request,'image','doctor_main_categories',$doctor_main_category->image);
            } else {
                $data['image'] = $doctor_main_category->image;
            }
            if ($request->icon) {
                $data['icon'] = uploadCroppedFile($request,'icon','doctor_main_categories',$doctor_main_category->icon);
            } else {
                $data['icon'] = $doctor_main_category->icon;
            }
            $doctor_main_category->update($data);
            $doctor_main_category = DoctorMainCategory::find($doctor_main_category->id);
            $slug = Str::slug($doctor_main_category->name . ' ' . $doctor_main_category->id, '-');
            $doctor_main_category->update([
                'slug' => $slug
            ]);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->route('super_admin.doctor_main_categories.index')->with('message', 'Something Went Wrong')->with('message_type', 'error');
        }
        return redirect()->route('super_admin.doctor_main_categories.index')->with('message', 'DoctorMainCategory Updated Successfully')->with('message_type', 'success');
    }

    /********* Export  CSV And Excel  **********/
    public function export(Request $request)
    {
        $doctor_main_categories = $this->getter($request, "export");
        if (in_array($request->export, ['csv,xlsx'])) {
            $extension = $request->export;
        } else {
            $extension = 'xlsx';
        }
        $filename = "doctor_main_categories." . $extension;
        return Excel::download(new DoctorMainCategoriesExport($doctor_main_categories), $filename);
    }
    /********* Import CSV And Excel  **********/
    public function import(ImportRequest $request)
    {
        $file = $request->file('file');
        Excel::import(new DoctorMainCategoriesImport, $file);
        return redirect()->back()->with('message', 'Blog Categories imported Successfully')->with('message_type', 'success');
    }


    /*********Soft DELETE DoctorMainCategory ***********/
    public function destroy(DoctorMainCategory $doctor_main_category)
    {
        $doctor_main_category->delete();
        return redirect()->back()->with('message', 'DoctorMainCategory Deleted Successfully')->with('message_type', 'success');
    }

    /*********Permanently DELETE DoctorMainCategory ***********/
    public function destroyPermanently(Request $request, $doctor_main_category)
    {
        $doctor_main_category = DoctorMainCategory::withTrashed()->find($doctor_main_category);
        if ($doctor_main_category) {
            if ($doctor_main_category->trashed()) {
                if ($doctor_main_category->image && file_exists(public_path($doctor_main_category->image))) {
                    unlink(public_path($doctor_main_category->image));
                }
                $doctor_main_category->forceDelete();
                return redirect()->back()->with('message', 'Blog Category Deleted Successfully')->with('message_type', 'success');
            } else {
                return redirect()->back()->with('message', 'Blog Category is Not in Trash')->with('message_type', 'error');
            }
        } else {
            return redirect()->back()->with('message', 'Blog Category Not Found')->with('message_type', 'error');
        }
    }
    /********* Restore DoctorMainCategory***********/
    public function restore(Request $request, $doctor_main_category)
    {
        $doctor_main_category = DoctorMainCategory::withTrashed()->find($doctor_main_category);
        if ($doctor_main_category->trashed()) {
            $doctor_main_category->restore();
            return redirect()->back()->with('message', 'Blog Category Restored Successfully')->with('message_type', 'success');
        } else {
            return redirect()->back()->with('message', 'Blog Category Not Found')->with('message_type', 'error');
        }
    }
}
