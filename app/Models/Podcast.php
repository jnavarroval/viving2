<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class Podcast extends Model
{
    use HasFactory, SoftDeletes , HasTranslations;
    protected $table = "podcasts";
    public $translatable = ['name','description'];
    protected $fillable = ['doctor_id','clinic_id','podcast_category_id', 'is_featured', 'name', 'description', 'slug', 'sort_order', 'image','file_type','link_type','file_url','audio','video', 'is_active', 'deleted_at'];


    public function scopeWithAll($query)
    {
        return $query->with('doctor')->with('clinic')->with('tags')->with('podcast_category');
    }
    public function scopeHasModulePermissions($query){
        return $query->whereHas('doctor',function($q){
            $q->whereHas('pricing_plan',function($y){{
                $y->whereHas('doctor_modules',function($z){
                    $z->where('pricing_plan_modules.module_code','doctor-podcasts');
                });
            }});
        })->orWhereHas('clinic',function($q){
            $q->whereHas('pricing_plan',function($y){{
                $y->whereHas('clinic_modules',function($z){
                    $z->where('pricing_plan_modules.module_code','clinic-podcasts');
                });
            }});
        })->doesntHave('doctor', 'or')->doesntHave('clinic' , 'or');
    }
    public function scopeActive($query)
    {
        return $query->where('is_active', 1);
    }
    public function scopeFeatured($query)
    {
        return $query->where('is_featured', 1);
    }
    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }
    public function clinic()
    {
        return $this->belongsTo(Clinic::class);
    }
    public function podcast_category()
    {
        return $this->belongsTo(PodcastCategory::class);
    }
    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'podcast_tag');
    }
}
