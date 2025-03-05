<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class ManagerController extends Controller
{
public function dashboard()
{
return view('manager.dashboard');
}

public function reportOrder(Request $request)
{
    $orders = Order::with(['user', 'food'])
            ->where('order_status', 'completed') 
            ->filter($request->all()) 
            ->get();

    $total_amount = $orders->sum('amount_price');

    return view('manager.reportOrder.reports-order', compact('orders', 'total_amount'));
}
}