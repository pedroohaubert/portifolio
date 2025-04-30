@extends('layouts.home')

@section('content')
    <div class="space-y-6">
        <div class="flex items-center gap-4 mb-2">
            <a href="{{ route('projects.index') }}" class="text-gray-400 hover:text-white transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
            </a>
            <h1 class="text-2xl font-bold text-white">{{ $project->title }}</h1>
        </div>
        
        <div class="bg-[#1f2838]/20 border border-gray-700 rounded-lg overflow-hidden">
            @if($project->image_path)
                <div class="w-full h-64 md:h-80 overflow-hidden">
                    <img src="{{ asset($project->image_path) }}" alt="{{ $project->title }}" class="w-full h-full object-cover">
                </div>
            @endif
            
            <div class="p-6">
                <div class="mb-6">
                    <div class="flex justify-between items-center mb-4">
                        <h2 class="text-xl font-semibold text-white">Sobre o projeto</h2>
                        <span class="text-sm text-gray-400">{{ $project->created_at->format('d/m/Y') }}</span>
                    </div>
                    
                    <p class="text-gray-300 text-base leading-relaxed">{{ $project->description }}</p>
                </div>
                
                @if($project->categories && $project->categories->count() > 0)
                    <div class="mt-6">
                        <h3 class="text-lg font-semibold text-white mb-2">Categorias</h3>
                        <div class="flex flex-wrap gap-2">
                            @foreach($project->categories as $category)
                                <span class="inline-flex items-center rounded-full border border-transparent px-2.5 py-0.5 text-xs font-semibold transition-colors" 
                                      style="background-color: {{ $category->color ?? '#374151' }}; color: #d1cdc7;">
                                    {{ $category->name }}
                                </span>
                            @endforeach
                        </div>
                    </div>
                @endif
                
                <div class="mt-8 pt-4 border-t border-gray-700">
                    <a href="{{ route('projects.index') }}" class="inline-block bg-gray-700 hover:bg-gray-600 text-white rounded-lg px-4 py-2 text-sm font-medium transition-colors">
                        Voltar para projetos
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection 