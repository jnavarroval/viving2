<?php

namespace App\Http\Controllers\Clinics;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use App\Http\Requests\Clinics\ClinicServices\CreateRequest;
use App\Http\Resources\Web\ServicesResource;
use Excel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ClinicServicesController extends Controller
{
    /********* Initialize Permission based Middlewares  ***********/
  public function __construct()
  {
    //   $this->middleware('auth');
    //   $this->middleware('clinic');
      // $this->middleware('permission:clinic_services.index');
      // $this->middleware('permission:clinic_services.create',['only' => ['store']]);
      // $this->middleware('permission:clinic_services.update',['only' => ['update']]);
      // $this->middleware('permission:clinic_services.delete',['only' => ['destroy']]);
      // $this->middleware('permission:clinic_services.export',['only' => ['export']]);
      // $this->middleware('permission:clinic_services.import',['only' => ['import']])
      // $this->middleware('permission:clinic_services.update|clinic_services.is_active',['only' => ['updateStatus']]);
  }

  /********* Getter For Pagination, Searching And Sorting  ***********/
  public function getter($req = null,$export = null)
  {
    $clinic = auth()->user()->clinic;
    if($req != null){
      $clinic_services =  $clinic->clinic_services()->withAll();
      if($req->trash && $req->trash == 'with'){
        $clinic_services =  $clinic_services->withTrashed();
      }
      if($req->trash && $req->trash == 'only'){
        $clinic_services =  $clinic_services->onlyTrashed();
      }
      if($req->column && $req->column != null && $req->search != null){
          $clinic_services = $clinic_services->whereLike($req->column,$req->search);
        }
       else if($req->search && $req->search != null){

            $clinic_services = $clinic_services->whereLike(['name','description'],$req->search);
        }
      if($req->sort && $req->sort['field'] != null && $req->sort['type'] != null){
          $clinic_services = $clinic_services->OrderBy($req->sort['field'],$req->sort['type']);
      }
      else
      {
        $clinic_services = $clinic_services->OrderBy('id','desc');
      }
      if($export != null){ // for export do not paginate
        $clinic_services = $clinic_services->get();
        return $clinic_services;
      }
      $totalClinicServices = $clinic_services->count();
      $clinic_services = $clinic_services->paginate($req->perPage);
      $clinic_services = ServicesResource::collection($clinic_services)->response()->getData(true);

      return $clinic_services;
    }
    $clinic_services = ServicesResource::collection($clinic->clinic_services()->withAll()->orderBy('id','desc')->paginate(10))->response()->getData(true);
    return $clinic_services;
  }

  /********* FETCH ALL ClinicServices ***********/
    public function index()
    {
        $clinic_services =  $this->getter();
        $response = generateResponse($clinic_services,count($clinic_services['data']) > 0 ? true:false,'ClinicServices Fetched Successfully',null,'collection');
        return response()->json($response, 200);
    }

  /********* FILTER ClinicServices FOR Search ***********/
   public function filter(Request $request){
     $clinic_services = $this->getter($request);
     $response = generateResponse($clinic_services,count($clinic_services['data']) > 0 ? true:false,'Filter ClinicServices Successfully',null,'collection');
     return response()->json($response, 200);
   }

    /********* ADD NEW ClinicService ***********/
    public function store(CreateRequest $request)
    {
        $settings = generalSettings();
      $clinic = auth()->user()->clinic;
      try{
      DB::beginTransaction();
      $request->merge(['created_by_user_id'=>auth()->user()->id]);
      $data = $request->all();
      $data['image'] = uploadCroppedFile($request,'image','clinic_services');
      $data['audio'] = uploadFile($request,'audio','clinic_services');
      $data['video'] = uploadFile($request,'video','clinic_services');
      $clinic_service = $clinic->clinic_services()->create($data);
      $clinic_service->slug = Str::slug($clinic_service->name . ' ' . $clinic_service->id, '-');
      if((int)$settings['auto_approve_clinic_service']){
        $clinic_service->is_approved = 1;
        $clinic_service->approved_at = now();
      }
      $clinic_service->save();
      $clinic_service = $clinic->clinic_services()->withAll()->find($clinic_service->id);
      $clinic_service = new ServicesResource($clinic_service);
      $clinic_service->tags()->sync($request->tag_ids);
      if($request->faqs){
        $clinic_service->faqs()->createMany($request->faqs);
      }
      DB::commit();
    }
      catch (\Exception $e) {
        DB::rollBack();
        request()->session()->flash('alert',['message' => 'Invalid Request','type' => 'error']);
     }
      return redirect()->back();
    }

    /********* View RECORD TO EDIT Or Display ***********/
    public function show( $clinic_service)
    {
        $clinic = auth()->user()->clinic;
        if($clinic_service->clinic_id != $clinic->id){
            return redirect()->back()->withErrors([
                'message' => 'Invalid Request',
                'type' => 'error'
            ]);
        }
        $clinic_service = $clinic->clinic_services()->withAll()->find($clinic_service);
        if($clinic_service){
          $clinic_service = new ServicesResource($clinic_service);
          $response = generateResponse($clinic_service,true,'ClinicService Fetched Successfully',null,'object');
        }
        else{
          $response = generateResponse(null,false,'ClinicService Not FOund',null,'object');
        }
        return response()->json($response, 200);
    }

    /********* UPDATE ClinicService ***********/
    public function update(CreateRequest $request, Service $clinic_service)
    {
        // dd($request->all());
        $clinic = auth()->user()->clinic;
        if($clinic_service->clinic_id != $clinic->id){
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
            $data['image'] = uploadCroppedFile($request,'image','clinic_services',$clinic_service->image);
        } else {
            $data['image'] = $clinic_service->image;
        }

        if ($request->audio) {
            $data['audio'] = uploadFile($request,'audio','clinic_services');
        } else {
            $data['audio'] = $clinic_service->audio;
        }

        if ($request->video) {
            $data['video'] = uploadFile($request,'video','clinic_services');
        } else {
            $data['video'] = $clinic_service->video;
        }
        $clinic_service->update($data);
        $clinic_service = $clinic_service->find($clinic_service->id);
        $slug = Str::slug($clinic_service['name'] . ' ' . $clinic_service->id, '-');
        $clinic_service->update(
            [
                'slug' => $slug
            ]
        );
        $clinic_service->tags()->sync($request->tag_ids);
        if($request->faqs){
            $clinic_service->faqs()->delete();
            $clinic_service->faqs()->createMany($request->faqs);
          }
        DB::commit();
      }
        catch (\Exception $e) {
            dd($e->getMessage());
          DB::rollBack();
          request()->session()->flash('alert',['message' => 'Invalid Request','type' => 'error']);
       }
       return redirect()->back();
    }

    /********* UPDATE ClinicService Status***********/
    public function updateStatus(Request $request,Service $clinic_service){
        $clinic = auth()->user()->clinic;
        if($clinic_service->clinic_id != $clinic->id){
            return redirect()->back()->withErrors([
                'message' => 'Invalid Request',
                'type' => 'error'
            ]);
        }
        $clinic_service->update([
          'is_active' => $clinic_service->is_active == 1 ? 0:1
        ]);
        $response = generateResponse(null,true,'ClinicService Status Updated Successfully',null,'object');
        return response()->json($response, 200);
    }


    /********* DELETE ClinicService ***********/
    public function destroy(Request $request,Service $clinic_service)
    {
        $clinic = auth()->user()->clinic;
        if($clinic_service->clinic_id != $clinic->id){
            request()->session()->flash('alert',['message' => 'Invalid Request','type' => 'error']);
            return redirect()->back();
        }
          if($clinic_service->trashed()) {
            request()->session()->flash('alert',['message' => 'Already in Trash','type' => 'error']);
          }
          else{
            $clinic_service->delete();
          }
          return redirect()->back();
    }
    /*********Permanently DELETE ClinicService ***********/
    public function destroyPermanently(Request $request,$clinic_service)
    {
        $clinic= auth()->user()->clinic;
        $clinic_service = $clinic->clinic_services()->withTrashed()->find($clinic_service);
        if($clinic_service){
            if($clinic_service->clinic_id != $clinic->id){
                return redirect()->back()->withErrors([
                    'message' => 'Invalid Request',
                    'type' => 'error'
                ]);
            }
          if ($clinic_service->trashed()) {
            $clinic_service->forceDelete();
            $response = generateResponse(null,true,'ClinicService Deleted Successfully',null,'object');
          }
          else{
            $response = generateResponse(null,false,'ClinicService is not in trash to delete permanently',null,'object');
          }
        }
        else{
          $response = generateResponse(null,false,'ClinicService not found',null,'object');
        }
          return response()->json($response, 200);
    }
    /********* Restore ClinicService ***********/
    public function restore(Request $request,$clinic_service)
    {
      $clinic= auth()->user()->clinic;
      $clinic_service = $clinic->clinic_services()->withTrashed()->find($clinic_service);
          if ($clinic_service->trashed()) {
            $clinic_service->restore();
            $response = generateResponse(null,true,'ClinicService Restored Successfully',null,'object');
          }
          else{
            $response = generateResponse(null,false,'ClinicService is not trashed',null,'object');
          }
          return response()->json($response, 200);
    }
}
