<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Exports\SuperAdmin\DoctorBroadcastsExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\SuperAdmin\DoctorBroadcasts\CreateRequest;
use App\Http\Requests\ImportRequest;
use App\Imports\SuperAdmin\DoctorBroadcastsImport;
use App\Models\Broadcast;
use App\Models\Doctor;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Str;

class DoctorBroadcastsController extends Controller
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
            $doctor_broadcasts =  $doctor->doctor_broadcasts();
            if ($req->trash && $req->trash == 'with') {
                $doctor_broadcasts =  $doctor_broadcasts->withTrashed();
            }
            if ($req->trash && $req->trash == 'only') {
                $doctor_broadcasts =  $doctor_broadcasts->onlyTrashed();
            }
            if ($req->column && $req->column != null && $req->search != null) {
                $doctor_broadcasts = $doctor_broadcasts->whereLike($req->column, $req->search);
            } else if ($req->search && $req->search != null) {

                $doctor_broadcasts = $doctor_broadcasts->whereLike(['name', 'description'], $req->search);
            }
            if ($req->sort_field != null && $req->sort_type != null) {
                $doctor_broadcasts = $doctor_broadcasts->OrderBy($req->sort_field, $req->sort_type);
            } else {
                $doctor_broadcasts = $doctor_broadcasts->OrderBy('id', 'desc');
            }
            if ($export != null) { // for export do not paginate
                $doctor_broadcasts = $doctor_broadcasts->get();
                return $doctor_broadcasts;
            }
            $doctor_broadcasts = $doctor_broadcasts->get();
            return $doctor_broadcasts;
        }
        $doctor_broadcasts = $doctor->doctor_broadcasts()->withAll()->orderBy('id', 'desc')->get();
        return $doctor_broadcasts;
    }


    /*********View All DoctorBroadcasts  ***********/
    public function index(Request $request , Doctor $doctor)
    {
        $doctor_broadcasts = $this->getter($request , null , $doctor);
        return view('super_admins.doctors.doctor_broadcasts.index' , compact('doctor_broadcasts' , 'doctor'));
    }

    /*********View Create Form of Broadcast  ***********/
    public function create(Doctor $doctor)
    {
        $tags = Tag::active()->get();
        return view('super_admins.doctors.doctor_broadcasts.create', compact('doctor' , 'tags'));
    }

    /*********Store Broadcast  ***********/
    public function store(CreateRequest $request , Doctor $doctor)
    {
        $data = $request->all();
        try {
            DB::beginTransaction();
            if (!$request->is_active) {
                $data['is_active'] = 0;
            }
            if($request->link_type == 'internal' && $request->file_type == 'audio'){
                $data['audio'] = uploadFile($request,'file','doctor_broadcasts');
            }else{
                $data['video'] = uploadFile($request,'file','doctor_broadcasts');
            }
            //$data['image'] = uploadCroppedFile($request,'image','doctor_broadcasts');
            $doctor_broadcast = $doctor->doctor_broadcasts()->create($data);
            $doctor_broadcast->slug = Str::slug($doctor_broadcast->name . ' ' . $doctor_broadcast->id, '-');
            $doctor_broadcast->save();
            $doctor_broadcast->tags()->sync($request->tag_ids);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->route('super_admin.doctor_broadcasts.index' , $doctor->id)->with('message', 'Something Went Wrong')->with('message_type', 'error');
        }
        return redirect()->route('super_admin.doctor_broadcasts.index' , $doctor->id)->with('message', 'Broadcast Created Successfully')->with('message_type', 'success');
    }

    /*********View Broadcast  ***********/
    public function show(Doctor $doctor ,Broadcast $doctor_broadcast)
    {
        if($doctor->id != $doctor_broadcast->doctor_id){
            return redirect()->back()->with('message', 'Broadcast Not Found')->with('message_type', 'error');
        }
        return view('super_admins.doctors.doctor_broadcasts.show', compact('doctor_broadcast' , 'doctor'));
    }

    /*********View Edit Form of Broadcast  ***********/
    public function edit(Doctor $doctor ,Broadcast $doctor_broadcast)
    {
        if($doctor->id != $doctor_broadcast->doctor_id){
            return redirect()->back()->with('message', 'Broadcast Not Found')->with('message_type', 'error');
        }
        return view('super_admins.doctors.doctor_broadcasts.edit', compact('doctor_broadcast', 'doctor'));
    }

    /*********Update Broadcast  ***********/
    public function update(CreateRequest $request,Doctor $doctor , Broadcast $doctor_broadcast)
    {
        if($doctor->id != $doctor_broadcast->doctor_id){
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
                    $data['audio'] = uploadFile($request,'file','doctor_broadcasts');
                }else{
                    $data['audio'] = $doctor_broadcast->audio;
                }
            }else{
                if($request->file){
                    $data['video'] = uploadFile($request,'file','doctor_broadcasts');
                }else{
                    $data['video'] = $doctor_broadcast->video;
                }
            }
            $doctor_broadcast->update($data);
            $doctor_broadcast = Broadcast::find($doctor_broadcast->id);
            $slug = Str::slug($doctor_broadcast->name . ' ' . $doctor_broadcast->id, '-');
            $doctor_broadcast->update([
                'slug' => $slug
            ]);
            $doctor_broadcast->tags()->sync($request->tag_ids);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->route('super_admin.doctor_broadcasts.index' , $doctor->id)->with('message', 'Something Went Wrong')->with('message_type', 'error');
        }
        return redirect()->route('super_admin.doctor_broadcasts.index' , $doctor->id)->with('message', 'Broadcast Updated Successfully')->with('message_type', 'success');
    }

    /********* Export  CSV And Excel  **********/
    public function export(Request $request)
    {
        $doctor_broadcasts = $this->getter($request, "export");
        if (in_array($request->export, ['csv,xlsx'])) {
            $extension = $request->export;
        } else {
            $extension = 'xlsx';
        }
        $filename = "doctor_broadcasts." . $extension;
        return Excel::download(new DoctorBroadcastsExport($doctor_broadcasts), $filename);
    }
    /********* Import CSV And Excel  **********/
    public function import(ImportRequest $request)
    {
        $file = $request->file('file');
        Excel::import(new DoctorBroadcastsImport, $file);
        return redirect()->back()->with('message', 'Broadcast Categories imported Successfully')->with('message_type', 'success');
    }


    /*********Soft DELETE Broadcast ***********/
    public function destroy(Doctor $doctor ,Broadcast $doctor_broadcast)
    {
        if($doctor->id != $doctor_broadcast->doctor_id){
            return redirect()->back()->with('message', 'Broadcast Not Found')->with('message_type', 'error');
        }
        $doctor_broadcast->delete();
        return redirect()->back()->with('message', 'Broadcast Deleted Successfully')->with('message_type', 'success');
    }

    /*********Permanently DELETE Broadcast ***********/
    public function destroyPermanently(Request $request,Doctor $doctor ,$doctor_broadcast)
    {
        $doctor_broadcast = Broadcast::withTrashed()->find($doctor_broadcast);
        if ($doctor_broadcast) {
            if ($doctor_broadcast->trashed()) {
                if ($doctor_broadcast->image && file_exists(public_path($doctor_broadcast->image))) {
                    unlink(public_path($doctor_broadcast->image));
                }
                $doctor_broadcast->forceDelete();
                return redirect()->back()->with('message', 'Broadcast Deleted Successfully')->with('message_type', 'success');
            } else {
                return redirect()->back()->with('message', 'Broadcast is Not in Trash')->with('message_type', 'error');
            }
        } else {
            return redirect()->back()->with('message', 'Broadcast Not Found')->with('message_type', 'error');
        }
    }
    /********* Restore Broadcast***********/
    public function restore(Request $request,Doctor $doctor, $doctor_broadcast)
    {
        $doctor_broadcast = Broadcast::withTrashed()->find($doctor_broadcast);
        if ($doctor_broadcast->trashed()) {
            $doctor_broadcast->restore();
            return redirect()->back()->with('message', 'Broadcast Restored Successfully')->with('message_type', 'success');
        } else {
            return redirect()->back()->with('message', 'Broadcast Not Found')->with('message_type', 'error');
        }
    }
}
