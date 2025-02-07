<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AppointmentPatientHealth extends Model
{
    use HasFactory;
    protected $table = "appointment_patient_healths";
    protected $fillable = [ 'appointment_id', 'patient_health_id', 'value' ];

    public function scopeWithAll($query)
    {
        return $query->with('healths');
    }
    public function scopeActive($query)
    {
        return $query->where('is_active', 1);
    }

    public function healths()
    {
        return $this->belongsTo(PatientHealth::class ,'patient_health_id' ,'id');
    }
}
