<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
use HasFactory;

protected $fillable = [
'user_id',
'food_id',
'count_order',
'amount_price',
'order_date',
'order_status',
];

// Relasi ke User (Setiap order dimiliki satu user)
public function user(): BelongsTo
{
return $this->belongsTo(User::class, 'user_id');
}

// Relasi ke Food (Setiap order hanya memiliki satu makanan)
public function food(): BelongsTo
{
return $this->belongsTo(Food::class, 'food_id');
}
}