<?php

namespace App\Http\Resources\API;

use Illuminate\Http\Resources\Json\JsonResource;

class ClinicsResource extends JsonResource
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
        $clinic_settings = $this->relationLoaded('clinic_settings') ? $this->whenLoaded('clinic_settings'):null;
        $clinic_categories = $this->relationLoaded('clinic_categories') ? $this->whenLoaded('clinic_categories'):null;
        $clinic_doctors = $this->relationLoaded('clinic_doctors') ? $this->whenLoaded('clinic_doctors') : null;
        $clinic_reviews = $this->relationLoaded('clinic_reviews') ? $this->whenLoaded('clinic_reviews'):null;
        $clinic_doctors = $this->relationLoaded('clinic_doctors') ? $this->whenLoaded('clinic_doctors') : null;
        $clinic_certifications = $this->relationLoaded('clinic_certifications') ? $this->whenLoaded('clinic_certifications') : null;
        $clinic_broadcasts = $this->relationLoaded('clinic_broadcasts') ? $this->whenLoaded('clinic_broadcasts') : null;
        $clinic_podcasts = $this->relationLoaded('clinic_podcasts') ? $this->whenLoaded('clinic_podcasts') : null;
        $clinic_events = $this->relationLoaded('clinic_events') ? $this->whenLoaded('clinic_events') : null;
        $clinic_posts = $this->relationLoaded('clinic_posts') ? $this->whenLoaded('clinic_posts') : null;
        $clinic_archives = $this->relationLoaded('clinic_archives') ? $this->whenLoaded('clinic_archives') : null;
        $pricing_plan = $this->relationLoaded('pricing_plan') ? $this->whenLoaded('pricing_plan'):null;
        $appointments = $this->relationLoaded('appointments') ? $this->whenLoaded('appointments'):null;
        $country = $this->relationLoaded('country') ? $this->whenLoaded('country') : null;
        $state = $this->relationLoaded('state') ? $this->whenLoaded('state') : null;
        $city = $this->relationLoaded('city') ? $this->whenLoaded('city') : null;

        if($clinic_reviews){
            $rating = $clinic_reviews->avg('rating');
            if(!$rating){
                $rating = 0;
            }else{
                $rating = round($rating,2);
            }
        }else{
            $rating = 0;
        }
        return [
            "id" => $this->id,
            "user_id" => $this->user_id,
            "country_id" => $this->country_id,
            "country_name" => $country ? $country->name : "",
            "state_id" => $this->state_id,
            "state_name" => $state ? $state->name : "",
            "city_id" => $this->city_id,
            "city_name" => $city ? $city->name : "",
            "distance" => $this->distance,
            "experience" => $this->experience,
            "name" => $this->name,
            "first_name" => $this->first_name,
            "last_name" => $this->last_name,
            "clinic_name" => $this->clinic_name,
            "clinic_website" => $this->clinic_website,
            "description" => $this->description,
            "description_translations" =>  $this->getTranslations('description'),
            "address_line_1" => $this->address_line_1,
            "address_line_2" => $this->address_line_2,
            "user_name" => $this->user_name,
            "zip_code" => $this->zip_code,
            "is_approved" => $this->is_approved,
            "approved_at" => $this->approved_at,
            "is_active" => $this->is_active,
            "is_online" => $this->is_online,
            "is_featured" => $this->is_featured,
            "speciality" => $this->speciality,
            'prefix' => $this->prefix,
            'suffix' => $this->suffix,
            'home_phone' => $this->home_phone,
            'cell_phone' => $this->cell_phone,
            'job_title' => $this->job_title,
            'company' => $this->company,
            'website' => $this->website,
            'email' => $this->email,
            'billing_address_line_1' => $this->billing_address_line_1,
            'billing_address_line_2' => $this->billing_address_line_2,
            'billing_country_id' => $this->billing_country_id,
            'billing_state_id' => $this->billing_state_id,
            'billing_city_id' => $this->billing_city_id,
            'billing_zip_code' => $this->billing_zip_code,

            'shipping_address_line_1' => $this->shipping_address_line_1,
            'shipping_address_line_2' => $this->shipping_address_line_2,
            'shipping_country_id' => $this->shipping_country_id,
            'shipping_state_id' => $this->shipping_state_id,
            'shipping_city_id' => $this->shipping_city_id,
            'shipping_zip_code' => $this->shipping_zip_code,

            'work_address_line_1' => $this->work_address_line_1,
            'work_address_line_2' => $this->work_address_line_2,
            'work_country_id' => $this->work_country_id,
            'work_state_id' => $this->work_state_id,
            'work_city_id' => $this->work_city_id,
            'work_zip_code' => $this->work_zip_code,

            "icon" => $this->icon,
            "image" => $this->image,
            "cover_image" => $this->cover_image,
            "rating" => $rating,
            "booked_appointments" => isset($appointments) && count($appointments) ? count($appointments) : 0,
            "clinic_modules" => $pricing_plan ? $pricing_plan->clinic_modules()->pluck('pricing_plan_modules.module_code')->toArray():[],
            "clinic_settings" => isset($clinic_settings) && count($clinic_settings) > 0 ? ClinicSettingsResource::collection($this->whenLoaded('clinic_settings',function(){
                    return $this->clinic_settings;
            }))->pluck('value','name')->toArray(): null,
            "clinic_category_ids" => isset($clinic_categories) && count($clinic_categories) > 0 ? ClinicCategoriesResource::collection($this->whenLoaded('clinic_categories',function(){
                return $this->clinic_categories;
            }))->pluck('id')->toArray():null,
            "clinic_doctors" => $clinic_doctors ? DoctorsResource::collection($clinic_doctors) : [],
            "total_clinic_doctors" => count($clinic_doctors),
            "clinic_categories" => $clinic_categories ? ClinicCategoriesResource::collection($clinic_categories):[],
            "clinic_broadcasts" => $clinic_broadcasts ? BroadcastsResource::collection($clinic_broadcasts) : [],
            "clinic_podcasts" => $clinic_podcasts ? BroadcastsResource::collection($clinic_podcasts) : [],
            "clinic_events" => $clinic_events ? EventsResource::collection($clinic_events) : [],
            "clinic_posts" => $clinic_posts ? PostsResource::collection($clinic_posts) : [],
            "clinic_archives" => $clinic_archives ? PostsResource::collection($clinic_archives) : [],
            "clinic_reviews" => $clinic_reviews ? ClinicReviewsResource::collection($clinic_reviews) : [],
            "clinic_certifications" => $clinic_certifications ? CertificationsResource::collection($clinic_certifications) : [],
            "created_at" => $this->created_at,
            "updated_at" => $this->updated_at,
        ];
    }
}
