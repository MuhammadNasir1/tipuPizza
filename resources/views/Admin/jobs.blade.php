@extends('Admin.layout')
@section('title')
    Jobs
@endsection
@section('content')

    <div class="w-full pt-10 min-h-[88vh] border-2 shadow-2xl rounded-xl">
        <div class="flex justify-between w-full px-5">
            <div>
                <h1 class="text-3xl font-bold">Jobs</h1>
            </div>

        </div>
        @php
            $headers = ['Sr.',  'Name', 'Email' ,  'Phone' , 'Job Role' , 'Description'];
        @endphp
        <x-table :headers="$headers">
            <x-slot name="tablebody">
                @foreach ($jobs as $job)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td class='text-xs xl:text-[15px]'>{{ $job->name }}</td>
                        <td class='text-xs xl:text-[15px]'>{{ $job->email }}</td>
                        <td class='text-xs xl:text-[15px]'>{{ $job->phone }}</td>
                        <td class='text-xs xl:text-[15px]'>{{ $job->job_role }}</td>
                        <td class='text-xs xl:text-[15px] min-w-[280px]'>{{ $job->job_description }}</td>


                    </tr>
                @endforeach

            </x-slot>
        </x-table>




    </div>
@endsection
