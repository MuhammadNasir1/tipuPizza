<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', '') - Tipu Pizza Kebab</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" type="text/css" href="{{ asset('DataTables/DataTables-1.13.8/css/jquery.dataTables.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{ asset('assets/default-logo-1.png') }}" type="image/x-icon">
    <style>
        #loading {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: white;
            z-index: 9999;
        }
    </style>
</head>

<body>

    <div id="loading">
        <div class=" text-center z-[9999] h-screen w-screen flex justify-center items-center   ">
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
    <div class="px-4 md:px-16 py-2 text-white bg-primary">
        <div class="flex items-center justify-between">
            <p class="text-md  flex gap-4 items-center"><span><i class="fa-solid fa-envelope"></i> <a
                        href="mailto:tipupizzakebab@gmail.com" class="text-xs md:text-lg">tipupizzakebab@gmail.com</a>
                </span></p>
            {{-- <p class="text-md  flex gap-4 items-center"><span><i class="fa-solid fa-envelope"></i> a </span> | <span><i class="fa-solid fa-phone mr-4"></i> 12345678</span> </span> --}}
            <div class="flex md:gap-6 gap-4">
                <a class="lg:text-2xl md:text-xl text-sm" href="https://www.facebook.com/TipuPizzaKebab" target="_blank"
                    rel="noopener noreferrer">
                    {{-- <i class="fab fa-facebook-f"></i> --}}
                    <img src="{{asset('assets/fb-logo.png')}}" alt="Facebook" class="h-8">
                </a>
                <a class="lg:text-2xl md:text-xl text-sm" href="https://www.tiktok.com/@tipupizzakebab" target="_blank"
                    rel="noopener noreferrer">
                    <img src="{{asset('assets/tiktok.png')}}" alt="Tiktok" class="h-8">

                </a>
                <a class="lg:text-2xl md:text-xl text-sm" href="https://www.instagram.com/tipupizzakebab/"
                    target="_blank" rel="noopener noreferrer">
                    <img src="{{asset('assets/insta.png')}}" alt="instagram" class="h-8">

                </a>
            </div>
        </div>
    </div>
    <div>
        <nav
            class="bg-white dark:bg-gray-900 sticky w-full z-[100] top-0 border-b border-gray-200 dark:border-gray-600 shadow-lg">
            <div class="flex flex-wrap items-center justify-between max-w-screen-xl p-4 mx-auto">
                <a href="../" class="flex items-center space-x-3 rtl:space-x-reverse">
                    <img src="{{ asset('assets/images/new-logo.png') }}" class="h-14" alt="Logo">
                    {{-- <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">mg</span> --}}
                </a>
                <div class="flex items-center space-x-3 md:order-2 md:space-x-0 rtl:space-x-reverse">
                    {{-- <button type="button" class="px-4 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Get started</button> --}}
                    <a href="../cart" id="cartButton" class="relative">
                        {{-- <svg class="h-8 w-8 text-primary" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                        <path
                            d="M0 24C0 10.7 10.7 0 24 0L69.5 0c22 0 41.5 12.8 50.6 32l411 0c26.3 0 45.5 25 38.6 50.4l-41 152.3c-8.5 31.4-37 53.3-69.5 53.3l-288.5 0 5.4 28.5c2.2 11.3 12.1 19.5 23.6 19.5L488 336c13.3 0 24 10.7 24 24s-10.7 24-24 24l-288.3 0c-34.6 0-64.3-24.6-70.7-58.5L77.4 54.5c-.7-3.8-4-6.5-7.9-6.5L24 48C10.7 48 0 37.3 0 24zM128 464a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm336-48a48 48 0 1 1 0 96 48 48 0 1 1 0-96z" />
                    </svg> --}}
                        <svg class="h-8 w-8 text-primary" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                            <path
                                d="M160 112c0-35.3 28.7-64 64-64s64 28.7 64 64l0 48-128 0 0-48zm-48 48l-64 0c-26.5 0-48 21.5-48 48L0 416c0 53 43 96 96 96l256 0c53 0 96-43 96-96l0-208c0-26.5-21.5-48-48-48l-64 0 0-48C336 50.1 285.9 0 224 0S112 50.1 112 112l0 48zm24 48a24 24 0 1 1 0 48 24 24 0 1 1 0-48zm152 24a24 24 0 1 1 48 0 24 24 0 1 1 -48 0z" />
                        </svg>
                        <span id="cartItemCount"
                            class="absolute top-0 -right-1 bg-red-500 text-white text-xs rounded-full h-5 w-5 flex items-center justify-center">0</span>
                        </button>
                    </a>
                    <button data-collapse-toggle="navbar-sticky" type="button"
                        class="inline-flex items-center justify-center w-10 h-10 p-2 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                        aria-controls="navbar-sticky" aria-expanded="false">
                        <span class="sr-only">Open main menu</span>
                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 17 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M1 1h15M1 7h15M1 13h15" />
                        </svg>
                    </button>
                </div>
                <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-sticky">
                    <ul
                        class="flex flex-col p-4 mt-4 mx-auto font-medium border border-gray-100 rounded-lg md:p-0  md:space-x-6      md:flex-row md:mt-0 md:border-0 ">
                        <li>
                            <a href="../"
                                class="block py-2 px-3  rounded md:bg-transparent  md:p-0 {{ request()->is('/') ? ' bg-primary md:text-primary text-white' : 'text-gray-900 ' }} "
                                aria-current="page">Home</a>
                        </li>
                        <li>
                            <a href="../menu"
                                class="block py-2 px-3  rounded md:bg-transparent  md:p-0 {{ request()->is('menu') ? ' bg-primary md:text-primary text-white' : 'text-gray-900 ' }} ">Menu</a>
                        </li>
                        <li>
                            <a href="../contact"
                                class="block py-2 px-3  rounded md:bg-transparent  md:p-0 {{ request()->is('contact') ? ' bg-primary md:text-primary text-white' : 'text-gray-900 ' }}  ">Contact</a>
                        </li>
                        <li>
                            <a href="../apply"
                                class="block py-2 px-3  rounded md:bg-transparent  md:p-0 {{ request()->is('apply') ? ' bg-primary md:text-primary text-white' : 'text-gray-900 ' }} ">Apply
                                For Job</a>
                        </li>
                        <li>
                            <a href="../supplier"
                                class="block py-2 px-3  rounded md:bg-transparent  md:p-0 {{ request()->is('supplier') ? ' bg-primary md:text-primary text-white' : 'text-gray-900 ' }} ">Supplier</a>
                        </li>
                        <li>
                            <a href="../about"
                                class="block py-2 px-3  rounded md:bg-transparent  md:p-0 {{ request()->is('about') ? ' bg-primary md:text-primary text-white' : 'text-gray-900 ' }} ">About</a>
                        </li>
                        {{-- <li>
                        <a href="../about"
                            class="block py-2 px-3  rounded md:bg-transparent  md:p-0 {{ request()->is('about') ? ' bg-primary md:text-primary text-white' : 'text-gray-900 ' }} ">About</a>
                    </li> --}}
                        {{-- <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown"
                        class="inline-flex items-center px-3 py-2 mt-2 font-medium text-center text-black border border-gray-100 rounded-lg focus:outline-none md:p-0 bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 focus:ring-0 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                        type="button">Others<svg class="w-2.5 h-2.5 ms-3" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 4 4 4-4" />
                        </svg>
                    </button>
                    <div id="dropdown"
                        class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                            aria-labelledby="dropdownDefaultButton">
                            <li>
                                <a href="../apply"
                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Apply
                                    For Job</a>
                            </li>
                            <li>
                                <a href="../supplier"
                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Supplier</a>
                            </li>
                        </ul>
                    </div> --}}

                    </ul>
                </div>
            </div>
        </nav>
        @yield('content')



        <!-- Scroll to Top Button -->
        <div id="scrollToTop"
            class="fixed flex items-center justify-center text-4xl font-bold text-white rounded-full shadow-lg cursor-pointer bottom-10 right-8 bg-primary border-2 border-white h-14 w-14">
            <i class="fa fa-arrow-up"></i>
        </div>

        <div>
            <img class="w-full" src="{{ asset('assets/images/night-view.png') }}" alt="night-view">
        </div>

        <!-- Social Media and Footer Section -->
        <div class="px-4 md:px-16 py-2 text-white bg-primary">
            <div class="flex items-center justify-between">
                <span class="text-xl font-semibold">Tipu Pizza Kebab</span>
                <div class="flex gap-6">
                    <a class="lg:text-2xl md:text-xl text-sm" href="https://www.facebook.com/TipuPizzaKebab" target="_blank"
                    rel="noopener noreferrer">
                    {{-- <i class="fab fa-facebook-f"></i> --}}
                    <img src="{{asset('assets/fb-logo.png')}}" alt="Facebook" class="h-8">
                </a>
                <a class="lg:text-2xl md:text-xl text-sm" href="https://www.tiktok.com/@tipupizzakebab" target="_blank"
                    rel="noopener noreferrer">
                    <img src="{{asset('assets/tiktok.png')}}" alt="Tiktok" class="h-8">

                </a>
                <a class="lg:text-2xl md:text-xl text-sm" href="https://www.instagram.com/tipupizzakebab/"
                    target="_blank" rel="noopener noreferrer">
                    <img src="{{asset('assets/insta.png')}}" alt="instagram" class="h-8">

                </a>
                <a class="lg:text-2xl md:text-xl text-sm" href=""
                    target="_blank" rel="noopener noreferrer">
                    <img src="{{asset('assets/halal-icon.png')}}" alt="instagram" class="h-10">

                </a>
                </div>
            </div>
        </div>
        <div>

        </div>
        <footer class="px-16 pt-6 font-sans tracking-wide bg-primary">
            <p class="text-[.9375rem] leading-loose text-white font-semibold text-center">&copy; 2024 Tipu Pizza Kebab.
                All rights reserved | Developed by <a href="https://thewebconcept.com/" class="text-gray-100">The Web
                    Concept</a>.
            </p>
            {{-- <div class="flex flex-wrap items-center justify-center gap-4 text-center max-lg:flex-col"> --}}

            {{-- <ul class="flex flex-wrap space-x-6 gap-y-2 max-lg:justify-center">
                <li><a href="#" class="text-[.9375rem] text-white font-semibold">Terms of Service</a></li>
                <li><a href="#" class="text-[.9375rem] text-white font-semibold">Privacy Policy</a></li>
                <li><a href="#" class="text-[.9375rem] text-white font-semibold">Contact</a></li>
            </ul> --}}
            {{-- </div> --}}
        </footer>


        <script src="{{ asset('javascript/jquery.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="{{ asset('javascript/canvas.js') }}"></script>
        <script type="text/javascript" src="{{ asset('DataTables/DataTables-1.13.8/js/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('javascript/script.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <script>
            $('#view-modal').addClass('hidden');

            function updateCartCount() {
                let cartItem = JSON.parse(localStorage.getItem('cart')) || [];
                let addonsCartItems = JSON.parse(localStorage.getItem('addonsCart')) || [];

                const totalItems = cartItem.reduce((sum, item) => sum + (item.quantity || 0), 0) +
                    addonsCartItems.reduce((sum, addon) => sum + (addon.addonQuantity || 0), 0);

                $('#cartItemCount').text(totalItems);
            }

            updateCartCount();

            $(document).ready(function() {



                // Scroll to top functionality
                $('#scrollToTop').on('click', function() {
                    $('html, body').animate({
                        scrollTop: 0
                    }, 'slow');
                });

            });
            $(window).on('load', function() {
                $('#loading').hide();
            })
            $(document).ready(function() {
                $('#datatable').DataTable();
                $('select').select2({
                    width: '100%'
                });
                $('#Items_dropdown').select2({
                    minimumResultsForSearch: Infinity
                });
            });


            $(document).ready(function() {
                const scrollContainer = $("#scroll-container");

                $("#scroll-left").on("click", function() {
                    scrollContainer.animate({
                        scrollLeft: '-=300'
                    }, 400);
                });

                $("#scroll-right").on("click", function() {
                    scrollContainer.animate({
                        scrollLeft: '+=300'
                    }, 400);
                });

                window.handleCategoryClick = function(categoryId) {
                    const element = $("#" + categoryId);
                    if (element.length) {
                        $("html, body").animate({
                            scrollTop: element.offset().top - 250,
                        }, 400);
                    }
                };
            });

            function handleCategoryClick(categoryId) {
                const target = $("#" + categoryId);
                if (target.length) {
                    // Calculate the scroll position with a 12.5rem offset
                    const offset = target.offset().top - 280;
                    $("html, body").animate({
                        scrollTop: offset
                    }, 200); // 800ms for smooth scrolling
                }
            }
        </script>
        @yield('js')
</body>

</html>
