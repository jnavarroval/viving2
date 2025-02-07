<?php

namespace App\Http\Controllers\Clinics;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Broadcast;
use App\Http\Requests\Clinics\ClinicBroadcasts\CreateRequest;
use App\Http\Resources\Web\BroadcastsResource;
use Excel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ClinicBroadcastsController extends Controller
{
    /********* Initialize Permission based Middlewares  ***********/
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('clinic');
        // $this->middleware('permission:clinic_broadcasts.index');
        // $this->middleware('permission:clinic_broadcasts.create',['only' => ['store']]);
        // $this->middleware('permission:clinic_broadcasts.update',['only' => ['update']]);
        // $this->middleware('permission:clinic_broadcasts.delete',['only' => ['destroy']]);
        // $this->middleware('permission:clinic_broadcasts.export',['only' => ['export']]);
        // $this->middleware('permission:clinic_broadcasts.import',['only' => ['import']])
        // $this->middleware('permission:clinic_broadcasts.update|clinic_broadcasts.is_active',['only' => ['updateStatus']]);
    }

    /********* Getter For Pagination, Searching And Sorting  ***********/
    public function getter($req = null, $export = null)
    {
        $clinic = auth()->user()->clinic;
        if ($req != null) {
            $clinic_broadcasts =  $clinic->clinic_broadcasts()->withAll();
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
            if ($req->sort && $req->sort['field'] != null && $req->sort['type'] != null) {
                $clinic_broadcasts = $clinic_broadcasts->OrderBy($req->sort['field'], $req->sort['type']);
            } else {
                $clinic_broadcasts = $clinic_broadcasts->OrderBy('id', 'desc');
            }
            if ($export != null) { // for export do not paginate
                $clinic_broadcasts = $clinic_broadcasts->get();
                return $clinic_broadcasts;
            }
            $totalClinicBroadcasts = $clinic_broadcasts->count();
            $clinic_broadcasts = $clinic_broadcasts->paginate($req->perPage);
            $clinic_broadcasts = BroadcastsResource::collection($clinic_broadcasts)->response()->getData(true);

            return $clinic_broadcasts;
        }
        $clinic_broadcasts = BroadcastsResource::collection($clinic->clinic_broadcasts()->withAll()->orderBy('id', 'desc')->paginate(10))->response()->getData(true);
        return $clinic_broadcasts;
    }

    /********* FETCH ALL ClinicBroadcasts ***********/
    public function index()
    {
        $clinic_broadcasts =  $this->getter();
        $response = generateResponse($clinic_broadcasts, count($clinic_broadcasts['data']) > 0 ? true : false, 'ClinicBroadcasts Fetched Successfully', null, 'collection');
        return response()->json($response, 200);
    }

    /********* FILTER ClinicBroadcasts FOR Search ***********/
    public function filter(Request $request)
    {
        $clinic_broadcasts = $this->getter($request);
        $response = generateResponse($clinic_broadcasts, count($clinic_broadcasts['data']) > 0 ? true : false, 'Filter ClinicBroadcasts Successfully', null, 'collection');
        return response()->json($response, 200);
    }

    /********* ADD NEW ClinicBroadcast ***********/
    public function store(CreateRequest $request)
    {
        $clinic = auth()->user()->clinic;
        try {
            DB::beginTransaction();
            $request->merge(['created_by_user_id' => auth()->user()->id]);
            $data = $request->all();
            $data['image'] = uploadCroppedFile($request, 'image', 'clinic_broadcasts');
            $data['audio'] = uploadFile($request, 'audio', 'clinic_broadcasts');
            $data['video'] = uploadFile($request, 'video', 'clinic_broadcasts');
            $clinic_broadcast = $clinic->clinic_broadcasts()->create($data);
            $clinic_broadcast->slug = Str::slug($clinic_broadcast->name . ' ' . $clinic_broadcast->id, '-');
            $clinic_broadcast->save();
            $clinic_broadcast->tags()->sync($request->tag_ids);
            $clinic_broadcast = $clinic->clinic_broadcasts()->withAll()->find($clinic_broadcast->id);
            $clinic_broadcast = new BroadcastsResource($clinic_broadcast);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            request()->session()->flash('alert', ['message' => 'Invalid Request', 'type' => 'error']);
        }
        return redirect()->back();
    }

    /********* View RECORD TO EDIT Or Display ***********/
    public function show($clinic_broadcast)
    {
        $clinic = auth()->user()->clinic;
        if ($clinic_broadcast->clinic_id != $clinic->id) {
            return redirect()->back()->withErrors([
                'message' => 'Invalid Request',
                'type' => 'error'
            ]);
        }
        $clinic_broadcast = $clinic->clinic_broadcasts()->withAll()->find($clinic_broadcast);
        if ($clinic_broadcast) {
            $clinic_broadcast = new BroadcastsResource($clinic_broadcast);
            $response = generateResponse($clinic_broadcast, true, 'ClinicBroadcast Fetched Successfully', null, 'object');
        } else {
            $response = generateResponse(null, false, 'ClinicBroadcast Not FOund', null, 'object');
        }
        return response()->json($response, 200);
    }

    /********* UPDATE ClinicBroadcast ***********/
    public function update(CreateRequest $request, Broadcast $clinic_broadcast)
    {
        // dd($request->all());
        $clinic = auth()->user()->clinic;
        if ($clinic_broadcast->clinic_id != $clinic->id) {
            return redirect()->back()->withErrors([
                'message' => 'Invalid Request',
                'type' => 'error'
            ]);
        }
        try {
            DB::beginTransaction();
            $request->merge(['last_updated_by_user_id' => auth()->user()->id]);
            $data = $request->all();
            if ($request->image) {
                $data['image'] = uploadCroppedFile($request, 'image', 'clinic_broadcasts', $clinic_broadcast->image);
            } else {
                $data['image'] = $clinic_broadcast->image;
            }

            if ($request->audio) {
                $data['audio'] = uploadFile($request, 'audio', 'clinic_broadcasts');
            } else {
                $data['audio'] = $clinic_broadcast->audio;
            }

            if ($request->video) {
                $data['video'] = uploadFile($request, 'video', 'clinic_broadcasts');
            } else {
                $data['video'] = $clinic_broadcast->video;
            }
            $clinic_broadcast->update($data);
            $clinic_broadcast = $clinic_broadcast->find($clinic_broadcast->id);
            $slug = Str::slug($clinic_broadcast['name'] . ' ' . $clinic_broadcast->id, '-');
            $clinic_broadcast->update(
                [
                    'slug' => $slug
                ]
            );
            $clinic_broadcast->tags()->sync($request->tag_ids);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            request()->session()->flash('alert', ['message' => 'Invalid Request', 'type' => 'error']);
        }
        return redirect()->back();
    }

    /********* UPDATE ClinicBroadcast Status***********/
    public function updateStatus(Request $request, Broadcast $clinic_broadcast)
    {
        $clinic = auth()->user()->clinic;
        if ($clinic_broadcast->clinic_id != $clinic->id) {
            return redirect()->back()->withErrors([
                'message' => 'Invalid Request',
                'type' => 'error'
            ]);
        }
        $clinic_broadcast->update([
            'is_active' => $clinic_broadcast->is_active == 1 ? 0 : 1
        ]);
        $response = generateResponse(null, true, 'ClinicBroadcast Status Updated Successfully', null, 'object');
        return response()->json($response, 200);
    }


    /********* DELETE ClinicBroadcast ***********/
    public function destroy(Request $request, Broadcast $clinic_broadcast)
    {
        $clinic = auth()->user()->clinic;
        if ($clinic_broadcast->clinic_id != $clinic->id) {
            request()->session()->flash('alert', ['message' => 'Invalid Request', 'type' => 'error']);
            return redirect()->back();
        }
        if ($clinic_broadcast->trashed()) {
            request()->session()->flash('alert', ['message' => 'Already in Trash', 'type' => 'error']);
        } else {
            $clinic_broadcast->delete();
        }
        return redirect()->back();
    }
    /*********Permanently DELETE ClinicBroadcast ***********/
    public function destroyPermanently(Request $request, $clinic_broadcast)
    {
        $clinic = auth()->user()->clinic;
        $clinic_broadcast = $clinic->clinic_broadcasts()->withTrashed()->find($clinic_broadcast);
        if ($clinic_broadcast) {
            if ($clinic_broadcast->clinic_id != $clinic->id) {
                return redirect()->back()->withErrors([
                    'message' => 'Invalid Request',
                    'type' => 'error'
                ]);
            }
            if ($clinic_broadcast->trashed()) {
                $clinic_broadcast->forceDelete();
                $response = generateResponse(null, true, 'ClinicBroadcast Deleted Successfully', null, 'object');
            } else {
                $response = generateResponse(null, false, 'ClinicBroadcast is not in trash to delete permanently', null, 'object');
            }
        } else {
            $response = generateResponse(null, false, 'ClinicBroadcast not found', null, 'object');
        }
        return response()->json($response, 200);
    }
    /********* Restore ClinicBroadcast ***********/
    public function restore(Request $request, $clinic_broadcast)
    {
        $clinic = auth()->user()->clinic;
        $clinic_broadcast = $clinic->clinic_broadcasts()->withTrashed()->find($clinic_broadcast);
        if ($clinic_broadcast->trashed()) {
            $clinic_broadcast->restore();
            $response = generateResponse(null, true, 'ClinicBroadcast Restored Successfully', null, 'object');
        } else {
            $response = generateResponse(null, false, 'ClinicBroadcast is not trashed', null, 'object');
        }
        return response()->json($response, 200);
    }
}
