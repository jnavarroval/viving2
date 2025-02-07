<?php

namespace App\Http\Controllers\API\Doctors;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Http\Requests\API\Doctors\DoctorEvents\CreateRequest;
use App\Http\Resources\API\EventsResource;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DoctorEventsController extends Controller
{
    /********* Initialize Permission based Middlewares  ***********/
  public function __construct()
  {
        $this->middleware(['api','auth:api','verified','api_setting']);
        $this->middleware('doctor.api');
      // $this->middleware('permission:doctor_events.index');
      // $this->middleware('permission:doctor_events.create',['only' => ['store']]);
      // $this->middleware('permission:doctor_events.update',['only' => ['update']]);
      // $this->middleware('permission:doctor_events.delete',['only' => ['destroy']]);
      // $this->middleware('permission:doctor_events.export',['only' => ['export']]);
      // $this->middleware('permission:doctor_events.import',['only' => ['import']])
      // $this->middleware('permission:doctor_events.update|doctor_events.is_active',['only' => ['updateStatus']]);
  }

  /********* Getter For Pagination, Searching And Sorting  ***********/
  public function getter($req = null,$export = null)
  {
    $doctor = auth()->user()->doctor;
    if($req != null){
      $doctor_events =  $doctor->doctor_events()->withAll();
      if($req->trash && $req->trash == 'with'){
        $doctor_events =  $doctor_events->withTrashed();
      }
      if($req->trash && $req->trash == 'only'){
        $doctor_events =  $doctor_events->onlyTrashed();
      }
      if($req->column && $req->column != null && $req->search != null){
          $doctor_events = $doctor_events->whereLike($req->column,$req->search);
        }
       else if($req->search && $req->search != null){

            $doctor_events = $doctor_events->whereLike(['name','description'],$req->search);
        }
      if($req->sort && $req->sort['field'] != null && $req->sort['type'] != null){
          $doctor_events = $doctor_events->OrderBy($req->sort['field'],$req->sort['type']);
      }
      else
      {
        $doctor_events = $doctor_events->OrderBy('id','desc');
      }
      if($export != null){ // for export do not paginate
        $doctor_events = $doctor_events->get();
        return $doctor_events;
      }
      $totalDoctorCertifications = $doctor_events->count();
      $doctor_events = $doctor_events->paginate($req->perPage);
      $doctor_events = EventsResource::collection($doctor_events)->response()->getData(true);

      return $doctor_events;
    }
    $doctor_events = EventsResource::collection($doctor->doctor_events()->withAll()->orderBy('id','desc')->paginate(10))->response()->getData(true);
    return $doctor_events;
  }

  /********* FETCH ALL DoctorEvents ***********/
    public function index()
    {
        $doctor_events =  $this->getter();
        $response = generateResponse($doctor_events,count($doctor_events['data']) > 0 ? true:false,'DoctorEvents Fetched Successfully',null,'collection');
        return response()->json($response, 200);
    }

  /********* FILTER DoctorEvents FOR Search ***********/
   public function filter(Request $request){
     $doctor_events = $this->getter($request);
     $response = generateResponse($doctor_events,count($doctor_events['data']) > 0 ? true:false,'Filter DoctorEvents Successfully',null,'collection');
     return response()->json($response, 200);
   }

    /********* ADD NEW DoctorEvent ***********/
    public function store(CreateRequest $request)
    {
      $doctor = auth()->user()->doctor;
      try{
        DB::beginTransaction();
        $request->merge(['created_by_user_id'=>auth()->user()->id]);
        $data = $request->all();
        $data['image'] = uploadFile($request,'image','doctor_events');
        $doctor_event = $doctor->doctor_events()->create($data);
        $doctor_event->slug = Str::slug($doctor_event->name . ' ' . $doctor_event->id, '-');
        $doctor_event->save();
        $doctor_event->tags()->sync($request->tag_ids);
        DB::commit();
        $doctor_event = $doctor->doctor_posts()->withAll()->find($doctor_event->id);
        $doctor_event = new EventsResource($doctor_event);
      $response = generateResponse($doctor_event,true ,'DoctorEvents Created Successfully',null,'collection');
      return response()->json($response, 200);
    }
      catch (\Exception $e) {
        DB::rollBack();
        $response = generateResponse(null,false ,$e->getMessage(),null,'collection');
        return response()->json($response, 200);
     }
    }

    /********* View RECORD TO EDIT Or Display ***********/
    public function show(Event $doctor_event)
    {
        $doctor = auth()->user()->doctor;
        if($doctor_event->doctor_id != $doctor->id){
          $response = generateResponse(null,false ,'Not Found',null,'collection');
          return response()->json($response, 404);
        }
        $doctor_event = $doctor->doctor_events()->withAll()->find($doctor_event->id);
        if($doctor_event){
          $doctor_event = new EventsResource($doctor_event);
          $response = generateResponse($doctor_event,true,'DoctorEvent Fetched Successfully',null,'object');
        }
        else{
          $response = generateResponse(null,false,'DoctorEvent Not Found',null,'object');
        }
        return response()->json($response, 200);
    }

    /********* UPDATE DoctorEvent ***********/
    public function update(CreateRequest $request, Event $doctor_event)
    {
        // dd($request->all());
        $doctor = auth()->user()->doctor;
        if($doctor_event->doctor_id != $doctor->id){
          $response = generateResponse(null,false ,'Not Found',null,'collection');
          return response()->json($response, 404);
        }
      try{
        DB::beginTransaction();
        $request->merge(['last_updated_by_user_id'=>auth()->user()->id]);
        $data = $request->all();
        if ($request->image) {
            $data['image'] = uploadFile($request,'image','doctor_events',$doctor_event->image);
        } else {
            $data['image'] = $doctor_event->image;
        }
        $data['slug'] = Str::slug($data['name'] . ' ' . $doctor_event->id, '-');
        $doctor_event->update($data);
        $doctor_event->tags()->sync($request->tag_ids);
        DB::commit();
        $doctor_event = $doctor->doctor_events()->withAll()->find($doctor_event->id);
        $doctor_event = new EventsResource($doctor_event);
        $response = generateResponse($doctor_event,true,'DoctorEvent Updated Successfully',null,'object');
        return response()->json($response, 200);
      }
        catch (\Exception $e) {
          DB::rollBack();
          $response = generateResponse(null,false ,$e->getMessage(),null,'collection');
          return response()->json($response, 200);
       }
    }

    /********* UPDATE DoctorEvent Status***********/
    public function updateStatus(Request $request,Event $doctor_event){
      try{
        $doctor = auth()->user()->doctor;
        if($doctor_event->doctor_id != $doctor->id){
          $response = generateResponse(null,false ,'Not Found',null,'collection');
          return response()->json($response, 404);
        }
        $doctor_event->update([
          'is_active' => $doctor_event->is_active == 1 ? 0:1
        ]);
        $response = generateResponse(null,true,'DoctorEvent Status Updated Successfully',null,'object');
        return response()->json($response, 200);
      }
      catch (\Exception $e) {
        DB::rollBack();
        $response = generateResponse(null,false ,$e->getMessage(),null,'collection');
        return response()->json($response, 200);
     }
    }


    /********* DELETE DoctorEvent ***********/
    public function destroy(Request $request,Event $doctor_event)
    {
      try{
        $doctor = auth()->user()->doctor;
        if($doctor_event->doctor_id != $doctor->id){
          $response = generateResponse(null,false ,'Not Found',null,'collection');
          return response()->json($response, 404);
        }
          if($doctor_event->trashed()) {
            $response = generateResponse(null,false ,'Already in Trash',null,'collection');
            return response()->json($response, 404);
          }
          else{
            $doctor_event->delete();
          }
          $response = generateResponse(null,true,'DoctorEvent Deleted Successfully',null,'object');
          return response()->json($response, 200);

        } catch (\Exception $e) {
          DB::rollBack();
          $response = generateResponse(null,false ,$e->getMessage(),null,'collection');
          return response()->json($response, 200);
       }
    }
    /*********Permanently DELETE DoctorEvent ***********/
    public function destroyPermanently(Request $request,$doctor_event)
    {
      try{
        $doctor= auth()->user()->doctor;
        $doctor_event = $doctor->doctor_events()->withTrashed()->find($doctor_event);
        if($doctor_event){
            if($doctor_event->doctor_id != $doctor->id){
              $response = generateResponse(null,false ,'Not Found',null,'collection');
              return response()->json($response, 404);
            }
          if ($doctor_event->trashed()) {
            $doctor_event->forceDelete();
            $response = generateResponse(null,true,'DoctorEvent Deleted Successfully',null,'object');
          }
          else{
            $response = generateResponse(null,false,'DoctorEvent is not in trash to delete permanently',null,'object');
          }
        }
        else{
          $response = generateResponse(null,false,'DoctorEvent not found',null,'object');
        }
          return response()->json($response, 200);

        } catch (\Exception $e) {
          DB::rollBack();
          $response = generateResponse(null,false ,$e->getMessage(),null,'collection');
          return response()->json($response, 200);
       }
    }
    /********* Restore DoctorEvent ***********/
    public function restore(Request $request,$doctor_event)
    {
      $doctor= auth()->user()->doctor;
      $doctor_event = $doctor->doctor_events()->withTrashed()->find($doctor_event);
          if ($doctor_event->trashed()) {
            $doctor_event->restore();
            $response = generateResponse(null,true,'DoctorEvent Restored Successfully',null,'object');
          }
          else{
            $response = generateResponse(null,false,'DoctorEvent is not trashed',null,'object');
          }
          return response()->json($response, 200);
    }
}
