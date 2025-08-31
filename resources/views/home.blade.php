<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class=".dark">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>



        <title>Mechanic</title>

        <link rel="icon" href="/favicon.ico" sizes="any">
        <link rel="icon" href="/favicon.svg" type="image/svg+xml">
        <link rel="apple-touch-icon" href="/apple-touch-icon.png">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />


        @vite('resources/css/app.css')
        @vite('resources/js/app.js')
        @fluxAppearance

    </head>
    <header class="sticky top-0 left-0 w-full flex justify-between bg-[#f6f6f6] dark:bg-zinc-900 shadow-md dark:shadow-lg z-50 transition-all duration-500 dark:transition-all dark:duration-500">
            @if (Route::has('login'))
             <nav class="flex items-center w-full  px-6 p-2  backdrop-blur-md">

               <!-- Logo -->
                <div class="justify-baseline w-full flex items-center">
                        <!--text logo-->
                   <!--<a href="#" class="text-2xl inline-block font-bold dark:text-[#EDEDEC]">MECHANIC</a>-->

                   <!-- Light mode logo -->
                   <a href="{{ route('home') }}"><img src="{{ asset('images/logo-light.png') }}" alt="Light Logo" class="w-18 h-auto transition-all duration-500 dark:hidden"></a>

                   <!-- Dark mode logo -->
                   <a href="{{ route('home') }}"><img src="{{ asset('images/logo-dark.png') }}" alt="Dark Logo" class="w-18 h-auto transition-all duration-500 hidden dark:block"></a>
                </div>


                 <flux:navbar>
                     <flux:navbar.item href="/" :current="request()->is('/')" @click="loadPage('home')">Home</flux:navbar.item>
                     <flux:navbar.item href="{{ route('about') }}">About</flux:navbar.item>
                     <flux:navbar.item href="{{ route('services') }}">Services</flux:navbar.item>
                 </flux:navbar>




                    <div class="justify-end w-full flex">
                    @auth
                        <a href="{{ url('/dashboard') }}"
                            class="inline-block px-5 j py-1.5 text-[#EDEDEC] bg-blue-500 hover:bg-blue-600  dark:bg-blue-700 dark:hover:bg-blue-800 rounded-xl text-md leading-normal"
                        >
                            Dashboard
                        </a>
                    @else


                        <a href="{{ route('login') }}"
                            class="inline-block px-5 py-1.5 mr-6 text-[#EDEDEC] bg-blue-500 hover:bg-blue-600  dark:bg-blue-700 dark:hover:bg-blue-800 rounded-xl text-md leading-normal">

                            Log in
                        </a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}"
                                class="inline-block px-5 py-1.5 mr-8 text-[#EDEDEC] bg-blue-500 hover:bg-blue-600  dark:bg-blue-700 dark:hover:bg-blue-800 rounded-xl text-md leading-normal">
                                Register
                            </a>

                            <!--light and darkmode toggle-->
                            <flux:tooltip class="mr-4" content="Toggle light/dark mode" position="bottom">
                            <flux:dropdown x-data align="end">
                            <flux:button variant="ghost" square class="group" aria-label="Preferred color scheme">
                                <flux:icon.sun x-show="$flux.appearance === 'light'" variant="mini" class="text-zinc-500 dark:text-white" />
                                <flux:icon.moon x-show="$flux.appearance === 'dark'" variant="mini" class="text-zinc-500 dark:text-white" />
                                <flux:icon.moon x-show="$flux.appearance === 'system' && $flux.dark" variant="mini" />
                                <flux:icon.sun x-show="$flux.appearance === 'system' && ! $flux.dark" variant="mini" />
                            </flux:button>

                            <flux:menu>
                                <flux:menu.item icon="sun" x-on:click="$flux.appearance = 'light'">Light</flux:menu.item>
                                <flux:menu.item icon="moon" x-on:click="$flux.appearance = 'dark'">Dark</flux:menu.item>
                                <flux:menu.item icon="computer-desktop" x-on:click="$flux.appearance = 'system'">System</flux:menu.item>
                            </flux:menu>
                            </flux:dropdown>
                            </flux:tooltip>

                        </div>
                

                        @endif
                    @endauth

                </nav>
            @endif
        </header>

<body>

<div class="flex items-center justify-center px-6 py-10 transition-all duration-500 dark:transition-all dark:duration-500  ">
        <div class="max-w-6xl grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- Text Section -->
            <div class="flex flex-col justify-center items-center">
                <h1 class="text-4xl font-bold text-gray-800 dark:text-white text-center">Welcome to Auto Mechanic</h1>
                <p class="mt-4 text-gray-600 dark:text-gray-300 text-center">
                    At MECHANIC we don't just repair cars we keep them running like new. From precision diagnostics to expert engine repairs, our skilled mechanics bring decades of experience to every service. Whether you need a quick oil change or a
                     full transmission overhaul, we use top-quality parts and modern techniques to ensure lasting performance. Our customers trust us for honest pricing, fast turnaround times, and a commitment to getting the job done right. When it comes
                      to your vehicle, reliability matters drive in today and let us take care of your ride!
                </p>
                <a href="tel:1234567890" class="flex w-60 px-6 py-3 mt-8 gap-2 font-semibold text-[#EDEDEC] bg-blue-500 hover:bg-blue-600  dark:bg-blue-700 dark:hover:bg-blue-800 rounded-xl text-md leading-normal">
                    <!--Tel Icon -->
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 19 18">
                <path d="M18 13.446a3.02 3.02 0 0 0-.946-1.985l-1.4-1.4a3.054 3.054 0 0 0-4.218 0l-.7.7a.983.983 0 0 1-1.39 0l-2.1-2.1a.983.983 0 0 1 0-1.389l.7-.7a2.98 2.98
                 0 0 0 0-4.217l-1.4-1.4a2.824 2.824 0 0 0-4.218 0c-3.619 3.619-3 8.229 1.752 12.979C6.785 16.639 9.45 18 11.912 18a7.175 7.175 0 0 0 5.139-2.325A2.9 2.9 0 0 0 18 13.446Z"/>
            </svg>
        Book An Appointment</a>
    </div>

    <!-- Image Section -->
    <div class="flex justify-center items-center drop-shadow-lg shadow-lg rounded-[16px]">
        <img src="{{ asset('images/engine.png') }}" alt="Welcome page image" class="w-150 h-auto">
    </div>
</div>
</div>






<footer class="fixed bottom-0 w-full px-6 py-6 bg-[#f6f6f6] dark:bg-zinc-900 shadow-md dark:shadow-lg transition-all duration-500 dark:transition-all dark:duration-500 ">
            <p class="text-sm">© 2025 All Rights Reserved</p>
</footer>
        @fluxScripts
</body>
</html>
