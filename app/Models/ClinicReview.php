<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ClinicReview extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = "clinic_reviews";
    protected $fillable = ['clinic_id', 'patient_id', 'rating','experience','communication','service', 'comment', 'is_active', 'deleted_at'];


    public function scopeWithAll($query)
    {
        return $query->with('patient')->with('clinic',function($query){
            $query->with('clinic_categories',function($q){
                $q->with('main_category');
            });
        });
    }
    public function scopeActive($query)
    {
        return $query->where('is_active', 1);
    }
    public function scopeFeatured($query)
    {
        return $query->where('is_featured', 1);
    }
    public function clinic()
    {
        return $this->belongsTo(Clinic::class);
    }
    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
}
