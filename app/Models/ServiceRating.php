<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ServiceRating extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = "service_ratings";
    protected $fillable = [
        'booked_service_id', 'fromable_id', 'fromable_type', 'to_id','to_type','rating','comment','deleted_at'
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
    public function service()
    {
        return $this->belongsTo(BookedService::class, 'booked_service_id');
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
