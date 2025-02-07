<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BookAppointment extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = "booked_appointments";
    protected $fillable = [
        'patient_id',
        'doctor_id',
        'clinic_id',
        'date',
        'start_time',
        'fee',
        'is_paid',
        'appointment_type_id',
        'end_time',
        'question',
        'started_at',
        'ended_at',
        'attachment_url',
        'appointment_status_code',
        'fund_id',
        'deleted_at',
        'prescription'
    ];

    public function scopeWithAll($query)
    {
        return $query->with('fund')->with('patient')->with('ratings')->with('appointment_type')->with('appointment_status')->with('doctor')->with('clinic')->with('messages');
    }

    public function scopeWithChildren($query)
    {
        return $query->with('diseases', function ($q) {
            $q->withChildren();
        })->with('medicines')->with('tests')->with('patient_healths', function ($q) {
            $q->withAll();
        });
    }
    public  function fund()
    {
        return $this->belongsTo(Fund::class);
    }
    public  function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }
    public  function clinic()
    {
        return $this->belongsTo(Clinic::class);
    }
    public  function appointment_type()
    {
        return $this->belongsTo(AppointmentType::class);
    }
    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
    public function appointment_status()
    {
        return $this->belongsTo(AppointmentStatus::class, 'appointment_status_code', 'status_code');
    }


    public function messages()
    {
        return $this->hasMany(Message::class, 'appointment_id');
    }
    public function diseases()
    {
        return $this->belongsToMany(Disease::class, 'appointment_disease', 'appointment_id', 'disease_id');
    }
    public function medicines()
    {
        return $this->hasMany(AppointmentMedicine::class, 'booked_appointment_id');
    }

    public function tests()
    {
        return $this->belongsToMany(Test::class, 'appointment_test', 'appointment_id', 'test_id');
    }
    public function patient_healths()
    {
        return $this->hasMany(AppointmentPatientHealth::class, 'appointment_id');
    }



    public function ratings()
    {
        return $this->hasMany(AppointmentRating::class, 'booked_appointment_id');
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
