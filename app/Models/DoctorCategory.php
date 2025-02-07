<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class DoctorCategory extends Model
{
    use HasFactory, SoftDeletes , HasTranslations;
    protected $table = "doctor_categories";
    public $translatable = ['name','description'];
    protected $fillable = ['name', 'description', 'slug','parent_category_id', 'sort_order', 'image', 'is_active', 'deleted_at'];


    public function scopeWithAll($query)
    {
        return $query->withCount('doctors')->with('doctors',function($q){
            $q->withCount('doctor_archives');
        });
    }
    public function scopeActive($query)
    {
        return $query->where('is_active', 1);
    }
    public function doctors()
    {
        return $this->belongsToMany(Doctor::class, 'doctor_category');
    }


    public function main_category()
    {
        return $this->belongsTo(DoctorMainCategory::class, 'parent_category_id');
    }
}
