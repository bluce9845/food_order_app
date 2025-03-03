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
            'order_date' => 'nullable|date',
        ]);
    
        // Ambil harga makanan
        $food = Food::findOrFail($request->food_id);
        $totalPrice = $food->price * $request->count_order;
    
        Order::create([
            'user_id' => Auth::id(),
            'food_id' => $request->food_id,
            'count_order' => $request->count_order,
            'amount_price' => $totalPrice,
            'order_status' => 'pending',
            'order_date' => now(),
        ]);
    
        return redirect()->route('dashboard')->with('success', 'Pesanan berhasil dibuat!');
    }
}