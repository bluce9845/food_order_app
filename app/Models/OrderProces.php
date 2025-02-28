<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderProces extends Model
{
    protected $fillable = [
        'order_id',
        'user_admin_id',
        'status_order_process',
        'date_order_process',
    ];
}