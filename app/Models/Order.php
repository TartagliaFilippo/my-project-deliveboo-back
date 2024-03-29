<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'restaurant_id',
        'name',
        'lastname',
        'email',
        'phone',
        'address',
        'address_number',
        'total',
        'cart',
    ];

    public function dishes()
    {
        return $this->belongsToMany(Dish::class)->withPivot('quantity')->withTimestamps();
    }

    public function restaurant()
    {
        return $this->hasOne(Restaurant::class);
    }
}