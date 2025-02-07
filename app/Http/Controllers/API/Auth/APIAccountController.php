<?php

namespace App\Http\Controllers\API\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Resources\API\UsersResource;
use App\Models\User;
use App\Http\Requests\API\Account\UpdatePatientGeneralInfoRequest;
use App\Http\Requests\API\Account\UpdateDoctorGeneralInfoRequest;
use App\Http\Requests\API\Account\UpdateClinicGeneralInfoRequest;
use App\Models\Role;

class APIAccountController extends Controller
{
    public function __construct()
    {
        $this->middleware(['api','auth:api','verified','api_setting']);
        $this->middleware(['patient.api'])->only(['updatePatientGeneralInformation']);
        $this->middleware(['doctor.api'])->only(['updateDoctorGeneralInformation' , 'updateDoctorSettings']);
        $this->middleware(['clinic.api'])->only(['updateClinicGeneralInformation' , 'updateClinicSettings']);
    }

    public function updatePatientGeneralInformation(UpdatePatientGeneralInfoRequest $request)
    {
        $user = auth()->user();
        $patient = $user->patient;
        if($patient){
            $patient->update($request->only(['first_name','last_name','user_name','description','country_id','state_id','city_id','address_line_1','address_line_2','zip_code']));
            if(!empty($request->image) && !is_null($request->image)){
                $image = uploadFile($request,'image','profile_images');
                $patient->update(['image' => $image]);
            }

            $user = User::withAll()->where('email', $user->email)->first();
            $user = new UsersResource($user);
            $response = generateResponse($user,true,"Profile Updated Successfully",null,'collection');
        }else{
            $response = generateResponse(null,true,"User Not Found",null,'collection');
        }
        return response()->json($response);
    }

    public function updateDoctorGeneralInformation(UpdateDoctorGeneralInfoRequest $request)
    {
        $user = auth()->user();
        $doctor = $user->doctor;
        if($doctor){
            $doctor->update($request->only(
                ['first_name',
                'last_name',
                'description',
                'country_id',
                'state_id',
                'city_id',
                'address_line_1',
                'address_line_2',
                'zip_code',
                'user_name',
                'speciality',
                'home_phone',
                'cell_phone',
                'job_title',
                'website',
                'company',
                'email',
                'work_country_id',
                'work_state_id',
                'work_city_id',
                'work_address_line_1',
                'work_address_line_2',
                'work_zip_code',
                'shipping_country_id',
                'shipping_state_id',
                'shipping_city_id',
                'shipping_address_line_1',
                'shipping_address_line_2',
                'shipping_zip_code',
                'billing_country_id',
                'billing_state_id',
                'billing_city_id',
                'billing_address_line_1',
                'billing_address_line_2',
                'billing_zip_code'
                ]));

                if(!empty($request->image) && !is_null($request->image)){
                    $image = uploadFile($request,'image','profile_images');
                    $doctor->update(['image' => $image]);
                }
                if(!empty($request->cover_image) && !is_null($request->cover_image)){
                    $cover_image = uploadFile($request,'cover_image','profile_images');
                    $doctor->update(['cover_image' => $cover_image]);
                }
            $doctor->doctor_categories()->sync($request->doctor_categories);
            $doctor->languages()->sync($request->languages);
            $doctor->tags()->sync($request->tags);
            $user = User::withAll()->where('email', $user->email)->first();
            $user = new UsersResource($user);
            $response = generateResponse($user,true,"Profile Updated Successfully",null,'collection');
        }else{
            $response = generateResponse(null,true,"User Not Found",null,'collection');
        }
        return response()->json($response);
    }

    public function updateDoctorSettings(Request $request){
        $user = Auth::user();
        $doctor = $user->doctor;
        foreach($request->settings as $setting){
            $doctor->doctor_settings()->updateOrCreate(['name' => $setting['name']],$setting);
        }
        $response = generateResponse(null,true,"Settings Updated Successfully",null,'collection');
        return response()->json($response);
    }

