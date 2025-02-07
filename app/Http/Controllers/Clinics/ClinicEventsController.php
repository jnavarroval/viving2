<?php

namespace App\Http\Controllers\Clinics;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Http\Requests\Clinics\ClinicEvents\CreateRequest;
use App\Http\Resources\Web\EventsResource;
use Carbon\Carbon;
use Excel;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
class ClinicEventsController extends Controller
{
    /********* Initialize Permission based Middlewares  ***********/
  public function __construct()
  {
      $this->middleware('auth');
      $this->middleware('clinic');
      // $this->middleware('permission:clinic_events.index');
      // $this->middleware('permission:clinic_events.create',['only' => ['store']]);
      // $this->middleware('permission:clinic_events.update',['only' => ['update']]);
      // $this->middleware('permission:clinic_events.delete',['only' => ['destroy']]);
      // $this->middleware('permission:clinic_events.export',['only' => ['export']]);
      // $this->middleware('permission:clinic_events.import',['only' => ['import']])
      // $this->middleware('permission:clinic_events.update|clinic_events.is_active',['only' => ['updateStatus']]);
  }

  /********* Getter For Pagination, Searching And Sorting  ***********/
  public function getter($req = null,$export = null)
  {
    $clinic = auth()->user()->clinic;
    if($req != null){
      $clinic_events =  $clinic->clinic_events()->withAll();
      if($req->trash && $req->trash == 'with'){
        $clinic_events =  $clinic_events->withTrashed();
      }
      if($req->trash && $req->trash == 'only'){
        $clinic_events =  $clinic_events->onlyTrashed();
      }
      if($req->column && $req->column != null && $req->search != null){
          $clinic_events = $clinic_events->whereLike($req->column,$req->search);
        }
       else if($req->search && $req->search != null){

            $clinic_events = $clinic_events->whereLike(['name','description'],$req->search);
        }
      if($req->sort && $req->sort['field'] != null && $req->sort['type'] != null){
          $clinic_events = $clinic_events->OrderBy($req->sort['field'],$req->sort['type']);
      }
      else
      {
        $clinic_events = $clinic_events->OrderBy('id','desc');
      }
      if($export != null){ // for export do not paginate
        $clinic_events = $clinic_events->get();
        return $clinic_events;
      }
      $totalClinicEvents = $clinic_events->count();
      $clinic_events = $clinic_events->paginate($req->perPage);
      $clinic_events = EventsResource::collection($clinic_events)->response()->getData(true);

      return $clinic_events;
    }
    $clinic_events = EventsResource::collection($clinic->clinic_events()->withAll()->orderBy('id','desc')->paginate(10))->response()->getData(true);
    return $clinic_events;
  }

  /********* FETCH ALL ClinicEvents ***********/
    public function index()
    {
        $clinic_events =  $this->getter();
        $response = generateResponse($clinic_events,count($clinic_events['data']) > 0 ? true:false,'ClinicEvents Fetched Successfully',null,'collection');
        return response()->json($response, 200);
    }

  /********* FILTER ClinicEvents FOR Search ***********/
   public function filter(Request $request){
     $clinic_events = $this->getter($request);
     $response = generateResponse($clinic_events,count($clinic_events['data']) > 0 ? true:false,'Filter ClinicEvents Successfully',null,'collection');
     return response()->json($response, 200);
   }

    /********* ADD NEW ClinicEvent ***********/
    public function store(CreateRequest $request)
    {
      $clinic = auth()->user()->clinic;
      try{
      DB::beginTransaction();
      $request->merge(['created_by_user_id'=>auth()->user()->id]);
      $data = $request->all();
      $data['image'] = uploadCroppedFile($request,'image','clinic_events');
      $clinic_event = $clinic->clinic_events()->create($data);
      $clinic_event->slug = Str::slug($clinic_event->name . ' ' . $clinic_event->id, '-');
      $clinic_event->save();
      $clinic_event = $clinic->clinic_events()->withAll()->find($clinic_event->id);
      foreach ($request->sponsers as $sponser) {
        $image_url = uploadArrayFile($sponser ,'image','event_sponsers');
        $clinic_event->sponsers()->create([
            'name' => $sponser['name'],
            'image' => $image_url
        ]);
      }
      $clinic_event = new EventsResource($clinic_event);
      $clinic_event->tags()->sync($request->tag_ids);
      DB::commit();
    }
      catch (\Exception $e) {
        DB::rollBack();
        request()->session()->flash('alert',['message' => 'Invalid Request','type' => 'error']);
        return redirect()->back()->withErrors(['line' => $e->getLine(),'message' => $e->getMessage()]);
    }
      return redirect()->back();
    }

