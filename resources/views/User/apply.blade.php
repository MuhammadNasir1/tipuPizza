@extends('User.layout')
@section('title')
    Apply for Job
@endsection
@section('content')
    <div class="flex flex-col gap-8 px-6 py-20 mx-auto mt-0 lg:grid lg:grid-cols-2 max-w-7xl lg:px-4 items-center ">
        <!-- Left Section -->
        <div class="relative w-full mt-14">
            <div><img class="w-full rounded-xl" src="{{ asset('assets/pexels-jack-sparrow-5917717.jpg') }}" alt="About Banner">
            </div>
        </div>

        <!-- Right Section (Contact Form) -->
        <div class="w-full">
            <div>
                <h2 class="text-2xl font-semibold">Apply for Job</h2>
                <p class="mt-4 text-gray-600">
                    For all enquiries, please contact us, and one of our delightful team members will be happy to help.
                </p>

                <form id="jobForm" class="mt-6 space-y-4" url="../applyJobs" method="POST">
                    @csrf
                    <div class="w-full">
                        <select required name="job_role" id="" required>
                            <option disabled selected>Select Job Role </option>
                            <option value="delivery">Delivery</option>
                            <option value="chef">Chef</option>
                            <option value="other">Other</option>
                        </select>

                    </div>
                    <input type="text" name="name" required
                        class="w-full px-4 py-3 placeholder-gray-500 border border-gray-300 rounded-lg focus:ring-primary focus:border-primary"
                        placeholder="Full Name" />
                    <input type="email" name="email" required
                        class="w-full px-4 py-3 placeholder-gray-500 border border-gray-300 rounded-lg focus:ring-primary focus:border-primary"
                        placeholder="Email Address" />
                    <input type="text" name="phone" required
                        class="w-full px-4 py-3 placeholder-gray-500 border border-gray-300 rounded-lg focus:ring-primary focus:border-primary"
                        placeholder="Phone Number" />
                    <div>
                        <div class="flex gap-2 items-center">
                            <label class="text-gray-600     ">Are you from UK:</label>
                            <div class="flex items-center me-4">
                                <input id="ukLocation" type="radio" value="uk" name="job_location" required
                                    class="w-4 h-4 text-green-600 bg-gray-100 border-gray-300 focus:ring-green-500 ">
                                <label for="ukLocation" class="ms-2 text-sm font-medium text-gray-900">Yes</label>
                            </div>
                            <div class="flex items-center me-4">

                                <input id="otherLocation" type="radio" value="other" name="job_location" required
                                    class="w-4 h-4 text-red-600 bg-gray-100 border-gray-300 focus:ring-red-500 ">
                                <label for="otherLocation" class="ms-2 text-sm font-medium text-gray-900">No</label>
                            </div>
                        </div>
                        <span class="text-xs font-semibold mt-2"><span class="text-primary">Note:</span> We preferred UK peoples </span>
                    </div>
                    <textarea required
                        class="w-full px-4 py-3 placeholder-gray-500 border border-gray-300 rounded-lg h-36 focus:ring-primary focus:border-primary"
                        placeholder="Description" name="job_description"></textarea>
                    <div class="flex justify-center">
                        <button class="bg-primary w-full font-bold text-white focus:outline-none rounded-full p-3 "
                            id="submitBtn">
                            <div class=" text-center hidden" id="spinner">
                                <svg aria-hidden="true"
                                    class="w-5 h-5 mx-auto text-center text-gray-200 animate-spin fill-primary"
                                    viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                                        fill="currentColor" />
                                    <path
                                        d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                                        fill="currentFill" />
                                </svg>
                            </div>
                            <div class="text-white   font-semibold" id="text">
                                Apply Now
                            </div>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $(document).ready(function() {

            $("#jobForm").submit(function(event) {
                event.preventDefault();
                var formData = $(this).serialize();
                // Send the AJAX request
                $.ajax({
                    type: "POST",
                    url: "../applyJobs",
                    data: formData,
                    dataType: "json",
                    beforeSend: function() {
                        $('#spinner').removeClass('hidden');
                        $('#text').addClass('hidden');
                        $('#submitBtn').attr('disabled', true);
                    },
                    success: function(response) {

                        $('#text').removeClass('hidden');
                        $('#spinner').addClass('hidden');
                        // window.location.href = '../apply';
                        Swal.fire({
                                icon: 'success',
                                title: 'Order Placed!',
                                text: 'Your order has been placed successfully!',
                                confirmButtonColor: '#EC1223',
                                customClass: {
                                    icon: 'text-primary',
                                },
                            }).then(function() {
                                window.location.href =
                                    '../'; // Redirect to the home page
                            });
                    },
                    error: function(jqXHR) {

                        let response = JSON.parse(jqXHR.responseText);

                        Swal.fire(
                            'Warning!',
                            response.message,
                            'warning'
                        )
                        $('#text').removeClass('hidden');
                        $('#spinner').addClass('hidden');
                        $('#submitBtn').attr('disabled', false);
                    }
                });
            });
        });
    </script>
@endsection
