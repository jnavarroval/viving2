<?php

namespace App\Http\Resources\API;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class BookedServicesResource extends JsonResource
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
        $service = $this->relationLoaded('service') ? $this->whenLoaded('service') : null;
        $service_status = $this->relationLoaded('service_status') ? $this->whenLoaded('service_status') : null;
        $messages = $this->relationLoaded('messages') ? $this->whenLoaded('messages') : null;
        $reviews = $this->relationLoaded('reviews') ? $this->whenLoaded('reviews') : null;
        $fund = $this->relationLoaded('fund') ? $this->whenLoaded('fund') : null;
        // dd($reviews);
        return [
            "id" =>  $this->id,
            "patient_id" =>  $this->patient_id,
            "patient_name" => $patient ? $patient->name : null,
            "patient_first_name" => $patient ? $patient->first_name : null,
            "patient_image" => $patient ? $patient->image : null,
            "doctor_id" =>  $this->doctor_id,
            "doctor_name" => $doctor ? $doctor->name : null,
            "doctor_first_name" => $doctor ? $doctor->first_name : null,
            "doctor_image" => $doctor ? $doctor->image : null,
            "clinic_id" =>  $this->clinic_id,
            "clinic_first_name" => $clinic ? $clinic->first_name : null,
            "clinic_image" => $clinic ? $clinic->image : null,
            "service_id" =>  $this->service_id,
            "service_name" => $service ? $service->name : null,
            "service_image" => $service ? $service->image : null,
            "service_status_name" => $service_status ? $service_status->display_name : null,
            "date" => Carbon::parse($this->date)->format('Y-m-d'),
            "started_at" =>  $this->started_at,
            "ended_at" =>  $this->ended_at,
            "price" =>  $this->price,
            "fund" => $fund ?? '',
            "is_paid" =>  $this->is_paid,
            "question" =>  $this->question,
            "attachment_url" =>  $this->attachment_url,
            "service_status_code" =>  $this->service_status_code,
            "messages" => $messages ? MessagesResource::collection($messages) : [],
            "reviews" => $reviews ? ServiceReviewsResource::collection($reviews) : [],
            "created_at" =>  $this->created_at,
            "updated_at" =>  $this->updated_at,
        ];
    }
}
