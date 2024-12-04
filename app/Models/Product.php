<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'desc', 'price'
    ];

    public function scopeSearch($query)
    {
        return $query;
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
}
