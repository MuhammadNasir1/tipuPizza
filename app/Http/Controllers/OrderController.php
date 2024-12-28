<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function order(Request $request)

    {

        try {

            $order = Order::create([
                'customer_name' => $request->name,
                'customer_phone' => $request->phone,
                'customer_email' => $request->email,
                'customer_address' => $request->address,
                'dining_option' => $request->dining_option,
                'order_note' => $request->order_note,
                'order_total' => $request->total_amount,
                'order_date_time' => $request->datetime,
                'order_items' => json_encode($request->cart_data),
            ]);

            return response()->json(['success' => true, 'message' => 'order Placed'], 200);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 400);
        }
    }
}
