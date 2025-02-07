<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Exports\SuperAdmin\ArchivesExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\SuperAdmin\DoctorArchives\CreateRequest;
use App\Http\Requests\ImportRequest;
use App\Imports\SuperAdmin\ArchivesImport;
use App\Models\Archive;
use App\Models\Doctor;
use App\Models\ArchiveCategory;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;

class DoctorArchivesController extends Controller
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
            $doctor_archives =  $doctor->doctor_archives();
            if ($req->trash && $req->trash == 'with') {
                $doctor_archives =  $doctor_archives->withTrashed();
            }
            if ($req->trash && $req->trash == 'only') {
                $doctor_archives =  $doctor_archives->onlyTrashed();
            }
            if ($req->column && $req->column != null && $req->search != null) {
                $doctor_archives = $doctor_archives->whereLike($req->column, $req->search);
            } else if ($req->search && $req->search != null) {

                $doctor_archives = $doctor_archives->whereLike(['name', 'description'], $req->search);
            }
            if ($req->sort_field != null && $req->sort_type != null) {
                $doctor_archives = $doctor_archives->OrderBy($req->sort_field, $req->sort_type);
            } else {
                $doctor_archives = $doctor_archives->OrderBy('id', 'desc');
            }
            if ($export != null) { // for export do not paginate
                $doctor_archives = $doctor_archives->get();
                return $doctor_archives;
            }
            $doctor_archives = $doctor_archives->get();
            return $doctor_archives;
        }
        $doctor_archives = $doctor->doctor_archives()->withAll()->orderBy('id', 'desc')->get();
        return $doctor_archives;
    }


    /*********View All DoctorArchives  ***********/
    public function index(Request $request , Doctor $doctor)
    {
        $doctor_archives = $this->getter($request , null , $doctor);
        return view('super_admins.doctors.doctor_archives.index' , compact('doctor_archives' , 'doctor'));
    }

    /*********View Create Form of Archive  ***********/
    public function create(Doctor $doctor)
    {
        $archive_categories = ArchiveCategory::active()->get();
        $tags = Tag::active()->get();
        
        return view('super_admins.doctors.doctor_archives.create', compact('archive_categories' , 'doctor' , 'tags'));
    }

    /*********Store Archive  ***********/
    public function store(CreateRequest $request , Doctor $doctor)
    {
        
        $data = $request->all();
        try {
            DB::beginTransaction();
            if (!$request->is_active) {
                $data['is_active'] = 0;
            }
            $request->merge(['created_by_user_id'=>auth()->user()->id]);
            $data = $request->all();
            $data['image'] = uploadCroppedFile($request,'image','doctor_archives');
            $doctor_archive = $doctor->doctor_archives()->create($data);
            $doctor_archive->slug = Str::slug($doctor_archive->name . ' ' . $doctor_archive->id, '-');
            $doctor_archive->save();
            $doctor_archive = $doctor->doctor_archives()->withAll()->find($doctor_archive->id);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->route('super_admin.doctor_archives.index' , $doctor->id)->with('message', 'Something Went Wrong')->with('message_type', 'error');
        }
        return redirect()->route('super_admin.doctor_archives.index' , $doctor->id)->with('message', 'Archive Created Successfully')->with('message_type', 'success');
    }

    /*********View Archive  ***********/
    public function show(Doctor $doctor ,Archive $doctor_archive)
    {
        if($doctor->id != $doctor_archive->doctor_id){
            return redirect()->back()->with('message', 'DoctorArchive Not Found')->with('message_type', 'error');
        }
        return view('super_admins.doctors.doctor_archives.show', compact('doctor_archive' , 'doctor'));
    }

    /*********View Edit Form of Archive  ***********/
    public function edit(Doctor $doctor ,Archive $doctor_archive)
    {
        if($doctor->id != $doctor_archive->doctor_id){
            return redirect()->back()->with('message', 'DoctorArchive Not Found')->with('message_type', 'error');
        }
        $archive_categories = ArchiveCategory::active()->get();
        $tags = Tag::active()->get();
        return view('super_admins.doctors.doctor_archives.edit', compact('doctor_archive','archive_categories' , 'doctor' , 'tags'));
    }

    /*********Update Archive  ***********/
    public function update(CreateRequest $request,Doctor $doctor , Archive $doctor_archive)
    {
        if($doctor->id != $doctor_archive->doctor_id){
            return redirect()->back()->with('message', 'DoctorArchive Not Found')->with('message_type', 'error');
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
                $data['image'] = uploadCroppedFile($request,'image','doctor_archives',$doctor_archive->image);
            } else {
                $data['image'] = $doctor_archive->image;
            }
            $doctor_archive->update($data);
            $doctor_archive = Archive::find($doctor_archive->id);
            $slug = Str::slug($doctor_archive->name . ' ' . $doctor_archive->id, '-');
            $doctor_archive->update([
                'slug' => $slug
            ]);
            $doctor_archive->tags()->sync($request->tag_ids);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->route('super_admin.doctor_archives.index' , $doctor->id)->with('message', 'Something Went Wrong')->with('message_type', 'error');
        }
        return redirect()->route('super_admin.doctor_archives.index' , $doctor->id)->with('message', 'Archive Updated Successfully')->with('message_type', 'success');
    }

    /********* Export  CSV And Excel  **********/
    public function export(Request $request)
    {
        $doctor_archives = $this->getter($request, "export");
        if (in_array($request->export, ['csv,xlsx'])) {
            $extension = $request->export;
        } else {
            $extension = 'xlsx';
        }
        $filename = "doctor_archives." . $extension;
        return Excel::download(new ArchivesExport($doctor_archives), $filename);
    }
    /********* Import CSV And Excel  **********/
    public function import(ImportRequest $request)
    {
        $file = $request->file('file');
        Excel::import(new ArchivesImport, $file);
        return redirect()->back()->with('message', 'Archive Categories imported Successfully')->with('message_type', 'success');
    }


    /*********Soft DELETE Archive ***********/
    public function destroy(Doctor $doctor ,Archive $doctor_archive)
    {
        if($doctor->id != $doctor_archive->doctor_id){
            return redirect()->back()->with('message', 'DoctorArchive Not Found')->with('message_type', 'error');
        }
        $doctor_archive->delete();
        return redirect()->back()->with('message', 'Archive Deleted Successfully')->with('message_type', 'success');
    }

    /*********Permanently DELETE Archive ***********/
    public function destroyPermanently(Request $request,Doctor $doctor ,$doctor_archive)
    {
        if($doctor->id != $doctor_archive->doctor_id){
            return redirect()->back()->with('message', 'DoctorArchive Not Found')->with('message_type', 'error');
        }
        $doctor_archive = Archive::withTrashed()->find($doctor_archive);
        if ($doctor_archive) {
            if ($doctor_archive->trashed()) {
                if ($doctor_archive->image && file_exists(public_path($doctor_archive->image))) {
                    unlink(public_path($doctor_archive->image));
                }
                $doctor_archive->forceDelete();
                return redirect()->back()->with('message', 'Archive Category Deleted Successfully')->with('message_type', 'success');
            } else {
                return redirect()->back()->with('message', 'Archive Category is Not in Trash')->with('message_type', 'error');
            }
        } else {
            return redirect()->back()->with('message', 'Archive Category Not Found')->with('message_type', 'error');
        }
    }
    /********* Restore Archive***********/
    public function restore(Request $request,Doctor $doctor, $doctor_archive)
    {
        if($doctor->id != $doctor_archive->doctor_id){
            return redirect()->back()->with('message', 'DoctorArchive Not Found')->with('message_type', 'error');
        }
        $doctor_archive = Archive::withTrashed()->find($doctor_archive);
        if ($doctor_archive->trashed()) {
            $doctor_archive->restore();
            return redirect()->back()->with('message', 'Archive Category Restored Successfully')->with('message_type', 'success');
        } else {
            return redirect()->back()->with('message', 'Archive Category Not Found')->with('message_type', 'error');
        }
    }
}
