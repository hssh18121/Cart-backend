<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function showOrders() {
        $orders = Order::all();

        return response()->json($orders, 200);
    }

    public function createOrder(Request $request) {
        $order = Order::create($request->all());

        return response()->json($order, 200);
    }

    public function showOrdersByYear($year) {
        
    }
}
