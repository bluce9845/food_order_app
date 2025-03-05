<?php

namespace Database\Seeders;

use App\Models\Order;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // DB::table('orders')->truncate();
        
        Order::create([
                'user_id' => 4, 
                'food_id' => 1, 
                'order_code' => 'ORD-' . Str::random(5) . '-' . time(),
                'count_order' => 3,
                'amount_price' => 75000,
                'payment' => 'cash',
                'order_status' => 'completed',
                'order_date' => now(),
            ]);
    }
}