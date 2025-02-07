<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ServiceReview extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = "service_reviews";
    protected $fillable = [
        'booked_service_id', 'service_id','patient_id','doctor_id','clinic_id','rating','experience','communication','service','is_active','is_featured','is_approved','comment','deleted_at'
    ];

    public function scopeWithAll($query)
    {
        return $query->with('patient')->with('doctor')->with('clinic');
    }
    public function scopeActive($query)
    {
        return $query->where('is_active', 1);
    }
    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }
    public function clinic()
    {
        return $this->belongsTo(Clinic::class);
    }
    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id');
    }


}
