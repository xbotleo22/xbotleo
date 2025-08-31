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
        <div class="relative grid h-dvh flex-col items-center justify-center px-8 sm:px-0 lg:max-w-none lg:grid-cols-2 lg:px-0">
            <div class="relative hidden h-full flex-col p-10 text-white lg:flex dark:border-e dark:border-neutral-800">
                <div class="absolute inset-0 bg-neutral-900"></div>
                <a href="{{ route('home') }}" class="relative z-20 flex items-center text-lg font-medium" wire:navigate>
                    <span class="flex h-10 w-10 items-center justify-center rounded-md">
                        <x-app-logo-icon class="me-2 h-7 fill-current text-white" />
                    </span>
                    {{ config('app.name', 'mechanic') }}
                </a>

                @php
                    [$message, $author] = str(Illuminate\Foundation\Inspiring::quotes()->random())->explode('-');
                @endphp

                <div class="relative z-20 mt-auto">
                    <blockquote class="space-y-2">
                        <flux:heading size="lg">&ldquo;{{ trim($message) }}&rdquo;</flux:heading>
                        <footer><flux:heading>{{ trim($author) }}</flux:heading></footer>
                    </blockquote>
                </div>
            </div>
            <div class="w-full lg:p-8">
                <div class="mx-auto flex w-full flex-col justify-center items-center space-y-6 sm:w-[350px]">
                    <a href="{{ route('home') }}" class="z-20 flex flex-col items-center justify-center gap-2 font-medium lg:hidden" wire:navigate>
                        <!-- Light mode logo -->
                   <a href="{{ route('home') }}"><img src="{{ asset('images/logo-light.png') }}" alt="Light Logo" class="h-12 w-12 mb-1 items-center justify-center rounded-md dark:hidden transition-all duration-500 dark:transition-all dark:duration-500"></a>

                   <!-- Dark mode logo -->
                   <a href="{{ route('home') }}"><img src="{{ asset('images/logo-dark.png') }}" alt="Dark Logo" class="h-12 w-12 mb-1 items-center justify-center rounded-md hidden dark:block transition-all duration-500 dark:transition-all dark:duration-500"></a>

                        <span class="sr-only">{{ config('app.name', 'mechanic') }}</span>
                    </a>
                    {{ $slot }}
                </div>
            </div>
        </div>
        @fluxScripts
    </body>
</html>
