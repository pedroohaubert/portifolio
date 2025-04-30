@props(['title', 'description', 'href', 'disabled' => false])

@if($disabled)
<div class="bg-card/50 border border-border rounded-lg shadow-sm hover:shadow-md transition-shadow duration-200 ease-in-out p-6 opacity-70 cursor-not-allowed">
    <h2 class="text-xl font-semibold mb-2 text-card-foreground">{{ $title }}</h2>
    <p class="text-muted-foreground/70">{{ $description }}</p>
    @if($slot->isNotEmpty())
        <div class="mt-4">
            {{ $slot }}
        </div>
    @endif
</div>
@else
<a href="{{ $href }}" class="bg-card hover:bg-accent/5 border border-border rounded-lg shadow-sm hover:shadow-md transition-all duration-200 ease-in-out p-6 flex flex-col">
    <h2 class="text-xl font-semibold mb-2 text-card-foreground">{{ $title }}</h2>
    <p class="text-muted-foreground">{{ $description }}</p>
    @if($slot->isNotEmpty())
        <div class="mt-4">
            {{ $slot }}
        </div>
    @endif
    <div class="mt-4 flex items-center gap-2 text-sm text-primary hover:underline self-start">
        <span>Acessar</span>
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-right"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
    </div>
</a>
@endif 