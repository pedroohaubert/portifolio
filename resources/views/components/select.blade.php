@props(['disabled' => false, 'label' => '', 'error' => '', 'options' => [], 'placeholder' => 'Selecione uma opção'])

<div class="w-full">
    @if($label)
        <label class="block text-sm font-medium text-foreground mb-1.5">
            {{ $label }}
        </label>
    @endif
    
    <select {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'w-full rounded-md border border-input bg-background px-3 py-2 text-sm text-foreground ring-offset-background placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50 ' . ($error ? 'border-destructive focus-visible:ring-destructive' : '')]) !!}>
        @if($placeholder)
            <option value="" disabled selected>{{ $placeholder }}</option>
        @endif
        
        {{ $slot }}
    </select>
    
    @if($error)
        <p class="mt-1 text-sm text-destructive">{{ $error }}</p>
    @endif
</div> 