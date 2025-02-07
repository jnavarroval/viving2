<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class Archive extends Model
{
    use HasFactory, SoftDeletes , HasTranslations;
    protected $table = "archives";
    public $translatable = ['name','description'];
    protected $fillable = ['doctor_id','clinic_id', 'archive_category_id', 'is_featured', 'name', 'description', 'slug', 'sort_order', 'image', 'is_active', 'deleted_at'];


    public function scopeWithAll($query)
    {
        return $query->with('tags')->with('clinic')->with('archive_category')->with('doctor');
    }
    public function scopeActive($query)
    {
        return $query->where('is_active', 1);
    }
    public function scopeFeatured($query)
    {
        return $query->where('is_featured', 1);
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
    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }
    public function clinic()
    {
        return $this->belongsTo(Clinic::class);
    }
    public function archive_category()
    {
        return $this->belongsTo(ArchiveCategory::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'archive_tag');
    }
}
