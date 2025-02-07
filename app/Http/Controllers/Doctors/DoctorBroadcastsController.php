<?php

namespace App\Http\Controllers\Doctors;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Broadcast;
use App\Http\Requests\Doctors\DoctorBroadcasts\CreateRequest;
use App\Http\Resources\Web\BroadcastsResource;
use Excel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DoctorBroadcastsController extends Controller
{
    /********* Initialize Permission based Middlewares  ***********/
  public function __construct()
  {
      $this->middleware('auth');
      $this->middleware('doctor');
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
      $totalDoctorBroadcasts = $doctor_broadcasts->count();
      $doctor_broadcasts = $doctor_broadcasts->paginate($req->perPage);
      $doctor_broadcasts = BroadcastsResource::collection($doctor_broadcasts)->response()->getData(true);

      return $doctor_broadcasts;
    }
    $doctor_broadcasts = BroadcastsResource::collection($doctor->doctor_broadcasts()->withAll()->orderBy('id','desc')->paginate(10))->response()->getData(true);
    return $doctor_broadcasts;
  }

  /********* FETCH ALL DoctorBroadcasts ***********/
    public function index()
    {
        $doctor_broadcasts =  $this->getter();
        $response = generateResponse($doctor_broadcasts,count($doctor_broadcasts['data']) > 0 ? true:false,'DoctorBroadcasts Fetched Successfully',null,'collection');
        return response()->json($response, 200);
    }

  /********* FILTER DoctorBroadcasts FOR Search ***********/
   public function filter(Request $request){
     $doctor_broadcasts = $this->getter($request);
     $response = generateResponse($doctor_broadcasts,count($doctor_broadcasts['data']) > 0 ? true:false,'Filter DoctorBroadcasts Successfully',null,'collection');
     return response()->json($response, 200);
   }

    /********* ADD NEW DoctorBroadcast ***********/
    public function store(CreateRequest $request)
    {
      $doctor = auth()->user()->doctor;
      try{
      DB::beginTransaction();
      $request->merge(['created_by_user_id'=>auth()->user()->id]);
      $data = $request->all();
      $data['image'] = uploadCroppedFile($request,'image','doctor_broadcasts');
      $data['audio'] = uploadFile($request,'audio','doctor_broadcasts');
      $data['video'] = uploadFile($request,'video','doctor_broadcasts');
      $doctor_broadcast = $doctor->doctor_broadcasts()->create($data);
      $doctor_broadcast->slug = Str::slug($doctor_broadcast->name . ' ' . $doctor_broadcast->id, '-');
      $doctor_broadcast->save();
      $doctor_broadcast->tags()->sync($request->tag_ids);
      $doctor_broadcast = $doctor->doctor_broadcasts()->withAll()->find($doctor_broadcast->id);
      $doctor_broadcast = new BroadcastsResource($doctor_broadcast);
      DB::commit();
    }
      catch (\Exception $e) {
        dd($e->getMessage());
        DB::rollBack();
        request()->session()->flash('alert',['message' => 'Invalid Request','type' => 'error']);
     }
      return redirect()->back();
    }

    /********* View RECORD TO EDIT Or Display ***********/
    public function show( $doctor_broadcast)
    {
        $doctor = auth()->user()->doctor;
        if($doctor_broadcast->doctor_id != $doctor->id){
            return redirect()->back()->withErrors([
                'message' => 'Invalid Request',
                'type' => 'error'
            ]);
        }
        $doctor_broadcast = $doctor->doctor_broadcasts()->withAll()->find($doctor_broadcast);
        if($doctor_broadcast){
          $doctor_broadcast = new BroadcastsResource($doctor_broadcast);
          $response = generateResponse($doctor_broadcast,true,'DoctorBroadcast Fetched Successfully',null,'object');
        }
        else{
          $response = generateResponse(null,false,'DoctorBroadcast Not FOund',null,'object');
        }
        return response()->json($response, 200);
    }

    /********* UPDATE DoctorBroadcast ***********/
    public function update(CreateRequest $request, Broadcast $doctor_broadcast)
    {
        // dd($request->all());
        $doctor = auth()->user()->doctor;
        if($doctor_broadcast->doctor_id != $doctor->id){
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
            $data['image'] = uploadCroppedFile($request,'image','doctor_broadcasts',$doctor_broadcast->image);
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
        $doctor_broadcast->update($data);
        $doctor_broadcast = Broadcast::find($doctor_broadcast->id);
        $slug = Str::slug($doctor_broadcast->name . ' ' . $doctor_broadcast->id, '-');
        $doctor_broadcast->update([
            'slug' => $slug
        ]);
         $doctor_broadcast->tags()->sync($request->tag_ids);
        DB::commit();
      }
        catch (\Exception $e) {
          DB::rollBack();
          request()->session()->flash('alert',['message' => 'Invalid Request','type' => 'error']);
       }
       return redirect()->back();
    }

    /********* UPDATE DoctorBroadcast Status***********/
    public function updateStatus(Request $request,Broadcast $doctor_broadcast){
        $doctor = auth()->user()->doctor;
        if($doctor_broadcast->doctor_id != $doctor->id){
            return redirect()->back()->withErrors([
                'message' => 'Invalid Request',
                'type' => 'error'
            ]);
        }
        $doctor_broadcast->update([
          'is_active' => $doctor_broadcast->is_active == 1 ? 0:1
        ]);
        $response = generateResponse(null,true,'DoctorBroadcast Status Updated Successfully',null,'object');
        return response()->json($response, 200);
    }


    /********* DELETE DoctorBroadcast ***********/
    public function destroy(Request $request,Broadcast $doctor_broadcast)
    {
        $doctor = auth()->user()->doctor;
        if($doctor_broadcast->doctor_id != $doctor->id){
            request()->session()->flash('alert',['message' => 'Invalid Request','type' => 'error']);
            return redirect()->back();
        }
          if($doctor_broadcast->trashed()) {
            request()->session()->flash('alert',['message' => 'Already in Trash','type' => 'error']);
          }
          else{
            $doctor_broadcast->delete();
          }
          return redirect()->back();
    }
    /*********Permanently DELETE DoctorBroadcast ***********/
    public function destroyPermanently(Request $request,$doctor_broadcast)
    {
        $doctor= auth()->user()->doctor;
        $doctor_broadcast = $doctor->doctor_broadcasts()->withTrashed()->find($doctor_broadcast);
        if($doctor_broadcast){
            if($doctor_broadcast->doctor_id != $doctor->id){
                return redirect()->back()->withErrors([
                    'message' => 'Invalid Request',
                    'type' => 'error'
                ]);
            }
          if ($doctor_broadcast->trashed()) {
            $doctor_broadcast->forceDelete();
            $response = generateResponse(null,true,'DoctorBroadcast Deleted Successfully',null,'object');
          }
          else{
            $response = generateResponse(null,false,'DoctorBroadcast is not in trash to delete permanently',null,'object');
          }
        }
        else{
          $response = generateResponse(null,false,'DoctorBroadcast not found',null,'object');
        }
          return response()->json($response, 200);
    }
    /********* Restore DoctorBroadcast ***********/
    public function restore(Request $request,$doctor_broadcast)
    {
      $doctor= auth()->user()->doctor;
      $doctor_broadcast = $doctor->doctor_broadcasts()->withTrashed()->find($doctor_broadcast);
          if ($doctor_broadcast->trashed()) {
            $doctor_broadcast->restore();
            $response = generateResponse(null,true,'DoctorBroadcast Restored Successfully',null,'object');
          }
          else{
            $response = generateResponse(null,false,'DoctorBroadcast is not trashed',null,'object');
          }
          return response()->json($response, 200);
    }
}
