<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Exports\SuperAdmin\TestsExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\SuperAdmin\Tests\CreateRequest;
use App\Http\Requests\ImportRequest;
use App\Imports\SuperAdmin\TestsImport;
use App\Models\Test;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;

class TestController extends Controller
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
            $tests =  Test::withAll();
            if ($req->trash && $req->trash == 'with') {
                $tests =  $tests->withTrashed();
            }
            if ($req->trash && $req->trash == 'only') {
                $tests =  $tests->onlyTrashed();
            }
            if ($req->column && $req->column != null && $req->search != null) {
                $tests = $tests->whereLike($req->column, $req->search);
            } else if ($req->search && $req->search != null) {

                $tests = $tests->whereLike(['name', 'description'], $req->search);
            }
            if ($req->sort_field != null && $req->sort_type != null) {
                $tests = $tests->OrderBy($req->sort_field, $req->sort_type);
            } else {
                $tests = $tests->OrderBy('id', 'desc');
            }
            if ($export != null) { // for export do not paginate
                $tests = $tests->get();
                return $tests;
            }
            $tests = $tests->get();
            return $tests;
        }
        $tests = Test::withAll()->orderBy('id', 'desc')->get();
        return $tests;
    }


    /*********View All Tests  ***********/
    public function index(Request $request)
    {
        $tests = $this->getter($request);
        return view('super_admins.tests.index')->with('tests', $tests);
    }

    /*********View Create Form of Test  ***********/
    public function create()
    {
        return view('super_admins.tests.create');
    }

    /*********Store Test  ***********/
    public function store(CreateRequest $request)
    {
        $data = $request->all();
        try {
            DB::beginTransaction();
            if (!$request->is_active) {
                $data['is_active'] = 0;
            }

            $data['image'] = uploadCroppedFile($request,'image','tests');
            Test::create($request->all());
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->route('super_admin.tests.index')->with('message', 'Something Went Wrong')->with('message_type', 'error');
        }
        return redirect()->route('super_admin.tests.index')->with('message', 'Test Created Successfully')->with('message_type', 'success');
    }

    /*********View Test  ***********/
    public function show(Test $test)
    {
        return view('super_admins.tests.show', compact('test'));
    }

    /*********View Edit Form of Test  ***********/
    public function edit(Test $test)
    {
        return view('super_admins.tests.edit', compact('test'));
    }

    /*********Update Test  ***********/
    public function update(CreateRequest $request, Test $test)
    {
        $data = $request->all();
        try {
            DB::beginTransaction();
            if (!$request->is_active) {
                $data['is_active'] = 0;
            }
            if ($request->image) {
                $data['image'] = uploadCroppedFile($request,'image','tests',$test->image);
            } else {
                $data['image'] = $test->image;
            }
            $test->update($data);
            $test = Test::find($test->id);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->route('super_admin.tests.index')->with('message', 'Something Went Wrong')->with('message_type', 'error');
        }
        return redirect()->route('super_admin.tests.index')->with('message', 'Test Updated Successfully')->with('message_type', 'success');
    }

    /********* Export  CSV And Excel  **********/
    public function export(Request $request)
    {
        $tests = $this->getter($request, "export");
        if (in_array($request->export, ['csv,xlsx'])) {
            $extension = $request->export;
        } else {
            $extension = 'xlsx';
        }
        $filename = "tests." . $extension;
        return Excel::download(new TestsExport($tests), $filename);
    }
    /********* Import CSV And Excel  **********/
    public function import(ImportRequest $request)
    {
        $file = $request->file('file');
        Excel::import(new TestsImport, $file);
        return redirect()->back()->with('message', 'Blog Categories imported Successfully')->with('message_type', 'success');
    }


    /*********Soft DELETE Test ***********/
    public function destroy(Test $test)
    {
        // if ($test->Has('posts')) {
        //     $test->news()->delete();
        // }
        $test->delete();
        return redirect()->back()->with('message', 'Test Deleted Successfully')->with('message_type', 'success');
    }

    /*********Permanently DELETE Test ***********/
    public function destroyPermanently(Request $request, $test)
    {
        $test = Test::withTrashed()->find($test);
        if ($test) {
            if ($test->trashed()) {
                if ($test->image && file_exists(public_path($test->image))) {
                    unlink(public_path($test->image));
                }
                $test->forceDelete();
                return redirect()->back()->with('message', 'Blog Category Deleted Successfully')->with('message_type', 'success');
            } else {
                return redirect()->back()->with('message', 'Blog Category is Not in Trash')->with('message_type', 'error');
            }
        } else {
            return redirect()->back()->with('message', 'Blog Category Not Found')->with('message_type', 'error');
        }
    }
    /********* Restore Test***********/
    public function restore(Request $request, $test)
    {
        $test = Test::withTrashed()->find($test);
        if ($test->trashed()) {
            $test->restore();
            return redirect()->back()->with('message', 'Blog Category Restored Successfully')->with('message_type', 'success');
        } else {
            return redirect()->back()->with('message', 'Blog Category Not Found')->with('message_type', 'error');
        }
    }
}
