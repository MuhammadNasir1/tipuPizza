@extends('User.layout')

@section('content')
<div class="flex flex-col gap-8 px-6 py-20 mx-auto mt-20 lg:grid lg:grid-cols-2 max-w-7xl lg:px-4 ">
    <!-- Left Section -->
    <div class="relative w-full mt-14">
        <div><img src="{{ asset("assets/pexels-jack-sparrow-5917717.jpg") }}" alt=""></div>
    </div>

    <!-- Right Section (Contact Form) -->
    <div class="w-full">
        <div>
            <h2 class="text-2xl font-semibold">Apply for Job</h2>
            <p class="mt-4 text-gray-600">
                For all enquiries, please contact us, and one of our delightful team members will be happy to help.
            </p>

            <form class="mt-6 space-y-4">
                <div class="w-full">
                    <select name="Job Role" id="" required>
                        <option disabled selected>Select Job Role  </option>
                        <option value="">Delivery</option>
                        <option value="">Chef</option>
                        <option value="">Restaurant</option>
                    </select>

                </div>
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
                        Submit
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
