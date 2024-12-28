@extends('User.layout')

@section('content')
<div class="flex flex-col gap-8 px-6 py-20 mx-auto mt-20 lg:grid lg:grid-cols-2 max-w-7xl lg:px-4 ">
    <!-- Left Section -->
    <div class="relative w-full">
        <div class="relative flex flex-col w-full gap-6 md:grid md:grid-cols-2">
            <!-- Address Card -->
            <div class="flex flex-col items-center justify-center px-4 py-6 border-4 rounded-lg border-primary">
                <div class="h-24 w-24 text-white text-[50px] rounded-full bg-primary flex justify-center items-center">
                        <i  class="text-3xl fas fa-map-marker-alt"></i>

                </div>
                <h2 class="mt-3 text-2xl font-semibold text-primary">Address</h2>
                <p class="text-lg font-medium text-center text-gray-600">
                    2 Curzon St, Derby DE1 1LL
                </p>
            </div>

            <!-- Email Card -->
            <div class="flex flex-col items-center justify-center px-4 py-6 border-4 rounded-lg border-primary">
                <div class="h-24 w-24 text-white text-[50px] rounded-full bg-primary flex justify-center items-center">
                        <i class="text-3xl fas fa-envelope"></i>

                </div>
                <h2 class="mt-3 text-2xl font-semibold text-primary">Email</h2>
                <p class="text-lg font-medium text-center text-gray-600">
                    tipupizzakebab@gmail.com
                </p>
            </div>

            <!-- Google Map -->
            <div class="col-span-2">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2959.8039332572916!2d-1.4816794!3d52.922724699999996!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4879f1f801b9feb7%3A0xcba458a3a606b604!2sTipu%20Balti!5e1!3m2!1sen!2s!4v1735130836118!5m2!1sen!2s"
                    class="w-full h-56 border-0 rounded-lg"
                    allowfullscreen=""

                    referrerpolicy="no-referrer-when-downgrade"
                    title="Google Map"></iframe>
            </div>
        </div>
    </div>

    <!-- Right Section (Contact Form) -->
    <div class="w-full">
        <div>
            <h2 class="text-2xl font-semibold">Have a Question?</h2>
            <p class="mt-4 text-gray-600">
                For all enquiries, please contact us, and one of our delightful team members will be happy to help.
            </p>

            <form class="mt-6 space-y-4">
                <input
                    type="text"
                    class="w-full px-4 py-3 placeholder-gray-500 border border-gray-300 rounded-lg focus:ring-primary focus:border-primary"
                    placeholder="Full Name" />
                <input
                    type="email"
                    class="w-full px-4 py-3 placeholder-gray-500 border border-gray-300 rounded-lg focus:ring-primary focus:border-primary"
                    placeholder="Email Address" />
                <input
                    type="text"
                    class="w-full px-4 py-3 placeholder-gray-500 border border-gray-300 rounded-lg focus:ring-primary focus:border-primary"
                    placeholder="Phone Number" />
                <textarea
                    class="w-full px-4 py-3 placeholder-gray-500 border border-gray-300 rounded-lg h-36 focus:ring-primary focus:border-primary"
                    placeholder="Message"></textarea>
                <div class="flex justify-center">
                    <button
                        type="submit"
                        class="px-6 py-3 font-semibold text-white rounded-lg bg-primary hover:bg-primary-dark">
                        Send Message
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
