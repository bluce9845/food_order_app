<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    protected $fillable = [
        'food_name',
        'supply',
        'price',
        'image_food',
    ];
}