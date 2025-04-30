@props(['color' => '#eee', 'textColor' => null])

@php
    $textColor = $textColor ?: ((hexdec(substr($color, 1, 2)) * 0.299 + hexdec(substr($color, 3, 2)) * 0.587 + hexdec(substr($color, 5, 2)) * 0.114) > 150 ? '#000' : '#fff');
@endphp

<span 
    {{ $attributes->merge(['class' => 'inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium']) }} 
    style="background-color: {{ $color }}; color: {{ $textColor }};"
>
    {{ $slot }}
</span> 