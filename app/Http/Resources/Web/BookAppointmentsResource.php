<?php

namespace App\Http\Resources\Web;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class BookAppointmentsResource extends JsonResource
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
        $clinic = $this->relationLoaded('clinic') ? $this->whenLoaded('clinic') : null;
        $medicines = $this->relationLoaded('medicines') ? $this->whenLoaded('medicines') : null;
        $tests = $this->relationLoaded('tests') ? $this->whenLoaded('tests') : null;
        $appointment_status = $this->relationLoaded('appointment_status') ? $this->whenLoaded('appointment_status') : null;
        $appointment_type = $this->relationLoaded('appointment_type') ? $this->whenLoaded('appointment_type') : null;
        $messages = $this->relationLoaded('messages') ? $this->whenLoaded('messages') : null;
        $diseases = $this->relationLoaded('diseases') ? $this->whenLoaded('diseases') : null;
        $patient_healths = $this->relationLoaded('patient_healths') ? $this->whenLoaded('patient_healths') : null;
        $fund = $this->relationLoaded('fund') ? $this->whenLoaded('fund') : null;
        return [
            "id" =>  $this->id,
            "patient_id" =>  $this->patient_id,
            "patient_name" => $patient ? $patient->name : null,
            "patient_first_name" => $patient ? $patient->first_name : null,
            "patient_image" => $patient ? $patient->image : null,
            'doctor_name_with_date' => $doctor ? $doctor->name . ' '. $this->date : '',
            'doctor_address' => $this->doctor->address_line_1 ?? " ",
            "appointment_status_name" => $appointment_status ? $appointment_status->display_name : null,
            "appointment_type_name" => $appointment_type ? $appointment_type->display_name : null,
            "is_schedule_required" => $appointment_type && $appointment_type->is_schedule_required ? 1 : 0,
            "doctor_id" =>  $this->doctor_id,
            "doctor_name" => $doctor ? $doctor->name : null,
            "doctor_first_name" => $doctor ? $doctor->first_name : null,
            "doctor_image" => $doctor ? $doctor->image : null,
            "doctor_cover_image" => $doctor ? $doctor->cover_image : null,
            'ratings' => AppointmentRatingsResource::collection($this->whenLoaded('ratings')),
            "clinic_id" =>  $this->clinic_id,
            "clinic_name" => $clinic->name ?? null,
            "clinic_first_name" => $clinic->first_name ?? null,
            "clinic_image" => $clinic->image ?? null,
            "clinic_cover_image" => $clinic->cover_image ?? null,
            "date" => Carbon::parse($this->date)->format('Y-m-d'),
            "start_time" =>  $this->start_time,
            "end_time" =>  $this->end_time,
            "fee" =>  $this->fee,
            "is_paid" =>  $this->is_paid,
            "fund" => $fund ?? null,
            "appointment_type_id" =>  $this->appointment_type_id,
            "appointment_type" =>  $this->appointment_type->type,
            "question" =>  $this->question,
            "attachment_url" =>  $this->attachment_url,
            "appointment_status_code" =>  $this->appointment_status_code,
            "messages" => $messages ? MessagesResource::collection($messages):[],
            "medicines" => $medicines ? AppointmentMedicineResource::collection($medicines):[],
            "tests" => $tests ? MedicalTestResource::collection($tests):[],
            "diseases" => $diseases ? DiseasesResource::collection($diseases):[],
            "patient_healths" => $patient_healths ? PatientHealthResource::collection($patient_healths) :[],
            "prescription" => $this->prescription ?? '',
            "is_started" => $this->is_started,
            "is_ended" => $this->is_ended,
            "started_at" => $this->started_at,
            "ended_at" => $this->ended_at,
            "created_at" =>  $this->created_at,
            "updated_at" =>  $this->updated_at,
        ];
    }
}
