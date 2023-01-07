<?php

namespace App\Http\Controllers\OrderDetail;

use App\Http\Controllers\Controller;
use App\Models\OrderDetails;
use Illuminate\Http\Request;

class OrderDetailController extends Controller
{
    public function getOrderDetails($id) {
        $order_details = OrderDetails::where('order_id', $id)->get();

        if ($order_details == null) {
            return response()->json(['Order does not exist', 400]);
        } else {
            return response()->json($order_details, 200);
        }

    }
}
