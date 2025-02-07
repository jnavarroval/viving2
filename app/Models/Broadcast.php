<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class Broadcast extends Model
{
    use HasFactory, SoftDeletes , HasTranslations;
    protected $table = "broadcasts";
    public $translatable = ['name','description'];
    protected $fillable = ['doctor_id','clinic_id', 'broadcast_category_id', 'is_featured', 'name', 'description', 'slug', 'sort_order', 'image','file_type','link_type','file_url','audio','video', 'is_active', 'deleted_at'];


    public function scopeWithAll($query)
    {
        return $query->with('tags')->with('doctor')->with('clinic')->with('broadcast_category');
    }
    public function scopeHasModulePermissions($query){
        return $query->whereHas('doctor',function($q){
            $q->whereHas('pricing_plan',function($y){{
                $y->whereHas('doctor_modules',function($z){
                    $z->where('pricing_plan_modules.module_code','doctor-broadcast');
                });
            }});
        })->orWhereHas('clinic',function($q){
            $q->whereHas('pricing_plan',function($y){{
                $y->whereHas('clinic_modules',function($z){
                    $z->where('pricing_plan_modules.module_code','clinic-broadcast');
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
    public function broadcast_category()
    {
        return $this->belongsTo(BroadcastCategory::class);
    }
    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'broadcast_tag');
    }
}
