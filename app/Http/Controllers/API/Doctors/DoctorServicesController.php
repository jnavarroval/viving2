<?php

namespace App\Http\Controllers\API\Doctors;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use App\Http\Requests\API\Doctors\DoctorServices\CreateRequest;
use App\Http\Resources\API\ServicesResource;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DoctorServicesController extends Controller
{
    /********* Initialize Permission based Middlewares  ***********/
  public function __construct()
  {
        $this->middleware(['api','auth:api','verified','api_setting']);
        $this->middleware('doctor.api');
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

    /********* ADD NEW DoctorService ***********/
    public function store(CreateRequest $request)
    {
        $settings = generalSettings();
      $doctor = auth()->user()->doctor;
      try{
        DB::beginTransaction();
        $request->merge(['created_by_user_id'=>auth()->user()->id]);
        $data = $request->all();
        $data['image'] = uploadFile($request,'image','doctor_services');
        $data['audio'] = uploadFile($request,'audio','doctor_services');
        $data['video'] = uploadFile($request,'video','doctor_services');
        $doctor_service = $doctor->doctor_services()->create($data);
        $doctor_service->slug = Str::slug($doctor_service->name . ' ' . $doctor_service->id, '-');
        if($settings['auto_approve_doctor_service'] == 1){
            $doctor_service->is_approved = 1;
            $doctor_service->approved_at = now();
          }
        $doctor_service->save();
        $doctor_service->tags()->sync($request->tag_ids);
        DB::commit();
        $doctor_service = $doctor->doctor_services()->withAll()->find($doctor_service->id);
        $doctor_service = new ServicesResource($doctor_service);
      $response = generateResponse($doctor_service,true ,'DoctorServices Created Successfully',null,'collection');
      return response()->json($response, 200);
    }
      catch (\Exception $e) {
        DB::rollBack();
        $response = generateResponse(null,false ,$e->getMessage(),null,'collection');
        return response()->json($response, 200);
     }
    }

    /********* View RECORD TO EDIT Or Display ***********/
    public function show(Service $doctor_service)
    {
        $doctor = auth()->user()->doctor;
        if($doctor_service->doctor_id != $doctor->id){
          $response = generateResponse(null,false ,'Not Found',null,'collection');
          return response()->json($response, 404);
        }
        $doctor_service = $doctor->doctor_services()->withAll()->find($doctor_service->id);
        if($doctor_service){
          $doctor_service = new ServicesResource($doctor_service);
          $response = generateResponse($doctor_service,true,'DoctorService Fetched Successfully',null,'object');
        }
        else{
          $response = generateResponse(null,false,'DoctorService Not Found',null,'object');
        }
        return response()->json($response, 200);
    }

    /********* UPDATE DoctorService ***********/
    public function update(CreateRequest $request, Service $doctor_service)
    {
        // dd($request->all());
        $doctor = auth()->user()->doctor;
        if($doctor_service->doctor_id != $doctor->id){
          $response = generateResponse(null,false ,'Not Found',null,'collection');
          return response()->json($response, 404);
        }
      try{
        DB::beginTransaction();
        $request->merge(['last_updated_by_user_id'=>auth()->user()->id]);
        $data = $request->all();
        if ($request->image) {
            $data['image'] = uploadFile($request,'image','doctor_services',$doctor_service->image);
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
        $data['slug'] = Str::slug($data['name'] . ' ' . $doctor_service->id, '-');

        $doctor_service->update($data);
        $doctor_service->tags()->sync($request->tag_ids);
        DB::commit();
        $doctor_service = $doctor->doctor_services()->withAll()->find($doctor_service->id);
        $doctor_service = new ServicesResource($doctor_service);
        $response = generateResponse($doctor_service,true,'DoctorService Updated Successfully',null,'object');
        return response()->json($response, 200);
      }
        catch (\Exception $e) {
          DB::rollBack();
          $response = generateResponse(null,false ,$e->getMessage(),null,'collection');
          return response()->json($response, 200);
       }
    }

    /********* UPDATE DoctorService Status***********/
    public function updateStatus(Request $request,Service $doctor_service){
      try{
        $doctor = auth()->user()->doctor;
        if($doctor_service->doctor_id != $doctor->id){
          $response = generateResponse(null,false ,'Not Found',null,'collection');
          return response()->json($response, 404);
        }
        $doctor_service->update([
          'is_active' => $doctor_service->is_active == 1 ? 0:1
        ]);
        $response = generateResponse(null,true,'DoctorService Status Updated Successfully',null,'object');
        return response()->json($response, 200);
      }
      catch (\Exception $e) {
        DB::rollBack();
        $response = generateResponse(null,false ,$e->getMessage(),null,'collection');
        return response()->json($response, 200);
     }
    }


    /********* DELETE DoctorService ***********/
    public function destroy(Request $request,Service $doctor_service)
    {
      try{
        $doctor = auth()->user()->doctor;
        if($doctor_service->doctor_id != $doctor->id){
          $response = generateResponse(null,false ,'Not Found',null,'collection');
          return response()->json($response, 404);
        }
          if($doctor_service->trashed()) {
            $response = generateResponse(null,false ,'Already in Trash',null,'collection');
            return response()->json($response, 404);
          }
          else{
            $doctor_service->delete();
          }
          $response = generateResponse(null,true,'DoctorService Deleted Successfully',null,'object');
          return response()->json($response, 200);

        } catch (\Exception $e) {
          DB::rollBack();
          $response = generateResponse(null,false ,$e->getMessage(),null,'collection');
          return response()->json($response, 200);
       }
    }
    /*********Permanently DELETE DoctorService ***********/
    public function destroyPermanently(Request $request,$doctor_service)
    {
      try{
        $doctor= auth()->user()->doctor;
        $doctor_service = $doctor->doctor_services()->withTrashed()->find($doctor_service);
        if($doctor_service){
            if($doctor_service->doctor_id != $doctor->id){
              $response = generateResponse(null,false ,'Not Found',null,'collection');
              return response()->json($response, 404);
            }
          if ($doctor_service->trashed()) {
            $doctor_service->forceDelete();
            $response = generateResponse(null,true,'DoctorService Deleted Successfully',null,'object');
          }
          else{
            $response = generateResponse(null,false,'DoctorService is not in trash to delete permanently',null,'object');
          }
        }
        else{
          $response = generateResponse(null,false,'DoctorService not found',null,'object');
        }
          return response()->json($response, 200);

        } catch (\Exception $e) {
          DB::rollBack();
          $response = generateResponse(null,false ,$e->getMessage(),null,'collection');
          return response()->json($response, 200);
       }
    }
    /********* Restore DoctorService ***********/
    public function restore(Request $request,$doctor_service)
    {
      $doctor= auth()->user()->doctor;
      $doctor_service = $doctor->doctor_services()->withTrashed()->find($doctor_service);
          if ($doctor_service->trashed()) {
            $doctor_service->restore();
            $response = generateResponse(null,true,'DoctorService Restored Successfully',null,'object');
          }
          else{
            $response = generateResponse(null,false,'DoctorService is not trashed',null,'object');
          }
          return response()->json($response, 200);
    }
}
