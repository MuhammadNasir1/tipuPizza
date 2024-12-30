@extends('Admin.layout')
@section('title')
    Order
@endsection
@section('content')
    <div class="w-full pt-10 min-h-[88vh] border-2 shadow-2xl rounded-xl">
        <div class="flex justify-between w-full px-5">
            <div>
                <h1 class="text-3xl font-bold">Orders</h1>
            </div>

        </div>
        @php
            $headers = ['Sr.', 'Order No ', 'dining option', 'Order time', 'Order Note', 'status', 'Action'];
        @endphp
        <x-table :headers="$headers">
            <x-slot name="tablebody">
                {{-- @foreach ($orders as $order)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $order->order_id }}</td>
                        <td>{{ $order->dining_option == 'dine_in' ? 'Dine In' : 'delivery' }}</td>
                        <td>{{ \Carbon\Carbon::parse($order->order_date_time)->format('l, F j, Y g:i A') }}</td>
                        <td>{{ $order->order_note }}</td>
                        <td class="py-2 px-4">
                            <span
                                class="px-4 py-2 rounded-full text-white {{ $order->order_status == 'completed'
                                    ? 'bg-green-500'
                                    : ($order->order_status == 'pending'
                                        ? 'bg-yellow-500'
                                        : ($order->order_status == 'canceled'
                                            ? 'bg-red-500'
                                            : 'bg-blue-500')) }}">
                                {{ ucfirst($order->order_status) }}
                            </span>
                        </td>
                        <td><a href="../order/{{ $order->order_id }}"><button
                                    class="px-4 py-2 bg-primary text-white rounded-md">Details</button></a></td>
                    </tr>
                @endforeach --}}

            </x-slot>
        </x-table>




    </div>
@endsection
@section('js')
    <script>
          function fetchOrders() {
            $.ajax({
                url: "../getOrder", // Your JSON endpoint
                method: "GET",
                success: function (response) {
                    const orders = response.orders; // Assuming 'orders' is the key in your JSON response
                    const tableBody = $('#datatable tbody');
                    tableBody.empty(); // Clear existing rows

                    // Loop through each order and append a row
                    orders.forEach((order, index) => {
                        const statusClasses = {
                            completed: 'bg-green-500',
                            pending: 'bg-yellow-500',
                            canceled: 'bg-red-500',
                            other: 'bg-blue-500'
                        };
                        const statusClass = statusClasses[order.order_status] || statusClasses['other'];
                        const statusLabel = `<span class="px-4 py-2 rounded-full text-white ${statusClass}">
                                            ${order.order_status.charAt(0).toUpperCase() + order.order_status.slice(1)}
                                        </span>`;
                        const diningOption = order.dining_option === 'dine_in' ? 'Dine In' :  order.dining_option;
                        const formattedDate = new Date(order.order_date_time).toLocaleString('en-US', {
                            hour: 'numeric',
                            minute: 'numeric',
                            hour12: true
                        }) + " " + new Date(order.order_date_time).toLocaleString('en-US', {
                            month: 'short',
                            day: '2-digit',
                            year: '2-digit'
                        }).replace(",", "");

                        // Create table row
                        const row = `
                        <tr>
                            <td>${index + 1}</td>
                            <td>${order.order_id}</td>
                            <td>${diningOption}</td>
                            <td>${formattedDate}</td>
                            <td>${order.order_note ?? ''}</td>
                            <td>${statusLabel}</td>
                            <td>
                                <a href="../order/${order.order_id}">
                                    <button class="px-4 py-2 bg-primary text-white rounded-md">Details</button>
                                </a>
                            </td>
                        </tr>`;
                        tableBody.append(row); // Append the row to the table
                    });
                },
                error: function (xhr, status, error) {
                    console.error("Error fetching data:", error);
                }
            });
        }

        $(document).ready(function () {
            // Initial data load
            fetchOrders();

            // Refresh data every 5 seconds
            setInterval(fetchOrders, 5000);
        });
    </script>
@endsection
