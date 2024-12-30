@extends('Admin.layout')
@section('title')
    Inquires
@endsection
@section('content')

    <div class="w-full pt-10 min-h-[88vh] border-2 shadow-2xl rounded-xl">
        <div class="flex justify-between w-full px-5">
            <div>
                <h1 class="text-3xl font-bold">Inquires</h1>
            </div>

        </div>
        @php
            $headers = ['Sr.',  'Name', 'Email' ,  'Phone'   , 'message'];
        @endphp
        <x-table :headers="$headers">
            <x-slot name="tablebody">
                @foreach ($inquiries as $inquiry)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td class='text-xs xl:text-[15px]'>{{ $inquiry->name }}</td>
                        <td class='text-xs xl:text-[15px]'>{{ $inquiry->email }}</td>
                        <td class='text-xs xl:text-[15px]'>{{ $inquiry->phone }}</td>
                        <td class='text-xs xl:text-[15px] min-w-[280px]'>{{ $inquiry->message }}</td>


                    </tr>
                @endforeach

            </x-slot>
        </x-table>




    </div>
@endsection
