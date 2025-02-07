<?php

namespace App\Http\Controllers\Doctors;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Http\Requests\Doctors\DoctorEvents\CreateRequest;
use App\Http\Resources\Web\EventsResource;
use Carbon\Carbon;
use Excel;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class DoctorEventsController extends Controller
{
    /********* Initialize Permission based Middlewares  ***********/
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('doctor');
        // $this->middleware('permission:doctor_events.index');
        // $this->middleware('permission:doctor_events.create',['only' => ['store']]);
        // $this->middleware('permission:doctor_events.update',['only' => ['update']]);
        // $this->middleware('permission:doctor_events.delete',['only' => ['destroy']]);
        // $this->middleware('permission:doctor_events.export',['only' => ['export']]);
        // $this->middleware('permission:doctor_events.import',['only' => ['import']])
        // $this->middleware('permission:doctor_events.update|doctor_events.is_active',['only' => ['updateStatus']]);
    }

    /********* Getter For Pagination, Searching And Sorting  ***********/
    public function getter($req = null, $export = null)
    {
        $doctor = auth()->user()->doctor;
        if ($req != null) {
            $doctor_events =  $doctor->doctor_events()->withAll();
            if ($req->trash && $req->trash == 'with') {
                $doctor_events =  $doctor_events->withTrashed();
            }
            if ($req->trash && $req->trash == 'only') {
                $doctor_events =  $doctor_events->onlyTrashed();
            }
            if ($req->column && $req->column != null && $req->search != null) {
                $doctor_events = $doctor_events->whereLike($req->column, $req->search);
            } else if ($req->search && $req->search != null) {

                $doctor_events = $doctor_events->whereLike(['name', 'description'], $req->search);
            }
            if ($req->sort && $req->sort['field'] != null && $req->sort['type'] != null) {
                $doctor_events = $doctor_events->OrderBy($req->sort['field'], $req->sort['type']);
            } else {
                $doctor_events = $doctor_events->OrderBy('id', 'desc');
            }
            if ($export != null) { // for export do not paginate
                $doctor_events = $doctor_events->get();
                return $doctor_events;
            }
            $totalDoctorEvents = $doctor_events->count();
            $doctor_events = $doctor_events->paginate($req->perPage);
            $doctor_events = EventsResource::collection($doctor_events)->response()->getData(true);

            return $doctor_events;
        }
        $doctor_events = EventsResource::collection($doctor->doctor_events()->withAll()->orderBy('id', 'desc')->paginate(10))->response()->getData(true);
        return $doctor_events;
    }

    /********* FETCH ALL DoctorEvents ***********/
    public function index()
    {
        $doctor_events =  $this->getter();
        $response = generateResponse($doctor_events, count($doctor_events['data']) > 0 ? true : false, 'DoctorEvents Fetched Successfully', null, 'collection');
        return response()->json($response, 200);
    }

    /********* FILTER DoctorEvents FOR Search ***********/
    public function filter(Request $request)
    {
        $doctor_events = $this->getter($request);
        $response = generateResponse($doctor_events, count($doctor_events['data']) > 0 ? true : false, 'Filter DoctorEvents Successfully', null, 'collection');
        return response()->json($response, 200);
    }

    /********* ADD NEW DoctorEvent ***********/
    public function store(CreateRequest $request)
    {
        // dd($request->all());
        $doctor = auth()->user()->doctor;
        try {
            DB::beginTransaction();
            $request->merge(['created_by_user_id' => auth()->user()->id]);
            $data = $request->all();
            $data['image'] = uploadCroppedFile($request, 'image', 'doctor_events');
            $doctor_event = $doctor->doctor_events()->create($data);
            $doctor_event->slug = Str::slug($doctor_event->name . ' ' . $doctor_event->id, '-');
            $doctor_event->save();
            $doctor_event = $doctor->doctor_events()->withAll()->find($doctor_event->id);
            foreach ($request->sponsers as $sponser) {
                $image_url = uploadArrayFile($sponser, 'image', 'event_sponsers');
                $doctor_event->sponsers()->create([
                    'name' => $sponser['name'],
                    'image' => $image_url
                ]);
            }
            $doctor_event = new EventsResource($doctor_event);
            $doctor_event->tags()->sync($request->tag_ids);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            request()->session()->flash('alert', ['message' => 'Invalid Request', 'type' => 'error']);
            return redirect()->back()->withErrors(['line' => $e->getLine(), 'message' => $e->getMessage()]);
        }
        return redirect()->back();
    }

    /********* View RECORD TO EDIT Or Display ***********/
    public function show($doctor_event)
    {
        $doctor = auth()->user()->doctor;
        if ($doctor_event->doctor_id != $doctor->id) {
            return redirect()->back()->withErrors([
                'message' => 'Invalid Request',
                'type' => 'error'
            ]);
        }
        $doctor_event = $doctor->doctor_events()->withAll()->find($doctor_event);
        if ($doctor_event) {
            $doctor_event = new EventsResource($doctor_event);
            $response = generateResponse($doctor_event, true, 'DoctorEvent Fetched Successfully', null, 'object');
        } else {
            $response = generateResponse(null, false, 'DoctorEvent Not FOund', null, 'object');
        }
        return response()->json($response, 200);
    }

    /********* UPDATE DoctorEvent ***********/
    public function update(CreateRequest $request, Event $doctor_event)
    {
        // dd($request->all());
        $doctor = auth()->user()->doctor;
        if ($doctor_event->doctor_id != $doctor->id) {
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
                $data['image'] = uploadCroppedFile($request, 'image', 'doctor_events', $doctor_event->image);
            } else {
                $data['image'] = $doctor_event->image;
            }

            $doctor_event->update($data);
            $doctor_event = $doctor_event->find($doctor_event->id);
            $slug = Str::slug($doctor_event['name'] . ' ' . $doctor_event->id, '-');
            $doctor_event->update(
                [
                    'slug' => $slug
                ]
            );
            $doctor_event->sponsers()->delete();
            foreach ($request->sponsers as $sponser) {
                if (is_string($sponser['image'])) {
                    $image_url = $sponser['previous_image'];
                } else {
                    $image_url = uploadArrayFile($sponser, 'image', 'event_sponsers');
                }
                $doctor_event->sponsers()->create([
                    'name' => $sponser['name'],
                    'image' => $image_url
                ]);
            }
            $doctor_event->tags()->sync($request->tag_ids);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            request()->session()->flash('alert', ['message' => 'Invalid Request', 'type' => 'error']);
            return redirect()->back()->withErrors(['line' => $e->getLine(), 'message' => $e->getMessage()]);
        }
        return redirect()->back();
    }

    /********* UPDATE DoctorEvent Status***********/
    public function updateStatus(Request $request, Event $doctor_event)
    {
        $doctor = auth()->user()->doctor;
        if ($doctor_event->doctor_id != $doctor->id) {
            return redirect()->back()->withErrors([
                'message' => 'Invalid Request',
                'type' => 'error'
            ]);
        }
        $doctor_event->update([
            'is_active' => $doctor_event->is_active == 1 ? 0 : 1
        ]);
        $response = generateResponse(null, true, 'DoctorEvent Status Updated Successfully', null, 'object');
        return response()->json($response, 200);
    }


    /********* DELETE DoctorEvent ***********/
    public function destroy(Request $request, Event $doctor_event)
    {
        $doctor = auth()->user()->doctor;
        if ($doctor_event->doctor_id != $doctor->id) {
            request()->session()->flash('alert', ['message' => 'Invalid Request', 'type' => 'error']);
            return redirect()->back();
        }
        if ($doctor_event->trashed()) {
            request()->session()->flash('alert', ['message' => 'Already in Trash', 'type' => 'error']);
        } else {
            $doctor_event->sponsers()->delete();
            $doctor_event->delete();
        }
        return redirect()->back();
    }
    /*********Permanently DELETE DoctorEvent ***********/
    public function destroyPermanently(Request $request, $doctor_event)
    {
        $doctor = auth()->user()->doctor;
        $doctor_event = $doctor->doctor_events()->withTrashed()->find($doctor_event);
        if ($doctor_event) {
            if ($doctor_event->doctor_id != $doctor->id) {
                return redirect()->back()->withErrors([
                    'message' => 'Invalid Request',
                    'type' => 'error'
                ]);
            }
            if ($doctor_event->trashed()) {
                $doctor_event->forceDelete();
                $response = generateResponse(null, true, 'DoctorEvent Deleted Successfully', null, 'object');
            } else {
                $response = generateResponse(null, false, 'DoctorEvent is not in trash to delete permanently', null, 'object');
            }
        } else {
            $response = generateResponse(null, false, 'DoctorEvent not found', null, 'object');
        }
        return response()->json($response, 200);
    }
    /********* Restore DoctorEvent ***********/
    public function restore(Request $request, $doctor_event)
    {
        $doctor = auth()->user()->doctor;
        $doctor_event = $doctor->doctor_events()->withTrashed()->find($doctor_event);
        if ($doctor_event->trashed()) {
            $doctor_event->restore();
            $response = generateResponse(null, true, 'DoctorEvent Restored Successfully', null, 'object');
        } else {
            $response = generateResponse(null, false, 'DoctorEvent is not trashed', null, 'object');
        }
        return response()->json($response, 200);
    }
}
