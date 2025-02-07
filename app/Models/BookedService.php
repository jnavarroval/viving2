<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BookedService extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = "booked_services";
    protected $fillable = [
        'patient_id',
        'service_id',
        'doctor_id',
        'clinic_id',
        'date',
        'price',
        'is_paid',
        'question',
        'started_at',
        'ended_at',
        'attachment_url',
        'service_status_code',
        'fund_id',
        'deleted_at'
    ];

    public function scopeWithAll($query)
    {
        return $query->with('fund')->with('patient')->with('doctor')->with('clinic')->with('reviews')->with('service_status')->with('service')->with('messages');
    }
    public  function fund()
    {
        return $this->belongsTo(Fund::class);
    }
    public  function service()
    {
        return $this->belongsTo(Service::class);
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
    public function service_status()
    {
        return $this->belongsTo(ServiceStatus::class, 'service_status_code', 'status_code');
    }
    public function messages()
    {
        return $this->hasMany(Message::class, 'appointment_id');
    }

    public function reviews()
    {
        return $this->hasMany(ServiceReview::class, 'booked_service_id');
    }
    public function getIsStartedAttribute()
    {
        return $this->attributes['started_at'] ? true : false;
    }
    public function getIsEndedAttribute()
    {
        return $this->attributes['ended_at'] ? true : false;
    }
}
