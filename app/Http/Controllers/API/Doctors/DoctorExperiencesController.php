<?php

namespace App\Http\Controllers\API\Doctors;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DoctorExperience;
use App\Http\Requests\API\Doctors\DoctorExperiences\CreateRequest;
use App\Http\Resources\API\DoctorExperiencesResource;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DoctorExperiencesController extends Controller
{
    /********* Initialize Permission based Middlewares  ***********/
  public function __construct()
  {
        $this->middleware(['api','auth:api','verified','api_setting']);
        $this->middleware('doctor.api');
      // $this->middleware('permission:doctor_experiences.index');
      // $this->middleware('permission:doctor_experiences.create',['only' => ['store']]);
      // $this->middleware('permission:doctor_experiences.update',['only' => ['update']]);
      // $this->middleware('permission:doctor_experiences.delete',['only' => ['destroy']]);
      // $this->middleware('permission:doctor_experiences.export',['only' => ['export']]);
      // $this->middleware('permission:doctor_experiences.import',['only' => ['import']])
      // $this->middleware('permission:doctor_experiences.update|doctor_experiences.is_active',['only' => ['updateStatus']]);
  }

  /********* Getter For Pagination, Searching And Sorting  ***********/
  public function getter($req = null,$export = null)
  {
    $doctor = auth()->user()->doctor;
    if($req != null){
      $doctor_experiences =  $doctor->doctor_experiences()->withAll();
      if($req->trash && $req->trash == 'with'){
        $doctor_experiences =  $doctor_experiences->withTrashed();
      }
      if($req->trash && $req->trash == 'only'){
        $doctor_experiences =  $doctor_experiences->onlyTrashed();
      }
      if($req->column && $req->column != null && $req->search != null){
          $doctor_experiences = $doctor_experiences->whereLike($req->column,$req->search);
        }
       else if($req->search && $req->search != null){

            $doctor_experiences = $doctor_experiences->whereLike(['name','description'],$req->search);
        }
      if($req->sort && $req->sort['field'] != null && $req->sort['type'] != null){
          $doctor_experiences = $doctor_experiences->OrderBy($req->sort['field'],$req->sort['type']);
      }
      else
      {
        $doctor_experiences = $doctor_experiences->OrderBy('id','desc');
      }
      if($export != null){ // for export do not paginate
        $doctor_experiences = $doctor_experiences->get();
        return $doctor_experiences;
      }
      $totalDoctorCertifications = $doctor_experiences->count();
      $doctor_experiences = $doctor_experiences->paginate($req->perPage);
      $doctor_experiences = DoctorExperiencesResource::collection($doctor_experiences)->response()->getData(true);

      return $doctor_experiences;
    }
    $doctor_experiences = DoctorExperiencesResource::collection($doctor->doctor_experiences()->withAll()->orderBy('id','desc')->paginate(10))->response()->getData(true);
    return $doctor_experiences;
  }

  /********* FETCH ALL Doctor Experiences ***********/
    public function index()
    {
        $doctor_experiences =  $this->getter();
        $response = generateResponse($doctor_experiences,count($doctor_experiences['data']) > 0 ? true:false,'Doctor Experiences Fetched Successfully',null,'collection');
        return response()->json($response, 200);
    }

  /********* FILTER Doctor Experiences FOR Search ***********/
   public function filter(Request $request){
     $doctor_experiences = $this->getter($request);
     $response = generateResponse($doctor_experiences,count($doctor_experiences['data']) > 0 ? true:false,'Filter Doctor Experiences Successfully',null,'collection');
     return response()->json($response, 200);
   }

    /********* ADD NEW Doctor Experience ***********/
    public function store(CreateRequest $request)
    {
      $doctor = auth()->user()->doctor;
      try{
        DB::beginTransaction();
        $request->merge(['doctor_id'=>auth()->user()->id]);
        $data = $request->all();
        $data['image'] = uploadFile($request,'file','doctor_experiences');
        $doctor_experience = $doctor->doctor_experiences()->create($data);
        DB::commit();
        $doctor_experience = $doctor->doctor_experiences()->withAll()->find($doctor_experience->id);
        $doctor_experience = new DoctorExperiencesResource($doctor_experience);
      $response = generateResponse($doctor_experience,true ,'Doctor Experiences Created Successfully',null,'collection');
      return response()->json($response, 200);
    }
      catch (\Exception $e) {
        DB::rollBack();
        $response = generateResponse(null,false ,$e->getMessage(),null,'collection');
        return response()->json($response, 200);
     }
    }

    /********* View RECORD TO EDIT Or Display ***********/
    public function show(DoctorExperience $doctor_experience)
    {
        $doctor = auth()->user()->doctor;
        if($doctor_experience->doctor_id != $doctor->id){
          $response = generateResponse(null,false ,'Not Found',null,'collection');
          return response()->json($response, 404);
        }
        $doctor_experience = $doctor->doctor_experiences()->withAll()->find($doctor_experience->id);
        if($doctor_experience){
          $doctor_experience = new DoctorExperiencesResource($doctor_experience);
          $response = generateResponse($doctor_experience,true,'Doctor Experience Fetched Successfully',null,'object');
        }
        else{
          $response = generateResponse(null,false,'Doctor Experience Not Found',null,'object');
        }
        return response()->json($response, 200);
    }

    /********* UPDATE Doctor Experience ***********/
    public function update(CreateRequest $request, DoctorExperience $doctor_experience)
    {
        // dd($request->all());
        $doctor = auth()->user()->doctor;
        if($doctor_experience->doctor_id != $doctor->id){
          $response = generateResponse(null,false ,'Not Found',null,'collection');
          return response()->json($response, 404);
        }
      try{
        DB::beginTransaction();
        $request->merge(['last_updated_by_user_id'=>auth()->user()->id]);
        $data = $request->all();
        if ($request->file) {
            $data['image'] = uploadFile($request,'file','doctor_experiences',$doctor_experience->image);
        } else {
            $data['image'] = $doctor_experience->image;
        }
        $doctor_experience->update($data);
        DB::commit();
        $doctor_experience = $doctor->doctor_experiences()->withAll()->find($doctor_experience->id);
        $doctor_experience = new DoctorExperiencesResource($doctor_experience);
        $response = generateResponse($doctor_experience,true,'Doctor Experience Updated Successfully',null,'object');
        return response()->json($response, 200);
      }
        catch (\Exception $e) {
          DB::rollBack();
          $response = generateResponse(null,false ,$e->getMessage(),null,'collection');
          return response()->json($response, 200);
       }
    }

    /********* UPDATE Doctor Experience Status***********/
    public function updateStatus(Request $request,DoctorExperience $doctor_experience){
      try{
        $doctor = auth()->user()->doctor;
        if($doctor_experience->doctor_id != $doctor->id){
          $response = generateResponse(null,false ,'Not Found',null,'collection');
          return response()->json($response, 404);
        }
        $doctor_experience->update([
          'is_active' => $doctor_experience->is_active == 1 ? 0:1
        ]);
        $response = generateResponse(null,true,'Doctor Experience Status Updated Successfully',null,'object');
        return response()->json($response, 200);
      }
      catch (\Exception $e) {
        DB::rollBack();
        $response = generateResponse(null,false ,$e->getMessage(),null,'collection');
        return response()->json($response, 200);
     }
    }


    /********* DELETE Doctor Experience ***********/
    public function destroy(Request $request,DoctorExperience $doctor_experience)
    {
      try{
        $doctor = auth()->user()->doctor;
        if($doctor_experience->doctor_id != $doctor->id){
          $response = generateResponse(null,false ,'Not Found',null,'collection');
          return response()->json($response, 404);
        }
          if($doctor_experience->trashed()) {
            $response = generateResponse(null,false ,'Already in Trash',null,'collection');
            return response()->json($response, 404);
          }
          else{
            $doctor_experience->delete();
          }
          $response = generateResponse(null,true,'Doctor Experience Deleted Successfully',null,'object');
          return response()->json($response, 200);

        } catch (\Exception $e) {
          DB::rollBack();
          $response = generateResponse(null,false ,$e->getMessage(),null,'collection');
          return response()->json($response, 200);
       }
    }
    /*********Permanently DELETE Doctor Experience ***********/
    public function destroyPermanently(Request $request,$doctor_experience)
    {
      try{
        $doctor= auth()->user()->doctor;
        $doctor_experience = $doctor->doctor_experiences()->withTrashed()->find($doctor_experience);
        if($doctor_experience){
            if($doctor_experience->doctor_id != $doctor->id){
              $response = generateResponse(null,false ,'Not Found',null,'collection');
              return response()->json($response, 404);
            }
          if ($doctor_experience->trashed()) {
            $doctor_experience->forceDelete();
            $response = generateResponse(null,true,'Doctor Experience Deleted Successfully',null,'object');
          }
          else{
            $response = generateResponse(null,false,'Doctor Experience is not in trash to delete permanently',null,'object');
          }
        }
        else{
          $response = generateResponse(null,false,'Doctor Experience not found',null,'object');
        }
          return response()->json($response, 200);

        } catch (\Exception $e) {
          DB::rollBack();
          $response = generateResponse(null,false ,$e->getMessage(),null,'collection');
          return response()->json($response, 200);
       }
    }
    /********* Restore Doctor Experience ***********/
    public function restore(Request $request,$doctor_experience)
    {
      $doctor= auth()->user()->doctor;
      $doctor_experience = $doctor->doctor_experiences()->withTrashed()->find($doctor_experience);
          if ($doctor_experience->trashed()) {
            $doctor_experience->restore();
            $response = generateResponse(null,true,'Doctor Experience Restored Successfully',null,'object');
          }
          else{
            $response = generateResponse(null,false,'Doctor Experience is not trashed',null,'object');
          }
          return response()->json($response, 200);
    }
}
