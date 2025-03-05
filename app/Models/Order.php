<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'food_id',
        'order_code',
        'count_order',
        'amount_price',
        'payment',
        'order_date',
        'order_status',
    ];


    protected static function boot()
    {
        parent::boot();

        static::creating(function ($order) {
            $order->order_code = 'ORD-' . Str::random(5) . '-' . time();
        });
    }


    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function food(): BelongsTo
    {
        return $this->belongsTo(Food::class, 'food_id');
    }

    public function scopeFilter($query, $filters)
    {
        return $query->when($filters['month'] ?? false, fn ($q, $month) => $q->whereMonth('created_at', $month))
                     ->when($filters['year'] ?? false, fn ($q, $year) => $q->whereYear('created_at', $year));
    }
}