    /********* View RECORD TO EDIT Or Display ***********/
    public function show( $clinic_event)
    {
        $clinic = auth()->user()->clinic;
        if($clinic_event->clinic_id != $clinic->id){
            return redirect()->back()->withErrors([
                'message' => 'Invalid Request',
                'type' => 'error'
            ]);
        }
        $clinic_event = $clinic->clinic_events()->withAll()->find($clinic_event);
        if($clinic_event){
          $clinic_event = new EventsResource($clinic_event);
          $response = generateResponse($clinic_event,true,'ClinicEvent Fetched Successfully',null,'object');
        }
        else{
          $response = generateResponse(null,false,'ClinicEvent Not FOund',null,'object');
        }
        return response()->json($response, 200);
    }

    /********* UPDATE ClinicEvent ***********/
    public function update(CreateRequest $request, Event $clinic_event)
    {
        // dd($request->all());
        $clinic = auth()->user()->clinic;
        if($clinic_event->clinic_id != $clinic->id){
            return redirect()->back()->withErrors([
                'message' => 'Invalid Request',
                'type' => 'error'
            ]);
        }
      try{
        DB::beginTransaction();
        $request->merge(['last_updated_by_user_id'=>auth()->user()->id]);
        $data = $request->all();
        if ($request->image) {
            $data['image'] = uploadCroppedFile($request,'image','clinic_events',$clinic_event->image);
        } else {
            $data['image'] = $clinic_event->image;
        }
        $clinic_event->sponsers()->delete();
        foreach ($request->sponsers as $sponser) {
        if (is_string($sponser['image'])) {
            $image_url = $sponser['previous_image'];
        }else{
            $image_url = uploadArrayFile($sponser ,'image','event_sponsers');
        }
            $clinic_event->sponsers()->create([
                'name' => $sponser['name'],
                'image' => $image_url
            ]);
          }
          $clinic_event->update($data);
          $clinic_event = $clinic_event->find($clinic_event->id);
          $slug = Str::slug($clinic_event['name'] . ' ' . $clinic_event->id, '-');
          $clinic_event->update(
              [
                  'slug' => $slug
              ]
          );
        $clinic_event->tags()->sync($request->tag_ids);
        DB::commit();
      }
        catch (\Exception $e) {
          DB::rollBack();
          request()->session()->flash('alert',['message' => 'Invalid Request','type' => 'error']);
          return redirect()->back()->withErrors(['line' => $e->getLine(),'message' => $e->getMessage()]);
        }
       return redirect()->back();
    }

    /********* UPDATE ClinicEvent Status***********/
    public function updateStatus(Request $request,Event $clinic_event){
        $clinic = auth()->user()->clinic;
        if($clinic_event->clinic_id != $clinic->id){
            return redirect()->back()->withErrors([
                'message' => 'Invalid Request',
                'type' => 'error'
            ]);
        }
        $clinic_event->update([
          'is_active' => $clinic_event->is_active == 1 ? 0:1
        ]);
        $response = generateResponse(null,true,'ClinicEvent Status Updated Successfully',null,'object');
        return response()->json($response, 200);
    }


    /********* DELETE ClinicEvent ***********/
    public function destroy(Request $request,Event $clinic_event)
    {
        $clinic = auth()->user()->clinic;
        if($clinic_event->clinic_id != $clinic->id){
            request()->session()->flash('alert',['message' => 'Invalid Request','type' => 'error']);
            return redirect()->back();
        }
          if($clinic_event->trashed()) {
            request()->session()->flash('alert',['message' => 'Already in Trash','type' => 'error']);
          }
          else{
            $clinic_event->delete();
          }
          return redirect()->back();
    }
    /*********Permanently DELETE ClinicEvent ***********/
    public function destroyPermanently(Request $request,$clinic_event)
    {
        $clinic= auth()->user()->clinic;
        $clinic_event = $clinic->clinic_events()->withTrashed()->find($clinic_event);
        if($clinic_event){
            if($clinic_event->clinic_id != $clinic->id){
                return redirect()->back()->withErrors([
                    'message' => 'Invalid Request',
                    'type' => 'error'
                ]);
            }
          if ($clinic_event->trashed()) {
            $clinic_event->forceDelete();
            $response = generateResponse(null,true,'ClinicEvent Deleted Successfully',null,'object');
          }
          else{
            $response = generateResponse(null,false,'ClinicEvent is not in trash to delete permanently',null,'object');
          }
        }
        else{
          $response = generateResponse(null,false,'ClinicEvent not found',null,'object');
        }
          return response()->json($response, 200);
    }
    /********* Restore ClinicEvent ***********/
    public function restore(Request $request,$clinic_event)
    {
      $clinic= auth()->user()->clinic;
      $clinic_event = $clinic->clinic_events()->withTrashed()->find($clinic_event);
          if ($clinic_event->trashed()) {
            $clinic_event->restore();
            $response = generateResponse(null,true,'ClinicEvent Restored Successfully',null,'object');
          }
          else{
            $response = generateResponse(null,false,'ClinicEvent is not trashed',null,'object');
          }
          return response()->json($response, 200);
    }
}
