<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Food extends Model
{
    protected $fillable = [
        'food_name',
        'supply',
        'price',
        'image_food',
    ];

    public function orders():BelongsToMany
    {
        return $this->belongsToMany(Order::class);
    }
}
