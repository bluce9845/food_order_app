<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class ChefController extends Controller
{
    public function dashboard()
    {
           return view('chef.dashboard');
    }

    public function orderProcess()
    {
        $orders = Order::with('food', 'user')->get();

        return view('chef.cookProcess.cookProcess', compact('orders'));
    }

}