<?php

namespace App\Http\Controllers\Doctors;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Podcast;
use App\Http\Requests\Doctors\DoctorPodcasts\CreateRequest;
use App\Http\Resources\Web\PodcastsResource;
use Excel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DoctorPodcastsController extends Controller
{
    /********* Initialize Permission based Middlewares  ***********/
  public function __construct()
  {
      $this->middleware('auth');
      $this->middleware('doctor');
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
      $totalDoctorPodcasts = $doctor_podcasts->count();
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
      $data['image'] = uploadCroppedFile($request,'image','doctor_podcasts');
      $data['audio'] = uploadFile($request,'audio','doctor_podcasts');
      $data['video'] = uploadFile($request,'video','doctor_podcasts');
      $doctor_podcast = $doctor->doctor_podcasts()->create($data);
      $doctor_podcast->slug = Str::slug($doctor_podcast->name . ' ' . $doctor_podcast->id, '-');
      $doctor_podcast->save();
      $doctor_podcast = $doctor->doctor_podcasts()->withAll()->find($doctor_podcast->id);
      $doctor_podcast = new PodcastsResource($doctor_podcast);
      $doctor_podcast->tags()->sync($request->tag_ids);
      DB::commit();
    }
      catch (\Exception $e) {
        DB::rollBack();
        request()->session()->flash('alert',['message' => 'Invalid Request','type' => 'error']);
     }
      return redirect()->back();
    }

    /********* View RECORD TO EDIT Or Display ***********/
    public function show( $doctor_podcast)
    {
        $doctor = auth()->user()->doctor;
        if($doctor_podcast->doctor_id != $doctor->id){
            return redirect()->back()->withErrors([
                'message' => 'Invalid Request',
                'type' => 'error'
            ]);
        }
        $doctor_podcast = $doctor->doctor_podcasts()->withAll()->find($doctor_podcast);
        if($doctor_podcast){
          $doctor_podcast = new PodcastsResource($doctor_podcast);
          $response = generateResponse($doctor_podcast,true,'DoctorPodcast Fetched Successfully',null,'object');
        }
        else{
          $response = generateResponse(null,false,'DoctorPodcast Not FOund',null,'object');
        }
        return response()->json($response, 200);
    }

    /********* UPDATE DoctorPodcast ***********/
    public function update(CreateRequest $request, Podcast $doctor_podcast)
    {
        // dd($request->all());
        $doctor = auth()->user()->doctor;
        if($doctor_podcast->doctor_id != $doctor->id){
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
            $data['image'] = uploadCroppedFile($request,'image','doctor_podcasts',$doctor_podcast->image);
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
        $doctor_podcast->update($data);
        $doctor_podcast = $doctor_podcast->find($doctor_podcast->id);
        $slug = Str::slug($doctor_podcast['name'] . ' ' . $doctor_podcast->id, '-');
        $doctor_podcast->update(
            [
                'slug' => $slug
            ]
        );
        $doctor_podcast->tags()->sync($request->tag_ids);
        DB::commit();
      }
        catch (\Exception $e) {
          DB::rollBack();
          request()->session()->flash('alert',['message' => 'Invalid Request','type' => 'error']);
       }
       return redirect()->back();
    }

    /********* UPDATE DoctorPodcast Status***********/
    public function updateStatus(Request $request,Podcast $doctor_podcast){
        $doctor = auth()->user()->doctor;
        if($doctor_podcast->doctor_id != $doctor->id){
            return redirect()->back()->withErrors([
                'message' => 'Invalid Request',
                'type' => 'error'
            ]);
        }
        $doctor_podcast->update([
          'is_active' => $doctor_podcast->is_active == 1 ? 0:1
        ]);
        $response = generateResponse(null,true,'DoctorPodcast Status Updated Successfully',null,'object');
        return response()->json($response, 200);
    }


    /********* DELETE DoctorPodcast ***********/
    public function destroy(Request $request,Podcast $doctor_podcast)
    {
        $doctor = auth()->user()->doctor;
        if($doctor_podcast->doctor_id != $doctor->id){
            request()->session()->flash('alert',['message' => 'Invalid Request','type' => 'error']);
            return redirect()->back();
        }
          if($doctor_podcast->trashed()) {
            request()->session()->flash('alert',['message' => 'Already in Trash','type' => 'error']);
          }
          else{
            $doctor_podcast->delete();
          }
          return redirect()->back();
    }
    /*********Permanently DELETE DoctorPodcast ***********/
    public function destroyPermanently(Request $request,$doctor_podcast)
    {
        $doctor= auth()->user()->doctor;
        $doctor_podcast = $doctor->doctor_podcasts()->withTrashed()->find($doctor_podcast);
        if($doctor_podcast){
            if($doctor_podcast->doctor_id != $doctor->id){
                return redirect()->back()->withErrors([
                    'message' => 'Invalid Request',
                    'type' => 'error'
                ]);
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
