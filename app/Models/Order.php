<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order extends Model
{
    protected $fillable = [
        'count_order',
        'amount_price',
        'order_status',
        'order_date',
    ];

    public function userOrder(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}