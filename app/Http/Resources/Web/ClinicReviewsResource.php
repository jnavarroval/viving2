<?php

namespace App\Http\Resources\Web;

use App\Models\ClinicMainCategory;
use Illuminate\Http\Resources\Json\JsonResource;

class ClinicReviewsResource extends JsonResource
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
        $clinic = $this->relationLoaded('clinic') ? $this->whenLoaded('clinic') : null;

        $clinic_main_category = ClinicMainCategory::active();
        $categories = $clinic?->clinic_categories?->pluck('parent_category_id');
        // dd($categories);
        if ($categories) {

            $clinic_main_category = $clinic_main_category->whereIn('id', $categories);
        }
        $clinic_main_category = $clinic_main_category->get();


        return [
            "id" =>  $this->id,
            "patient_id" => $this->patient_id,
            "clinic" => $this->clinic,
            "clinic_image" => $clinic ? $clinic->image : '',
            "rating" =>  $this->rating,
            "experience" =>  $this->experience,
            "communication" =>  $this->communication,
            "service" =>  $this->service,
            "comment" =>  $this->comment,
            "is_active" =>  $this->is_active,
            "clinic_name" => $clinic ? $clinic->name : null,
            "main_categories" => $clinic_main_category ? ClinicMainCategoriesResource::collection($clinic_main_category) : null,
            "patient" => [
                "name" => $patient->name ?? '',
                "image" => $patient->image ?? '',
            ],
            "created_at" =>  $this->created_at,
            "updated_at" =>  $this->updated_at,
        ];
    }
}