    public function updateClinicGeneralInformation(UpdateClinicGeneralInfoRequest $request)
    {
        $user = auth()->user();
        $clinic = $user->clinic;
        if($clinic){
            $clinic->update($request->only(['clinic_name','clinic_website','first_name','last_name','description','country_id','state_id','city_id','address_line_1','address_line_2','zip_code','user_name']));
            $image = uploadCroppedFile($request,'image','profile_images');
            $clinic->update(['image' => $image]);
            $clinic->clinic_categories()->sync($request->clinic_categories);
            $response = generateResponse($clinic,true,"Profile Updated Successfully",null,'collection');
        }else{
            $response = generateResponse(null,true,"User Not Found",null,'collection');
        }
        return response()->json($response);
    }

    public function updateClinicSettings(Request $request){
        $user = Auth::user();
        $clinic = $user->clinic;
        foreach($request->settings as $setting){
            $clinic->clinic_settings()->updateOrCreate(['name' => $setting['name']],$setting);
        }
        $response = generateResponse(null,true,"Settings Updated Successfully",null,'collection');
        return response()->json($response);
    }

    public function becomeDoctor(Request $request){
        $user = Auth::user();
        $logged_in_as = $request->session()->get('logged_in_as');
        $data = $user->{$logged_in_as};
        $pricing_plan = getDoctorDefaultPricingPlan();

        if(!$user->hasRole(Role::$Doctor)){
            $user->roles()->attach([Role::$Doctor]);
            $user->doctor()->create([
                'first_name' => $data->first_name,
                'last_name' => $data->last_name,
                'description' => $data->description,
                'country_id' => $data->country_id,
                'state_id' => $data->state_id,
                'city_id' => $data->city_id,
                'address_line_1' => $data->address_line_1,
                'address_line_2' => $data->address_line_2,
                'zip_code' => $data->zip_code,
                'pricing_plan_id' => $pricing_plan->id ?? null
            ]);
        }
        $response = generateResponse(null,true,"You are Now A Doctor",null,'collection');
        return response()->json($response);
    }
    public function becomeUser(Request $request){
        $user = Auth::user();
        $logged_in_as = $request->session()->get('logged_in_as');
        $data = $user->{$logged_in_as};
        if(!$user->hasRole(Role::$Patient)){
            $user->roles()->attach([Role::$Patient]);
            $user->patient()->create([
                'first_name' => $data->first_name,
                'last_name' => $data->last_name,
                'description' => $data->description,
                'country_id' => $data->country_id,
                'state_id' => $data->state_id,
                'city_id' => $data->city_id,
                'address_line_1' => $data->address_line_1,
                'address_line_2' => $data->address_line_2,
                'zip_code' => $data->zip_code,

            ]);
        }
        $response = generateResponse(null,true,"You are Now A Cusomer",null,'collection');
        return response()->json($response);
    }
    public function becomeClinic(Request $request){
        $user = Auth::user();
        $logged_in_as = $request->session()->get('logged_in_as');
        $data = $user->{$logged_in_as};
        $pricing_plan = getClinicDefaultPricingPlan();
        if(!$user->hasRole(Role::$Clinic)){
            $user->roles()->attach([Role::$Clinic]);
            $user->clinic()->create([
                'first_name' => $data->first_name,
                'last_name' => $data->last_name,
                'description' => $data->description,
                'country_id' => $data->country_id,
                'state_id' => $data->state_id,
                'city_id' => $data->city_id,
                'address_line_1' => $data->address_line_1,
                'address_line_2' => $data->address_line_2,
                'zip_code' => $data->zip_code,
                'pricing_plan_id' => $pricing_plan->id ?? null
            ]);
        }
        $response = generateResponse(null,true,"You are Now A Law Firm User Also",null,'collection');
        return response()->json($response);
    }
}
