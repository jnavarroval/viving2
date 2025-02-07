<?php

namespace App\Http\Controllers\Clinics;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Podcast;
use App\Http\Requests\Clinics\ClinicPodcasts\CreateRequest;
use App\Http\Resources\Web\PodcastsResource;
use Excel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ClinicPodcastsController extends Controller
{
    /********* Initialize Permission based Middlewares  ***********/
  public function __construct()
  {
      $this->middleware('auth');
      $this->middleware('clinic');
      // $this->middleware('permission:clinic_podcasts.index');
      // $this->middleware('permission:clinic_podcasts.create',['only' => ['store']]);
      // $this->middleware('permission:clinic_podcasts.update',['only' => ['update']]);
      // $this->middleware('permission:clinic_podcasts.delete',['only' => ['destroy']]);
      // $this->middleware('permission:clinic_podcasts.export',['only' => ['export']]);
      // $this->middleware('permission:clinic_podcasts.import',['only' => ['import']])
      // $this->middleware('permission:clinic_podcasts.update|clinic_podcasts.is_active',['only' => ['updateStatus']]);
  }

  /********* Getter For Pagination, Searching And Sorting  ***********/
  public function getter($req = null,$export = null)
  {
    $clinic = auth()->user()->clinic;
    if($req != null){
      $clinic_podcasts =  $clinic->clinic_podcasts()->withAll();
      if($req->trash && $req->trash == 'with'){
        $clinic_podcasts =  $clinic_podcasts->withTrashed();
      }
      if($req->trash && $req->trash == 'only'){
        $clinic_podcasts =  $clinic_podcasts->onlyTrashed();
      }
      if($req->column && $req->column != null && $req->search != null){
          $clinic_podcasts = $clinic_podcasts->whereLike($req->column,$req->search);
        }
       else if($req->search && $req->search != null){

            $clinic_podcasts = $clinic_podcasts->whereLike(['name','description'],$req->search);
        }
      if($req->sort && $req->sort['field'] != null && $req->sort['type'] != null){
          $clinic_podcasts = $clinic_podcasts->OrderBy($req->sort['field'],$req->sort['type']);
      }
      else
      {
        $clinic_podcasts = $clinic_podcasts->OrderBy('id','desc');
      }
      if($export != null){ // for export do not paginate
        $clinic_podcasts = $clinic_podcasts->get();
        return $clinic_podcasts;
      }
      $totalClinicPodcasts = $clinic_podcasts->count();
      $clinic_podcasts = $clinic_podcasts->paginate($req->perPage);
      $clinic_podcasts = PodcastsResource::collection($clinic_podcasts)->response()->getData(true);

      return $clinic_podcasts;
    }
    $clinic_podcasts = PodcastsResource::collection($clinic->clinic_podcasts()->withAll()->orderBy('id','desc')->paginate(10))->response()->getData(true);
    return $clinic_podcasts;
  }

  /********* FETCH ALL ClinicPodcasts ***********/
    public function index()
    {
        $clinic_podcasts =  $this->getter();
        $response = generateResponse($clinic_podcasts,count($clinic_podcasts['data']) > 0 ? true:false,'ClinicPodcasts Fetched Successfully',null,'collection');
        return response()->json($response, 200);
    }

  /********* FILTER ClinicPodcasts FOR Search ***********/
   public function filter(Request $request){
     $clinic_podcasts = $this->getter($request);
     $response = generateResponse($clinic_podcasts,count($clinic_podcasts['data']) > 0 ? true:false,'Filter ClinicPodcasts Successfully',null,'collection');
     return response()->json($response, 200);
   }

    /********* ADD NEW ClinicPodcast ***********/
    public function store(CreateRequest $request)
    {
      $clinic = auth()->user()->clinic;
      try{
      DB::beginTransaction();
      $request->merge(['created_by_user_id'=>auth()->user()->id]);
      $data = $request->all();
      $data['image'] = uploadCroppedFile($request,'image','clinic_podcasts');
      $data['audio'] = uploadFile($request,'audio','clinic_podcasts');
      $data['video'] = uploadFile($request,'video','clinic_podcasts');
      $clinic_podcast = $clinic->clinic_podcasts()->create($data);
      $clinic_podcast->slug = Str::slug($clinic_podcast->name . ' ' . $clinic_podcast->id, '-');
      $clinic_podcast->save();
      $clinic_podcast = $clinic->clinic_podcasts()->withAll()->find($clinic_podcast->id);
      $clinic_podcast = new PodcastsResource($clinic_podcast);
      $clinic_podcast->tags()->sync($request->tag_ids);
      DB::commit();
    }
      catch (\Exception $e) {
        DB::rollBack();
        request()->session()->flash('alert',['message' => 'Invalid Request','type' => 'error']);
     }
      return redirect()->back();
    }

    /********* View RECORD TO EDIT Or Display ***********/
    public function show( $clinic_podcast)
    {
        $clinic = auth()->user()->clinic;
        if($clinic_podcast->clinic_id != $clinic->id){
            return redirect()->back()->withErrors([
                'message' => 'Invalid Request',
                'type' => 'error'
            ]);
        }
        $clinic_podcast = $clinic->clinic_podcasts()->withAll()->find($clinic_podcast);
        if($clinic_podcast){
          $clinic_podcast = new PodcastsResource($clinic_podcast);
          $response = generateResponse($clinic_podcast,true,'ClinicPodcast Fetched Successfully',null,'object');
        }
        else{
          $response = generateResponse(null,false,'ClinicPodcast Not FOund',null,'object');
        }
        return response()->json($response, 200);
    }

    /********* UPDATE ClinicPodcast ***********/
    public function update(CreateRequest $request, Podcast $clinic_podcast)
    {
        // dd($request->all());
        $clinic = auth()->user()->clinic;
        if($clinic_podcast->clinic_id != $clinic->id){
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
            $data['image'] = uploadCroppedFile($request,'image','clinic_podcasts',$clinic_podcast->image);
        } else {
            $data['image'] = $clinic_podcast->image;
        }

        if ($request->audio) {
            $data['audio'] = uploadFile($request,'audio','clinic_podcasts');
        } else {
            $data['audio'] = $clinic_podcast->audio;
        }

        if ($request->video) {
            $data['video'] = uploadFile($request,'video','clinic_podcasts');
        } else {
            $data['video'] = $clinic_podcast->video;
        }
        $clinic_podcast->update($data);
        $clinic_podcast = $clinic_podcast->find($clinic_podcast->id);
        $slug = Str::slug($clinic_podcast['name'] . ' ' . $clinic_podcast->id, '-');
        $clinic_podcast->update(
            [
                'slug' => $slug
            ]
        );
        $clinic_podcast->tags()->sync($request->tag_ids);
        DB::commit();
      }
        catch (\Exception $e) {
            dd($e->getMessage());
          DB::rollBack();
          request()->session()->flash('alert',['message' => 'Invalid Request','type' => 'error']);
       }
       return redirect()->back();
    }

    /********* UPDATE ClinicPodcast Status***********/
    public function updateStatus(Request $request,Podcast $clinic_podcast){
        $clinic = auth()->user()->clinic;
        if($clinic_podcast->clinic_id != $clinic->id){
            return redirect()->back()->withErrors([
                'message' => 'Invalid Request',
                'type' => 'error'
            ]);
        }
        $clinic_podcast->update([
          'is_active' => $clinic_podcast->is_active == 1 ? 0:1
        ]);
        $response = generateResponse(null,true,'ClinicPodcast Status Updated Successfully',null,'object');
        return response()->json($response, 200);
    }


    /********* DELETE ClinicPodcast ***********/
    public function destroy(Request $request,Podcast $clinic_podcast)
    {
        $clinic = auth()->user()->clinic;
        if($clinic_podcast->clinic_id != $clinic->id){
            request()->session()->flash('alert',['message' => 'Invalid Request','type' => 'error']);
            return redirect()->back();
        }
          if($clinic_podcast->trashed()) {
            request()->session()->flash('alert',['message' => 'Already in Trash','type' => 'error']);
          }
          else{
            $clinic_podcast->delete();
          }
          return redirect()->back();
    }
    /*********Permanently DELETE ClinicPodcast ***********/
    public function destroyPermanently(Request $request,$clinic_podcast)
    {
        $clinic= auth()->user()->clinic;
        $clinic_podcast = $clinic->clinic_podcasts()->withTrashed()->find($clinic_podcast);
        if($clinic_podcast){
            if($clinic_podcast->clinic_id != $clinic->id){
                return redirect()->back()->withErrors([
                    'message' => 'Invalid Request',
                    'type' => 'error'
                ]);
            }
          if ($clinic_podcast->trashed()) {
            $clinic_podcast->forceDelete();
            $response = generateResponse(null,true,'ClinicPodcast Deleted Successfully',null,'object');
          }
          else{
            $response = generateResponse(null,false,'ClinicPodcast is not in trash to delete permanently',null,'object');
          }
        }
        else{
          $response = generateResponse(null,false,'ClinicPodcast not found',null,'object');
        }
          return response()->json($response, 200);
    }
    /********* Restore ClinicPodcast ***********/
    public function restore(Request $request,$clinic_podcast)
    {
      $clinic= auth()->user()->clinic;
      $clinic_podcast = $clinic->clinic_podcasts()->withTrashed()->find($clinic_podcast);
          if ($clinic_podcast->trashed()) {
            $clinic_podcast->restore();
            $response = generateResponse(null,true,'ClinicPodcast Restored Successfully',null,'object');
          }
          else{
            $response = generateResponse(null,false,'ClinicPodcast is not trashed',null,'object');
          }
          return response()->json($response, 200);
    }
}
