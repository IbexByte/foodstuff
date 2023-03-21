<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- Jquery --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"
        integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    {{-- tables datatable --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Aref+Ruqaa+Ink:wght@700&family=IBM+Plex+Sans+Arabic&display=swap"
        rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles
    <style>
        body {
            /* font-family: 'Aref Ruqaa Ink', serif; */
            font-family: 'IBM Plex Sans Arabic', sans-serif;
        }
    </style>
</head>

<body class="font-sans antialiased">
    <x-banner />







    <body class="antialiased bg-gray-100">
        <div class="min-h-screen bg-gray-100">
            
            <div class="flex relative" x-data="{ navOpen: false }">
                <!-- NAV -->
                <nav class="absolute md:relative w-64 transform  md:translate-x-0 h-screen overflow-y-scroll bg-black transition-all duration-300"
                    :class="{ 'translate-x-full': !navOpen }">
                    <div class="flex flex-col justify-between h-full">
                        <div class="p-4">

                            <!-- LOGO -->
                            <a class="flex items-center text-white space-x-4" href="">
                                <img class="h-24" src="{{ asset('storage/logo2.png') }}" alt="">
                                <span class="text-2xl font-bold">تموين المستقبل</span>
                            </a>

                            <!-- SEARCH BAR -->
                            <div class="border-gray-700 py-5 text-white border-b rounded">
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-2">
                                        <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                        </svg>
                                    </div>
                                    <form action="" method="GET">
                                        <input type="search"
                                            class="w-full py-2 rounded pl-10 bg-gray-800 border-none focus:outline-none focus:ring-0"
                                            placeholder="Search">
                                    </form>
                                </div>
                                <!-- SEARCH RESULT -->
                            </div>

                            <!-- NAV LINKS -->
                            <div class="py-4 text-gray-400 space-y-1">
                                <!-- BASIC LINK -->
                                <a href="{{ route('dashboard') }}"
                                    class=" {{ request()->is('dashboard') ? 'bg-lime-400' : 'bg-lime-100' }} block  shadow-lg  py-2.5 px-4 flex items-center space-x-4    hover:bg-lime-400 hover:text-white rounded">
                                    <span class="material-symbols-outlined">
                                        home
                                    </span>
                                    <span>لوحة الإدارة </span>
                                </a>
                                <a href="{{ route('category.index') }}"
                                    class=" {{ request()->is('dashboard/category*') ? 'bg-lime-400' : 'bg-lime-100' }} block  shadow-lg  py-2.5 px-4 flex items-center space-x-4    hover:bg-lime-400 hover:text-white rounded">
                                    <span class="material-symbols-outlined">
                                        view_comfy_alt
                                    </span>
                                    <span>الأصناف </span>
                                </a>
                                <a href="{{ route('deal.index') }}"
                                    class="{{ request()->is('dashboard/deal*') ? 'bg-lime-400' : 'bg-lime-100' }}  block  shadow-lg  py-2.5 px-4 flex items-center space-x-4    hover:bg-lime-400 hover:text-white rounded">
                                    <span class="material-symbols-outlined">
                                        density_small
                                    </span>
                                    <span>الصفقات </span>
                                </a>
                                <a href="#"
                                    class="block bg-lime-100 shadow-lg  py-2.5 px-4 flex items-center space-x-4    hover:bg-lime-400 hover:text-white rounded">
                                    <span class="material-symbols-outlined">
                                        recent_actors
                                    </span>
                                    <span class="mx-4"> المتعاملين </span>
                                </a>
                                <a href="#"
                                    class="block bg-lime-100 shadow-lg  py-2.5 px-4 flex items-center space-x-4    hover:bg-lime-400 hover:text-white rounded">
                                    <span class="material-symbols-outlined">
                                        admin_panel_settings
                                    </span>
                                    <span>الأعضاء المشرفين </span>
                                </a>
                                <a href="#"
                                    class="block bg-lime-100 shadow-lg  py-2.5 px-4 flex items-center space-x-4    hover:bg-lime-400 hover:text-white rounded">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M16 8v8m-4-5v5m-4-2v2m-2 4h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                        </path>
                                    </svg>
                                    <span>لوحة الإدارة </span>
                                </a>
                                <a href="#"
                                    class="block bg-lime-100 shadow-lg  py-2.5 px-4 flex items-center space-x-4    hover:bg-lime-400 hover:text-white rounded">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M16 8v8m-4-5v5m-4-2v2m-2 4h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                        </path>
                                    </svg>
                                    <span>لوحة الإدارة </span>
                                </a>
                                <!-- DROPDOWN LINK -->
                                <div class="block" x-data="{ open: false }">
                                    <div @click="open = !open"
                                        class="flex items-center justify-between hover:bg-gray-800 hover:text-white cursor-pointer py-2.5 px-4 rounded">
                                        <div class="flex items-center space-x-2">
                                            <svg class="w-6 h-6" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4">
                                                </path>
                                            </svg>
                                            <span>قائمة منسدلة</span>
                                        </div>
                                        <svg x-show="open" class="w-6 h-6" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M5 15l7-7 7 7"></path>
                                        </svg>
                                        <svg x-show="!open" class="w-6 h-6" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 9l-7 7-7-7"></path>
                                        </svg>
                                    </div>
                                    <div x-show="open"
                                        class="text-sm border-l-2 border-gray-800 mx-6 my-2.5 px-2.5 flex flex-col gap-y-1">
                                        <a href="#"
                                            class="block py-2 px-4 hover:bg-gray-800 hover:text-white rounded">
                                            الأصناف
                                        </a>
                                        <a href="#"
                                            class="block py-2 px-4 hover:bg-gray-800 hover:text-white rounded">
                                            المهام
                                        </a>
                                        <a href="#"
                                            class="block py-2 px-4 hover:bg-gray-800 hover:text-white rounded">
                                            ملاحظات
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- PROFILE -->
                        <div class="text-gray-200 border-gray-800 rounded flex items-center justify-between p-2">
                            <div class="flex items-center space-x-2">
                                <!-- AVATAR IMAGE BY FIRST LETTER OF NAME -->

                                <h1> {{ Auth::user()->name }} </h1>
                            </div>
                            <a onclick="event.preventDefault(); document.getElementById('logoutForm').submit()"
                                href="#" class="hover:bg-gray-800 hover:text-white p-2 rounded">
                                <form id="" action="{{ route('logout', Auth::user()->id) }}" method="POST">
                                </form>
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                                    </path>
                                </svg>
                                </form>
                            </a>
                        </div>

                    </div>
                </nav>
                <!-- END OF NAV -->

                <!-- PAGE CONTENT -->
                <main class="flex-1 h-screen overflow-y-scroll overflow-x-hidden">

                    <section class="max-w-7xl mx-auto py-4 px-5">

                        @livewire('navigation-menu')


                        <!-- Page Content -->
                        <main>
                            {{-- {{ $slot }} --}}
                            @yield('content')
                        </main>





                    </section>
                    <!-- END OF PAGE CONTENT -->
                </main>
            </div>
    </body>

</html>


@stack('modals')

@livewireScripts



</div>
</body>

</html>
