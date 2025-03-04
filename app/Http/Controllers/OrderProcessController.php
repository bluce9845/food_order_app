<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderProces;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderProcessController extends Controller
{
    public function orderProcesStore($order_id)
    {
        $admin = User::where('role', 'admin')->first();

        if (!$admin) {
            return back()->with('error', 'Admin tidak ditemukan.');
        }

        $order = Order::findOrFail($order_id);

        OrderProces::create([
            'order_id' => $order_id,
            'user_admin_id' => $admin->id,
            'status_order_process' => 'completed',
            'date_order_process' => now(),
        ]);

        $order->update([
            'order_status' => 'completed'
        ]);

        return redirect()->route('chef-order-process')->with('success', 'Proses order berhasil dibuat!');
    }
}