<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AppointmentMedicine extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = "appointment_medicines";
    protected $fillable = [ 'name', 'description', 'dosage', 'frequency', 'duration', 'image', 'is_active','booked_appointment_id'];

    public function scopeWithAll($query)
    {
        return $query;
    }
    public function scopeActive($query)
    {
        return $query->where('is_active', 1);
    }

}
