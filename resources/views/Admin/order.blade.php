@extends('Admin.layout')
@section('title')
    Category
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
                @foreach ($orders as $order)
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
                @endforeach

            </x-slot>
        </x-table>




    </div>
@endsection
@section('js')
@endsection
