<?php

namespace App\Http\Resources\Web;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class RecordsResource extends JsonResource
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
        $record_diseases = $this->relationLoaded('record_diseases') ? $this->whenLoaded('record_diseases') : null;
        $record_medicines = $this->relationLoaded('record_medicines') ? $this->whenLoaded('record_medicines') : null;
        $doctor = $this->relationLoaded('doctor') ? $this->whenLoaded('doctor') : null;

        return [
            "id" => $this->id,
            "patient_id" => $this->patient_id,
            "doctor_id" => $this->doctor_id,
            "doctor_name" => $doctor ? $doctor->name : null,
            "doctor_specialization" => $doctor ? $doctor->specialization : null,
            "clinic_id" => $this->clinic_id,
            "date" => $this->date,
            "notes" => $this->notes,
            "appointment_id" => $this->appointment_id,
            "attachment_url" => $this->attachment_url,
            "record_diseases" => $record_diseases ?? RecordDiseasesResource::collection($record_diseases),
            "record_diseases_count" => $record_diseases ? count($record_diseases) : 0,
            "record_medicines" => $record_medicines ?? RecordMedicinesResource::collection($record_medicines),
            "record_medicines_count" => $record_medicines ? count($record_medicines) : 0,
            "record_status_code" => $this->record_status_code,
            "created_at" => Carbon::parse($this->created_at)->format('Y-m-d h:i:s'),
            "updated_at" => $this->updated_at,
        ];
    }
}
