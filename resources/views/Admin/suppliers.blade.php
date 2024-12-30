@extends('Admin.layout')
@section('title')
    Suppliers
@endsection
@section('content')

    <div class="w-full pt-10 min-h-[88vh] border-2 shadow-2xl rounded-xl">
        <div class="flex justify-between w-full px-5">
            <div>
                <h1 class="text-3xl font-bold">Suppliers</h1>
            </div>

        </div>
        @php
            $headers = ['Sr.',  'Name', 'Email' ,  'Phone'  , 'message'];
        @endphp
        <x-table :headers="$headers">
            <x-slot name="tablebody">
                @foreach ($suppliers as $supplier)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td class='text-xs xl:text-[15px]'>{{ $supplier->name }}</td>
                        <td class='text-xs xl:text-[15px]'>{{ $supplier->email }}</td>
                        <td class='text-xs xl:text-[15px]'>{{ $supplier->phone }}</td>
                        <td class='text-xs xl:text-[15px] min-w-[280px]'>{{ $supplier->message }}</td>


                    </tr>
                @endforeach

            </x-slot>
        </x-table>




    </div>
@endsection
