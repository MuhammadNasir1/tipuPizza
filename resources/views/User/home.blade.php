@extends('User.layout')

@section('title')
    Home
@endsection

@section('content')
<div >
    <div class='mt-20'>
        <img class="w-full " src="{{asset('assets/images/hero-banner.jpg')}}" alt="banner">
    </div>
</div>

@include('User.menu_data')


<div>
    <div class="w-full py-16 bg-gray-50">
        <div class="max-w-screen-xl mx-auto px-6 grid md:grid-cols-2 gap-12 items-center">
          
       
          <div class="relative rounded-lg overflow-hidden mb-8 md:mb-0">
            <img
              src="{{asset('assets/images/about-1.png')}}"
              alt="Restaurant Interior"
              class="w-full h-full object-cover rounded-lg shadow-lg"
            />
          </div>
          
    
          <div class="text-center md:text-left">
            <h2 class="text-3xl font-bold text-gray-800 mb-3">
              Welcome to Tipu Restaurant
            </h2>
            <p class="text-lg text-gray-600 mb-4">
              At Tipu restaurant, we bring you an unforgettable dining experience with a variety of delectable dishes crafted from the freshest ingredients.
            </p>
            <p class="text-lg text-gray-600 mb-4">
              Our chefs blend classic recipes with contemporary twists to offer something special for every palate. From mouth-watering Kebabs to indulgent Desserts, every dish is made with love and passion.
            </p>
            <p class="text-lg text-gray-600 mb-4">
              Whether you're looking for a cozy meal with family or a grand celebration, Delight Bistro is the perfect destination to indulge in great food and warm hospitality.
            </p>
            <a
              href="menu"
              class="inline-block bg-primary text-white font-semibold py-3 px-6 rounded-md shadow-md hover:bg-yellow-500 transition"
            >
              Explore Our Menu
        </a>
          </div>
        </div>
      </div>
</div>
@endsection

