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


    <body class=" flex items-center justify-center px-6 py-10 transition-all duration-500 dark:transition-all dark:duration-500">
        <div class="flex min-h-svh flex-col items-center justify-center gap-6 p-6 md:p-10 transition-all duration-500 dark:transition-all dark:duration-500">
            <div class="flex w-full max-w-md flex-col gap-6 justify-center items-center transition-all duration-500 dark:transition-all dark:duration-500">
                <a href="{{ route('home') }}" class="flex flex-col items-center justify-center gap-2 font-medium" wire:navigate>
                         <!-- Light mode logo -->
                   <a href="{{ route('home') }}"><img src="{{ asset('images/logo-light.png') }}" alt="Light Logo" class="h-12 w-12 mb-1 rounded-md dark:hidden transition-all duration-500 dark:transition-all dark:duration-500"></a>

                   <!-- Dark mode logo -->
                   <a href="{{ route('home') }}"><img src="{{ asset('images/logo-dark.png') }}" alt="Dark Logo" class="h-12 w-12 mb-1 rounded-md hidden dark:block transition-all duration-500 dark:transition-all dark:duration-500"></a>

                    <span class="sr-only">{{ config('app.name', 'mechanic') }}</span>
                </a>

                <div class="flex flex-col gap-6">
                    <div class="rounded-xl border bg-white dark:bg-stone-950 dark:border-stone-800 text-stone-800 shadow-xs">
                        <div class="px-10 py-8">{{ $slot }}</div>
                    </div>
                </div>
            </div>
        </div>
        @fluxScripts
    </body>
</html>
