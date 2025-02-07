<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RecordHealth extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = "record_health";
    protected $fillable = [ 'name', 'description', 'image','is_active'];

    public function scopeWithAll($query)
    {
        return $query;
    }
    public function scopeActive($query)
    {
        return $query->where('is_active', 1);
    }


}
