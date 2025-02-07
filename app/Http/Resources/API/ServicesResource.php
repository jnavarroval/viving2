<?php

namespace App\Http\Resources\API;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class ServicesResource extends JsonResource
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
        $faqs = $this->relationLoaded('faqs') ? $this->whenLoaded('faqs'):null;
        $reviews = $this->relationLoaded('reviews') ? $this->whenLoaded('reviews'):null;
        $booked_services = $this->relationLoaded('booked_services') ? $this->whenLoaded('booked_services'):null;
        $clinic = $this->relationLoaded('clinic') ? $this->whenLoaded('clinic'):null;
        $doctor = $this->relationLoaded('doctor') ? $this->whenLoaded('doctor'):null;
        $service_category = $this->relationLoaded('service_category') ? $this->whenLoaded('service_category') : null;
        if ($reviews) {
            $rating = $reviews->avg('rating');
            if (!$rating) {
                $rating = 0;
            } else {
                $rating = round($rating, 2);
            }
        } else {
            $rating = 0;
        }
        if ($booked_services) {
            $booked_services_count = $booked_services->count();
        } else {
            $booked_services_count = 0;
        }
        return [
                "id" =>  $this->id,
                'doctor' => $doctor ? [
                    'id' => $this->doctor_id,
                    'name' => $doctor->name,
                    'image' => $doctor->image,
                    'description' => $doctor->description,
                    'user_name' => $doctor->user_name,
                ] : null,
                'clinic' => $clinic ? [
                    'id' => $this->clinic_id,
                    'name' => $clinic->name,
                    'image' => $clinic->image,
                    'description' => $clinic->description,
                    'user_name' => $clinic->user_name,
                ] : null,
                'service_category_id' => $this->service_category_id,
                'service_category_name' => $service_category ? $service_category->name :"",
                "tag_ids" => $tags ? TagsResource::collection($this->whenLoaded('tags',function(){
                    return $this->tags;
                }))->pluck('id')->toArray():[],
                "tags" => $tags ? TagsResource::collection($tags):[],
                "reviews" => $reviews ? ServiceReviewsResource::collection($reviews):[],
                "rating" => $rating,
                "booked_services_count" => $booked_services_count,
                "faqs" => $faqs ? ServiceFaqsResource::collection($faqs):[],
                "name" =>  $this->name,
                "name_translations" => $this->getTranslations('name'),
                "description" =>  $this->description,
                "description_translations" =>  $this->getTranslations('description'),
                "slug" =>  $this->slug,
                "is_active" =>  $this->is_active,
                "is_featured" =>  $this->is_featured,
                "icon" =>  $this->icon,
                "image" =>  $this->image,
                "price" =>  $this->price,
                "created_at" =>  Carbon::parse($this->created_at)->format('Y-m-d'),
                "updated_at" =>  $this->updated_at,
        ];
    }
}
