<?php

namespace App\Http\Controllers\API\Doctors;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Podcast;
use App\Http\Requests\API\Doctors\DoctorPodcasts\CreateRequest;
use App\Http\Resources\API\PodcastsResource;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DoctorPodcastsController extends Controller
{
    /********* Initialize Permission based Middlewares  ***********/
  public function __construct()
  {
        $this->middleware(['api','auth:api','verified','api_setting']);
        $this->middleware('doctor.api');
      // $this->middleware('permission:doctor_podcasts.index');
      // $this->middleware('permission:doctor_podcasts.create',['only' => ['store']]);
      // $this->middleware('permission:doctor_podcasts.update',['only' => ['update']]);
      // $this->middleware('permission:doctor_podcasts.delete',['only' => ['destroy']]);
      // $this->middleware('permission:doctor_podcasts.export',['only' => ['export']]);
      // $this->middleware('permission:doctor_podcasts.import',['only' => ['import']])
      // $this->middleware('permission:doctor_podcasts.update|doctor_podcasts.is_active',['only' => ['updateStatus']]);
  }

  /********* Getter For Pagination, Searching And Sorting  ***********/
  public function getter($req = null,$export = null)
  {
    $doctor = auth()->user()->doctor;
    if($req != null){
      $doctor_podcasts =  $doctor->doctor_podcasts()->withAll();
      if($req->trash && $req->trash == 'with'){
        $doctor_podcasts =  $doctor_podcasts->withTrashed();
      }
      if($req->trash && $req->trash == 'only'){
        $doctor_podcasts =  $doctor_podcasts->onlyTrashed();
      }
      if($req->column && $req->column != null && $req->search != null){
          $doctor_podcasts = $doctor_podcasts->whereLike($req->column,$req->search);
        }
       else if($req->search && $req->search != null){

            $doctor_podcasts = $doctor_podcasts->whereLike(['name','description'],$req->search);
        }
      if($req->sort && $req->sort['field'] != null && $req->sort['type'] != null){
          $doctor_podcasts = $doctor_podcasts->OrderBy($req->sort['field'],$req->sort['type']);
      }
      else
      {
        $doctor_podcasts = $doctor_podcasts->OrderBy('id','desc');
      }
      if($export != null){ // for export do not paginate
        $doctor_podcasts = $doctor_podcasts->get();
        return $doctor_podcasts;
      }
      $totalDoctorCertifications = $doctor_podcasts->count();
      $doctor_podcasts = $doctor_podcasts->paginate($req->perPage);
      $doctor_podcasts = PodcastsResource::collection($doctor_podcasts)->response()->getData(true);

      return $doctor_podcasts;
    }
    $doctor_podcasts = PodcastsResource::collection($doctor->doctor_podcasts()->withAll()->orderBy('id','desc')->paginate(10))->response()->getData(true);
    return $doctor_podcasts;
  }

  /********* FETCH ALL DoctorPodcasts ***********/
    public function index()
    {
        $doctor_podcasts =  $this->getter();
        $response = generateResponse($doctor_podcasts,count($doctor_podcasts['data']) > 0 ? true:false,'DoctorPodcasts Fetched Successfully',null,'collection');
        return response()->json($response, 200);
    }

  /********* FILTER DoctorPodcasts FOR Search ***********/
   public function filter(Request $request){
     $doctor_podcasts = $this->getter($request);
     $response = generateResponse($doctor_podcasts,count($doctor_podcasts['data']) > 0 ? true:false,'Filter DoctorPodcasts Successfully',null,'collection');
     return response()->json($response, 200);
   }

    /********* ADD NEW DoctorPodcast ***********/
    public function store(CreateRequest $request)
    {
      $doctor = auth()->user()->doctor;
      try{
        DB::beginTransaction();
        $request->merge(['created_by_user_id'=>auth()->user()->id]);
        $data = $request->all();
        $data['image'] = uploadFile($request,'image','doctor_podcasts');
        $data['audio'] = uploadFile($request,'audio','doctor_podcasts');
        $data['video'] = uploadFile($request,'video','doctor_podcasts');
        $doctor_podcast = $doctor->doctor_podcasts()->create($data);
        $doctor_podcast->slug = Str::slug($doctor_podcast->name . ' ' . $doctor_podcast->id, '-');
        $doctor_podcast->save();
        $doctor_podcast->tags()->sync($request->tag_ids);
        DB::commit();
        $doctor_podcast = $doctor->doctor_podcasts()->withAll()->find($doctor_podcast->id);
        $doctor_podcast = new PodcastsResource($doctor_podcast);
      $response = generateResponse($doctor_podcast,true ,'DoctorPodcasts Created Successfully',null,'collection');
      return response()->json($response, 200);
    }
      catch (\Exception $e) {
        DB::rollBack();
        $response = generateResponse(null,false ,$e->getMessage(),null,'collection');
        return response()->json($response, 200);
     }
    }

    /********* View RECORD TO EDIT Or Display ***********/
    public function show(Podcast $doctor_podcast)
    {
        $doctor = auth()->user()->doctor;
        if($doctor_podcast->doctor_id != $doctor->id){
          $response = generateResponse(null,false ,'Not Found',null,'collection');
          return response()->json($response, 404);
        }
        $doctor_podcast = $doctor->doctor_podcasts()->withAll()->find($doctor_podcast->id);
        if($doctor_podcast){
          $doctor_podcast = new PodcastsResource($doctor_podcast);
          $response = generateResponse($doctor_podcast,true,'DoctorPodcast Fetched Successfully',null,'object');
        }
        else{
          $response = generateResponse(null,false,'DoctorPodcast Not Found',null,'object');
        }
        return response()->json($response, 200);
    }

    /********* UPDATE DoctorPodcast ***********/
    public function update(CreateRequest $request, Podcast $doctor_podcast)
    {
        // dd($request->all());
        $doctor = auth()->user()->doctor;
        if($doctor_podcast->doctor_id != $doctor->id){
          $response = generateResponse(null,false ,'Not Found',null,'collection');
          return response()->json($response, 404);
        }
      try{
        DB::beginTransaction();
        $request->merge(['last_updated_by_user_id'=>auth()->user()->id]);
        $data = $request->all();
        if ($request->image) {
            $data['image'] = uploadFile($request,'image','doctor_podcasts',$doctor_podcast->image);
        } else {
            $data['image'] = $doctor_podcast->image;
        }

        if ($request->audio) {
            $data['audio'] = uploadFile($request,'audio','doctor_podcasts');
        } else {
            $data['audio'] = $doctor_podcast->audio;
        }

        if ($request->video) {
            $data['video'] = uploadFile($request,'video','doctor_podcasts');
        } else {
            $data['video'] = $doctor_podcast->video;
        }
        $data['slug'] = Str::slug($data['name'] . ' ' . $doctor_podcast->id, '-');

        $doctor_podcast->update($data);
        $doctor_podcast->tags()->sync($request->tag_ids);
        DB::commit();
        $doctor_podcast = $doctor->doctor_podcasts()->withAll()->find($doctor_podcast->id);
        $doctor_podcast = new PodcastsResource($doctor_podcast);
        $response = generateResponse($doctor_podcast,true,'DoctorPodcast Updated Successfully',null,'object');
        return response()->json($response, 200);
      }
        catch (\Exception $e) {
          DB::rollBack();
          $response = generateResponse(null,false ,$e->getMessage(),null,'collection');
          return response()->json($response, 200);
       }
    }

    /********* UPDATE DoctorPodcast Status***********/
    public function updateStatus(Request $request,Podcast $doctor_podcast){
      try{
        $doctor = auth()->user()->doctor;
        if($doctor_podcast->doctor_id != $doctor->id){
          $response = generateResponse(null,false ,'Not Found',null,'collection');
          return response()->json($response, 404);
        }
        $doctor_podcast->update([
          'is_active' => $doctor_podcast->is_active == 1 ? 0:1
        ]);
        $response = generateResponse(null,true,'DoctorPodcast Status Updated Successfully',null,'object');
        return response()->json($response, 200);
      }
      catch (\Exception $e) {
        DB::rollBack();
        $response = generateResponse(null,false ,$e->getMessage(),null,'collection');
        return response()->json($response, 200);
     }
    }


    /********* DELETE DoctorPodcast ***********/
    public function destroy(Request $request,Podcast $doctor_podcast)
    {
      try{
        $doctor = auth()->user()->doctor;
        if($doctor_podcast->doctor_id != $doctor->id){
          $response = generateResponse(null,false ,'Not Found',null,'collection');
          return response()->json($response, 404);
        }
          if($doctor_podcast->trashed()) {
            $response = generateResponse(null,false ,'Already in Trash',null,'collection');
            return response()->json($response, 404);
          }
          else{
            $doctor_podcast->delete();
          }
          $response = generateResponse(null,true,'DoctorPodcast Deleted Successfully',null,'object');
          return response()->json($response, 200);

        } catch (\Exception $e) {
          DB::rollBack();
          $response = generateResponse(null,false ,$e->getMessage(),null,'collection');
          return response()->json($response, 200);
       }
    }
    /*********Permanently DELETE DoctorPodcast ***********/
    public function destroyPermanently(Request $request,$doctor_podcast)
    {
      try{
        $doctor= auth()->user()->doctor;
        $doctor_podcast = $doctor->doctor_podcasts()->withTrashed()->find($doctor_podcast);
        if($doctor_podcast){
            if($doctor_podcast->doctor_id != $doctor->id){
              $response = generateResponse(null,false ,'Not Found',null,'collection');
              return response()->json($response, 404);
            }
          if ($doctor_podcast->trashed()) {
            $doctor_podcast->forceDelete();
            $response = generateResponse(null,true,'DoctorPodcast Deleted Successfully',null,'object');
          }
          else{
            $response = generateResponse(null,false,'DoctorPodcast is not in trash to delete permanently',null,'object');
          }
        }
        else{
          $response = generateResponse(null,false,'DoctorPodcast not found',null,'object');
        }
          return response()->json($response, 200);

        } catch (\Exception $e) {
          DB::rollBack();
          $response = generateResponse(null,false ,$e->getMessage(),null,'collection');
          return response()->json($response, 200);
       }
    }
    /********* Restore DoctorPodcast ***********/
    public function restore(Request $request,$doctor_podcast)
    {
      $doctor= auth()->user()->doctor;
      $doctor_podcast = $doctor->doctor_podcasts()->withTrashed()->find($doctor_podcast);
          if ($doctor_podcast->trashed()) {
            $doctor_podcast->restore();
            $response = generateResponse(null,true,'DoctorPodcast Restored Successfully',null,'object');
          }
          else{
            $response = generateResponse(null,false,'DoctorPodcast is not trashed',null,'object');
          }
          return response()->json($response, 200);
    }
}
