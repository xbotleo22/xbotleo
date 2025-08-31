@props([
    'on',
])

<div
    x-data="{ shown: false, timeout: null }"
    x-init="@this.on('{{ $on }}', () => { clearTimeout(timeout); shown = true; timeout = setTimeout(() => { shown = false }, 3000); })"
    x-show.transition.out.opacity.duration.1500ms="shown"
    x-transition:leave.opacity.duration.1500ms
    style="display: none"
    {{ $attributes->merge(['class' => 'fixed px-5 py-1.5 mr-4 bottom-5 right-5 bg-sky-600 text-white text-sm p4 rounded-lg shadow-lg z-50']) }}
>
{{--{{ $slot->isEmpty() ? __('Saved.') : $slot }}--}}
   {{ $slot }}
</div>
