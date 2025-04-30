@props([
    'type' => 'button',
    'variant' => 'primary',
    'size' => 'default',
    'href' => null,
])

@php
    $baseClasses = 'inline-flex items-center justify-center rounded-md font-medium transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 disabled:opacity-50 disabled:pointer-events-none';
    
    $variantClasses = [
        'primary' => 'bg-primary text-primary-foreground hover:bg-primary/90',
        'secondary' => 'bg-secondary text-secondary-foreground hover:bg-secondary/80', 
        'outline' => 'border border-input bg-background hover:bg-accent hover:text-accent-foreground',
        'ghost' => 'hover:bg-accent hover:text-accent-foreground',
        'destructive' => 'bg-destructive text-destructive-foreground hover:bg-destructive/90',
        'success' => 'bg-green-600 text-white hover:bg-green-700',
        'warning' => 'bg-yellow-500 text-white hover:bg-yellow-600',
    ];
    
    $sizeClasses = [
        'sm' => 'h-8 px-3 text-xs',
        'default' => 'h-10 px-4 py-2',
        'lg' => 'h-12 px-6 py-3 text-base',
    ];
    
    $classes = $baseClasses . ' ' . 
               ($variantClasses[$variant] ?? $variantClasses['primary']) . ' ' . 
               ($sizeClasses[$size] ?? $sizeClasses['default']);
@endphp

@if ($href)
    <a href="{{ $href }}" {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </a>
@else
    <button type="{{ $type }}" {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </button>
@endif 