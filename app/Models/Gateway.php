<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Gateway extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['code', 'name', 'image', 'status', 'parameters', 'currencies', 'currency', 'symbol', 'min_amount', 'max_amount', 'percentage_charge', 'fixed_charge', 'convention_rate'];
    protected $casts = [
        'parameters' => 'object',
        'currencies' => 'object',
        'extra_parameters' => 'object'
    ];

    public function scopeAutomatic()
    {
        return $this->where('id', '<', 1000);
    }

    public function scopeManual()
    {
        return $this->where('id', '>=', 1000);
    }
    public function scopeWithAll($query)
    {
        return $query;
    }
}
