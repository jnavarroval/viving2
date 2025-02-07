<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DoctorEducation extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = "doctor_educations";
    protected $fillable = ['doctor_id', 'institute','degree','subject','description', 'from', 'to', 'image', 'is_active', 'deleted_at'];
    protected $casts = [
        'from' => 'datetime',
        'to' => 'datetime',
    ];

    public function scopeWithAll($query)
    {
        return $query->with('doctor');
    }
    public function scopeActive($query)
    {
        return $query->where('is_active', 1);
    }

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }

}
