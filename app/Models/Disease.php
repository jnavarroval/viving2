<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class Disease extends Model
{
    use HasFactory, SoftDeletes, HasTranslations;
    protected $table = "diseases";
    protected $fillable = ['name', 'description', 'image', 'is_active'];
    public $translatable = ['name', 'description'];

    public function scopeWithAll($query)
    {
        return $query;
    }
    public function scopeWithChildren($query)
    {
        return $query->with('book_appointments');
    }
    public function scopeActive($query)
    {
        return $query->where('is_active', 1);
    }
    public function book_appointments()
    {
        return $this->belongsToMany(BookAppointment::class, 'appointment_disease', 'appointment_id' ,'id');
    }
}
