<?php

namespace App\Http\Controllers\API\Doctors;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DoctorEducation;
use App\Http\Requests\API\Doctors\DoctorEducations\CreateRequest;
use App\Http\Requests\API\Doctors\DoctorEducations\UpdateRequest;
use App\Http\Resources\API\DoctorEducationsResource;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DoctorEducationsController extends Controller
{
    /********* Initialize Permission based Middlewares  ***********/
  public function __construct()
  {
        $this->middleware(['api','auth:api','verified','api_setting']);
        $this->middleware('doctor.api');
      // $this->middleware('permission:doctor_educations.index');
      // $this->middleware('permission:doctor_educations.create',['only' => ['store']]);
      // $this->middleware('permission:doctor_educations.update',['only' => ['update']]);
      // $this->middleware('permission:doctor_educations.delete',['only' => ['destroy']]);
      // $this->middleware('permission:doctor_educations.export',['only' => ['export']]);
      // $this->middleware('permission:doctor_educations.import',['only' => ['import']])
      // $this->middleware('permission:doctor_educations.update|doctor_educations.is_active',['only' => ['updateStatus']]);
  }

  /********* Getter For Pagination, Searching And Sorting  ***********/
  public function getter($req = null,$export = null)
  {
    $doctor = auth()->user()->doctor;
    if($req != null){
      $doctor_educations =  $doctor->doctor_educations()->withAll();
      if($req->trash && $req->trash == 'with'){
        $doctor_educations =  $doctor_educations->withTrashed();
      }
      if($req->trash && $req->trash == 'only'){
        $doctor_educations =  $doctor_educations->onlyTrashed();
      }
      if($req->column && $req->column != null && $req->search != null){
          $doctor_educations = $doctor_educations->whereLike($req->column,$req->search);
        }
       else if($req->search && $req->search != null){

            $doctor_educations = $doctor_educations->whereLike(['name','description'],$req->search);
        }
      if($req->sort && $req->sort['field'] != null && $req->sort['type'] != null){
          $doctor_educations = $doctor_educations->OrderBy($req->sort['field'],$req->sort['type']);
      }
      else
      {
        $doctor_educations = $doctor_educations->OrderBy('id','desc');
      }
      if($export != null){ // for export do not paginate
        $doctor_educations = $doctor_educations->get();
        return $doctor_educations;
      }
      $totalDoctorCertifications = $doctor_educations->count();
      $doctor_educations = $doctor_educations->paginate($req->perPage);
      $doctor_educations = DoctorEducationsResource::collection($doctor_educations)->response()->getData(true);

      return $doctor_educations;
    }
    $doctor_educations = DoctorEducationsResource::collection($doctor->doctor_educations()->withAll()->orderBy('id','desc')->paginate(10))->response()->getData(true);
    return $doctor_educations;
  }

  /********* FETCH ALL Doctor Educations ***********/
    public function index()
    {
        $doctor_educations =  $this->getter();
        $response = generateResponse($doctor_educations,count($doctor_educations['data']) > 0 ? true:false,'Doctor Educations Fetched Successfully',null,'collection');
        return response()->json($response, 200);
    }

  /********* FILTER Doctor Educations FOR Search ***********/
   public function filter(Request $request){
     $doctor_educations = $this->getter($request);
     $response = generateResponse($doctor_educations,count($doctor_educations['data']) > 0 ? true:false,'Filter Doctor Educations Successfully',null,'collection');
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
        $data['image'] = uploadFile($request,'file','doctor_educations');
        $doctor_education = $doctor->doctor_educations()->create($data);
        DB::commit();
        $doctor_education = $doctor->doctor_educations()->withAll()->find($doctor_education->id);
        $doctor_education = new DoctorEducationsResource($doctor_education);
      $response = generateResponse($doctor_education,true ,'Doctor Educations Created Successfully',null,'collection');
      return response()->json($response, 200);
    }
      catch (\Exception $e) {
        DB::rollBack();
        $response = generateResponse(null,false ,$e->getMessage(),null,'collection');
        return response()->json($response, 200);
     }
    }

    /********* View RECORD TO EDIT Or Display ***********/
    public function show(DoctorEducation $doctor_education)
    {
        $doctor = auth()->user()->doctor;
        if($doctor_education->doctor_id != $doctor->id){
          $response = generateResponse(null,false ,'Not Found',null,'collection');
          return response()->json($response, 404);
        }
        $doctor_education = $doctor->doctor_educations()->withAll()->find($doctor_education->id);
        if($doctor_education){
          $doctor_education = new DoctorEducationsResource($doctor_education);
          $response = generateResponse($doctor_education,true,'Doctor Experience Fetched Successfully',null,'object');
        }
        else{
          $response = generateResponse(null,false,'Doctor Experience Not Found',null,'object');
        }
        return response()->json($response, 200);
    }

    /********* UPDATE Doctor Experience ***********/
    public function update(UpdateRequest $request, DoctorEducation $doctor_education)
    {
        // dd($request->all());
        $doctor = auth()->user()->doctor;
        if($doctor_education->doctor_id != $doctor->id){
          $response = generateResponse(null,false ,'Not Found',null,'collection');
          return response()->json($response, 404);
        }
      try{
        DB::beginTransaction();
        $request->merge(['last_updated_by_user_id'=>auth()->user()->id]);
        $data = $request->all();
        if ($request->file) {
            $data['image'] = uploadFile($request,'file','doctor_educations',$doctor_education->image);
        } else {
            $data['image'] = $doctor_education->image;
        }
        $doctor_education->update($data);
        DB::commit();
        $doctor_education = $doctor->doctor_educations()->withAll()->find($doctor_education->id);
        $doctor_education = new DoctorEducationsResource($doctor_education);
        $response = generateResponse($doctor_education,true,'Doctor Experience Updated Successfully',null,'object');
        return response()->json($response, 200);
      }
        catch (\Exception $e) {
          DB::rollBack();
          $response = generateResponse(null,false ,$e->getMessage(),null,'collection');
          return response()->json($response, 200);
       }
    }

    /********* UPDATE Doctor Experience Status***********/
    public function updateStatus(Request $request,DoctorEducation $doctor_education){
      try{
        $doctor = auth()->user()->doctor;
        if($doctor_education->doctor_id != $doctor->id){
          $response = generateResponse(null,false ,'Not Found',null,'collection');
          return response()->json($response, 404);
        }
        $doctor_education->update([
          'is_active' => $doctor_education->is_active == 1 ? 0:1
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
    public function destroy(Request $request,DoctorEducation $doctor_education)
    {
      try{
        $doctor = auth()->user()->doctor;
        if($doctor_education->doctor_id != $doctor->id){
          $response = generateResponse(null,false ,'Not Found',null,'collection');
          return response()->json($response, 404);
        }
          if($doctor_education->trashed()) {
            $response = generateResponse(null,false ,'Already in Trash',null,'collection');
            return response()->json($response, 404);
          }
          else{
            $doctor_education->delete();
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
    public function destroyPermanently(Request $request,$doctor_education)
    {
      try{
        $doctor= auth()->user()->doctor;
        $doctor_education = $doctor->doctor_educations()->withTrashed()->find($doctor_education);
        if($doctor_education){
            if($doctor_education->doctor_id != $doctor->id){
              $response = generateResponse(null,false ,'Not Found',null,'collection');
              return response()->json($response, 404);
            }
          if ($doctor_education->trashed()) {
            $doctor_education->forceDelete();
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
    public function restore(Request $request,$doctor_education)
    {
      $doctor= auth()->user()->doctor;
      $doctor_education = $doctor->doctor_educations()->withTrashed()->find($doctor_education);
          if ($doctor_education->trashed()) {
            $doctor_education->restore();
            $response = generateResponse(null,true,'Doctor Experience Restored Successfully',null,'object');
          }
          else{
            $response = generateResponse(null,false,'Doctor Experience is not trashed',null,'object');
          }
          return response()->json($response, 200);
    }
}
