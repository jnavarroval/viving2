<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Record extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = "records";
    protected $fillable = ['patient_id', 'doctor_id', 'clinic_id', 'date','note','appointment_id','attachment_url','record_status_code', 'deleted_at'];

    public function scopeWithAll($query)
    {
        return $query->with(['patient','doctor','appointment','record_status']);
    }
    public function scopeWithChildren($query)
    {
        return $query->with(['record_diseases','record_medicines']);
    }
    public function patient(){
        return $this->belongsTo(Patient::class);
    }
    public function doctor(){
        return $this->belongsTo(Doctor::class);
    }
    public function clinic(){
        return $this->belongsTo(Clinic::class);
    }
    public function appointment(){
        return $this->belongsTo(BookAppointment::class,'appointment_id');
    }
    public function record_status(){
        return $this->belongsTo(RecordStatus::class,'record_status_code');
    }
    // public function medicines(){
    //     return $this->hasMany(Medicine::class);
    // }
    // public function record_diseases(){
    //     return $this->hasMany(RecordDisease::class,'record_id','id');
    // }

}
