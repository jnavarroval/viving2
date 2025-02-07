<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Exports\SuperAdmin\ArchivesExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\SuperAdmin\ClinicArchives\CreateRequest;
use App\Http\Requests\ImportRequest;
use App\Imports\SuperAdmin\ArchivesImport;
use App\Models\Archive;
use App\Models\Clinic;
use App\Models\ArchiveCategory;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;

class ClinicArchivesController extends Controller
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
            $clinic_archives =  $clinic->clinic_archives();
            if ($req->trash && $req->trash == 'with') {
                $clinic_archives =  $clinic_archives->withTrashed();
            }
            if ($req->trash && $req->trash == 'only') {
                $clinic_archives =  $clinic_archives->onlyTrashed();
            }
            if ($req->column && $req->column != null && $req->search != null) {
                $clinic_archives = $clinic_archives->whereLike($req->column, $req->search);
            } else if ($req->search && $req->search != null) {

                $clinic_archives = $clinic_archives->whereLike(['name', 'description'], $req->search);
            }
            if ($req->sort_field != null && $req->sort_type != null) {
                $clinic_archives = $clinic_archives->OrderBy($req->sort_field, $req->sort_type);
            } else {
                $clinic_archives = $clinic_archives->OrderBy('id', 'desc');
            }
            if ($export != null) { // for export do not paginate
                $clinic_archives = $clinic_archives->get();
                return $clinic_archives;
            }
            $clinic_archives = $clinic_archives->get();
            return $clinic_archives;
        }
        $clinic_archives = $clinic->clinic_archives()->withAll()->orderBy('id', 'desc')->get();
        return $clinic_archives;
    }


    /*********View All ClinicArchives  ***********/
    public function index(Request $request , Clinic $clinic)
    {
        $clinic_archives = $this->getter($request , null , $clinic);
        return view('super_admins.clinics.clinic_archives.index' , compact('clinic_archives' , 'clinic'));
    }

    /*********View Create Form of Archive  ***********/
    public function create(Clinic $clinic)
    {
        $archive_categories = ArchiveCategory::active()->get();
        $tags = Tag::active()->get();
        
        return view('super_admins.clinics.clinic_archives.create', compact('archive_categories' , 'clinic' , 'tags'));
    }

    /*********Store Archive  ***********/
    public function store(CreateRequest $request , Clinic $clinic)
    {
        
        $data = $request->all();
        try {
            DB::beginTransaction();
            if (!$request->is_active) {
                $data['is_active'] = 0;
            }
            $request->merge(['created_by_user_id'=>auth()->user()->id]);
            $data = $request->all();
            $data['image'] = uploadCroppedFile($request,'image','clinic_archives');
            $clinic_archive = $clinic->clinic_archives()->create($data);
            $clinic_archive->slug = Str::slug($clinic_archive->name . ' ' . $clinic_archive->id, '-');
            $clinic_archive->save();
            $clinic_archive = $clinic->clinic_archives()->withAll()->find($clinic_archive->id);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->route('super_admin.clinic_archives.index' , $clinic->id)->with('message', 'Something Went Wrong')->with('message_type', 'error');
        }
        return redirect()->route('super_admin.clinic_archives.index' , $clinic->id)->with('message', 'Archive Created Successfully')->with('message_type', 'success');
    }

    /*********View Archive  ***********/
    public function show(Clinic $clinic ,Archive $clinic_archive)
    {
        if($clinic->id != $clinic_archive->clinic_id){
            return redirect()->back()->with('message', 'DoctorFirmArchive Not Found')->with('message_type', 'error');
        }
        return view('super_admins.clinics.clinic_archives.show', compact('clinic_archive' , 'clinic'));
    }

    /*********View Edit Form of Archive  ***********/
    public function edit(Clinic $clinic ,Archive $clinic_archive)
    {
        if($clinic->id != $clinic_archive->clinic_id){
            return redirect()->back()->with('message', 'DoctorFirmArchive Not Found')->with('message_type', 'error');
        }
        $archive_categories = ArchiveCategory::active()->get();
        $tags = Tag::active()->get();
        return view('super_admins.clinics.clinic_archives.edit', compact('clinic_archive','archive_categories' , 'clinic' , 'tags'));
    }

    /*********Update Archive  ***********/
    public function update(CreateRequest $request,Clinic $clinic , Archive $clinic_archive)
    {
        if($clinic->id != $clinic_archive->clinic_id){
            return redirect()->back()->with('message', 'DoctorFirmArchive Not Found')->with('message_type', 'error');
        }
        $data = $request->all();
        try {
            DB::beginTransaction();
            if (!$request->is_active) {
                $data['is_active'] = 0;
            }
            $request->merge(['last_updated_by_user_id'=>auth()->user()->id]);
            $data = $request->all();
            if ($request->image) {
                $data['image'] = uploadCroppedFile($request,'image','clinic_archives',$clinic_archive->image);
            } else {
                $data['image'] = $clinic_archive->image;
            }
            $clinic_archive->update($data);
            $clinic_archive = Archive::find($clinic_archive->id);
            $slug = Str::slug($clinic_archive->name . ' ' . $clinic_archive->id, '-');
            $clinic_archive->update([
                'slug' => $slug
            ]);
            $clinic_archive->tags()->sync($request->tag_ids);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->route('super_admin.clinic_archives.index' , $clinic->id)->with('message', 'Something Went Wrong')->with('message_type', 'error');
        }
        return redirect()->route('super_admin.clinic_archives.index' , $clinic->id)->with('message', 'Archive Updated Successfully')->with('message_type', 'success');
    }

    /********* Export  CSV And Excel  **********/
    public function export(Request $request)
    {
        $clinic_archives = $this->getter($request, "export");
        if (in_array($request->export, ['csv,xlsx'])) {
            $extension = $request->export;
        } else {
            $extension = 'xlsx';
        }
        $filename = "clinic_archives." . $extension;
        return Excel::download(new ArchivesExport($clinic_archives), $filename);
    }
    /********* Import CSV And Excel  **********/
    public function import(ImportRequest $request)
    {
        $file = $request->file('file');
        Excel::import(new ArchivesImport, $file);
        return redirect()->back()->with('message', 'Archive Categories imported Successfully')->with('message_type', 'success');
    }


    /*********Soft DELETE Archive ***********/
    public function destroy(Clinic $clinic ,Archive $clinic_archive)
    {
        if($clinic->id != $clinic_archive->clinic_id){
            return redirect()->back()->with('message', 'DoctorFirmArchive Not Found')->with('message_type', 'error');
        }
        $clinic_archive->delete();
        return redirect()->back()->with('message', 'Archive Deleted Successfully')->with('message_type', 'success');
    }

    /*********Permanently DELETE Archive ***********/
    public function destroyPermanently(Request $request,Clinic $clinic ,$clinic_archive)
    {
        if($clinic->id != $clinic_archive->clinic_id){
            return redirect()->back()->with('message', 'DoctorFirmArchive Not Found')->with('message_type', 'error');
        }
        $clinic_archive = Archive::withTrashed()->find($clinic_archive);
        if ($clinic_archive) {
            if ($clinic_archive->trashed()) {
                if ($clinic_archive->image && file_exists(public_path($clinic_archive->image))) {
                    unlink(public_path($clinic_archive->image));
                }
                $clinic_archive->forceDelete();
                return redirect()->back()->with('message', 'Archive Category Deleted Successfully')->with('message_type', 'success');
            } else {
                return redirect()->back()->with('message', 'Archive Category is Not in Trash')->with('message_type', 'error');
            }
        } else {
            return redirect()->back()->with('message', 'Archive Category Not Found')->with('message_type', 'error');
        }
    }
    /********* Restore Archive***********/
    public function restore(Request $request,Clinic $clinic, $clinic_archive)
    {
        if($clinic->id != $clinic_archive->clinic_id){
            return redirect()->back()->with('message', 'DoctorFirmArchive Not Found')->with('message_type', 'error');
        }
        $clinic_archive = Archive::withTrashed()->find($clinic_archive);
        if ($clinic_archive->trashed()) {
            $clinic_archive->restore();
            return redirect()->back()->with('message', 'Archive Category Restored Successfully')->with('message_type', 'success');
        } else {
            return redirect()->back()->with('message', 'Archive Category Not Found')->with('message_type', 'error');
        }
    }
}
