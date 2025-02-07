<?php

namespace App\Http\Controllers\Doctors;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use App\Http\Requests\Doctors\DoctorServices\CreateRequest;
use App\Http\Resources\Web\ServicesResource;
use Excel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DoctorServicesController extends Controller
{
    /********* Initialize Permission based Middlewares  ***********/
  public function __construct()
  {
    //   $this->middleware('auth');
    //   $this->middleware('doctor');
      // $this->middleware('permission:doctor_services.index');
      // $this->middleware('permission:doctor_services.create',['only' => ['store']]);
      // $this->middleware('permission:doctor_services.update',['only' => ['update']]);
      // $this->middleware('permission:doctor_services.delete',['only' => ['destroy']]);
      // $this->middleware('permission:doctor_services.export',['only' => ['export']]);
      // $this->middleware('permission:doctor_services.import',['only' => ['import']])
      // $this->middleware('permission:doctor_services.update|doctor_services.is_active',['only' => ['updateStatus']]);
  }

  /********* Getter For Pagination, Searching And Sorting  ***********/
  public function getter($req = null,$export = null)
  {
    $doctor = auth()->user()->doctor;
    if($req != null){
      $doctor_services =  $doctor->doctor_services()->withAll();
      if($req->trash && $req->trash == 'with'){
        $doctor_services =  $doctor_services->withTrashed();
      }
      if($req->trash && $req->trash == 'only'){
        $doctor_services =  $doctor_services->onlyTrashed();
      }
      if($req->column && $req->column != null && $req->search != null){
          $doctor_services = $doctor_services->whereLike($req->column,$req->search);
        }
       else if($req->search && $req->search != null){

            $doctor_services = $doctor_services->whereLike(['name','description'],$req->search);
        }
      if($req->sort && $req->sort['field'] != null && $req->sort['type'] != null){
          $doctor_services = $doctor_services->OrderBy($req->sort['field'],$req->sort['type']);
      }
      else
      {
        $doctor_services = $doctor_services->OrderBy('id','desc');
      }
      if($export != null){ // for export do not paginate
        $doctor_services = $doctor_services->get();
        return $doctor_services;
      }
      $totalDoctorServices = $doctor_services->count();
      $doctor_services = $doctor_services->paginate($req->perPage);
      $doctor_services = ServicesResource::collection($doctor_services)->response()->getData(true);

      return $doctor_services;
    }
    $doctor_services = ServicesResource::collection($doctor->doctor_services()->withAll()->orderBy('id','desc')->paginate(10))->response()->getData(true);
    return $doctor_services;
  }

  /********* FETCH ALL DoctorServices ***********/
    public function index()
    {
        $doctor_services =  $this->getter();
        $response = generateResponse($doctor_services,count($doctor_services['data']) > 0 ? true:false,'DoctorServices Fetched Successfully',null,'collection');
        return response()->json($response, 200);
    }

  /********* FILTER DoctorServices FOR Search ***********/
   public function filter(Request $request){
     $doctor_services = $this->getter($request);
     $response = generateResponse($doctor_services,count($doctor_services['data']) > 0 ? true:false,'Filter DoctorServices Successfully',null,'collection');
     return response()->json($response, 200);
   }

    /********* ADD NEW DoctorServices ***********/
    public function store(CreateRequest $request)
    {
        $settings = generalSettings();
      $doctor = auth()->user()->doctor;
      try{
      DB::beginTransaction();
      $request->merge(['created_by_user_id'=>auth()->user()->id]);
      $data = $request->all();
      $data['image'] = uploadCroppedFile($request,'image','doctor_services');
      $data['audio'] = uploadFile($request,'audio','doctor_services');
      $data['video'] = uploadFile($request,'video','doctor_services');
      $doctor_service = $doctor->doctor_services()->create($data);
      if((int)$settings['auto_approve_doctor_service']){
        $doctor_service->is_approved = 1;
        $doctor_service->approved_at = now();
      }
      $doctor_service->slug = Str::slug($doctor_service->name . ' ' . $doctor_service->id, '-');
      $doctor_service->save();
      $doctor_service = $doctor->doctor_services()->withAll()->find($doctor_service->id);
      $doctor_service = new ServicesResource($doctor_service);
      $doctor_service->tags()->sync($request->tag_ids);
      if($request->faqs){
        $doctor_service->faqs()->createMany($request->faqs);
      }
      DB::commit();
    }
      catch (\Exception $e) {
        DB::rollBack();
        request()->session()->flash('alert',['message' => $e->getMessage(),'type' => 'error']);
     }
      return redirect()->back();
    }

    /********* View RECORD TO EDIT Or Display ***********/
    public function show( $doctor_service)
    {
        $doctor = auth()->user()->doctor;
        if($doctor_service->doctor_id != $doctor->id){
            return redirect()->back()->withErrors([
                'message' => 'Invalid Request',
                'type' => 'error'
            ]);
        }
        $doctor_service = $doctor->doctor_services()->withAll()->find($doctor_service);
        if($doctor_service){
          $doctor_service = new ServicesResource($doctor_service);
          $response = generateResponse($doctor_service,true,'DoctorServices Fetched Successfully',null,'object');
        }
        else{
          $response = generateResponse(null,false,'DoctorServices Not FOund',null,'object');
        }
        return response()->json($response, 200);
    }

    /********* UPDATE DoctorServices ***********/
    public function update(CreateRequest $request, Service $doctor_service)
    {
        // dd($request->all());
        $doctor = auth()->user()->doctor;
        if($doctor_service->doctor_id != $doctor->id){
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
            $data['image'] = uploadCroppedFile($request,'image','doctor_services',$doctor_service->image);
        } else {
            $data['image'] = $doctor_service->image;
        }

        if ($request->audio) {
            $data['audio'] = uploadFile($request,'audio','doctor_services');
        } else {
            $data['audio'] = $doctor_service->audio;
        }

        if ($request->video) {
            $data['video'] = uploadFile($request,'video','doctor_services');
        } else {
            $data['video'] = $doctor_service->video;
        }
        $doctor_service->update($data);
        $doctor_service = $doctor_service->find($doctor_service->id);
        $slug = Str::slug($doctor_service['name'] . ' ' . $doctor_service->id, '-');
        $doctor_service->update(
            [
                'slug' => $slug
            ]
        );
        $doctor_service->tags()->sync($request->tag_ids);
        if($request->faqs){
            $doctor_service->faqs()->delete();
            $doctor_service->faqs()->createMany($request->faqs);
          }
        DB::commit();
      }
        catch (\Exception $e) {
          DB::rollBack();
          request()->session()->flash('alert',['message' => 'Invalid Request','type' => 'error']);
       }
       return redirect()->back();
    }

    /********* UPDATE DoctorServices Status***********/
    public function updateStatus(Request $request,Service $doctor_service){
        $doctor = auth()->user()->doctor;
        if($doctor_service->doctor_id != $doctor->id){
            return redirect()->back()->withErrors([
                'message' => 'Invalid Request',
                'type' => 'error'
            ]);
        }
        $doctor_service->update([
          'is_active' => $doctor_service->is_active == 1 ? 0:1
        ]);
        $response = generateResponse(null,true,'DoctorServices Status Updated Successfully',null,'object');
        return response()->json($response, 200);
    }


    /********* DELETE DoctorServices ***********/
    public function destroy(Request $request,Service $doctor_service)
    {
        $doctor = auth()->user()->doctor;
        if($doctor_service->doctor_id != $doctor->id){
            request()->session()->flash('alert',['message' => 'Invalid Request','type' => 'error']);
            return redirect()->back();
        }
          if($doctor_service->trashed()) {
            request()->session()->flash('alert',['message' => 'Already in Trash','type' => 'error']);
          }
          else{
            $doctor_service->delete();
          }
          return redirect()->back();
    }
    /*********Permanently DELETE DoctorServices ***********/
    public function destroyPermanently(Request $request,$doctor_service)
    {
        $doctor= auth()->user()->doctor;
        $doctor_service = $doctor->doctor_services()->withTrashed()->find($doctor_service);
        if($doctor_service){
            if($doctor_service->doctor_id != $doctor->id){
                return redirect()->back()->withErrors([
                    'message' => 'Invalid Request',
                    'type' => 'error'
                ]);
            }
          if ($doctor_service->trashed()) {
            $doctor_service->forceDelete();
            $response = generateResponse(null,true,'DoctorServices Deleted Successfully',null,'object');
          }
          else{
            $response = generateResponse(null,false,'DoctorServices is not in trash to delete permanently',null,'object');
          }
        }
        else{
          $response = generateResponse(null,false,'DoctorServices not found',null,'object');
        }
          return response()->json($response, 200);
    }
    /********* Restore DoctorServices ***********/
    public function restore(Request $request,$doctor_service)
    {
      $doctor= auth()->user()->doctor;
      $doctor_service = $doctor->doctor_services()->withTrashed()->find($doctor_service);
          if ($doctor_service->trashed()) {
            $doctor_service->restore();
            $response = generateResponse(null,true,'DoctorServices Restored Successfully',null,'object');
          }
          else{
            $response = generateResponse(null,false,'DoctorServices is not trashed',null,'object');
          }
          return response()->json($response, 200);
    }
}
