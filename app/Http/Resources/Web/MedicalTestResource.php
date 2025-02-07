<?php

namespace App\Http\Resources\Web;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class MedicalTestResource extends JsonResource
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
            "description" => $this->description,
            "image" => $this->image,
            "updated_at" => $this->updated_at,
        ];
    }
}
