{{--<div class="flex aspect-square size-8 items-center justify-center rounded-md bg-accent-content text-accent-foreground">
    <x-app-logo-icon class="size-5 fill-current text-white dark:text-black" />
</div>
<div class="ms-1 grid flex-1 text-start text-sm">
    <span class="mb-0.5 truncate leading-tight font-semibold">Mechanic</span>
</div>--}}

<div class="flex aspect-square size-8 items-center justify-center rounded-md  text-accent-foreground">
    <img src="{{ asset('images/logo-light.png') }}" alt="Light Logo"  class="size-8 fill-current text-white dark:text-black transition-all duration-500 dark:hidden" />
    <img src="{{ asset('images/logo-dark.png') }}" alt="Light Logo"  class="size-8 fill-current text-white dark:text-black transition-all duration-500 hidden dark:block" />
</div>
<div class="ms-1 grid flex-1 text-start text-sm">
    <span class="mb-0.5 truncate leading-tight font-semibold">Mechanic</span>
</div>
