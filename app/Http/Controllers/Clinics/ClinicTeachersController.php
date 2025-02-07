<?php

namespace App\Http\Controllers\Clinics;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\User;
use App\Http\Requests\Clinics\ClinicDoctors\CreateRequest;
use App\Http\Requests\Clinics\ClinicDoctors\UpdateRequest;
use App\Http\Resources\Web\DoctorsResource;
use App\Notifications\Auth\DoctorCredentialsNotification;
use Excel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class ClinicDoctorsController extends Controller
{
    /********* Initialize Permission based Middlewares  ***********/
  public function __construct()
  {
      $this->middleware('auth');
      $this->middleware('clinic');

      // $this->middleware('permission:clinic_doctors.index');
      // $this->middleware('permission:clinic_doctors.create',['only' => ['store']]);
      // $this->middleware('permission:clinic_doctors.update',['only' => ['update']]);
      // $this->middleware('permission:clinic_doctors.delete',['only' => ['destroy']]);
      // $this->middleware('permission:clinic_doctors.export',['only' => ['export']]);
      // $this->middleware('permission:clinic_doctors.import',['only' => ['import']])
      // $this->middleware('permission:clinic_doctors.update|clinic_doctors.is_active',['only' => ['updateStatus']]);
  }

  /********* Getter For Pagination, Searching And Sorting  ***********/
  public function getter($req = null,$export = null)
  {
    $clinic = auth()->user()->clinic;
    if($req != null){
      $clinic_doctors =  $clinic->clinic_doctors()->withAll();
      if($req->trash && $req->trash == 'with'){
        $clinic_doctors =  $clinic_doctors->withTrashed();
      }
      if($req->trash && $req->trash == 'only'){
        $clinic_doctors =  $clinic_doctors->onlyTrashed();
      }
      if($req->column && $req->column != null && $req->search != null){
          $clinic_doctors = $clinic_doctors->whereLike($req->column,$req->search);
        }
       else if($req->search && $req->search != null){

            $clinic_doctors = $clinic_doctors->whereLike(['first_name','description'],$req->search);
        }
      if($req->sort && $req->sort['field'] != null && $req->sort['type'] != null){
          $clinic_doctors = $clinic_doctors->OrderBy($req->sort['field'],$req->sort['type']);
      }
      else
      {
        $clinic_doctors = $clinic_doctors->OrderBy('id','desc');
      }
      if($export != null){ // for export do not paginate
        $clinic_doctors = $clinic_doctors->get();
        return $clinic_doctors;
      }
      $totalClinicDoctors = $clinic_doctors->count();
      $clinic_doctors = $clinic_doctors->paginate($req->perPage);
      $clinic_doctors = DoctorsResource::collection($clinic_doctors)->response()->getData(true);

      return $clinic_doctors;
    }
    $clinic_doctors = DoctorsResource::collection($clinic->clinic_doctors()->withAll()->orderBy('id','desc')->paginate(10))->response()->getData(true);
    return $clinic_doctors;
  }

  /********* FETCH ALL ClinicDoctors ***********/
    public function index()
    {
        $clinic_doctors =  $this->getter();
        $response = generateResponse($clinic_doctors,count($clinic_doctors['data']) > 0 ? true:false,'Clinic Doctors Fetched Successfully',null,'collection');
        return response()->json($response, 200);
    }

  /********* FILTER ClinicDoctors FOR Search ***********/
   public function filter(Request $request){
     $clinic_doctors = $this->getter($request);
     $response = generateResponse($clinic_doctors,count($clinic_doctors['data']) > 0 ? true:false,'Filter Clinic Doctors Successfully',null,'collection');
     return response()->json($response, 200);
   }

    /********* ADD NEW ClinicDoctor ***********/
    public function store(CreateRequest $request)
    {
      $clinic = auth()->user()->clinic;
      try{
    //   DB::beginTransaction();
      $data = $request->all();
        $data['name'] = $data['first_name'] . ' ' . $data['last_name'];
        $data['password'] = Hash::make($request->password);
        $data['email'] = $request->email;
        $user = User::create($data);

        $user->roles()->attach(['doctor']);
        $pricing_plan = getDoctorDefaultPricingPlan();
        if ($request->image) {
            $data['image'] = uploadCroppedFile($request,'image','clinic_doctors');
        }

        $doctor = $user->doctor()->create([
            'pricing_plan_id' => $pricing_plan->id ?? null,
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'is_active' => $request['is_active'],
            'experience' => $request['experience'],
            'speciality' => $request['speciality'],
            'clinic_id' => $clinic->id,
            'user_name' => $request->user_name,
            'image' =>$data['image'] ?? null,
            'zip_code' => $data['zip_code'] ?? null
        ]);
        $doctor->doctor_categories()->attach($request->doctor_categories);
        $user->sendEmailVerificationNotification();
        $user->notify(new DoctorCredentialsNotification($user,$request->password));
      $clinic_doctor = $clinic->clinic_doctors()->withAll()->find($clinic->id);
      $clinic_doctor = new DoctorsResource($clinic_doctor);
    //   DB::commit();
    }
      catch (\Exception $e) {
        // DB::rollBack();
        // request()->session()->flash('alert',['message' => 'Invalid Request','type' => 'error']);
     }
      return redirect()->back();
    }

    /********* View RECORD TO EDIT Or Display ***********/
    public function show( $clinic_doctor)
    {
        $clinic = auth()->user()->clinic;
        if($clinic_doctor->clinic_id != $clinic->id){
            return redirect()->back()->withErrors([
                'message' => 'Invalid Request',
                'type' => 'error'
            ]);
        }
        $clinic_doctor = $clinic->clinic_doctors()->withAll()->find($clinic_doctor);
        if($clinic_doctor){
          $clinic_doctor = new DoctorsResource($clinic_doctor);
          $response = generateResponse($clinic_doctor,true,'Clinic Doctor Fetched Successfully',null,'object');
        }
        else{
          $response = generateResponse(null,false,'Clinic Doctor Not FOund',null,'object');
        }
        return response()->json($response, 200);
    }

    /********* UPDATE Clinic Doctor ***********/
    public function update(UpdateRequest $request, Doctor $clinic_doctor)
    {
        // dd($request->all());
        $clinic = auth()->user()->clinic;
        if($clinic_doctor->clinic_id != $clinic->id){
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
            $data['image'] = uploadCroppedFile($request,'image','clinic_doctors',$clinic_doctor->image);
        } else {
            $data['image'] = $clinic_doctor->image;
        }
        $clinic_doctor->update($data);
        $clinic_doctor->doctor_categories()->sync($request->doctor_categories);

        DB::commit();
      }
        catch (\Exception $e) {
          DB::rollBack();
          request()->session()->flash('alert',['message' => 'Invalid Request','type' => 'error']);
       }
       return redirect()->back();
    }

    /********* UPDATE Clinic Doctor Status***********/
    public function updateStatus(Request $request, Doctor $clinic_doctor){
        $clinic = auth()->user()->clinic;
        if($clinic_doctor->clinic_id != $clinic->id){
            return redirect()->back()->withErrors([
                'message' => 'Invalid Request',
                'type' => 'error'
            ]);
        }
        $clinic_doctor->update([
          'is_active' => $clinic_doctor->is_active == 1 ? 0:1
        ]);
        $response = generateResponse(null,true,'Clinic Doctor Status Updated Successfully',null,'object');
        return response()->json($response, 200);
    }


    /********* DELETE Clinic Doctor ***********/
    public function destroy(Request $request,Doctor $clinic_doctor)
    {
        $clinic = auth()->user()->clinic;
        if($clinic_doctor->clinic_id != $clinic->id){
            request()->session()->flash('alert',['message' => 'Invalid Request','type' => 'error']);
            return redirect()->back();
        }
          if($clinic_doctor->trashed()) {
            request()->session()->flash('alert',['message' => 'Already in Trash','type' => 'error']);
          }
          else{
            // dd($clinic_doctor->doctor_categories());
            User::find($clinic_doctor->user_id)->delete();

            $clinic_doctor->doctor_categories()->sync([]);
            $clinic_doctor->delete();
          }
          return redirect()->back();
    }
    /*********Permanently DELETE Clinic Doctor ***********/
    public function destroyPermanently(Request $request,$clinic_doctor)
    {
        $clinic= auth()->user()->clinic;
        $clinic_doctor = $clinic->clinic_doctors()->withTrashed()->find($clinic_doctor);
        if($clinic_doctor){
            if($clinic_doctor->clinic_id != $clinic->id){
                return redirect()->back()->withErrors([
                    'message' => 'Invalid Request',
                    'type' => 'error'
                ]);
            }
          if ($clinic_doctor->trashed()) {
            $clinic_doctor->forceDelete();
            $response = generateResponse(null,true,'Clinic Doctor Deleted Successfully',null,'object');
          }
          else{
            $response = generateResponse(null,false,'Clinic Doctor is not in trash to delete permanently',null,'object');
          }
        }
        else{
          $response = generateResponse(null,false,'Clinic Doctor not found',null,'object');
        }
          return response()->json($response, 200);
    }
    /********* Restore Clinic Doctor ***********/
    public function restore(Request $request,$clinic_doctor)
    {
      $clinic= auth()->user()->clinic;
      $clinic_doctor = $clinic->clinic_doctors()->withTrashed()->find($clinic_doctor);
          if ($clinic_doctor->trashed()) {
            $clinic_doctor->restore();
            $response = generateResponse(null,true,'Clinic Doctor Restored Successfully',null,'object');
          }
          else{
            $response = generateResponse(null,false,'Clinic Doctor is not trashed',null,'object');
          }
          return response()->json($response, 200);
    }
}
