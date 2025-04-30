@extends('layouts.app')

@section('content')
<div class="bg-background text-foreground min-h-screen py-12">
    <div class="container max-w-4xl mx-auto px-4">
        <div class="flex items-center mb-8">
            <a href="{{ route('topics.admin') }}" class="text-muted-foreground hover:text-foreground mr-4">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left">
                    <line x1="19" y1="12" x2="5" y2="12"></line>
                    <polyline points="12 19 5 12 12 5"></polyline>
                </svg>
            </a>
            <h1 class="text-3xl font-bold">Editar Tópico</h1>
        </div>
        
        @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-6">
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
        @endif
        
        <div class="bg-card rounded-lg border border-border shadow-sm p-6">
            <form action="{{ route('topics.update', $topic) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="space-y-6">
                    <x-input 
                        type="text" 
                        name="name" 
                        id="name" 
                        :label="'Nome do Tópico'" 
                        :error="$errors->first('name')" 
                        value="{{ old('name', $topic->name) }}" 
                        required 
                        placeholder="Ex: Laravel, PHP, Design"
                    />
                    
                    <div class="w-full">
                        <label class="block text-sm font-medium text-foreground mb-1.5">
                            Cor (opcional)
                        </label>
                        <div class="flex items-center gap-3">
                            <div class="flex-1">
                                <x-input 
                                    type="text" 
                                    name="color" 
                                    id="color" 
                                    :error="$errors->first('color')" 
                                    value="{{ old('color', $topic->color ?? '#3B82F6') }}" 
                                    pattern="^#[0-9A-Fa-f]{6}$"
                                    placeholder="#RRGGBB"
                                />
                                <p class="mt-1 text-xs text-muted-foreground">Formato: #RRGGBB (ex: #3B82F6 para azul)</p>
                            </div>
                            <div>
                                <input 
                                    type="color" 
                                    id="color-picker" 
                                    value="{{ old('color', $topic->color ?? '#3B82F6') }}"
                                    class="h-10 w-10 cursor-pointer rounded-md border border-input"
                                >
                            </div>
                        </div>
                    </div>
                    
                    <div class="w-full">
                        <label class="block text-sm font-medium text-foreground mb-1.5">
                            Visualização
                        </label>
                        <div class="mt-2">
                            <x-badge id="preview-badge" color="{{ old('color', $topic->color ?? '#3B82F6') }}">
                                {{ old('name', $topic->name) }}
                            </x-badge>
                        </div>
                    </div>
                    
                    <div class="flex justify-end">
                        <x-button type="submit" variant="primary">
                            Atualizar Tópico
                        </x-button>
                    </div>
                </div>
            </form>
        </div>

        @if ($topic->posts_count > 0)
        <div class="mt-6 p-4 bg-amber-50 border border-amber-200 rounded-lg text-amber-800">
            <div class="flex items-start">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mt-0.5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                </svg>
                <div>
                    <p class="font-medium">Este tópico está associado a {{ $topic->posts_count }} {{ $topic->posts_count === 1 ? 'post' : 'posts' }}.</p>
                    <p class="mt-1 text-sm">Ao alterar as informações deste tópico, todos os posts relacionados serão afetados.</p>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const colorInput = document.getElementById('color');
        const colorPicker = document.getElementById('color-picker');
        const previewBadge = document.getElementById('preview-badge');
        const nameInput = document.getElementById('name');

        // Sincronizar input de texto com color picker
        colorInput.addEventListener('input', function() {
            colorPicker.value = this.value;
            updatePreview();
        });

        // Sincronizar color picker com input de texto
        colorPicker.addEventListener('input', function() {
            colorInput.value = this.value;
            updatePreview();
        });

        // Atualizar nome no preview
        nameInput.addEventListener('input', function() {
            previewBadge.textContent = this.value.trim();
        });

        function updatePreview() {
            const color = colorInput.value;
            previewBadge.style.backgroundColor = color;
            
            // Calcular cor do texto (claro ou escuro) com base na cor de fundo
            const r = parseInt(color.substr(1, 2), 16);
            const g = parseInt(color.substr(3, 2), 16);
            const b = parseInt(color.substr(5, 2), 16);
            const brightness = (r * 0.299 + g * 0.587 + b * 0.114);
            
            previewBadge.style.color = brightness > 150 ? '#000000' : '#FFFFFF';
        }

        // Inicializar preview
        updatePreview();
    });
</script>
@endpush 