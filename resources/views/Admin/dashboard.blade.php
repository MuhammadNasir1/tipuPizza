@extends('Admin.layout')
@section('title')
    Home
@endsection

@section('content')
    <div class="min-h-[88vh] p-8 py-2 rounded-2xl  ">
        <h1 class="text-[32px] mt-[10px]  font-bold">Dashboard</h1>
        <p class="flex">
            <img class="mt-4" src="{{ asset("assets/Vector 3.svg") }}" alt="">
           <span class="mt-4 text-gray-400 ms-2">Today <span class="text-black">11, November 2024</span></span>
        </p>
        <div class="grid grid-cols-1 gap-4 mt-10 mb-4 xl:grid-cols-4 lg:grid-cols-4 md:grid-cols-2">
            <div
                class="flex items-center justify-between w-full h-full p-4 bg-white border-4 shadow-sm gradient-border rounded-xl">
                <div>
                    <h2 class="mb-1 text-sm font-medium text-gray-400">Operators</h2>
                    <p class="text-2xl font-bold text-gray-800 ">5,738</p>
                </div>
                <div class="flex items-center justify-center rounded-full w-14 h-14 bg-customOrangeDark">
                    <img class="w-8 h-8" src="{{ asset('assets/tasbih 1.svg') }}" alt="">
                </div>
            </div>
            <div
                class="flex items-center justify-between w-full h-full p-4 bg-white border-4 shadow-sm gradient-border rounded-xl">
                <div>
                    <h2 class="mb-1 text-sm font-medium text-gray-400">Cities</h2>
                    <p class="text-2xl font-bold text-gray-800 ">5,738</p>
                </div>
                <div class="flex items-center justify-center rounded-full w-14 h-14 bg-customOrangeDark">
                    <img class="w-8 h-8" src="{{ asset('assets/dash1svg.svg') }}" alt="">
                </div>
            </div>
            <div
                class="flex items-center justify-between w-full h-full p-4 bg-white border-4 shadow-sm gradient-border rounded-xl">
                <div>
                    <h2 class="mb-1 text-sm font-medium text-gray-400">Blogs</h2>
                    <p class="text-2xl font-bold text-gray-800 ">5,738</p>
                </div>
                <div class="flex items-center justify-center rounded-full w-14 h-14 bg-customOrangeDark">
                    <img class="w-8 h-8" src="{{ asset('assets/dua.svg') }}" alt="">
                </div>
            </div>
            <div
                class="flex items-center justify-between w-full h-full p-4 bg-white border-4 shadow-sm gradient-border rounded-xl">
                <div>
                    <h2 class="mb-1 text-sm font-medium text-gray-400">Diseases</h2>
                    <p class="text-2xl font-bold text-gray-800 ">5,738</p>
                </div>
                <div class="flex items-center justify-center rounded-full w-14 h-14 bg-customOrangeDark">
                    <img class="w-8 h-8" src="{{ asset('assets/quran 1.svg') }}" alt="">
                </div>
            </div>
        </div>

    </div>
    </div>
    </div>
    {{-- <div class="container p-4 mx-auto">
        <div class="grid-cols-1 gap-4 gird md:grid-cols-2">
            <div class="flex p-4 bg-white rounded-lg shadow-md">
                <img class="rounded-lg" src="{{ asset('assets/Rectangle 403.jpg') }}" alt="">
                <h2 class="mt-4 font-bold text-md">
                    Lorem ipsum dolor sit amet consectetur.
                </h2>
                <p class="text-sm text-gray-600">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>


            </div>

        </div>
    </div> --}}
    </div>
@endsection
