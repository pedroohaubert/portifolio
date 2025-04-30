@extends('layouts.app')

@section('content')
<div class="bg-background text-foreground min-h-screen py-12">
    <div class="container max-w-4xl mx-auto px-4">
        <div class="flex items-center mb-8">
            <a href="{{ route('projects.admin') }}" class="text-muted-foreground hover:text-foreground mr-4">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left">
                    <line x1="19" y1="12" x2="5" y2="12"></line>
                    <polyline points="12 19 5 12 12 5"></polyline>
                </svg>
            </a>
            <h1 class="text-3xl font-bold">Criar Novo Projeto</h1>
        </div>
        
        @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-6">
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
        @endif
        
        <div class="bg-card rounded-lg border border-border shadow-sm p-6">
            <form action="{{ route('projects.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                
                <div class="space-y-6">
                    <x-input 
                        type="text" 
                        name="title" 
                        id="title" 
                        :label="'Título do Projeto'" 
                        :error="$errors->first('title')" 
                        value="{{ old('title') }}" 
                        required 
                        placeholder="Ex: Sistema de Gestão Empresarial"
                    />
                    
                    <div>
                        <label class="block text-sm font-medium text-foreground mb-1.5">
                            Categorias
                        </label>
                        <x-select name="categories[]" id="categories" multiple class="h-32">
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ (collect(old('categories'))->contains($category->id)) ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </x-select>
                        @error('categories')
                            <p class="mt-1 text-sm text-destructive">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-foreground mb-1.5">
                            Imagem Principal
                        </label>
                        <div class="mt-1 flex items-center gap-4">
                            <div class="w-32 h-32 border-2 border-dashed border-input rounded-lg flex items-center justify-center bg-muted/20" id="image-preview">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-muted-foreground" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <div class="flex-1">
                                <input 
                                    type="file" 
                                    name="image" 
                                    id="image" 
                                    class="block w-full text-sm text-muted-foreground
                                        file:mr-4 file:py-2 file:px-4
                                        file:rounded-md file:border-0
                                        file:text-sm file:font-medium
                                        file:bg-primary file:text-primary-foreground
                                        hover:file:cursor-pointer hover:file:bg-primary/90"
                                />
                                @error('image')
                                    <p class="mt-1 text-sm text-destructive">{{ $message }}</p>
                                @enderror
                                <p class="mt-1 text-xs text-muted-foreground">
                                    Formatos aceitos: JPG, PNG, GIF. Tamanho máximo: 2MB.
                                </p>
                            </div>
                        </div>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-foreground mb-1.5" for="description">
                            Descrição
                        </label>
                        <textarea 
                            name="description" 
                            id="description"
                            rows="6"
                            class="w-full rounded-md border border-input bg-background px-3 py-2 text-sm text-foreground ring-offset-background placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50 {{ $errors->has('description') ? 'border-destructive focus-visible:ring-destructive' : '' }}"
                            required
                        >{{ old('description') }}</textarea>
                        @error('description')
                            <p class="mt-1 text-sm text-destructive">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div class="mb-6">
                        <label for="link" class="block text-sm font-medium text-foreground mb-1.5">
                            Link do Projeto <span class="text-xs text-muted-foreground">(Opcional)</span>
                        </label>
                        <input 
                            type="url" 
                            id="link" 
                            name="link" 
                            value="{{ old('link', $project->link ?? '') }}"
                            class="w-full rounded-md border border-input bg-background px-3 py-2 text-sm text-foreground ring-offset-background placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50 {{ $errors->has('link') ? 'border-destructive focus-visible:ring-destructive' : '' }}"
                            placeholder="https://exemplo.com"
                        >
                        @error('link')
                            <p class="mt-1 text-sm text-destructive">{{ $message }}</p>
                        @enderror
                        <p class="mt-1 text-xs text-muted-foreground">
                            Se houver, insira o link do projeto publicado ou repositório.
                        </p>
                    </div>
                    
                    <div class="flex justify-end">
                        <x-button type="submit" variant="primary">
                            Criar Projeto
                        </x-button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const imageInput = document.getElementById('image');
        const imagePreview = document.getElementById('image-preview');
        
        imageInput.addEventListener('change', function() {
            if (this.files && this.files[0]) {
                const reader = new FileReader();
                
                reader.onload = function(e) {
                    // Limpar o conteúdo atual
                    imagePreview.innerHTML = '';
                    
                    // Criar elemento de imagem
                    const img = document.createElement('img');
                    img.src = e.target.result;
                    img.classList.add('h-full', 'w-full', 'object-cover');
                    
                    // Adicionar ao preview
                    imagePreview.appendChild(img);
                }
                
                reader.readAsDataURL(this.files[0]);
            }
        });
    });
</script>
@endpush 