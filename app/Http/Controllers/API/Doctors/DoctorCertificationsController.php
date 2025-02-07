<?php

namespace App\Http\Controllers\API\Doctors;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Certification;
use App\Http\Requests\API\Doctors\DoctorCertifications\CreateRequest;
use App\Http\Resources\API\CertificationsResource;
use Illuminate\Support\Facades\DB;

class DoctorCertificationsController extends Controller
{
    /********* Initialize Permission based Middlewares  ***********/
  public function __construct()
  {
        $this->middleware(['api','auth:api','verified','api_setting']);
        $this->middleware('doctor.api');
      // $this->middleware('permission:doctor_certifications.index');
      // $this->middleware('permission:doctor_certifications.create',['only' => ['store']]);
      // $this->middleware('permission:doctor_certifications.update',['only' => ['update']]);
      // $this->middleware('permission:doctor_certifications.delete',['only' => ['destroy']]);
      // $this->middleware('permission:doctor_certifications.export',['only' => ['export']]);
      // $this->middleware('permission:doctor_certifications.import',['only' => ['import']])
      // $this->middleware('permission:doctor_certifications.update|doctor_certifications.is_active',['only' => ['updateStatus']]);
  }

  /********* Getter For Pagination, Searching And Sorting  ***********/
  public function getter($req = null,$export = null)
  {
    $doctor = auth()->user()->doctor;
    if($req != null){
      $doctor_certifications =  $doctor->doctor_certifications()->withAll();
      if($req->trash && $req->trash == 'with'){
        $doctor_certifications =  $doctor_certifications->withTrashed();
      }
      if($req->trash && $req->trash == 'only'){
        $doctor_certifications =  $doctor_certifications->onlyTrashed();
      }
      if($req->column && $req->column != null && $req->search != null){
          $doctor_certifications = $doctor_certifications->whereLike($req->column,$req->search);
        }
       else if($req->search && $req->search != null){

            $doctor_certifications = $doctor_certifications->whereLike(['name','description'],$req->search);
        }
      if($req->sort && $req->sort['field'] != null && $req->sort['type'] != null){
          $doctor_certifications = $doctor_certifications->OrderBy($req->sort['field'],$req->sort['type']);
      }
      else
      {
        $doctor_certifications = $doctor_certifications->OrderBy('id','desc');
      }
      if($export != null){ // for export do not paginate
        $doctor_certifications = $doctor_certifications->get();
        return $doctor_certifications;
      }
      $totalDoctorCertifications = $doctor_certifications->count();
      $doctor_certifications = $doctor_certifications->paginate($req->perPage);
      $doctor_certifications = CertificationsResource::collection($doctor_certifications)->response()->getData(true);

      return $doctor_certifications;
    }
    $doctor_certifications = CertificationsResource::collection($doctor->doctor_certifications()->withAll()->orderBy('id','desc')->paginate(10))->response()->getData(true);
    return $doctor_certifications;
  }

  /********* FETCH ALL DoctorCertifications ***********/
    public function index()
    {
        $doctor_certifications =  $this->getter();
        $response = generateResponse($doctor_certifications,count($doctor_certifications['data']) > 0 ? true:false,'DoctorCertifications Fetched Successfully',null,'collection');
        return response()->json($response, 200);
    }

  /********* FILTER DoctorCertifications FOR Search ***********/
   public function filter(Request $request){
     $doctor_certifications = $this->getter($request);
     $response = generateResponse($doctor_certifications,count($doctor_certifications['data']) > 0 ? true:false,'Filter DoctorCertifications Successfully',null,'collection');
     return response()->json($response, 200);
   }

    /********* ADD NEW DoctorCertification ***********/
    public function store(CreateRequest $request)
    {
      $doctor = auth()->user()->doctor;
      try{
      DB::beginTransaction();
      $request->merge(['created_by_user_id'=>auth()->user()->id]);
      $data = $request->all();
      $data['image'] = uploadFile($request,'file','doctor_certifications');
      $doctor_certification = $doctor->doctor_certifications()->create($data);
      DB::commit();
      $doctor_certification = $doctor->doctor_certifications()->withAll()->find($doctor_certification->id);
      $doctor_certification = new CertificationsResource($doctor_certification);
      $response = generateResponse($doctor_certification,true ,'DoctorCertifications Created Successfully',null,'collection');
      return response()->json($response, 200);
    }
      catch (\Exception $e) {
        DB::rollBack();
        $response = generateResponse(null,false ,$e->getMessage(),null,'collection');
        return response()->json($response, 200);
     }
    }

    /********* View RECORD TO EDIT Or Display ***********/
    public function show(Certification $doctor_certification)
    {
        $doctor = auth()->user()->doctor;
        if($doctor_certification->doctor_id != $doctor->id){
          $response = generateResponse(null,false ,'Not Found',null,'collection');
          return response()->json($response, 404);
        }
        $doctor_certification = $doctor->doctor_certifications()->withAll()->find($doctor_certification->id);
        if($doctor_certification){
          $doctor_certification = new CertificationsResource($doctor_certification);
          $response = generateResponse($doctor_certification,true,'DoctorCertification Fetched Successfully',null,'object');
        }
        else{
          $response = generateResponse(null,false,'DoctorCertification Not Found',null,'object');
        }
        return response()->json($response, 200);
    }

