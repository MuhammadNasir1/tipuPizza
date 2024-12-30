@extends('Admin.layout')

@section('title', 'Order Details')

@section('content')
    <div class="min-h-screen bg-gray-100 py-10">
        <div class="container mx-auto px-4 lg:px-8">
            <!-- Page Title -->
            <h1 class="text-3xl font-bold text-gray-800 mb-6">Order #{{ $order->order_id }} Details</h1>

            <!-- Order Information Section -->
            <div class="bg-white shadow-md rounded-lg p-6 mb-6">
                <h2 class="text-xl font-semibold text-gray-800 mb-4">Order Information</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <p class="text-sm text-gray-600">Customer Name:</p>
                        <p class="text-lg font-medium text-gray-800">{{ $order->customer_name }}</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-600">Phone Number:</p>
                        <p class="text-lg font-medium text-gray-800">{{ $order->customer_phone }}</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-600">Email:</p>
                        <p class="text-lg font-medium text-gray-800">{{ $order->customer_email }}</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-600">Delivery Address:</p>
                        <p class="text-lg font-medium text-gray-800">{{ $order->customer_address ?? 'N/A' }}</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-600">Order Date & Time:</p>
                        <p class="text-lg font-medium text-gray-800">{{ \Carbon\Carbon::parse($order->order_date_time)->format('l, F j, Y g:i A') }}</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-600">Dining Option:</p>
                        <p class="text-lg font-medium text-gray-800">{{ ucfirst($order->dining_option == 'dine_in'  ?   "dine in" : $order->dining_option) }}</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-600">Total Amount:</p>
                        <p class="text-lg font-medium text-gray-800">£{{ number_format($order->order_total, 2) }}</p>
                    </div>
                </div>
            </div>

            <!-- Order Items Section -->
            <div class="bg-white shadow-md rounded-lg p-6 mb-6">
                <h2 class="text-xl font-semibold text-gray-800 mb-4">Order Items</h2>
                <table class="w-full table-auto">
                    <thead>
                        <tr class="text-left text-gray-600 border-b">
                            <th class="py-2 px-4">Item</th>
                            <th class="py-2 px-4">Size</th>
                            <th class="py-2 px-4">Quantity</th>
                            <th class="py-2 px-4">Price</th>
                            <th class="py-2 px-4">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($order->order_items as $item)
                            <tr class="border-b">
                                <td class="py-2 px-4">{{ $item->name }}</td>
                                <td class="py-2 px-4">{{ $item->size }}</td>
                                <td class="py-2 px-4">{{ $item->quantity }}</td>
                                <td class="py-2 px-4">£{{ number_format($item->price, 2) }}</td>
                                <td class="py-2 px-4">£{{ number_format($item->price * $item->quantity, 2) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Action Section (Optional: Update order status, etc.) -->
            <div class="bg-white shadow-md rounded-lg p-6">
                <h2 class="text-xl font-semibold text-gray-800 mb-4">Order Status</h2>
                <form action="../updateStatus/{{$order->order_id}}"  method="POST">
                    @csrf
                    
                    <div class="flex items-center gap-4">
                        <label for="orderStatus" class="text-sm text-gray-600">Update Order Status</label>
                        <select id="orderStatus" name="status" class="border rounded-lg px-4 py-2 text-gray-800">
                            <option value="pending" {{ $order->order_status == 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="processing" {{ $order->order_status == 'processing' ? 'selected' : '' }}>Processing</option>
                            <option value="completed" {{ $order->order_status == 'completed' ? 'selected' : '' }}>Completed</option>
                            <option value="canceled" {{ $order->order_status == 'canceled' ? 'selected' : '' }}>Canceled</option>
                        </select>
                    </div>

                    <div class="mt-4">
                        <button type="submit"
                            class="bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition">
                            Update Status
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection