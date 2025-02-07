<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class ClinicCategory extends Model
{
    use HasFactory, SoftDeletes , HasTranslations;
    protected $table = "clinic_categories";
    public $translatable = ['name','description'];
    protected $fillable = ['name', 'description', 'slug','parent_category_id', 'sort_order', 'image', 'is_active', 'deleted_at'];


    public function scopeWithAll($query)
    {
        return $query;
    }
    public function scopeActive($query)
    {
        return $query->where('is_active', 1);
    }
    public function clinics()
    {
        return $this->belongsToMany(Clinic::class, 'clinic_category');
    }
    public function main_category()
    {
        return $this->belongsTo(ClinicMainCategory::class, 'parent_category_id');
    }
}
