<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Exports\SuperAdmin\DoctorPodcastsExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\SuperAdmin\DoctorPodcasts\CreateRequest;
use App\Http\Requests\ImportRequest;
use App\Imports\SuperAdmin\DoctorPodcastsImport;
use App\Models\Podcast;
use App\Models\Doctor;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Str;

class DoctorPodcastsController extends Controller
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
            $doctor_podcasts =  $doctor->doctor_podcasts();
            if ($req->trash && $req->trash == 'with') {
                $doctor_podcasts =  $doctor_podcasts->withTrashed();
            }
            if ($req->trash && $req->trash == 'only') {
                $doctor_podcasts =  $doctor_podcasts->onlyTrashed();
            }
            if ($req->column && $req->column != null && $req->search != null) {
                $doctor_podcasts = $doctor_podcasts->whereLike($req->column, $req->search);
            } else if ($req->search && $req->search != null) {

                $doctor_podcasts = $doctor_podcasts->whereLike(['name', 'description'], $req->search);
            }
            if ($req->sort_field != null && $req->sort_type != null) {
                $doctor_podcasts = $doctor_podcasts->OrderBy($req->sort_field, $req->sort_type);
            } else {
                $doctor_podcasts = $doctor_podcasts->OrderBy('id', 'desc');
            }
            if ($export != null) { // for export do not paginate
                $doctor_podcasts = $doctor_podcasts->get();
                return $doctor_podcasts;
            }
            $doctor_podcasts = $doctor_podcasts->get();
            return $doctor_podcasts;
        }
        $doctor_podcasts = $doctor->doctor_podcasts()->withAll()->orderBy('id', 'desc')->get();
        return $doctor_podcasts;
    }


    /*********View All DoctorPodcasts  ***********/
    public function index(Request $request , Doctor $doctor)
    {
        $doctor_podcasts = $this->getter($request , null , $doctor);
        return view('super_admins.doctors.doctor_podcasts.index' , compact('doctor_podcasts' , 'doctor'));
    }

    /*********View Create Form of Podcast  ***********/
    public function create(Doctor $doctor)
    {
        $tags = Tag::active()->get();
        return view('super_admins.doctors.doctor_podcasts.create', compact('doctor' , 'tags'));
    }

    /*********Store Podcast  ***********/
    public function store(CreateRequest $request , Doctor $doctor)
    {
        $data = $request->all();
        try {
            DB::beginTransaction();
            if (!$request->is_active) {
                $data['is_active'] = 0;
            }
            if($request->link_type == 'internal' && $request->file_type == 'audio'){
                $data['audio'] = uploadFile($request,'file','doctor_podcasts');
            }else{
                $data['video'] = uploadFile($request,'file','doctor_podcasts');
            }
            //$data['image'] = uploadCroppedFile($request,'image','doctor_podcasts');
            $doctor_podcast = $doctor->doctor_podcasts()->create($data);
            $doctor_podcast->slug = Str::slug($doctor_podcast->name . ' ' . $doctor_podcast->id, '-');
            $doctor_podcast->save();
            $doctor_podcast->tags()->sync($request->tag_ids);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->route('super_admin.doctor_podcasts.index' , $doctor->id)->with('message', 'Something Went Wrong')->with('message_type', 'error');
        }
        return redirect()->route('super_admin.doctor_podcasts.index' , $doctor->id)->with('message', 'Podcast Created Successfully')->with('message_type', 'success');
    }

    /*********View Podcast  ***********/
    public function show(Doctor $doctor ,Podcast $doctor_podcast)
    {
        if($doctor->id != $doctor_podcast->doctor_id){
            return redirect()->back()->with('message', 'Podcast Not Found')->with('message_type', 'error');
        }
        return view('super_admins.doctors.doctor_podcasts.show', compact('doctor_podcast' , 'doctor'));
    }

    /*********View Edit Form of Podcast  ***********/
    public function edit(Doctor $doctor ,Podcast $doctor_podcast)
    {
        if($doctor->id != $doctor_podcast->doctor_id){
            return redirect()->back()->with('message', 'Podcast Not Found')->with('message_type', 'error');
        }
        return view('super_admins.doctors.doctor_podcasts.edit', compact('doctor_podcast', 'doctor'));
    }

    /*********Update Podcast  ***********/
    public function update(CreateRequest $request,Doctor $doctor , Podcast $doctor_podcast)
    {
        if($doctor->id != $doctor_podcast->doctor_id){
            return redirect()->back()->with('message', 'Podcast Not Found')->with('message_type', 'error');
        }
        $data = $request->all();
        try {
            DB::beginTransaction();
            if (!$request->is_active) {
                $data['is_active'] = 0;
            }
            if($request->link_type == 'internal' && $request->file_type == 'audio'){
                if($request->file){
                    $data['audio'] = uploadFile($request,'file','doctor_podcasts');
                }else{
                    $data['audio'] = $doctor_podcast->audio;
                }
            }else{
                if($request->file){
                    $data['video'] = uploadFile($request,'file','doctor_podcasts');
                }else{
                    $data['video'] = $doctor_podcast->video;
                }
            }
            $doctor_podcast->update($data);
            $doctor_podcast = Podcast::find($doctor_podcast->id);
            $slug = Str::slug($doctor_podcast->name . ' ' . $doctor_podcast->id, '-');
            $doctor_podcast->update([
                'slug' => $slug
            ]);
            $doctor_podcast->tags()->sync($request->tag_ids);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->route('super_admin.doctor_podcasts.index' , $doctor->id)->with('message', 'Something Went Wrong')->with('message_type', 'error');
        }
        return redirect()->route('super_admin.doctor_podcasts.index' , $doctor->id)->with('message', 'Podcast Updated Successfully')->with('message_type', 'success');
    }

    /********* Export  CSV And Excel  **********/
    public function export(Request $request)
    {
        $doctor_podcasts = $this->getter($request, "export");
        if (in_array($request->export, ['csv,xlsx'])) {
            $extension = $request->export;
        } else {
            $extension = 'xlsx';
        }
        $filename = "doctor_podcasts." . $extension;
        return Excel::download(new DoctorPodcastsExport($doctor_podcasts), $filename);
    }
    /********* Import CSV And Excel  **********/
    public function import(ImportRequest $request)
    {
        $file = $request->file('file');
        Excel::import(new DoctorPodcastsImport, $file);
        return redirect()->back()->with('message', 'Podcast Categories imported Successfully')->with('message_type', 'success');
    }


    /*********Soft DELETE Podcast ***********/
    public function destroy(Doctor $doctor ,Podcast $doctor_podcast)
    {
        if($doctor->id != $doctor_podcast->doctor_id){
            return redirect()->back()->with('message', 'Podcast Not Found')->with('message_type', 'error');
        }
        $doctor_podcast->delete();
        return redirect()->back()->with('message', 'Podcast Deleted Successfully')->with('message_type', 'success');
    }

    /*********Permanently DELETE Podcast ***********/
    public function destroyPermanently(Request $request,Doctor $doctor ,$doctor_podcast)
    {
        $doctor_podcast = Podcast::withTrashed()->find($doctor_podcast);
        if ($doctor_podcast) {
            if ($doctor_podcast->trashed()) {
                if ($doctor_podcast->image && file_exists(public_path($doctor_podcast->image))) {
                    unlink(public_path($doctor_podcast->image));
                }
                $doctor_podcast->forceDelete();
                return redirect()->back()->with('message', 'Podcast Deleted Successfully')->with('message_type', 'success');
            } else {
                return redirect()->back()->with('message', 'Podcast is Not in Trash')->with('message_type', 'error');
            }
        } else {
            return redirect()->back()->with('message', 'Podcast Not Found')->with('message_type', 'error');
        }
    }
    /********* Restore Podcast***********/
    public function restore(Request $request,Doctor $doctor, $doctor_podcast)
    {
        $doctor_podcast = Podcast::withTrashed()->find($doctor_podcast);
        if ($doctor_podcast->trashed()) {
            $doctor_podcast->restore();
            return redirect()->back()->with('message', 'Podcast Restored Successfully')->with('message_type', 'success');
        } else {
            return redirect()->back()->with('message', 'Podcast Not Found')->with('message_type', 'error');
        }
    }
}
