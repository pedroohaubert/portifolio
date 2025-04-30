@extends('layouts.app')

@section('content')
<div class="bg-background text-foreground min-h-screen py-12">
    <div class="container max-w-2xl mx-auto px-4">
        <h1 class="text-3xl font-bold mb-8">Editar Categoria</h1>

        <form action="{{ route('categories.update', $category) }}" method="POST" class="bg-card p-8 rounded-lg shadow-md space-y-6">
            @csrf
            @method('PUT')

            <div>
                <label for="name" class="block text-sm font-medium text-muted-foreground mb-1">Nome</label>
                <input 
                    type="text" 
                    id="name" 
                    name="name" 
                    value="{{ old('name', $category->name) }}" 
                    required 
                    maxlength="255"
                    class="w-full px-4 py-2 bg-input border border-border rounded-md focus:ring-primary focus:border-primary @error('name') border-destructive @enderror"
                    placeholder="Nome da Categoria"
                >
                @error('name')
                    <p class="text-sm text-destructive mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="color" class="block text-sm font-medium text-muted-foreground mb-1">Cor</label>
                <div class="flex items-center space-x-3">
                     <input 
                        type="color" 
                        id="color_picker" 
                        value="{{ old('color', $category->color) }}" 
                        class="h-10 w-16 p-1 border border-border rounded-md cursor-pointer"
                    >
                    <input 
                        type="text" 
                        id="color" 
                        name="color" 
                        value="{{ old('color', $category->color) }}" 
                        required 
                        maxlength="20"
                        class="flex-grow px-4 py-2 bg-input border border-border rounded-md focus:ring-primary focus:border-primary @error('color') border-destructive @enderror"
                        placeholder="#RRGGBB ou nome da cor"
                    >
                </div>
                 @error('color')
                    <p class="text-sm text-destructive mt-1">{{ $message }}</p>
                @enderror

                 <div class="mt-3">
                    <p class="text-xs text-muted-foreground mb-2">Ou escolha uma cor predefinida:</p>
                    <div class="flex flex-wrap gap-2">
                        @foreach ($colors as $presetColor)
                            <button 
                                type="button"
                                class="w-8 h-8 rounded-full border border-border cursor-pointer focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary"
                                style="background-color: {{ $presetColor }};"
                                onclick="selectColor('{{ $presetColor }}')"
                                title="{{ $presetColor }}"
                            ></button>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="flex justify-end space-x-4 pt-4">
                <a href="{{ route('categories.admin') }}" class="bg-muted text-muted-foreground hover:bg-muted/80 px-4 py-2 rounded-md transition duration-300">
                    Cancelar
                </a>
                <button type="submit" class="bg-primary text-primary-foreground hover:bg-primary/90 px-4 py-2 rounded-md transition duration-300">
                    Atualizar Categoria
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    const colorPicker = document.getElementById('color_picker');
    const colorInput = document.getElementById('color');

    colorPicker.addEventListener('input', (event) => {
        colorInput.value = event.target.value;
    });

    colorInput.addEventListener('input', (event) => {
        if (/^#[0-9A-F]{6}$/i.test(event.target.value)) {
            colorPicker.value = event.target.value;
        }
    });
    
    function selectColor(color) {
        colorPicker.value = color;
        colorInput.value = color;
    }
    
    // Define a cor inicial do picker e input baseada no old() ou valor da categoria
    const initialColor = colorInput.value;
     if (/^#[0-9A-F]{6}$/i.test(initialColor)) {
        colorPicker.value = initialColor;
    }

</script>
@endsection

@push('styles')
<style>
input[type="color"]::-webkit-color-swatch-wrapper {
    padding: 0;
}
input[type="color"]::-webkit-color-swatch {
    border: none;
    border-radius: 4px; 
}
input[type="color"]::-moz-color-swatch {
    border: none;
    border-radius: 4px; 
}
</style>
@endpush 