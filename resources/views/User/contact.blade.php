@extends('User.layout')
@section('title')
    Contact Us
@endsection
@section('content')
    <div class="mt-4 lg:grid flex flex-col lg:grid-cols-2 gap-8 py-20 max-w-7xl mx-auto px-6 lg:px-4 ">
        <!-- Left Section -->
        <div class="w-full relative">
            <div class="md:grid flex flex-col md:grid-cols-2 gap-6 w-full relative">
                <!-- Address Card -->
                <div class="border-4 border-primary flex flex-col justify-center items-center py-6 px-4 rounded-lg">
                    <div class="h-24 w-24 text-white text-[50px] rounded-full bg-primary flex justify-center items-center">
                        <i class="fas fa-map-marker-alt text-3xl"></i>

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
                        class="w-full h-56 rounded-lg border-0" allowfullscreen=""
                        referrerpolicy="no-referrer-when-downgrade" title="Google Map"></iframe>
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

                <form id="inquiryForm" class="mt-6 space-y-4" id="" url="addInquiry">
                    @csrf
                    <input type="text" required name="name"
                        class="w-full border border-gray-300 py-3 px-4 placeholder-gray-500 rounded-lg focus:ring-primary focus:border-primary"
                        placeholder="Full Name" />
                    <input type="email" required name="email"
                        class="w-full border border-gray-300 py-3 px-4 placeholder-gray-500 rounded-lg focus:ring-primary focus:border-primary"
                        placeholder="Email Address" />
                    <input type="text" required name="phone"
                        class="w-full border border-gray-300 py-3 px-4 placeholder-gray-500 rounded-lg focus:ring-primary focus:border-primary"
                        placeholder="Phone Number" />
                        <div>
                            <div class="flex gap-2 items-center">
                                <label class="text-gray-600     ">Are you from UK:</label>
                                <div class="flex items-center me-4">
                                    <input id="ukLocation" type="radio" value="uk" name="location" required
                                        class="w-4 h-4 text-green-600 bg-gray-100 border-gray-300 focus:ring-green-500 ">
                                    <label for="ukLocation" class="ms-2 text-sm font-medium text-gray-900">Yes</label>
                                </div>
                                <div class="flex items-center me-4">
    
                                    <input id="otherLocation" type="radio" value="other" name="location" required
                                        class="w-4 h-4 text-red-600 bg-gray-100 border-gray-300 focus:ring-red-500 ">
                                    <label for="otherLocation" class="ms-2 text-sm font-medium text-gray-900">No</label>
                                </div>
                            </div>
                        </div>
                    <textarea
                        class="w-full border border-gray-300 h-36 py-3 px-4 placeholder-gray-500 rounded-lg focus:ring-primary focus:border-primary"
                        placeholder="Message" required name="message"></textarea>
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
                                Send Message
                            </div>
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
@section('js')
    <script>
        $(document).ready(function() {

            $("#inquiryForm").submit(function(event) {
                event.preventDefault();
                var formData = $(this).serialize();
                // Send the AJAX request
                $.ajax({
                    type: "POST",
                    url: "../addInquiry",
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
                            // window.location.href = '../contact';
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