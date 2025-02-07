<?php

namespace App\Http\Resources\API;

use Illuminate\Http\Resources\Json\JsonResource;

class ServiceReviewsResource extends JsonResource
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
        $patient = $this->relationLoaded('patient') ? $this->whenLoaded('patient'):null;
        $doctor = $this->relationLoaded('doctor') ? $this->whenLoaded('doctor'):null;
        $clinic = $this->relationLoaded('clinic') ? $this->whenLoaded('clinic'):null;
        $service = $this->relationLoaded('service') ? $this->whenLoaded('service'):null;
        return [
                "id" =>  $this->id,
                "rating" =>  $this->rating,
                "experience" =>  $this->experience,
                "communication" =>  $this->communication,
                "service" =>  $this->service,
                "comment" =>  $this->comment,
                "is_active" =>  $this->is_active,
                "patient" =>[
                    "id" => $patient?->id,
                    "name" => $patient?->name ?? '',
                    "image" => $patient?->image ?? '',
                ],
                "clinic" =>[
                    "id" => $clinic?->id,
                    "name" => $clinic?->name ?? '',
                    "image" => $clinic?->image ?? '',
                ],
                "doctor" =>[
                    "id" => $doctor?->id,
                    "name" => $doctor?->name ?? '',
                    "image" => $doctor?->image ?? '',
                ],
                "created_at" =>  $this->created_at,
                "updated_at" =>  $this->updated_at,
        ];
    }
}
