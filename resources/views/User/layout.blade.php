<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', '') - Qazaumri</title>
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

    <nav
        class="bg-white dark:bg-gray-900 fixed w-full z-[100] top-0 start-0 border-b border-gray-200 dark:border-gray-600 shadow-lg">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <a href="../" class="flex items-center space-x-3 rtl:space-x-reverse">
                <img src="{{ asset('assets/images/logo.png') }}" class="h-14" alt="Logo">
                {{-- <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">mg</span> --}}
            </a>
            <div class="flex md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
                {{-- <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Get started</button> --}}
                <button data-collapse-toggle="navbar-sticky" type="button"
                    class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
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
                    class="flex flex-col p-4 md:p-0 mt-4 font-medium border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 ">
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

                </ul>
            </div>
        </div>
    </nav>
    @yield('content')



    <!-- Scroll to Top Button -->
    <div id="scrollToTop"
        class="fixed bottom-10 right-8 bg-primary h-14 shadow-md w-14 rounded-full flex justify-center items-center text-white text-4xl font-bold cursor-pointer shadow-lg">
        <i class="fa fa-arrow-up"></i>
    </div>

    <!-- Social Media and Footer Section -->
    <div class="bg-primary text-white py-2 px-4">
        <div class="flex justify-between items-center">
            <span class="text-xl font-semibold">Tipu Pizza Kebab</span>
            <div class="flex gap-6">
                <a class="text-2xl" href="https://www.facebook.com/TipuPizzaKebab" target="_blank"
                    rel="noopener noreferrer">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a class="text-2xl" href="https://www.tiktok.com/@tipupizzakebab" target="_blank"
                    rel="noopener noreferrer">
                    <i class="fab fa-tiktok"></i>
                </a>
                <a class="text-2xl" href="https://www.instagram.com/tipupizzakebab/" target="_blank"
                    rel="noopener noreferrer">
                    <i class="fab fa-instagram"></i>
                </a>
            </div>
        </div>
    </div>

    <footer class="bg-primary py-6 px-16 font-sans tracking-wide">
        <div class="flex justify-between items-center max-lg:flex-col text-center flex-wrap gap-4">
            <p class="text-[15px] leading-loose text-white font-semibold">&copy; Tipu Pizza Kebab. All rights reserved.
            </p>

            <ul class="flex space-x-6 gap-y-2 max-lg:justify-center flex-wrap">
                <li><a href="#" class="text-[15px] text-white font-semibold">Terms of Service</a></li>
                <li><a href="#" class="text-[15px] text-white font-semibold">Privacy Policy</a></li>
                <li><a href="#" class="text-[15px] text-white font-semibold">Contact</a></li>
            </ul>
        </div>
    </footer>


    <script src="{{ asset('javascript/jquery.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('javascript/canvas.js') }}"></script>
    <script type="text/javascript" src="{{ asset('DataTables/DataTables-1.13.8/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('javascript/script.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $('#view-modal').addClass('hidden');
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
                // Calculate the scroll position with a 200px offset
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
