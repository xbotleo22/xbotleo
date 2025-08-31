<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        @include('partials.head')
    </head>


<header>
        <nav class="fixed top-0 left-0 w-full z-50 bg-transparent">
    <div class="max-w-7xl mx-auto px-8 py-4 flex w-full justify-end">
        <flux:tooltip content="Toggle light/dark mode" position="bottom">
                            <flux:dropdown x-data align="end">
                            <flux:button variant="subtle" square class="group" aria-label="Preferred color scheme">
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
</nav>
</header>

    <body class="flex items-center justify-center px-6 py-10 transition-all duration-500 dark:transition-all dark:duration-500">
        <div class="dark:bg-white/20 shadow-lg rounded-[16px] shadow-[0_4px_30px_rgba(0,0,0,0.1) backdrop-blur-[5px] border border-solid dark:border-white/30 gap-5 p-5 md:p-8 transition-all duration-500 dark:transition-all dark:duration-500">
            <div class="flex w-full max-w-sm justify-center items-center flex-col gap-1 transition-all duration-500 dark:transition-all dark:duration-500">
                <a href="{{ route('home') }}" class="flex flex-col items-center justify-center gap-2 font-medium" wire:navigate>
                         <!-- Light mode logo -->
                   <a href="{{ route('home') }}"><img src="{{ asset('images/logo-light.png') }}" alt="Light Logo" class="h-12 w-12 mb-1 items-center justify-center transition-all duration-500 dark:transition-all dark:duration-500 rounded-md dark:hidden"></a>

                   <!-- Dark mode logo -->
                   <a href="{{ route('home') }}"><img src="{{ asset('images/logo-dark.png') }}" alt="Dark Logo" class="h-12 w-12 mb-1 items-center justify-center transition-all duration-500 dark:transition-all dark:duration-500 rounded-md hidden dark:block"></a>
                    <span class="sr-only">{{ config('app.name', 'mechanic') }}</span>
                </a>
                <div class="flex flex-col gap-6">
                    {{ $slot }}
                </div>
            </div>
        </div>
        @fluxScripts
    </body>
</html>
