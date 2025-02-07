<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PricingPlan extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = "pricing_plans";
    protected $fillable = ['name', 'description', 'color','is_paid', 'slug','tagline','price','stripe_plan', 'sort_order', 'image','type','is_default', 'is_active', 'deleted_at'];

    public function scopeWithAll($query)
    {
        return $query;
    }
    public function scopeActive($query)
    {
        return $query->where('is_active', 1);
    }
    public function scopeDefault($query)
    {
        return $query->where('is_default', 1);
    }
    public function scopeClinic($query)
    {
        return $query->where('type', 'clinic');
    }
    public function scopeDoctor($query)
    {
        return $query->where('type', 'doctor');
    }
    public function scopeBoth($query)
    {
        return $query->where('type', 'both');
    }

    public function modules()
    {
        return $this->belongsToMany(PricingPlanModule::class, 'pricing_plan_module', 'pricing_plan_id', 'module_code', 'id', 'module_code');
    }
    public function doctor_modules()
    {
        return $this->belongsToMany(PricingPlanModule::class, 'pricing_plan_module', 'pricing_plan_id', 'module_code', 'id', 'module_code')->where('type','doctor');
    }

    public function clinic_modules()
    {
        return $this->belongsToMany(PricingPlanModule::class, 'pricing_plan_module', 'pricing_plan_id', 'module_code', 'id', 'module_code')->where('type','clinic');
    }
}
