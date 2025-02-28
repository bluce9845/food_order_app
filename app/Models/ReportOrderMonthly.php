<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReportOrderMonthly extends Model
{
    protected $fillable = [
        'monthly_report',
        'year_report',
        'count_order_from_month',
        'count_of_income',
    ];
}