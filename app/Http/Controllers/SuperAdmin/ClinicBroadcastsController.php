<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Exports\SuperAdmin\ClinicBroadcastsExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\SuperAdmin\ClinicBroadcasts\CreateRequest;
use App\Http\Requests\ImportRequest;
use App\Imports\SuperAdmin\ClinicBroadcastsImport;
use App\Models\Broadcast;
use App\Models\Clinic;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Str;

class ClinicBroadcastsController extends Controller
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
            $clinic_broadcasts =  $clinic->clinic_broadcasts();
            if ($req->trash && $req->trash == 'with') {
                $clinic_broadcasts =  $clinic_broadcasts->withTrashed();
            }
            if ($req->trash && $req->trash == 'only') {
                $clinic_broadcasts =  $clinic_broadcasts->onlyTrashed();
            }
            if ($req->column && $req->column != null && $req->search != null) {
                $clinic_broadcasts = $clinic_broadcasts->whereLike($req->column, $req->search);
            } else if ($req->search && $req->search != null) {

                $clinic_broadcasts = $clinic_broadcasts->whereLike(['name', 'description'], $req->search);
            }
            if ($req->sort_field != null && $req->sort_type != null) {
                $clinic_broadcasts = $clinic_broadcasts->OrderBy($req->sort_field, $req->sort_type);
            } else {
                $clinic_broadcasts = $clinic_broadcasts->OrderBy('id', 'desc');
            }
            if ($export != null) { // for export do not paginate
                $clinic_broadcasts = $clinic_broadcasts->get();
                return $clinic_broadcasts;
            }
            $clinic_broadcasts = $clinic_broadcasts->get();
            return $clinic_broadcasts;
        }
        $clinic_broadcasts = $clinic->clinic_broadcasts()->withAll()->orderBy('id', 'desc')->get();
        return $clinic_broadcasts;
    }


    /*********View All ClinicBroadcasts  ***********/
    public function index(Request $request , Clinic $clinic)
    {
        $clinic_broadcasts = $this->getter($request , null , $clinic);
        return view('super_admins.clinics.clinic_broadcasts.index' , compact('clinic_broadcasts' , 'clinic'));
    }

    /*********View Create Form of Broadcast  ***********/
    public function create(Clinic $clinic)
    {
        $tags = Tag::active()->get();
        return view('super_admins.clinics.clinic_broadcasts.create', compact('clinic' , 'tags'));
    }

    /*********Store Broadcast  ***********/
    public function store(CreateRequest $request , Clinic $clinic)
    {

        $data = $request->all();
        try {
            DB::beginTransaction();
            if (!$request->is_active) {
                $data['is_active'] = 0;
            }
            if($request->link_type == 'internal' && $request->file_type == 'audio'){
                $data['audio'] = uploadFile($request,'file','clinic_broadcasts');
            }else{
                $data['video'] = uploadFile($request,'file','clinic_broadcasts');
            }
            //$data['image'] = uploadCroppedFile($request,'image','clinic_broadcasts');
            $clinic_broadcast = $clinic->clinic_broadcasts()->create($data);
            $clinic_broadcast->slug = Str::slug($clinic_broadcast->name . ' ' . $clinic_broadcast->id, '-');
            $clinic_broadcast->save();
            $clinic_broadcast->tags()->sync($request->tag_ids);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->route('super_admin.clinic_broadcasts.index' , $clinic->id)->with('message', 'Something Went Wrong')->with('message_type', 'error');
        }
        return redirect()->route('super_admin.clinic_broadcasts.index' , $clinic->id)->with('message', 'Broadcast Created Successfully')->with('message_type', 'success');
    }

    /*********View Broadcast  ***********/
    public function show(Clinic $clinic ,Broadcast $clinic_broadcast)
    {
        if($clinic->id != $clinic_broadcast->clinic_id){
            return redirect()->back()->with('message', 'Broadcast Not Found')->with('message_type', 'error');
        }
        return view('super_admins.clinics.clinic_broadcasts.show', compact('clinic_broadcast' , 'clinic'));
    }

    /*********View Edit Form of Broadcast  ***********/
    public function edit(Clinic $clinic ,Broadcast $clinic_broadcast)
    {
        if($clinic->id != $clinic_broadcast->clinic_id){
            return redirect()->back()->with('message', 'Broadcast Not Found')->with('message_type', 'error');
        }
        return view('super_admins.clinics.clinic_broadcasts.edit', compact('clinic_broadcast', 'clinic'));
    }

    /*********Update Broadcast  ***********/
    public function update(CreateRequest $request,Clinic $clinic , Broadcast $clinic_broadcast)
    {
        if($clinic->id != $clinic_broadcast->clinic_id){
            return redirect()->back()->with('message', 'Broadcast Not Found')->with('message_type', 'error');
        }
        $data = $request->all();
        try {
            DB::beginTransaction();
            if (!$request->is_active) {
                $data['is_active'] = 0;
            }
            if($request->link_type == 'internal' && $request->file_type == 'audio'){
                if($request->file){
                    $data['audio'] = uploadFile($request,'file','clinic_broadcasts');
                }else{
                    $data['audio'] = $clinic_broadcast->audio;
                }
            }else{
                if($request->file){
                    $data['video'] = uploadFile($request,'file','clinic_broadcasts');
                }else{
                    $data['video'] = $clinic_broadcast->video;
                }
            }
            $clinic_broadcast->update($data);
            $clinic_broadcast = Broadcast::find($clinic_broadcast->id);
            $slug = Str::slug($clinic_broadcast->name . ' ' . $clinic_broadcast->id, '-');
            $clinic_broadcast->update([
                'slug' => $slug
            ]);
            $clinic_broadcast->tags()->sync($request->tag_ids);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->route('super_admin.clinic_broadcasts.index' , $clinic->id)->with('message', 'Something Went Wrong')->with('message_type', 'error');
        }
        return redirect()->route('super_admin.clinic_broadcasts.index' , $clinic->id)->with('message', 'Broadcast Updated Successfully')->with('message_type', 'success');
    }

    /********* Export  CSV And Excel  **********/
    public function export(Request $request)
    {
        $clinic_broadcasts = $this->getter($request, "export");
        if (in_array($request->export, ['csv,xlsx'])) {
            $extension = $request->export;
        } else {
            $extension = 'xlsx';
        }
        $filename = "clinic_broadcasts." . $extension;
        return Excel::download(new ClinicBroadcastsExport($clinic_broadcasts), $filename);
    }
    /********* Import CSV And Excel  **********/
    public function import(ImportRequest $request)
    {
        $file = $request->file('file');
        Excel::import(new ClinicBroadcastsImport, $file);
        return redirect()->back()->with('message', 'Broadcast Categories imported Successfully')->with('message_type', 'success');
    }


    /*********Soft DELETE Broadcast ***********/
    public function destroy(Clinic $clinic ,Broadcast $clinic_broadcast)
    {
        if($clinic->id != $clinic_broadcast->clinic_id){
            return redirect()->back()->with('message', 'Broadcast Not Found')->with('message_type', 'error');
        }
        $clinic_broadcast->delete();
        return redirect()->back()->with('message', 'Broadcast Deleted Successfully')->with('message_type', 'success');
    }

    /*********Permanently DELETE Broadcast ***********/
    public function destroyPermanently(Request $request,Clinic $clinic ,$clinic_broadcast)
    {
        $clinic_broadcast = Broadcast::withTrashed()->find($clinic_broadcast);
        if ($clinic_broadcast) {
            if ($clinic_broadcast->trashed()) {
                if ($clinic_broadcast->image && file_exists(public_path($clinic_broadcast->image))) {
                    unlink(public_path($clinic_broadcast->image));
                }
                $clinic_broadcast->forceDelete();
                return redirect()->back()->with('message', 'Broadcast Deleted Successfully')->with('message_type', 'success');
            } else {
                return redirect()->back()->with('message', 'Broadcast is Not in Trash')->with('message_type', 'error');
            }
        } else {
            return redirect()->back()->with('message', 'Broadcast Not Found')->with('message_type', 'error');
        }
    }
    /********* Restore Broadcast***********/
    public function restore(Request $request,Clinic $clinic, $clinic_broadcast)
    {
        $clinic_broadcast = Broadcast::withTrashed()->find($clinic_broadcast);
        if ($clinic_broadcast->trashed()) {
            $clinic_broadcast->restore();
            return redirect()->back()->with('message', 'Broadcast Restored Successfully')->with('message_type', 'success');
        } else {
            return redirect()->back()->with('message', 'Broadcast Not Found')->with('message_type', 'error');
        }
    }
}
