<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClinicSetting extends Model
{
    use HasFactory;
    protected $table = "clinic_settings";
    protected $fillable = ['clinic_id','name', 'display_name', 'value', 'is_specific', 'type'];
}
