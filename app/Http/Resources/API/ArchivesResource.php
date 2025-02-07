<?php

namespace App\Http\Resources\API;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class ArchivesResource extends JsonResource
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
        $tags = $this->relationLoaded('tags') ? $this->whenLoaded('tags'):null;
        $clinic = $this->relationLoaded('clinic') ? $this->whenLoaded('clinic'):null;
        $doctor = $this->relationLoaded('doctor') ? $this->whenLoaded('doctor'):null;
        $archive_category = $this->relationLoaded('archive_category') ? $this->whenLoaded('archive_category'):null;

        return [
                "id" =>  $this->id,
                'doctor_id' => $this->doctor_id,
                'doctor_name' => $doctor ? $doctor->name :"",
                'clinic_id' => $this->clinic_id,
                'clinic_name' => $clinic ? $clinic->name :"",
                "tag_ids" => $tags ? TagsResource::collection($this->whenLoaded('tags',function(){
                    return $this->tags;
                }))->pluck('id')->toArray():[],
                "tags" => $tags ? TagsResource::collection($tags):[],
                'archive_category_id' => $this->archive_category_id,
                'archive_category_name' => $archive_category ? $archive_category->name :"",
                "name" =>  $this->name,
                "description" =>  $this->description,
                "slug" =>  $this->slug,
                "is_active" =>  $this->is_active,
                "is_featured" =>  $this->is_featured,
                "icon" =>  $this->icon,
                "image" =>  $this->image,
                "created_at" =>  Carbon::parse($this->created_at)->format('Y-m-d'),
                "updated_at" =>  $this->updated_at,
        ];
    }
}
