<?php

namespace App\Http\Resources\API;

use Illuminate\Http\Resources\Json\JsonResource;

class UsersResource extends JsonResource
{
    public static $wrap = null;
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $doctor = $this->relationLoaded('doctor') ? $this->whenLoaded('doctor'):null;
        $patient = $this->relationLoaded('patient') ? $this->whenLoaded('patient'):null;
        $clinic = $this->relationLoaded('clinic') ? $this->whenLoaded('clinic'):null;


        $logged_in_as = $request->session()->get('logged_in_as');


        if($logged_in_as == 'doctor' && $doctor){
            if($doctor->pricing_plan){
                $pricing_plan = $doctor->pricing_plan;
                $doctor_modules = $pricing_plan->doctor_modules()->pluck('pricing_plan_modules.module_code')->toArray();
            }else{
                $doctor_modules = [];
            }
            $login_info = new DoctorsResource($doctor);
        }else if($logged_in_as == 'clinic' && $clinic){
            if($clinic->pricing_plan){
                $pricing_plan = $clinic->pricing_plan;
                $clinic_modules = $pricing_plan->clinic_modules()->pluck('pricing_plan_modules.module_code')->toArray();
            }else{
                $clinic_modules = [];
            }
            $login_info = new ClinicsResource($clinic);
        }else if($logged_in_as == 'patient' && $patient){
            $login_info = new PatientsResource($patient);
        }
        else{
            $login_info = null;
        }
        return [
                "id" => $this->id,
                "name" => $this->name,
                "email" => $this->email,
                "is_active" => $this->is_active,
                "country_id" => $this->country_id,
                "email_verified_at" => $this->email_verified_at,
                "is_email_verified" => $this->hasVerifiedEmail(),
                "profile_image_path" => $this->profile_image_path,
                "password_last_changed" => $this->password_last_changed,
                "is_doctor" => $this->hasRole('doctor'),
                "is_patient" => $this->hasRole('patient'),
                "is_clinic" => $this->hasRole('clinic'),
                'doctor_modules' => $doctor_modules ?? [],
                'clinic_modules' => $clinic_modules ?? [],
                'login_info' => $login_info,
                "created_at" => $this->created_at,
                "updated_at" => $this->updated_at,
                "deleted_at" =>  $this->deleted_at
        ];
    }
}