    /********* UPDATE DoctorCertification ***********/
    public function update(CreateRequest $request, Certification $doctor_certification)
    {
        // dd($request->all());
        $doctor = auth()->user()->doctor;
        if($doctor_certification->doctor_id != $doctor->id){
          $response = generateResponse(null,false ,'Not Found',null,'collection');
          return response()->json($response, 404);
        }
      try{
        DB::beginTransaction();
        $request->merge(['last_updated_by_user_id'=>auth()->user()->id]);
        $data = $request->all();
        if ($request->file) {
            $data['image'] = uploadFile($request,'file','doctor_certifications',$doctor_certification->image);
        } else {
            $data['image'] = $doctor_certification->image;
        }
        $doctor_certification->update($data);
        DB::commit();
        $doctor_certification = $doctor->doctor_certifications()->withAll()->find($doctor_certification->id);
        $doctor_certification = new CertificationsResource($doctor_certification);
        $response = generateResponse($doctor_certification,true,'DoctorCertification Updated Successfully',null,'object');
        return response()->json($response, 200);
      }
        catch (\Exception $e) {
          DB::rollBack();
          $response = generateResponse(null,false ,$e->getMessage(),null,'collection');
          return response()->json($response, 200);
       }
    }

    /********* UPDATE DoctorCertification Status***********/
    public function updateStatus(Request $request,Certification $doctor_certification){
      try{
        $doctor = auth()->user()->doctor;
        if($doctor_certification->doctor_id != $doctor->id){
          $response = generateResponse(null,false ,'Not Found',null,'collection');
          return response()->json($response, 404);
        }
        $doctor_certification->update([
          'is_active' => $doctor_certification->is_active == 1 ? 0:1
        ]);
        $response = generateResponse(null,true,'DoctorCertification Status Updated Successfully',null,'object');
        return response()->json($response, 200);
      }
      catch (\Exception $e) {
        DB::rollBack();
        $response = generateResponse(null,false ,$e->getMessage(),null,'collection');
        return response()->json($response, 200);
     }
    }


    /********* DELETE DoctorCertification ***********/
    public function destroy(Request $request,Certification $doctor_certification)
    {
      try{
        $doctor = auth()->user()->doctor;
        if($doctor_certification->doctor_id != $doctor->id){
          $response = generateResponse(null,false ,'Not Found',null,'collection');
          return response()->json($response, 404);
        }
          if($doctor_certification->trashed()) {
            $response = generateResponse(null,false ,'Already in Trash',null,'collection');
            return response()->json($response, 404);
          }
          else{
            $doctor_certification->delete();
          }
          $response = generateResponse(null,true,'DoctorCertification Deleted Successfully',null,'object');
          return response()->json($response, 200);

        } catch (\Exception $e) {
          DB::rollBack();
          $response = generateResponse(null,false ,$e->getMessage(),null,'collection');
          return response()->json($response, 200);
       }
    }
    /*********Permanently DELETE DoctorCertification ***********/
    public function destroyPermanently(Request $request,$doctor_certification)
    {
      try{
        $doctor= auth()->user()->doctor;
        $doctor_certification = $doctor->doctor_certifications()->withTrashed()->find($doctor_certification);
        if($doctor_certification){
            if($doctor_certification->doctor_id != $doctor->id){
              $response = generateResponse(null,false ,'Not Found',null,'collection');
              return response()->json($response, 404);
            }
          if ($doctor_certification->trashed()) {
            $doctor_certification->forceDelete();
            $response = generateResponse(null,true,'DoctorCertification Deleted Successfully',null,'object');
          }
          else{
            $response = generateResponse(null,false,'DoctorCertification is not in trash to delete permanently',null,'object');
          }
        }
        else{
          $response = generateResponse(null,false,'DoctorCertification not found',null,'object');
        }
          return response()->json($response, 200);

        } catch (\Exception $e) {
          DB::rollBack();
          $response = generateResponse(null,false ,$e->getMessage(),null,'collection');
          return response()->json($response, 200);
       }
    }
    /********* Restore DoctorCertification ***********/
    public function restore(Request $request,$doctor_certification)
    {
      $doctor= auth()->user()->doctor;
      $doctor_certification = $doctor->doctor_certifications()->withTrashed()->find($doctor_certification);
          if ($doctor_certification->trashed()) {
            $doctor_certification->restore();
            $response = generateResponse(null,true,'DoctorCertification Restored Successfully',null,'object');
          }
          else{
            $response = generateResponse(null,false,'DoctorCertification is not trashed',null,'object');
          }
          return response()->json($response, 200);
    }
}
