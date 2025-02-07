<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class DoctorMainCategory extends Model
{
    use HasFactory, SoftDeletes , HasTranslations;
    protected $table = "doctor_main_categories";
    public $translatable = ['name','description'];
    protected $fillable = ['name', 'description', 'slug','doctor_id','archive_id','patient_id', 'sort_order','icon', 'image', 'is_active', 'is_featured','deleted_at'];


    public function scopeWithAll($query)
    {
        return $query->with(['categories']);
    }
    public function scopeWithChildrens($query)
    {
        return $query->with('categories',function($q){
            $q->active()->withAll();
        });
    }
    public function scopeActive($query)
    {
        return $query->where('is_active', 1);
    }
    public function scopeFeatured($query)
    {
        return $query->where('is_featured', 1);
    }
    public function categories()
    {
        return $this->hasMany(DoctorCategory::class,'parent_category_id');
    }
}
