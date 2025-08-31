{{--<x-layouts.app.sidebar :title="$title ?? 'Mechanic'">
    <flux:main>
        {{ $slot }}
    </flux:main>
</x-layouts.app.sidebar>--}}


<x-layouts.app.header :title="$title ?? 'Mechanic'">
    <flux:main container>
        {{ $slot }}
    </flux:main>
</x-layouts.app.header>


