@extends('User.layout')

@section('title')
    Home
@endsection

@section('content')
    <div>
        <div class='mt-1'>
            <img class="w-full " src="{{ asset('assets/images/new-banner.png') }}" alt="banner">
        </div>
    </div>

    <div id="MenuLoader">
        <div class=" text-center z-[9999] h-[90vh] w-full flex justify-center items-center   ">
            <svg aria-hidden="true" class="w-12 h-12 mx-auto text-center text-gray-600 animate-spin fill-primary"
                viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                    fill="currentColor" />
                <path
                    d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                    fill="currentFill" />
            </svg>
        </div>
    </div>

    <div class="w-full md:px-0 px-2  container mx-auto bg-white sticky top-20 z-50 hidden" id="menuCategory">
        <div class=" mx-auto p-6">

            <div class="relative">
                <button id="scroll-left"
                    class="absolute -left-6 top-1/2 transform -translate-y-1/2 z-10 bg-black flex justify-center items-center text-white p-2 h-8 w-8 rounded-full shadow-md hover:bg-gray-700 text-2xl">
                    &#8249;
                </button>
                <div id="scroll-container" class="flex space-x-4 overflow-x-scroll scrollbar-hide">

                </div>
                <button id="scroll-right"
                    class="absolute -right-6 top-1/2 transform -translate-y-1/2 z-10 bg-black flex justify-center items-center text-white p-2 h-8 w-8 rounded-full shadow-md hover:bg-gray-700 text-2xl">
                    &#8250;
                </button>
            </div>
        </div>
    </div>



    <div id="contentContainer" class="container mx-auto flex justify-center items-center flex-col gap-8 py-8 w-full hidden">
        <!-- The categories and items will be injected here via AJAX -->
    </div>


    <div>
        <div class="w-full py-16 bg-gray-50">
            <div class="max-w-screen-xl mx-auto px-6 grid md:grid-cols-2 gap-12 items-center">


                <div class="relative rounded-lg overflow-hidden mb-8 md:mb-0">
                    <img src="{{ asset('assets/images/home-a-banner.png') }}" alt="Restaurant Interior"
                        class="w-full h-full object-cover rounded-lg shadow-lg" />
                </div>


                <div class="text-center md:text-left">
                    <h2 class="text-3xl font-bold text-gray-800 mb-3">
                        Welcome to Tipu Restaurant
                    </h2>
                    <p class="text-lg text-gray-600 mb-4">
                        At Tipu restaurant, we bring you an unforgettable dining experience with a variety of delectable
                        dishes crafted from the freshest ingredients.
                    </p>
                    <p class="text-lg text-gray-600 mb-4">
                        Our chefs blend classic recipes with contemporary twists to offer something special for every
                        palate. From mouth-watering Kebabs to indulgent Desserts, every dish is made with love and passion.
                    </p>
                    <p class="text-lg text-gray-600 mb-4">
                        Whether you're looking for a cozy meal with family or a grand celebration, Delight Bistro is the
                        perfect destination to indulge in great food and warm hospitality.
                    </p>
                    <a href="menu"
                        class="inline-block bg-primary text-white font-semibold py-3 px-6 rounded-md shadow-md hover:bg-yellow-500 transition">
                        Explore Our Menu
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    @include('User.menu_data')
@endsection
