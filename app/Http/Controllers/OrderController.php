<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    public function index()
    {
        try {
            $orders  = Order::orderBy('created_at', 'desc')->get();
            // return view('Admin.order', compact('orders'));
            return response()->json(['success' => true, 'message' => 'order Placed', "orders" => $orders], 200);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 400);
        }
    }
    public function orderDetails($id)
    {

        $order  = Order::find($id);
        if (!$order) {
            return response()->json(['success' => false, 'message' => 'Order not found'], 404);
        }
        $order->order_items = json_decode($order->order_items);
        // return response()->json($order);
        return view('Admin.order_details', compact('order'));
    }
    public function insertOrder(Request $request)

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

    public function updateStatus(Request $request, $orderId)
    {
        $order = Order::findOrFail($orderId);
        $order->order_status = $request->input('status');
        $order->save();

        return redirect('../admin/order');
        // return redirect()->route('Admin.order_details', $orderId)->with('success', 'Order status updated successfully!');
    }
}
