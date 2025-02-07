<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DoctorSetting extends Model
{
    use HasFactory;
    protected $table = "doctor_settings";
    protected $fillable = ['doctor_id','name', 'display_name', 'value', 'is_specific', 'type'];
}
