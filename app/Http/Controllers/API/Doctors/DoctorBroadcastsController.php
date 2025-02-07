<?php

namespace App\Http\Controllers\API\Doctors;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Broadcast;
use App\Http\Requests\API\Doctors\DoctorBroadcasts\CreateRequest;
use App\Http\Resources\API\BroadcastsResource;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DoctorBroadcastsController extends Controller
{
    /********* Initialize Permission based Middlewares  ***********/
  public function __construct()
  {
        $this->middleware(['api','auth:api','verified','api_setting']);
        $this->middleware('doctor.api');
      // $this->middleware('permission:doctor_broadcasts.index');
      // $this->middleware('permission:doctor_broadcasts.create',['only' => ['store']]);
      // $this->middleware('permission:doctor_broadcasts.update',['only' => ['update']]);
      // $this->middleware('permission:doctor_broadcasts.delete',['only' => ['destroy']]);
      // $this->middleware('permission:doctor_broadcasts.export',['only' => ['export']]);
      // $this->middleware('permission:doctor_broadcasts.import',['only' => ['import']])
      // $this->middleware('permission:doctor_broadcasts.update|doctor_broadcasts.is_active',['only' => ['updateStatus']]);
  }

  /********* Getter For Pagination, Searching And Sorting  ***********/
  public function getter($req = null,$export = null)
  {
    $doctor = auth()->user()->doctor;
    if($req != null){
      $doctor_broadcasts =  $doctor->doctor_broadcasts()->withAll();
      if($req->trash && $req->trash == 'with'){
        $doctor_broadcasts =  $doctor_broadcasts->withTrashed();
      }
      if($req->trash && $req->trash == 'only'){
        $doctor_broadcasts =  $doctor_broadcasts->onlyTrashed();
      }
      if($req->column && $req->column != null && $req->search != null){
          $doctor_broadcasts = $doctor_broadcasts->whereLike($req->column,$req->search);
        }
       else if($req->search && $req->search != null){

            $doctor_broadcasts = $doctor_broadcasts->whereLike(['name','description'],$req->search);
        }
      if($req->sort && $req->sort['field'] != null && $req->sort['type'] != null){
          $doctor_broadcasts = $doctor_broadcasts->OrderBy($req->sort['field'],$req->sort['type']);
      }
      else
      {
        $doctor_broadcasts = $doctor_broadcasts->OrderBy('id','desc');
      }
      if($export != null){ // for export do not paginate
        $doctor_broadcasts = $doctor_broadcasts->get();
        return $doctor_broadcasts;
      }
      $totalDoctorCertifications = $doctor_broadcasts->count();
      $doctor_broadcasts = $doctor_broadcasts->paginate($req->perPage);
      $doctor_broadcasts = BroadcastsResource::collection($doctor_broadcasts)->response()->getData(true);

      return $doctor_broadcasts;
    }
    $doctor_broadcasts = BroadcastsResource::collection($doctor->doctor_broadcasts()->withAll()->orderBy('id','desc')->paginate(10))->response()->getData(true);
    return $doctor_broadcasts;
  }

  /********* FETCH ALL DoctorCertifications ***********/
    public function index()
    {
        $doctor_broadcasts =  $this->getter();
        $response = generateResponse($doctor_broadcasts,count($doctor_broadcasts['data']) > 0 ? true:false,'DoctorCertifications Fetched Successfully',null,'collection');
        return response()->json($response, 200);
    }

  /********* FILTER DoctorCertifications FOR Search ***********/
   public function filter(Request $request){
     $doctor_broadcasts = $this->getter($request);
     $response = generateResponse($doctor_broadcasts,count($doctor_broadcasts['data']) > 0 ? true:false,'Filter DoctorCertifications Successfully',null,'collection');
     return response()->json($response, 200);
   }

    /********* ADD NEW DoctorMedia ***********/
    public function store(CreateRequest $request)
    {
      $doctor = auth()->user()->doctor;
      try{
        DB::beginTransaction();
        $request->merge(['created_by_user_id'=>auth()->user()->id]);
        $data = $request->all();
        $data['image'] = uploadFile($request,'image','doctor_broadcasts');
        $data['audio'] = uploadFile($request,'audio','doctor_broadcasts');
        $data['video'] = uploadFile($request,'video','doctor_broadcasts');
        $doctor_broadcast = $doctor->doctor_broadcasts()->create($data);
        $doctor_broadcast->slug = Str::slug($doctor_broadcast->name . ' ' . $doctor_broadcast->id, '-');
        $doctor_broadcast->save();
        $doctor_broadcast->tags()->sync($request->tag_ids);
        DB::commit();
        $doctor_broadcast = $doctor->doctor_broadcasts()->withAll()->find($doctor_broadcast->id);
        $doctor_broadcast = new BroadcastsResource($doctor_broadcast);
      $response = generateResponse($doctor_broadcast,true ,'DoctorCertifications Created Successfully',null,'collection');
      return response()->json($response, 200);
    }
      catch (\Exception $e) {
        DB::rollBack();
        $response = generateResponse(null,false ,$e->getMessage(),null,'collection');
        return response()->json($response, 200);
     }
    }

    /********* View RECORD TO EDIT Or Display ***********/
    public function show(Broadcast $doctor_broadcast)
    {
        $doctor = auth()->user()->doctor;
        if($doctor_broadcast->doctor_id != $doctor->id){
          $response = generateResponse(null,false ,'Not Found',null,'collection');
          return response()->json($response, 404);
        }
        $doctor_broadcast = $doctor->doctor_broadcasts()->withAll()->find($doctor_broadcast->id);
        if($doctor_broadcast){
          $doctor_broadcast = new BroadcastsResource($doctor_broadcast);
          $response = generateResponse($doctor_broadcast,true,'DoctorMedia Fetched Successfully',null,'object');
        }
        else{
          $response = generateResponse(null,false,'DoctorMedia Not Found',null,'object');
        }
        return response()->json($response, 200);
    }

    /********* UPDATE DoctorMedia ***********/
    public function update(CreateRequest $request, Broadcast $doctor_broadcast)
    {
        // dd($request->all());
        $doctor = auth()->user()->doctor;
        if($doctor_broadcast->doctor_id != $doctor->id){
          $response = generateResponse(null,false ,'Not Found',null,'collection');
          return response()->json($response, 404);
        }
      try{
        DB::beginTransaction();
        $request->merge(['last_updated_by_user_id'=>auth()->user()->id]);
        $data = $request->all();
        if ($request->image) {
            $data['image'] = uploadFile($request,'image','doctor_broadcasts',$doctor_broadcast->image);
        } else {
            $data['image'] = $doctor_broadcast->image;
        }

        if ($request->audio) {
            $data['audio'] = uploadFile($request,'audio','doctor_broadcasts');
        } else {
            $data['audio'] = $doctor_broadcast->audio;
        }

        if ($request->video) {
            $data['video'] = uploadFile($request,'video','doctor_broadcasts');
        } else {
            $data['video'] = $doctor_broadcast->video;
        }
        $data['slug'] = Str::slug($data['name'] . ' ' . $doctor_broadcast->id, '-');
        $doctor_broadcast->update($data);
         $doctor_broadcast->tags()->sync($request->tag_ids);
        DB::commit();
        $doctor_broadcast = $doctor->doctor_broadcasts()->withAll()->find($doctor_broadcast->id);
        $doctor_broadcast = new BroadcastsResource($doctor_broadcast);
        $response = generateResponse($doctor_broadcast,true,'DoctorMedia Updated Successfully',null,'object');
        return response()->json($response, 200);
      }
        catch (\Exception $e) {
          DB::rollBack();
          $response = generateResponse(null,false ,$e->getMessage(),null,'collection');
          return response()->json($response, 200);
       }
    }

    /********* UPDATE DoctorMedia Status***********/
    public function updateStatus(Request $request,Broadcast $doctor_broadcast){
      try{
        $doctor = auth()->user()->doctor;
        if($doctor_broadcast->doctor_id != $doctor->id){
          $response = generateResponse(null,false ,'Not Found',null,'collection');
          return response()->json($response, 404);
        }
        $doctor_broadcast->update([
          'is_active' => $doctor_broadcast->is_active == 1 ? 0:1
        ]);
        $response = generateResponse(null,true,'DoctorMedia Status Updated Successfully',null,'object');
        return response()->json($response, 200);
      }
      catch (\Exception $e) {
        DB::rollBack();
        $response = generateResponse(null,false ,$e->getMessage(),null,'collection');
        return response()->json($response, 200);
     }
    }


    /********* DELETE DoctorMedia ***********/
    public function destroy(Request $request,Broadcast $doctor_broadcast)
    {
      try{
        $doctor = auth()->user()->doctor;
        if($doctor_broadcast->doctor_id != $doctor->id){
          $response = generateResponse(null,false ,'Not Found',null,'collection');
          return response()->json($response, 404);
        }
          if($doctor_broadcast->trashed()) {
            $response = generateResponse(null,false ,'Already in Trash',null,'collection');
            return response()->json($response, 404);
          }
          else{
            $doctor_broadcast->delete();
          }
          $response = generateResponse(null,true,'DoctorMedia Deleted Successfully',null,'object');
          return response()->json($response, 200);

        } catch (\Exception $e) {
          DB::rollBack();
          $response = generateResponse(null,false ,$e->getMessage(),null,'collection');
          return response()->json($response, 200);
       }
    }
    /*********Permanently DELETE DoctorMedia ***********/
    public function destroyPermanently(Request $request,$doctor_broadcast)
    {
      try{
        $doctor= auth()->user()->doctor;
        $doctor_broadcast = $doctor->doctor_broadcasts()->withTrashed()->find($doctor_broadcast);
        if($doctor_broadcast){
            if($doctor_broadcast->doctor_id != $doctor->id){
              $response = generateResponse(null,false ,'Not Found',null,'collection');
              return response()->json($response, 404);
            }
          if ($doctor_broadcast->trashed()) {
            $doctor_broadcast->forceDelete();
            $response = generateResponse(null,true,'DoctorMedia Deleted Successfully',null,'object');
          }
          else{
            $response = generateResponse(null,false,'DoctorMedia is not in trash to delete permanently',null,'object');
          }
        }
        else{
          $response = generateResponse(null,false,'DoctorMedia not found',null,'object');
        }
          return response()->json($response, 200);

        } catch (\Exception $e) {
          DB::rollBack();
          $response = generateResponse(null,false ,$e->getMessage(),null,'collection');
          return response()->json($response, 200);
       }
    }
    /********* Restore DoctorMedia ***********/
    public function restore(Request $request,$doctor_broadcast)
    {
      $doctor= auth()->user()->doctor;
      $doctor_broadcast = $doctor->doctor_broadcasts()->withTrashed()->find($doctor_broadcast);
          if ($doctor_broadcast->trashed()) {
            $doctor_broadcast->restore();
            $response = generateResponse(null,true,'DoctorMedia Restored Successfully',null,'object');
          }
          else{
            $response = generateResponse(null,false,'DoctorMedia is not trashed',null,'object');
          }
          return response()->json($response, 200);
    }
}
