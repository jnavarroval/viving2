<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Exports\SuperAdmin\ClinicPodcastsExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\SuperAdmin\ClinicPodcasts\CreateRequest;
use App\Http\Requests\ImportRequest;
use App\Imports\SuperAdmin\ClinicPodcastsImport;
use App\Models\Podcast;
use App\Models\Clinic;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Str;

class ClinicPodcastsController extends Controller
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
            $clinic_podcasts =  $clinic->clinic_podcasts();
            if ($req->trash && $req->trash == 'with') {
                $clinic_podcasts =  $clinic_podcasts->withTrashed();
            }
            if ($req->trash && $req->trash == 'only') {
                $clinic_podcasts =  $clinic_podcasts->onlyTrashed();
            }
            if ($req->column && $req->column != null && $req->search != null) {
                $clinic_podcasts = $clinic_podcasts->whereLike($req->column, $req->search);
            } else if ($req->search && $req->search != null) {

                $clinic_podcasts = $clinic_podcasts->whereLike(['name', 'description'], $req->search);
            }
            if ($req->sort_field != null && $req->sort_type != null) {
                $clinic_podcasts = $clinic_podcasts->OrderBy($req->sort_field, $req->sort_type);
            } else {
                $clinic_podcasts = $clinic_podcasts->OrderBy('id', 'desc');
            }
            if ($export != null) { // for export do not paginate
                $clinic_podcasts = $clinic_podcasts->get();
                return $clinic_podcasts;
            }
            $clinic_podcasts = $clinic_podcasts->get();
            return $clinic_podcasts;
        }
        $clinic_podcasts = $clinic->clinic_podcasts()->withAll()->orderBy('id', 'desc')->get();
        return $clinic_podcasts;
    }


    /*********View All ClinicPodcasts  ***********/
    public function index(Request $request , Clinic $clinic)
    {
        $clinic_podcasts = $this->getter($request , null , $clinic);
        return view('super_admins.clinics.clinic_podcasts.index' , compact('clinic_podcasts' , 'clinic'));
    }

    /*********View Create Form of Podcast  ***********/
    public function create(Clinic $clinic)
    {
        $tags = Tag::active()->get();
        return view('super_admins.clinics.clinic_podcasts.create', compact('clinic' , 'tags'));
    }

    /*********Store Podcast  ***********/
    public function store(CreateRequest $request , Clinic $clinic)
    {
        $data = $request->all();
        try {
            DB::beginTransaction();
            if (!$request->is_active) {
                $data['is_active'] = 0;
            }
            if($request->link_type == 'internal' && $request->file_type == 'audio'){
                $data['audio'] = uploadFile($request,'file','clinic_podcasts');
            }else{
                $data['video'] = uploadFile($request,'file','clinic_podcasts');
            }
            //$data['image'] = uploadCroppedFile($request,'image','clinic_podcasts');
            $clinic_podcast = $clinic->clinic_podcasts()->create($data);
            $clinic_podcast->slug = Str::slug($clinic_podcast->name . ' ' . $clinic_podcast->id, '-');
            $clinic_podcast->save();
            $clinic_podcast->tags()->sync($request->tag_ids);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->route('super_admin.clinic_podcasts.index' , $clinic->id)->with('message', 'Something Went Wrong')->with('message_type', 'error');
        }
        return redirect()->route('super_admin.clinic_podcasts.index' , $clinic->id)->with('message', 'Podcast Created Successfully')->with('message_type', 'success');
    }

    /*********View Podcast  ***********/
    public function show(Clinic $clinic ,Podcast $clinic_podcast)
    {
        if($clinic->id != $clinic_podcast->clinic_id){
            return redirect()->back()->with('message', 'Podcast Not Found')->with('message_type', 'error');
        }
        return view('super_admins.clinics.clinic_podcasts.show', compact('clinic_podcast' , 'clinic'));
    }

    /*********View Edit Form of Podcast  ***********/
    public function edit(Clinic $clinic ,Podcast $clinic_podcast)
    {
        if($clinic->id != $clinic_podcast->clinic_id){
            return redirect()->back()->with('message', 'Podcast Not Found')->with('message_type', 'error');
        }
        return view('super_admins.clinics.clinic_podcasts.edit', compact('clinic_podcast', 'clinic'));
    }

    /*********Update Podcast  ***********/
    public function update(CreateRequest $request,Clinic $clinic , Podcast $clinic_podcast)
    {
        if($clinic->id != $clinic_podcast->clinic_id){
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
                    $data['audio'] = uploadFile($request,'file','clinic_podcasts');
                }else{
                    $data['audio'] = $clinic_podcast->audio;
                }
            }else{
                if($request->file){
                    $data['video'] = uploadFile($request,'file','clinic_podcasts');
                }else{
                    $data['video'] = $clinic_podcast->video;
                }
            }
            $clinic_podcast->update($data);
            $clinic_podcast = Podcast::find($clinic_podcast->id);
            $slug = Str::slug($clinic_podcast->name . ' ' . $clinic_podcast->id, '-');
            $clinic_podcast->update([
                'slug' => $slug
            ]);
            $clinic_podcast->tags()->sync($request->tag_ids);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->route('super_admin.clinic_podcasts.index' , $clinic->id)->with('message', 'Something Went Wrong')->with('message_type', 'error');
        }
        return redirect()->route('super_admin.clinic_podcasts.index' , $clinic->id)->with('message', 'Podcast Updated Successfully')->with('message_type', 'success');
    }

    /********* Export  CSV And Excel  **********/
    public function export(Request $request)
    {
        $clinic_podcasts = $this->getter($request, "export");
        if (in_array($request->export, ['csv,xlsx'])) {
            $extension = $request->export;
        } else {
            $extension = 'xlsx';
        }
        $filename = "clinic_podcasts." . $extension;
        return Excel::download(new ClinicPodcastsExport($clinic_podcasts), $filename);
    }
    /********* Import CSV And Excel  **********/
    public function import(ImportRequest $request)
    {
        $file = $request->file('file');
        Excel::import(new ClinicPodcastsImport, $file);
        return redirect()->back()->with('message', 'Podcast Categories imported Successfully')->with('message_type', 'success');
    }


    /*********Soft DELETE Podcast ***********/
    public function destroy(Clinic $clinic ,Podcast $clinic_podcast)
    {
        if($clinic->id != $clinic_podcast->clinic_id){
            return redirect()->back()->with('message', 'Podcast Not Found')->with('message_type', 'error');
        }
        $clinic_podcast->delete();
        return redirect()->back()->with('message', 'Podcast Deleted Successfully')->with('message_type', 'success');
    }

    /*********Permanently DELETE Podcast ***********/
    public function destroyPermanently(Request $request,Clinic $clinic ,$clinic_podcast)
    {
        $clinic_podcast = Podcast::withTrashed()->find($clinic_podcast);
        if ($clinic_podcast) {
            if ($clinic_podcast->trashed()) {
                if ($clinic_podcast->image && file_exists(public_path($clinic_podcast->image))) {
                    unlink(public_path($clinic_podcast->image));
                }
                $clinic_podcast->forceDelete();
                return redirect()->back()->with('message', 'Podcast Deleted Successfully')->with('message_type', 'success');
            } else {
                return redirect()->back()->with('message', 'Podcast is Not in Trash')->with('message_type', 'error');
            }
        } else {
            return redirect()->back()->with('message', 'Podcast Not Found')->with('message_type', 'error');
        }
    }
    /********* Restore Podcast***********/
    public function restore(Request $request,Clinic $clinic, $clinic_podcast)
    {
        $clinic_podcast = Podcast::withTrashed()->find($clinic_podcast);
        if ($clinic_podcast->trashed()) {
            $clinic_podcast->restore();
            return redirect()->back()->with('message', 'Podcast Restored Successfully')->with('message_type', 'success');
        } else {
            return redirect()->back()->with('message', 'Podcast Not Found')->with('message_type', 'error');
        }
    }
}
