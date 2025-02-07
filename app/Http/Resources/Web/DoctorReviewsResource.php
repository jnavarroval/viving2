<?php

namespace App\Http\Resources\Web;

use App\Models\DoctorMainCategory;
use Illuminate\Http\Resources\Json\JsonResource;

class DoctorReviewsResource extends JsonResource
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
        $patient = $this->relationLoaded('patient') ? $this->whenLoaded('patient') : null;
        $doctor = $this->relationLoaded('doctor') ? $this->whenLoaded('doctor') : null;
        $categories = $doctor->doctor_categories->pluck('parent_category_id');
        // dd($categories);
        if ($categories) {
            $doctor_main_category = DoctorMainCategory::whereIn('id', $categories)->get();
        }


        return [
            "id" =>  $this->id,
            "patient_id" => $this->patient_id,
            "doctor_id" => $this->doctor_id,
            "doctor_image" => $doctor ? $doctor->image : '',
            "rating" =>  $this->rating,
            "experience" =>  $this->experience,
            "communication" =>  $this->communication,
            "service" =>  $this->service,
            "comment" =>  $this->comment,
            "is_active" =>  $this->is_active,
            "doctor_name" => $doctor ? $doctor->name : null,
            "main_categories" => $doctor_main_category ? DoctorMainCategoriesResource::collection($doctor_main_category) : null,

            "patient" => [
                "name" => $patient->name ?? '',
                "image" => $patient->image ?? '',
            ],
            "created_at" =>  $this->created_at,
            "updated_at" =>  $this->updated_at,
        ];
    }
}
