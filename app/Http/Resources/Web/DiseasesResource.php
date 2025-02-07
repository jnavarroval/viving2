<?php

namespace App\Http\Resources\Web;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class DiseasesResource extends JsonResource
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
        // $record_diseases = $this->relationLoaded('record_diseases') ? $this->whenLoaded('record_diseases') : null;
        // $record_medicines = $this->relationLoaded('record_medicines') ? $this->whenLoaded('record_medicines') : null;

        return [
            "id" => $this->id,
            "name" => $this->name,
            "name_translations" => $this->getTranslations('name'),
            "description_translations" =>  $this->getTranslations('description'),
            "description" => $this->description,
            "image" => $this->image,
            "record_status_code" => $this->is_active,
            "updated_at" => $this->updated_at,
            "appointment_doctor_image" => $this->appointment_doctor_image ?? " ",
            "appointment_doctor_name" => $this->appointment_doctor_name ?? " ",
            "appointment_id" => $this->appointment_id ?? " ",
            "appointment_doctor_speciality" => $this->appointment_doctor_speciality ?? " ",


        ];
    }
}
