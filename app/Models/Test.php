<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class Test extends Model
{
    use HasFactory, SoftDeletes ,HasTranslations;
    protected $table = "tests";
    protected $fillable = [ 'name', 'description', 'image','is_active'];
    public $translatable = ['name','description'];

    public function scopeWithAll($query)
    {
        return $query;
    }
    public function scopeActive($query)
    {
        return $query->where('is_active', 1);
    }


}
