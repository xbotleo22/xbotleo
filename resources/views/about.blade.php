<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class=".dark">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
                <flux:navbar.item href="/">Home</flux:navbar.item>
                <flux:navbar.item href="{{ route('about') }}" :current="request()->is('about')" >About</flux:navbar.item>
                <flux:navbar.item href="{{ route('services') }}" >Services</flux:navbar.item>
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
<div class="max-w-5xl mx-auto p-6 dark:bg-white/20 shadow-lg rounded-[16px] shadow-[0_4px_30px_rgba(0,0,0,0.1) backdrop-blur-[5px] border border-solid dark:border-white/30 gap-5 p-5 md:p-8 transition-all duration-500 dark:transition-all dark:duration-500">
    <h2 class="text-4xl font-bold dark:text-white text-gray-800 mb-4">About Us</h2>
    <p class="text-lg dark:text-white text-gray-600 mb-6">
        <strong>Your Trusted Partner in Automotive Care</strong><br>
        At <span class="font-semibold">MECHANIC</span>, we believe in providing more than just repairs; we offer peace of mind. Located in ABC Street 123, City, we're a dedicated team of automotive specialists passionate about keeping your vehicle running safely and smoothly.
    </p>

    <h3 class="text-2xl font-semibold dark:text-white text-gray-700 mb-2">Our Story & Mission</h3>
    <p class="dark:text-white text-gray-600 mb-4">
        Founded in 2025 by <span class="font-semibold">Abcd Efghijk</span>, a lifelong car enthusiast, our shop began with a single bay and a commitment to honest, quality service. Today, we've grown, but our core values remain the same.
    </p>
    <p class="dark:text-white text-gray-600 mb-6">
        Our mission is simple: to deliver exceptional automotive service with integrity and transparency. We strive to be the go-to mechanic for our community, building lasting relationships based on trust and reliable workmanship.
    </p>

    <h3 class="text-2xl font-semibold dark:text-white text-gray-700 mb-2">What Makes Us Different?</h3>
    <ul class="list-disc list-inside dark:text-white text-gray-600 space-y-2 mb-6">
        <li><strong>Experienced & Certified Technicians:</strong> ASE-certified experts with years of hands-on experience and a passion for automotive excellence. We use the latest diagnostic tools and techniques.</li>
        <li><strong>Transparent & Honest Service:</strong> Clear communication, upfront pricing, and no work done without your approval. We explain everything and answer your questions honestly.</li>
        <li><strong>Comprehensive Services:</strong> From oil changes and tune-ups to engine diagnostics, brake repairs, and tire services — we’ve got you covered.</li>
        <li><strong>Customer-Centric Approach:</strong> Your satisfaction is our priority. We offer shuttle service and are exploring mobile repair options to make your visit hassle-free.</li>
        <li><strong>Quality Parts & Workmanship:</strong> We use high-quality parts and back our work with a <span class="italic">2-year/24,000-mile warranty</span> on most repairs.</li>
    </ul>

    <div class="mt-10">
        <h3 class="text-2xl font-semibold dark:text-white text-gray-800 mb-6">Meet Our Team</h3>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">

            <!-- Team Member Card -->
            <div class="bg-white shadow-md rounded-lg p-4 text-center">
                <img src="{{ asset('images/john.jpg') }}" alt="John Doe" class="w-24 h-24 mx-auto rounded-full mb-4 object-cover">
                <h4 class="text-lg font-bold text-gray-700">John Doe</h4>
                <p class="text-sm text-gray-500">Lead Technician</p>
                <p class="mt-2 text-gray-600 text-sm">ASE-certified with 10+ years of experience. John’s specialty is engine diagnostics and customer education.</p>
            </div>

            <!-- Repeat for other team members -->
            <div class="bg-white shadow-md rounded-lg p-4 text-center">
                <img src="{{ asset('images/joe.jpg') }}" alt="Joe Smith" class="w-24 h-24 mx-auto rounded-full mb-4 object-cover">
                <h4 class="text-lg font-bold text-gray-700">Joe Smith</h4>
                <p class="text-sm text-gray-500">Service Advisor</p>
                <p class="mt-2 text-gray-600 text-sm">Jane ensures every customer feels heard and informed. She’s the friendly face behind your service experience.</p>
            </div>

            <div class="bg-white shadow-md rounded-lg p-4 text-center">
                <img src="{{ asset('images/jude.jpg') }}" alt="Jude Bush" class="w-24 h-24 mx-auto rounded-full mb-4 object-cover">
                <h4 class="text-lg font-bold text-gray-700">Jude Bush</h4>
                <p class="text-sm text-gray-500">Service Advisor</p>
                <p class="mt-2 text-gray-600 text-sm">Jane ensures every customer feels heard and informed. She’s the friendly face behind your service experience.</p>
            </div>
            <!-- Add more cards as needed -->

        </div>
    </div>


    <div class="bg-gray-100 mt-4 mb-20 p-4 rounded-md text-center">
        <h4 class="text-xl font-semibold text-gray-800 mb-2">Ready to Experience the MECHANIC Difference?</h4>
        <p class="text-gray-600 mb-4">Schedule your appointment online or give us a call today. We look forward to serving you and your vehicle with the expertise and care you deserve.</p>
        <a href="tel:1234567890" class="inline-block w-50 px-3 py-3 mt-8 gap-2 font-semibold text-[#EDEDEC] bg-blue-500 hover:bg-blue-600  dark:bg-blue-700 dark:hover:bg-blue-800 rounded-xl text-md leading-normal">
            <!--Tel Icon -->

            Book An Appointment</a>
    </div>
</div>






<footer class="fixed bottom-0 w-full px-6 py-6 bg-[#f6f6f6] dark:bg-zinc-900 shadow-md dark:shadow-lg transition-all duration-500 dark:transition-all dark:duration-500 ">
    <p class="text-sm">© 2025 All Rights Reserved</p>
</footer>
@fluxScripts
</body>

</html>
