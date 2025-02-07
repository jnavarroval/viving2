<?php

namespace App\Http\Resources\Web;

use Illuminate\Http\Resources\Json\JsonResource;

class DoctorMainCategoriesResource extends JsonResource
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
        $categories = $this->relationLoaded('categories') ? $this->whenLoaded('categories'):null;
        $archive_count = 0;
        $patient_count = 0;
        $doctor_count = 0;
        if ($categories) {
            $doctor_count = $categories->sum('doctors_count');
            $archive_count = $categories->sum(function($category) {
                return $category->doctors->sum('doctor_archives_count');
            });
        }
        return [
                "id" =>  $this->id,
                "name" =>  $this->name,
                "description" =>  $this->description,
                "slug" =>  $this->slug,
                "doctor_count" =>  $doctor_count,
                "patient_count" =>  $patient_count,
                "archive_count" =>  $archive_count,
                "is_active" =>  $this->is_active,
                "is_featured" =>  $this->is_featured,
                "icon" =>  $this->icon,
                "image" =>  $this->image,
                "categories" =>  DoctorCategoriesResource::collection($this->whenLoaded('categories')),
                "created_at" =>  $this->created_at,
                "updated_at" =>  $this->updated_at,
        ];
    }
}
