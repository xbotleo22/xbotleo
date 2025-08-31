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
                <flux:navbar.item href="{{ route('about') }}" >About</flux:navbar.item>
                <flux:navbar.item href="{{ route('services') }}" :current="request()->is('services')">Services</flux:navbar.item>
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
<div class="max-w-6xl mx-auto px-4 py-12">
    <h1 class="text-4xl font-bold dark:text-white text-gray-800 mb-6">🔧 Our Services</h1>
    <p class="text-lg dark:text-white text-gray-700 mb-10">
        At <span class="font-semibold">MECHANIC</span>, we don’t just fix cars—we keep your life moving. Whether you're dealing with a mysterious noise, overdue for maintenance, or prepping for a long road trip, our expert mechanics are here to make sure your vehicle runs like new.
    </p>

    @php
        $services = [
            ['icon' => '🚗', 'title' => 'General Auto Repair', 'desc' => 'From engine diagnostics to brake replacements, we handle all types of mechanical issues with precision and care. No guesswork—just honest, reliable service.'],
            ['icon' => '🛠', 'title' => 'Preventive Maintenance', 'desc' => 'Regular checkups save you money in the long run. We offer oil changes, fluid top-ups, filter replacements, and full inspections to keep your car in peak condition.'],
            ['icon' => '⚙️', 'title' => 'Engine & Transmission Services', 'desc' => 'Whether it’s a minor tune-up or a full rebuild, our team tackles engine and transmission problems with advanced tools and deep expertise.'],
            ['icon' => '🧰', 'title' => 'Suspension & Steering', 'desc' => 'Feel every bump? Hear a clunk when you turn? We’ll restore your ride’s comfort and control with suspension and steering repairs that make driving smooth again.'],
            ['icon' => '🔋', 'title' => 'Battery & Electrical Systems', 'desc' => 'Dead battery? Flickering lights? We diagnose and repair electrical issues quickly so you’re never left stranded.'],
            ['icon' => '🛞', 'title' => 'Tire Services', 'desc' => 'We offer tire rotation, balancing, alignment, and replacement to keep your grip strong and your ride safe.'],
            ['icon' => '🌬', 'title' => 'Air Conditioning & Heating', 'desc' => 'Stay cool in the summer and warm in the rainy season. We repair and recharge A/C systems so your cabin stays comfortable year-round.'],
        ];
    @endphp

    <div class="grid md:grid-cols-2 gap-8">
        @foreach ($services as $service)
            <div class="max-w-5xl mx-auto p-6 dark:bg-white/20 shadow-lg rounded-[16px] shadow-[0_4px_30px_rgba(0,0,0,0.1) backdrop-blur-[5px] border border-solid dark:border-white/30 gap-5 p-5 md:p-8 transition-all duration-500 dark:transition-all dark:duration-500">
                <h2 class="text-xl font-semibold  dark:text-white text-gray-800 mb-2">{{ $service['icon'] }} {{ $service['title'] }}</h2>
                <p class=" dark:text-white text-gray-600">{{ $service['desc'] }}</p>
            </div>
        @endforeach
    </div>

    <div class="mt-12">
        <h2 class="text-2xl font-bold dark:text-white text-gray-800 mb-4">💬 Why Choose Us?</h2>
        <ul class="space-y-2 dark:text-white text-gray-700 mb-15">
            <li>✅ Certified and experienced technicians</li>
            <li>✅ Transparent pricing and honest advice</li>
            <li>✅ Fast turnaround and quality parts</li>
            <li>✅ Friendly service with a personal touch</li>
        </ul>
    </div>


</div>



<footer class="fixed bottom-0 w-full px-6 py-6 bg-[#f6f6f6] dark:bg-zinc-900 shadow-md dark:shadow-lg transition-all duration-500 dark:transition-all dark:duration-500 ">
    <p class="text-sm">© 2025 All Rights Reserved</p>
</footer>
@fluxScripts
</body>

</html>
