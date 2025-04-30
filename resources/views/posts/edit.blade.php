@extends('layouts.app')

@section('content')
<div class="bg-background text-foreground min-h-screen py-12">
    <div class="container max-w-4xl mx-auto px-4">
        <div class="flex items-center mb-8">
            <a href="{{ route('posts.admin') }}" class="text-muted-foreground hover:text-foreground mr-4">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left">
                    <line x1="19" y1="12" x2="5" y2="12"></line>
                    <polyline points="12 19 5 12 12 5"></polyline>
                </svg>
            </a>
            <h1 class="text-3xl font-bold">Editar Post</h1>
        </div>
        
        @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-6">
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
        @endif
        
        <div class="bg-card rounded-lg border border-border shadow-sm p-6">
            <form action="{{ route('posts.update', $post) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="space-y-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <x-input 
                            type="text" 
                            name="title" 
                            id="title" 
                            :label="'Título'" 
                            :error="$errors->first('title')" 
                            value="{{ old('title', $post->title) }}" 
                            required 
                        />
                        
                        <x-input 
                            type="text" 
                            name="description" 
                            id="description" 
                            :label="'Descrição'"
                            :error="$errors->first('description')" 
                            value="{{ old('description', $post->description) }}" 
                            required 
                        />
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-foreground mb-1.5">
                            Tópicos
                        </label>
                        <x-select name="topics[]" id="topics" multiple class="h-32">
                            @foreach($topics as $topic)
                                <option value="{{ $topic->id }}" {{ (collect(old('topics', $post->topics->pluck('id')))->contains($topic->id)) ? 'selected' : '' }}>
                                    {{ $topic->name }}
                                </option>
                            @endforeach
                        </x-select>
                        @error('topics')
                            <p class="mt-1 text-sm text-destructive">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div>
                        <x-wysiwyg-editor
                            name="content"
                            id="content"
                            :label="'Conteúdo'"
                            :value="old('content', $post->content)"
                            :error="$errors->first('content')"
                            required
                            height="400"
                        />
                    </div>
                    
                    <div class="flex justify-end">
                        <x-button type="submit" variant="primary">
                            Atualizar Post
                        </x-button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
<script src="https://cdn.tiny.cloud/1/biovjne3ik61o21mw48l06ylvamdd8hecytfwz1frw55ztsy/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
@endpush 