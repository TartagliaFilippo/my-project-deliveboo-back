<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'ingredients', 'description', 'price', 'image', 'visibility'];

    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }
}