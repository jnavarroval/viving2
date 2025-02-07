<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class ServiceCategory extends Model
{
    use HasFactory, SoftDeletes , HasTranslations;
    protected $table = "service_categories";
    public $translatable = ['name','description'];
    protected $fillable = ['name', 'description', 'slug', 'sort_order', 'image', 'is_active', 'deleted_at'];


    public function scopeWithAll($query)
    {
        return $query;
    }
    public function scopeWithChildren($query)
    {
        return $query->with('services');
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', 1);
    }
    public function services()
    {
        return $this->hasMany(Service::class, 'service_category_id');
    }
}
