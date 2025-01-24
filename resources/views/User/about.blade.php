@extends('User.layout')

@section('title')
About
@endsection



@section('content')
  <!-- Header Section -->
  <section class="text-center py-16 bg-gray-100 about-bg">
    <h1 class="text-4xl font-bold text-white">About Us</h1>
    <p class="text-lg mt-4 text-slate-200">Discover the story behind our restaurant and what makes us unique</p>
</section>

<!-- About Content Section -->
<section class="max-w-6xl mx-auto px-4 py-12 grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
    <!-- Text Content -->
    <div class="space-y-6">
        <h2 class="text-3xl font-semibold text-primary">About Tipu Pizza</h2>
        <p class="text-gray-700 leading-relaxed">
            Welcome to our restaurant, where we serve a blend of traditional flavors with a modern twist.
            Founded by a group of passionate chefs, our restaurant brings you fresh ingredients, innovative dishes,
            and a warm atmosphere where you can enjoy every bite.
        </p>
        <p class="text-gray-700 leading-relaxed">
            Our commitment to quality and excellence is evident in every plate we serve. We focus on sustainability,
            sourcing locally and supporting our community, ensuring that you experience the best of what our region has to offer.
        </p>
    </div>

    <!-- Image Section -->
    <div class="flex justify-center items-center">
        <img src="{{asset('assets/logo-large.png')}}" alt="Restaurant Image" class="w-full">
    </div>


       <!-- Timing Section -->
       {{-- <div class="col-span-2 bg-primary rounded-2xl p-6">
        <h2 class="text-white font-bold text-center text-3xl">Our Timing</h2>
        <div class="flex flex-col md:flex-row justify-around gap-6 mt-6 max-w-4xl mx-auto">
            <div class="text-white text-center">
                <h3 class="font-semibold text-2xl">Monday - Friday</h3>
                <p>12:00 PM - 10:00 PM</p>
            </div>
            <div class="text-white text-center">
                <h3 class="font-semibold text-2xl">Saturday - Sunday</h3>
                <p>12:00 PM - 11:00 PM</p>
            </div>
        </div> --}}
    </div>
</section>

@endsection
