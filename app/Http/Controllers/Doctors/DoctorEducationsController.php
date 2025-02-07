<?php

namespace App\Http\Controllers\Doctors;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DoctorEducation;
use App\Http\Requests\Doctors\DoctorEducations\CreateRequest;
use App\Http\Requests\Doctors\DoctorEducations\UpdateRequest;
use App\Http\Resources\Web\DoctorEducationsResource;
use Excel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DoctorEducationsController extends Controller
{
    /********* Initialize Permission based Middlewares  ***********/
  public function __construct()
  {
      $this->middleware('auth');
      $this->middleware('doctor');
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
      $totalDoctorEducations = $doctor_educations->count();
      $doctor_educations = $doctor_educations->paginate($req->perPage);
      $doctor_educations = DoctorEducationsResource::collection($doctor_educations)->response()->getData(true);

      return $doctor_educations;
    }
    $doctor_educations = DoctorEducationsResource::collection($doctor->doctor_educations()->withAll()->orderBy('id','desc')->paginate(10))->response()->getData(true);
    return $doctor_educations;
  }

  /********* FETCH ALL DoctorEducations ***********/
    public function index()
    {
        $doctor_educations =  $this->getter();
        $response = generateResponse($doctor_educations,count($doctor_educations['data']) > 0 ? true:false,'Doctor Educations Fetched Successfully',null,'collection');
        return response()->json($response, 200);
    }

  /********* FILTER DoctorEducations FOR Search ***********/
   public function filter(Request $request){
     $doctor_educations = $this->getter($request);
     $response = generateResponse($doctor_educations,count($doctor_educations['data']) > 0 ? true:false,'Filter Doctor Educations Successfully',null,'collection');
     return response()->json($response, 200);
   }

    /********* ADD NEW DoctorEducation ***********/
    public function store(CreateRequest $request)
    {
        $doctor = auth()->user()->doctor;
        try{
            DB::beginTransaction();
            $request->merge(['doctor_id'=>auth()->user()->id]);
            $data = $request->all();
            $data['image'] = uploadFile($request,'file','doctor_educations');
      $doctor_education = $doctor->doctor_educations()->create($data);
      $doctor_education = $doctor->doctor_educations()->withAll()->find($doctor_education->id);
      $doctor_education = new DoctorEducationsResource($doctor_education);
      DB::commit();
    }
      catch (\Exception $e) {
        dd($e->getMessage(),$e->getTrace());
        DB::rollBack();
        request()->session()->flash('alert',['message' => 'Invalid Request','type' => 'error']);
     }
      return redirect()->back();
    }

    /********* View RECORD TO EDIT Or Display ***********/
    public function show( $doctor_education)
    {
        $doctor = auth()->user()->doctor;
        if($doctor_education->doctor_id != $doctor->id){
            return redirect()->back()->withErrors([
                'message' => 'Invalid Request',
                'type' => 'error'
            ]);
        }
        $doctor_education = $doctor->doctor_educations()->withAll()->find($doctor_education);
        if($doctor_education){
          $doctor_education = new DoctorEducationsResource($doctor_education);
          $response = generateResponse($doctor_education,true,'Doctor Education Fetched Successfully',null,'object');
        }
        else{
          $response = generateResponse(null,false,'Doctor Education Not FOund',null,'object');
        }
        return response()->json($response, 200);
    }

    /********* UPDATE DoctorEducation ***********/
    public function update(UpdateRequest $request, DoctorEducation $doctor_education)
    {
        // dd($request->all());
        $doctor = auth()->user()->doctor;
        if($doctor_education->doctor_id != $doctor->id){
            return redirect()->back()->withErrors([
                'message' => 'Invalid Request',
                'type' => 'error'
            ]);
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
      }
        catch (\Exception $e) {
          DB::rollBack();
          request()->session()->flash('alert',['message' => 'Invalid Request','type' => 'error']);
       }
       return redirect()->back();
    }

    /********* UPDATE DoctorEducation Status***********/
    public function updateStatus(Request $request,DoctorEducation $doctor_education){
        $doctor = auth()->user()->doctor;
        if($doctor_education->doctor_id != $doctor->id){
            return redirect()->back()->withErrors([
                'message' => 'Invalid Request',
                'type' => 'error'
            ]);
        }
        $doctor_education->update([
          'is_active' => $doctor_education->is_active == 1 ? 0:1
        ]);
        $response = generateResponse(null,true,'Doctor Education Status Updated Successfully',null,'object');
        return response()->json($response, 200);
    }


    /********* DELETE Doctor Education ***********/
    public function destroy(Request $request,DoctorEducation $doctor_education)
    {
        $doctor = auth()->user()->doctor;
        if($doctor_education->doctor_id != $doctor->id){
            request()->session()->flash('alert',['message' => 'Invalid Request','type' => 'error']);
            return redirect()->back();
        }
          if($doctor_education->trashed()) {
            request()->session()->flash('alert',['message' => 'Already in Trash','type' => 'error']);
          }
          else{
            $doctor_education->delete();
          }
          return redirect()->back();
    }
    /*********Permanently DELETE DoctorEducation ***********/
    public function destroyPermanently(Request $request,$doctor_education)
    {
        $doctor= auth()->user()->doctor;
        $doctor_education = $doctor->doctor_educations()->withTrashed()->find($doctor_education);
        if($doctor_education){
            if($doctor_education->doctor_id != $doctor->id){
                return redirect()->back()->withErrors([
                    'message' => 'Invalid Request',
                    'type' => 'error'
                ]);
            }
          if ($doctor_education->trashed()) {
            $doctor_education->forceDelete();
            $response = generateResponse(null,true,'DoctorE xperience Deleted Successfully',null,'object');
          }
          else{
            $response = generateResponse(null,false,'Doctor Education is not in trash to delete permanently',null,'object');
          }
        }
        else{
          $response = generateResponse(null,false,'DoctorEducation not found',null,'object');
        }
          return response()->json($response, 200);
    }
    /********* Restore Doctor Education ***********/
    public function restore(Request $request,$doctor_education)
    {
      $doctor= auth()->user()->doctor;
      $doctor_education = $doctor->doctor_educations()->withTrashed()->find($doctor_education);
          if ($doctor_education->trashed()) {
            $doctor_education->restore();
            $response = generateResponse(null,true,'Doctor Education Restored Successfully',null,'object');
          }
          else{
            $response = generateResponse(null,false,'Doctor Education is not trashed',null,'object');
          }
          return response()->json($response, 200);
    }
}
