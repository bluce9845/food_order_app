<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index($id)
    {
        $food = Food::findOrFail($id);
        return view('Food.order.orderForm', compact('food'));
    }

  public function store(Request $request)
    {
        $validatedData = $request->validate([
            'food_id' => 'required|exists:food,id',
            'count_order' => 'required|integer|min:1',
            'amount_price' => 'required|numeric',
            'payment' => 'required|string',
            'order_date' => 'nullable|date',
        ]);

        $food = Food::findOrFail($request->food_id);

        if($food->supply < $request->count_order)
        {
            return back()->with('error', );
        }

        $totalPrice = $food->price * $request->count_order;

        Order::create([
            'user_id' => Auth::id(),
            'food_id' => $request->food_id,
            'count_order' => $request->count_order,
            'amount_price' => $totalPrice,
            'payment' => $request->payment,
            'order_status' => 'pending',
            'order_date' => now(),
        ]);

        $food->decrement('supply', $request->count_order);

        return redirect()->route('dashboard')->with('success', 'Pesanan berhasil dibuat!');
    }

}