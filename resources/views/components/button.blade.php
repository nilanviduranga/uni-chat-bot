@props([
    'type' => 'button',
    'variant' => 'primary', // primary | secondary | danger
    'disabled' => false,
])

@php
    $base = 'w-full py-2 rounded-lg duration-100 transition-all';
    $styles = [
        'primary' => 'bg-gradient-to-t from-violet-700 to-violet-600 shadow-md text-white hover:bg-violet-800',
        'secondary' => 'bg-transparent border border-violet-700 text-violet-700 hover:bg-violet-50',
        'danger' => 'bg-red-600 text-white hover:bg-red-700 shadow-md',
    ];
@endphp

<button type="{{ $type }}" @if ($disabled) disabled @endif
    {{ $attributes->merge(['class' => $base . ' ' . $styles[$variant]]) }}>
    {{ $slot }}
</button>
