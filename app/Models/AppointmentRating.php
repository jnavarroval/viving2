<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AppointmentRating extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = "appointment_ratings";
    protected $fillable = [
        'booked_appointment_id', 'fromable_id', 'fromable_type', 'to_id','to_type','rating','comment','deleted_at'
    ];

    public function scopeWithAll($query)
    {
        return ;
    }
    public function getFromAbleTypeAttribute() {
        if ($this->attributes['fromable_type'] == 'App\Models\Patient') {
            return 'patient';
         }
         if ($this->attributes['fromable_type'] == 'App\Models\Doctor') {
            return 'doctor';
         }  if ($this->attributes['fromable_type'] == 'App\Models\Clinic') {
            return 'clinic';
         }
    }
    public function getToAbleTypeAttribute() {
        if ($this->attributes['to_type'] == 'App\Models\Patient') {
            return 'patient';
         }
         if ($this->attributes['to_type'] == 'App\Models\Doctor') {
            return 'doctor';
         }  if ($this->attributes['to_type'] == 'App\Models\Clinic') {
            return 'clinic';
         }
    }
    public function scopeActive($query)
    {
        return $query->where('is_active', 1);
    }
    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }
    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
    public function appointment()
    {
        return $this->belongsTo(BookAppointment::class, 'booked_appointment_id');
    }
    public function from()
    {
        return $this->morphTo('fromable');
    }
    public function to()
    {
        return $this->morphTo('to');
    }


}
