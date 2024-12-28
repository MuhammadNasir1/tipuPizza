<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <title>Login</title>
</head>

<body>


    <section style="background-image: url('{{ asset('assets/loginbgpic.png') }}');"
        class="flex items-center justify-center h-screen mx-auto bg-[#EC1223] bg-center bg-no-repeat bg-cover bg-blend-multiply">
        <div class="container mx-auto">
            <div class="flex max-w-sm mx-auto overflow-hidden bg-white rounded-lg shadow-lg lg:max-w-4xl">
                <div class="hidden bg-cover bg-[#EC1223]  lg:block lg:w-1/2">
                    <img class="w-full h-full " src="{{ asset('assets/pexels-muffin-1653877.jpg') }}" alt="">

                </div>
                <div class="w-full p-6 lg:p-16 lg:w-1/2">
                    <form id="login_data" method="post">
                        @csrf
                        <h2 class="text-4xl font-extrabold text-center text-[#EC1223] ">LOGIN</h2>
                        <div class="mt-4">
                            <label class="block mb-2 text-sm font-bold text-black">Email:</label>
                            <input
                                class="block w-full px-4 py-2 text-gray-700 border border-gray-300 rounded-full shadow-2xl focus:outline-none focus:border-[#EC1223] "
                                placeholder="mail@gmail.com" type="email" name="email" />
                        </div>
                        <div class="relative mt-4">
                            <label class="block mb-2 text-sm font-bold text-black">Password</label>
                            <input
                                class="block w-full px-4 py-2 text-gray-700 border border-gray-300 rounded-full shadow-2xl focus:outline-none focus:border-[#EC1223] "
                                placeholder="Enter your password" type="password" id="password" name="password" />
                            <span class="absolute inset-y-0 flex items-center cursor-pointer right-4 top-8"
                                id="toggle-password">
                                <i class="text-gray-400 fa-solid fa-eye-slash" id="toggle-icon"></i>
                            </span>

                        </div>
                        <div class=" my-4 ">
                            <button class="bg-primary w-full font-bold text-white focus:outline-none rounded-full p-3 ">
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
                                    Login
                                </div>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <script src="{{ asset('javascript/jquery.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        const passwordField = document.getElementById('password');
        const togglePasswordButton = document.getElementById('toggle-password');
        const toggleIcon = document.getElementById('toggle-icon');

        togglePasswordButton.addEventListener('click', () => {
            // Toggle password visibility
            const isPassword = passwordField.type === 'password';
            passwordField.type = isPassword ? 'text' : 'password';

            // Toggle icon
            toggleIcon.classList.toggle('fa-eye-slash', !isPassword);
            toggleIcon.classList.toggle('fa-eye', isPassword);
        });


        $(document).ready(function() {

            $("#login_data").submit(function(event) {
                event.preventDefault();
                var formData = $(this).serialize();
                // Send the AJAX request
                $.ajax({
                    type: "POST",
                    url: "/login",
                    data: formData,
                    dataType: "json",
                    beforeSend: function() {
                        $('#spinner').removeClass('hidden');
                        $('#text').addClass('hidden');
                        $('#loginbutton').attr('disabled', true);
                    },
                    success: function(response) {
                        // Handle the success response here
                        if (response.success == true) {
                            $('#text').removeClass('hidden');
                            $('#spinner').addClass('hidden');

                            window.location.href = '/admin/order';

                        } else if (response.success == false) {
                            Swal.fire(
                                'Warning!',
                                response.message,
                                'warning'
                            )
                        }
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
                        $('#loginbutton').attr('disabled', false);
                    }
                });
            });
        });
    </script>
</body>

</html>
