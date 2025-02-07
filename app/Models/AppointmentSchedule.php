<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AppointmentSchedule extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = "appointment_schedules";
    protected $fillable = ['doctor_id','clinic_id','appointment_type_id', 'fee', 'day', 'is_holiday', 'start_time', 'end_time','slot_duration', 'deleted_at'];


    public function scopeWithAll($query)
    {
         return $query->with('schedule_slots')->with('appointment_type');
    }
    public  function doctor()
    {
        return $this->belongsTo(Doctor::class,'user_id','doctor_id');
    }
    public  function clinic()
    {
        return $this->belongsTo(Clinic::class,'user_id','clinic_id');
    }
    public  function appointment_type()
    {
        return $this->hasOne(AppointmentType::class,'id','appointment_type_id');
    }
    public function schedule_slots()
    {
        return $this->hasMany(AppointmentScheduleSlot::class, 'schedule_id');
    }
}
