@extends('User.layout')

@section('content')
<div class="mt-20 lg:grid flex flex-col lg:grid-cols-2 gap-8 py-20 max-w-7xl mx-auto px-6 lg:px-4 ">
    <!-- Left Section -->
    <div class="w-full relative">
        <div class="md:grid flex flex-col md:grid-cols-2 gap-6 w-full relative">
            <!-- Address Card -->
            <div class="border-4 border-primary flex flex-col justify-center items-center py-6 px-4 rounded-lg">
                <div class="h-24 w-24 text-white text-[50px] rounded-full bg-primary flex justify-center items-center">
                        <i  class="fas fa-map-marker-alt text-3xl"></i>
                    
                </div>
                <h2 class="text-2xl font-semibold text-primary mt-3">Address</h2>
                <p class="text-lg text-gray-600 font-medium text-center">
                    2 Curzon St, Derby DE1 1LL
                </p>
            </div>

            <!-- Email Card -->
            <div class="border-4 border-primary flex flex-col justify-center items-center py-6 px-4 rounded-lg">
                <div class="h-24 w-24 text-white text-[50px] rounded-full bg-primary flex justify-center items-center">
                        <i class="fas fa-envelope text-3xl"></i>
                    
                </div>
                <h2 class="text-2xl font-semibold text-primary mt-3">Email</h2>
                <p class="text-lg text-gray-600 font-medium text-center">
                    tipupizzakebab@gmail.com
                </p>
            </div>

            <!-- Google Map -->
            <div class="col-span-2">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2959.8039332572916!2d-1.4816794!3d52.922724699999996!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4879f1f801b9feb7%3A0xcba458a3a606b604!2sTipu%20Balti!5e1!3m2!1sen!2s!4v1735130836118!5m2!1sen!2s"
                    class="w-full h-56 rounded-lg border-0"
                    allowfullscreen=""
                 
                    referrerpolicy="no-referrer-when-downgrade"
                    title="Google Map"></iframe>
            </div>
        </div>
    </div>

    <!-- Right Section (Contact Form) -->
    <div class="w-full">
        <div>
            <h2 class="font-semibold text-2xl">Have a Question?</h2>
            <p class="text-gray-600 mt-4">
                For all enquiries, please contact us, and one of our delightful team members will be happy to help.
            </p>

            <form class="mt-6 space-y-4">
                <input
                    type="text"
                    class="w-full border border-gray-300 py-3 px-4 placeholder-gray-500 rounded-lg focus:ring-primary focus:border-primary"
                    placeholder="Full Name" />
                <input
                    type="email"
                    class="w-full border border-gray-300 py-3 px-4 placeholder-gray-500 rounded-lg focus:ring-primary focus:border-primary"
                    placeholder="Email Address" />
                <input
                    type="text"
                    class="w-full border border-gray-300 py-3 px-4 placeholder-gray-500 rounded-lg focus:ring-primary focus:border-primary"
                    placeholder="Phone Number" />
                <textarea
                    class="w-full border border-gray-300 h-36 py-3 px-4 placeholder-gray-500 rounded-lg focus:ring-primary focus:border-primary"
                    placeholder="Message"></textarea>
                <div class="flex justify-center">
                    <button
                        type="submit"
                        class="bg-primary text-white px-6 py-3 font-semibold rounded-lg hover:bg-primary-dark">
                        Send Message
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Timing Section -->
    <div class="col-span-2 bg-primary rounded-2xl p-6">
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
        </div>
    </div>
</div>

@endsection
