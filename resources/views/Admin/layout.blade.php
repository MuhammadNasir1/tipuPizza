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
    <div class="flex  bg-[#EC1223] h-[100vh]  scroll-smooth">
        <div class="bg-[#EC1223] lg:w-[15rem]">
            <div class=" h-[100%] lg:overflow-hidden overflow-scroll  hidden p-2 lg:flex flex-col justify-between">
                <div>
                    <div class="flex ">
                        <img class="mt-5 ms-2" src="{{ asset('assets/iconsidebarsvg/logo.svg') }}" alt="">
                    </div>

                    <ul class="pt-7">
                        <li class="">
                            <a href="/"
                                class="flex items-center justify-between px-1 py-3 text-white duration-500 rounded-lg hover:bg-white hover:fill-black hover:text-[#EC1223]">
                                <div class="flex gap-3">
                                    <svg class="w-6 h-6 ms-2  group-hover:stroke-[#EC1223]" width="25"
                                        height="25" viewBox="0 0 20 20" fill="currentcolor"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <g clip-path="url(#clip0_843_5378)">
                                            <path
                                                d="M3.5 10.1333C3.33431 10.1333 3.2 9.99902 3.2 9.83333V3.5C3.2 3.33431 3.33431 3.2 3.5 3.2H8.16667C8.33235 3.2 8.46667 3.33431 8.46667 3.5V9.83333C8.46667 9.99902 8.33235 10.1333 8.16667 10.1333H3.5ZM3.5 16.8C3.33431 16.8 3.2 16.6657 3.2 16.5V13.5C3.2 13.3343 3.33431 13.2 3.5 13.2H8.16667C8.33235 13.2 8.46667 13.3343 8.46667 13.5V16.5C8.46667 16.6657 8.33235 16.8 8.16667 16.8H3.5ZM11.8333 16.8C11.6676 16.8 11.5333 16.6657 11.5333 16.5V10.1667C11.5333 10.001 11.6676 9.86667 11.8333 9.86667H16.5C16.6657 9.86667 16.8 10.001 16.8 10.1667V16.5C16.8 16.6657 16.6657 16.8 16.5 16.8H11.8333ZM11.5333 3.5C11.5333 3.33431 11.6676 3.2 11.8333 3.2H16.5C16.6657 3.2 16.8 3.33431 16.8 3.5V6.5C16.8 6.66569 16.6657 6.8 16.5 6.8H11.8333C11.6676 6.8 11.5333 6.66569 11.5333 6.5V3.5Z"
                                                stroke="" stroke-width="1.4" />
                                        </g>
                                        <defs>
                                            <clipPath id="clip0_843_5378">
                                                <rect width="20" height="20" fill="" />
                                            </clipPath>
                                        </defs>
                                    </svg>
                                    <h2 class="poppins font text-md ">Dashboard</h2>
                                </div>
                            </a>
                        </li>



                        <li>
                            <a href="../admin/menu"
                                class="flex items-center justify-between px-1 py-3 text-white duration-500 rounded-lg fill-white hover:bg-white hover:fill-black hover:text-[#EC1223]">
                                <div class="flex gap-3">
                                    <svg class="group-hover:stroke-[#EC1223] ms-2" width="20" height="19"
                                        viewBox="0 0 20 19" fill="currentcolor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M0 2.77461C0 2.29722 0.263392 1.83938 0.732233 1.50182C1.20107 1.16425 1.83696 0.974609 2.5 0.974609H17.5C18.163 0.974609 18.7989 1.16425 19.2678 1.50182C19.7366 1.83938 20 2.29722 20 2.77461V17.1746C20 17.652 19.7366 18.1098 19.2678 18.4474C18.7989 18.785 18.163 18.9746 17.5 18.9746H2.5C1.83696 18.9746 1.20107 18.785 0.732233 18.4474C0.263392 18.1098 0 17.652 0 17.1746V2.77461ZM17.5 2.77461H2.5V17.1746H17.5V2.77461ZM9.435 5.26131C9.66934 5.43008 9.80098 5.65896 9.80098 5.89761C9.80098 6.13626 9.66934 6.36513 9.435 6.53391L7.00375 8.28261C6.71076 8.49338 6.31354 8.61177 5.89937 8.61177C5.48521 8.61177 5.08799 8.49338 4.795 8.28261L3.69 7.48701C3.57061 7.40399 3.47538 7.30468 3.40987 7.19487C3.34436 7.08507 3.30988 6.96697 3.30844 6.84747C3.30699 6.72797 3.33862 6.60946 3.40147 6.49885C3.46432 6.38824 3.55714 6.28776 3.67451 6.20325C3.79187 6.11875 3.93144 6.05192 4.08506 6.00667C4.23868 5.96142 4.40328 5.93865 4.56925 5.93968C4.73523 5.94072 4.89925 5.96555 5.05176 6.01272C5.20426 6.05989 5.34219 6.12845 5.4575 6.21441L5.9 6.53301L7.6675 5.26041C7.90191 5.09169 8.21979 4.9969 8.55125 4.9969C8.8827 4.9969 9.20059 5.09259 9.435 5.26131ZM11.25 7.27461C11.25 7.03591 11.3817 6.807 11.6161 6.63821C11.8505 6.46943 12.1685 6.37461 12.5 6.37461H15C15.3315 6.37461 15.6495 6.46943 15.8839 6.63821C16.1183 6.807 16.25 7.03591 16.25 7.27461C16.25 7.5133 16.1183 7.74222 15.8839 7.91101C15.6495 8.07979 15.3315 8.17461 15 8.17461H12.5C12.1685 8.17461 11.8505 8.07979 11.6161 7.91101C11.3817 7.74222 11.25 7.5133 11.25 7.27461ZM3.75 11.3246C3.75 10.9666 3.94754 10.6232 4.29917 10.37C4.65081 10.1168 5.12772 9.97461 5.625 9.97461H8.125C8.62228 9.97461 9.09919 10.1168 9.45083 10.37C9.80246 10.6232 10 10.9666 10 11.3246V13.1246C10 13.4827 9.80246 13.826 9.45083 14.0792C9.09919 14.3324 8.62228 14.4746 8.125 14.4746H5.625C5.12772 14.4746 4.65081 14.3324 4.29917 14.0792C3.94754 13.826 3.75 13.4827 3.75 13.1246V11.3246ZM6.25 11.7746V12.6746H7.5V11.7746H6.25ZM11.25 12.2246C11.25 11.9859 11.3817 11.757 11.6161 11.5882C11.8505 11.4194 12.1685 11.3246 12.5 11.3246H15C15.3315 11.3246 15.6495 11.4194 15.8839 11.5882C16.1183 11.757 16.25 11.9859 16.25 12.2246C16.25 12.4633 16.1183 12.6922 15.8839 12.861C15.6495 13.0298 15.3315 13.1246 15 13.1246H12.5C12.1685 13.1246 11.8505 13.0298 11.6161 12.861C11.3817 12.6922 11.25 12.4633 11.25 12.2246Z"
                                            fill="" />
                                    </svg>
                                    <h2 class="poppins font text-md ">Menu</h2>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="queries"
                                class="flex items-center justify-between px-1 py-3 text-white duration-500 rounded-lg fill-white hover:bg-white hover:fill-black hover:text-[#EC1223]">
                                <div class="flex gap-3">
                                    <svg class="group-hover:stroke-[#EC1223] ms-2" width="20" height="19"
                                        viewBox="0 0 20 19" fill="currentcolor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M0 2.77461C0 2.29722 0.263392 1.83938 0.732233 1.50182C1.20107 1.16425 1.83696 0.974609 2.5 0.974609H17.5C18.163 0.974609 18.7989 1.16425 19.2678 1.50182C19.7366 1.83938 20 2.29722 20 2.77461V17.1746C20 17.652 19.7366 18.1098 19.2678 18.4474C18.7989 18.785 18.163 18.9746 17.5 18.9746H2.5C1.83696 18.9746 1.20107 18.785 0.732233 18.4474C0.263392 18.1098 0 17.652 0 17.1746V2.77461ZM17.5 2.77461H2.5V17.1746H17.5V2.77461ZM9.435 5.26131C9.66934 5.43008 9.80098 5.65896 9.80098 5.89761C9.80098 6.13626 9.66934 6.36513 9.435 6.53391L7.00375 8.28261C6.71076 8.49338 6.31354 8.61177 5.89937 8.61177C5.48521 8.61177 5.08799 8.49338 4.795 8.28261L3.69 7.48701C3.57061 7.40399 3.47538 7.30468 3.40987 7.19487C3.34436 7.08507 3.30988 6.96697 3.30844 6.84747C3.30699 6.72797 3.33862 6.60946 3.40147 6.49885C3.46432 6.38824 3.55714 6.28776 3.67451 6.20325C3.79187 6.11875 3.93144 6.05192 4.08506 6.00667C4.23868 5.96142 4.40328 5.93865 4.56925 5.93968C4.73523 5.94072 4.89925 5.96555 5.05176 6.01272C5.20426 6.05989 5.34219 6.12845 5.4575 6.21441L5.9 6.53301L7.6675 5.26041C7.90191 5.09169 8.21979 4.9969 8.55125 4.9969C8.8827 4.9969 9.20059 5.09259 9.435 5.26131ZM11.25 7.27461C11.25 7.03591 11.3817 6.807 11.6161 6.63821C11.8505 6.46943 12.1685 6.37461 12.5 6.37461H15C15.3315 6.37461 15.6495 6.46943 15.8839 6.63821C16.1183 6.807 16.25 7.03591 16.25 7.27461C16.25 7.5133 16.1183 7.74222 15.8839 7.91101C15.6495 8.07979 15.3315 8.17461 15 8.17461H12.5C12.1685 8.17461 11.8505 8.07979 11.6161 7.91101C11.3817 7.74222 11.25 7.5133 11.25 7.27461ZM3.75 11.3246C3.75 10.9666 3.94754 10.6232 4.29917 10.37C4.65081 10.1168 5.12772 9.97461 5.625 9.97461H8.125C8.62228 9.97461 9.09919 10.1168 9.45083 10.37C9.80246 10.6232 10 10.9666 10 11.3246V13.1246C10 13.4827 9.80246 13.826 9.45083 14.0792C9.09919 14.3324 8.62228 14.4746 8.125 14.4746H5.625C5.12772 14.4746 4.65081 14.3324 4.29917 14.0792C3.94754 13.826 3.75 13.4827 3.75 13.1246V11.3246ZM6.25 11.7746V12.6746H7.5V11.7746H6.25ZM11.25 12.2246C11.25 11.9859 11.3817 11.757 11.6161 11.5882C11.8505 11.4194 12.1685 11.3246 12.5 11.3246H15C15.3315 11.3246 15.6495 11.4194 15.8839 11.5882C16.1183 11.757 16.25 11.9859 16.25 12.2246C16.25 12.4633 16.1183 12.6922 15.8839 12.861C15.6495 13.0298 15.3315 13.1246 15 13.1246H12.5C12.1685 13.1246 11.8505 13.0298 11.6161 12.861C11.3817 12.6922 11.25 12.4633 11.25 12.2246Z"
                                            fill="" />
                                    </svg>
                                    <h2 class="poppins font text-md ">Queries</h2>
                                </div>
                            </a>
                        </li>

                        <li>
                            <a href="setting"
                                class="flex items-center justify-between px-1 py-3 text-white duration-500 rounded-lg fill-white hover:bg-white hover:fill-black hover:text-[#EC1223]">
                                <div class="flex gap-3">
                                    <svg class="group-hover:stroke-[#EC1223] ms-2" width="19" height="20"
                                        viewBox="0 0 19 20" fill="currentcolor" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M9.45207 6.33398C8.72687 6.33398 8.01796 6.54903 7.41498 6.95193C6.812 7.35483 6.34203 7.92748 6.06451 8.59748C5.78699 9.26747 5.71438 10.0047 5.85586 10.716C5.99734 11.4272 6.34655 12.0806 6.85934 12.5934C7.37214 13.1062 8.02547 13.4554 8.73674 13.5969C9.448 13.7383 10.1852 13.6657 10.8552 13.3882C11.5252 13.1107 12.0979 12.6407 12.5008 12.0377C12.9037 11.4348 13.1187 10.7258 13.1187 10.0007C13.1176 9.02853 12.731 8.09654 12.0436 7.40914C11.3562 6.72175 10.4242 6.33509 9.45207 6.33398ZM9.45207 12.334C8.99058 12.334 8.53945 12.1971 8.15574 11.9407C7.77202 11.6844 7.47295 11.3199 7.29635 10.8936C7.11975 10.4672 7.07354 9.99806 7.16357 9.54544C7.2536 9.09282 7.47583 8.67706 7.80215 8.35073C8.12848 8.02441 8.54423 7.80218 8.99686 7.71215C9.44948 7.62212 9.91863 7.66833 10.345 7.84493C10.7714 8.02154 11.1358 8.32061 11.3922 8.70432C11.6486 9.08803 11.7854 9.53916 11.7854 10.0007C11.7847 10.6193 11.5387 11.2124 11.1012 11.6498C10.6638 12.0872 10.0707 12.3333 9.45207 12.334Z"
                                            fill="" />
                                        <path
                                            d="M18.6001 12.7633L17.2763 11.6736C17.511 10.5702 17.511 9.4298 17.2763 8.32642L18.6001 7.23671C18.7528 7.11162 18.8559 6.93626 18.8911 6.74204C18.9262 6.54783 18.8911 6.34743 18.792 6.17675L17.4332 3.82329C17.3349 3.65206 17.1789 3.5214 16.9931 3.45474C16.8073 3.38809 16.6038 3.38979 16.4191 3.45954L14.8124 4.0615C13.9754 3.30528 12.988 2.73458 11.9149 2.38684L11.633 0.696378C11.6011 0.501558 11.5008 0.324474 11.3502 0.196865C11.1996 0.0692564 11.0084 -0.000534032 10.811 3.07723e-06H8.09342C7.89602 -0.000527197 7.70487 0.0692604 7.55424 0.196859C7.40362 0.324458 7.30335 0.501528 7.27142 0.696336L6.98967 2.38684C5.91659 2.73457 4.92916 3.30528 4.09217 4.0615L2.4853 3.45946C2.30063 3.38975 2.09717 3.38808 1.91138 3.45474C1.72559 3.5214 1.56961 3.65204 1.47138 3.82325L0.112592 6.17688C0.0134927 6.34757 -0.0216017 6.54797 0.0135944 6.74218C0.0487904 6.93639 0.151978 7.11173 0.304675 7.23679L1.6283 8.32642C1.39363 9.4298 1.39363 10.5702 1.6283 11.6736L0.30455 12.7633C0.151877 12.8884 0.0487179 13.0637 0.0135455 13.2579C-0.021627 13.4522 0.0134843 13.6526 0.112592 13.8232L1.47143 16.1767C1.56966 16.3479 1.72567 16.4786 1.91149 16.5452C2.0973 16.6119 2.30079 16.6102 2.48547 16.5405L4.09222 15.9385C4.9292 16.6947 5.91663 17.2654 6.98971 17.6132L7.27146 19.3036C7.30339 19.4984 7.40364 19.6755 7.55426 19.8031C7.70488 19.9307 7.89602 20.0005 8.09342 20H10.811C11.0084 20.0005 11.1996 19.9307 11.3502 19.8032C11.5008 19.6756 11.6011 19.4985 11.633 19.3037L11.9148 17.6132C12.9879 17.2654 13.9753 16.6947 14.8123 15.9385L16.4191 16.5405C16.6038 16.6102 16.8073 16.6119 16.993 16.5452C17.1788 16.4786 17.3348 16.348 17.433 16.1767L18.7918 13.8231C18.8909 13.6525 18.926 13.4521 18.8909 13.2579C18.8558 13.0637 18.7527 12.8884 18.6001 12.7633ZM16.4903 15.1433L14.4857 14.3923L14.1822 14.6979C13.347 15.5396 12.3024 16.1434 11.1561 16.4467L10.7395 16.5566L10.3876 18.6667H8.51717L8.16542 16.5566L7.74876 16.4467C6.60246 16.1434 5.55786 15.5396 4.72272 14.6979L4.41917 14.3923L2.4143 15.1433L1.47926 13.5234L3.13047 12.1641L3.01797 11.7485C2.70858 10.6034 2.70858 9.39662 3.01797 8.25146L3.13047 7.83596L1.47926 6.47663L2.41451 4.85671L4.41905 5.60771L4.72259 5.30213C5.55774 4.46036 6.60234 3.85664 7.74863 3.55325L8.1653 3.44342L8.51701 1.33334H10.3876L10.7393 3.44342L11.156 3.55325C12.3023 3.85664 13.3469 4.46036 14.182 5.30213L14.4856 5.60771L16.4901 4.85671L17.4254 6.47658L15.7742 7.83596L15.8867 8.25146C16.1961 9.39662 16.1961 10.6034 15.8867 11.7485L15.7742 12.1641L17.4254 13.5234L16.4903 15.1433Z"
                                            fill="" />
                                    </svg>
                                    <h2 class="poppins font text-md ">Settings</h2>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
                <div>
                    <ul class="mb-2">
                        <li>
                            <a href="loginpage"
                                class="flex items-center gap-3  px-1 py-3  text-white duration-500 rounded-lg fill-current hover:bg-white hover:fill-black hover:text-[#EC1223]">
                                <span> <svg class="ms-2" width="20" height="19" viewBox="0 0 20 19"
                                        fill="currentcolor" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M4.54545 8.18182H11.8182V10H4.54545V12.7273L0 9.09091L4.54545 5.45455V8.18182ZM3.63636 14.5455H6.09818C7.1479 15.4712 8.44244 16.0744 9.82648 16.2827C11.2105 16.4909 12.6252 16.2954 13.9009 15.7195C15.1766 15.1437 16.259 14.212 17.0182 13.0362C17.7775 11.8604 18.1814 10.4905 18.1814 9.09091C18.1814 7.69129 17.7775 6.3214 17.0182 5.14563C16.259 3.96985 15.1766 3.03813 13.9009 2.46227C12.6252 1.88642 11.2105 1.69089 9.82648 1.89915C8.44244 2.10741 7.1479 2.71061 6.09818 3.63637H3.63636C4.48242 2.50653 5.5803 1.58956 6.84279 0.958313C8.10528 0.327069 9.49759 -0.00105786 10.9091 2.56208e-06C15.93 2.56208e-06 20 4.07 20 9.09091C20 14.1118 15.93 18.1818 10.9091 18.1818C9.49759 18.1829 8.10528 17.8548 6.84279 17.2235C5.5803 16.5923 4.48242 15.6753 3.63636 14.5455Z"
                                            fill="" />
                                    </svg></span>
                                <h2 class="poppins fonttext-md ">Logout</h2>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

        </div>
        <div class="bg-white lg:rounded-l-3xl w-[100%] overflow-y-auto content pb-5">
            <div class="header flex justify-between h-[4rem] items-end">
                <div class="flex items-end">
                    <!-- drawer init and show -->
                    <div class="block text-center lg:hidden">
                        <button class="" type="button" data-drawer-target="drawer-navigation"
                            data-drawer-show="drawer-navigation" aria-controls="drawer-navigation">
                            <i class="block mb-2 ml-3 text-2xl fa-solid fa-bars-staggered lg:hidden"></i>
                        </button>
                    </div>
                    <!-- drawer component -->
                    <div id="drawer-navigation"
                        class="fixed top-0 left-0 z-40 w-64 h-screen overflow-y-auto transition-transform -translate-x-full bg-[#EC1223] "
                        tabindex="-1" aria-labelledby="drawer-navigation-label">

                        <button type="button  "  data-drawer-hide="drawer-navigation"
                            aria-controls="drawer-navigation"
                            class="text-gray-400 bg-transparent modalCloseBtn hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm  absolute top-2.5 end-2.5 inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white py-1.5">

                            <span class="sr-only ">Close menu</span>
                        </button>
                        <div>
                            <div class="flex ">
                                <img class="mt-5 ms-2" src="{{ asset('assets/iconsidebarsvg/logo.svg') }}"
                                    alt="">
                            </div>

                            <ul class="pt-7">
                                <li class="">
                                    <a href="#"
                                        class="flex items-center justify-between mx-3 py-3 text-white duration-500 rounded-lg hover:bg-white hover:fill-black hover:text-[#EC1223]">
                                        <div class="flex gap-3">
                                            <svg class="w-6 h-6 ms-2  group-hover:stroke-[#EC1223]" width="25"
                                                height="25" viewBox="0 0 20 20" fill="currentcolor"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <g clip-path="url(#clip0_843_5378)">
                                                    <path
                                                        d="M3.5 10.1333C3.33431 10.1333 3.2 9.99902 3.2 9.83333V3.5C3.2 3.33431 3.33431 3.2 3.5 3.2H8.16667C8.33235 3.2 8.46667 3.33431 8.46667 3.5V9.83333C8.46667 9.99902 8.33235 10.1333 8.16667 10.1333H3.5ZM3.5 16.8C3.33431 16.8 3.2 16.6657 3.2 16.5V13.5C3.2 13.3343 3.33431 13.2 3.5 13.2H8.16667C8.33235 13.2 8.46667 13.3343 8.46667 13.5V16.5C8.46667 16.6657 8.33235 16.8 8.16667 16.8H3.5ZM11.8333 16.8C11.6676 16.8 11.5333 16.6657 11.5333 16.5V10.1667C11.5333 10.001 11.6676 9.86667 11.8333 9.86667H16.5C16.6657 9.86667 16.8 10.001 16.8 10.1667V16.5C16.8 16.6657 16.6657 16.8 16.5 16.8H11.8333ZM11.5333 3.5C11.5333 3.33431 11.6676 3.2 11.8333 3.2H16.5C16.6657 3.2 16.8 3.33431 16.8 3.5V6.5C16.8 6.66569 16.6657 6.8 16.5 6.8H11.8333C11.6676 6.8 11.5333 6.66569 11.5333 6.5V3.5Z"
                                                        stroke="" stroke-width="1.4" />
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0_843_5378">
                                                        <rect width="20" height="20" fill="" />
                                                    </clipPath>
                                                </defs>
                                            </svg>
                                            <h2 class="poppins font text-md ">Dashboard</h2>
                                        </div>
                                    </a>
                                </li>
                                {{-- active in V2 --}}
                                {{-- <li>
                                    <a href="#"
                                        class="flex items-center justify-between mx-3 py-3 text-white duration-500 rounded-lg hover:bg-white hover:fill-black hover:text-[#EC1223]">
                                        <div class="flex gap-3">
                                            <svg class="group-hover:stroke-[#EC1223] ms-2" width="25" height="25"
                                                viewBox="0 0 24 24" fill="currentcolor" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M17 10C18.6569 10 20 8.65685 20 7C20 5.34315 18.6569 4 17 4C15.3431 4 14 5.34315 14 7C14 8.65685 15.3431 10 17 10Z"
                                                    stroke="" stroke-width="1.5" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                                <path
                                                    d="M7 20C8.65685 20 10 18.6569 10 17C10 15.3431 8.65685 14 7 14C5.34315 14 4 15.3431 4 17C4 18.6569 5.34315 20 7 20Z"
                                                    stroke="" stroke-width="1.5" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                                <path
                                                    d="M14 14H20V19C20 19.2652 19.8946 19.5196 19.7071 19.7071C19.5196 19.8946 19.2652 20 19 20H15C14.7348 20 14.4804 19.8946 14.2929 19.7071C14.1054 19.5196 14 19.2652 14 19V14ZM4 4H10V9C10 9.26522 9.89464 9.51957 9.70711 9.70711C9.51957 9.89464 9.26522 10 9 10H5C4.73478 10 4.48043 9.89464 4.29289 9.70711C4.10536 9.51957 4 9.26522 4 9V4Z"
                                                    stroke="" stroke-width="1.5" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                            </svg>

                                            <span class="poppins font text-md">Categories</span>
                                        </div>
                                    </a>
                                </li> --}}






                            </ul>
                        </div>
                        <div>
                            <ul class="mb-2">
                                <li>
                                    <a href="#"
                                        class="flex items-center gap-3 mx-3 py-3  text-white duration-500 rounded-lg fill-current hover:bg-white hover:fill-black hover:text-[#EC1223]">
                                        <span> <svg class="ms-2" width="20" height="19" viewBox="0 0 20 19"
                                                fill="currentcolor" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M4.54545 8.18182H11.8182V10H4.54545V12.7273L0 9.09091L4.54545 5.45455V8.18182ZM3.63636 14.5455H6.09818C7.1479 15.4712 8.44244 16.0744 9.82648 16.2827C11.2105 16.4909 12.6252 16.2954 13.9009 15.7195C15.1766 15.1437 16.259 14.212 17.0182 13.0362C17.7775 11.8604 18.1814 10.4905 18.1814 9.09091C18.1814 7.69129 17.7775 6.3214 17.0182 5.14563C16.259 3.96985 15.1766 3.03813 13.9009 2.46227C12.6252 1.88642 11.2105 1.69089 9.82648 1.89915C8.44244 2.10741 7.1479 2.71061 6.09818 3.63637H3.63636C4.48242 2.50653 5.5803 1.58956 6.84279 0.958313C8.10528 0.327069 9.49759 -0.00105786 10.9091 2.56208e-06C15.93 2.56208e-06 20 4.07 20 9.09091C20 14.1118 15.93 18.1818 10.9091 18.1818C9.49759 18.1829 8.10528 17.8548 6.84279 17.2235C5.5803 16.5923 4.48242 15.6753 3.63636 14.5455Z"
                                                    fill="" />
                                            </svg></span>
                                        <h2 class="poppins fonttext-md ">Logout</h2>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="flex items-center gap-8 ">


                    <div class="mb-2 text-end poppins">
                        <h3 class="text-sm">Lorem Ipsum</h3>
                        <p class="text-xs">Adminitator</p>
                    </div>

                    <div class="pr-5 sx:block">
                        <img src="{{ asset('assets/logo-2.png') }}" alt=""
                            class="h-[35px] w-[35px]  rounded-md mb-2">
                    </div>
                </div>
            </div>
            <div class="px-6 bg-white"> @yield('content')</div>
        </div>
    </div>


    <script src="{{ asset('javascript/jquery.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('javascript/canvas.js') }}"></script>
    <script type="text/javascript" src="{{ asset('DataTables/DataTables-1.13.8/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('javascript/script.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $('#view-modal').addClass('hidden');

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
    </script>
    @yield('js')
</body>

</html>
