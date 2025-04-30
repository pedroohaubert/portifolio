@extends('layouts.app')

@section('content')
<div class="bg-background text-foreground min-h-screen py-12">
    <div class="container max-w-7xl mx-auto px-4">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-8">
            <h1 class="text-3xl font-bold mb-4 md:mb-0">Administração de Projetos</h1>
            <x-button href="{{ route('projects.create') }}" variant="primary">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
                </svg>
                Novo Projeto
            </x-button>
        </div>
        
        @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-6">
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
        @endif
        
        <div class="bg-card rounded-lg border border-border shadow-sm overflow-hidden">
            <x-data-table :headers="['Imagem', 'Título', 'Categorias', 'Data', 'Ações']">
                @foreach ($projects as $project)
                <tr>
                    <td class="px-6 py-4 w-24">
                        @if ($project->image_path)
                        <div class="w-16 h-16 overflow-hidden rounded border border-border">
                            <img src="{{ asset($project->image_path) }}" alt="{{ $project->title }}" class="w-full h-full object-cover">
                        </div>
                        @else
                        <div class="w-16 h-16 flex items-center justify-center bg-muted rounded border border-border">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-muted-foreground" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                        </div>
                        @endif
                    </td>
                    <td class="px-6 py-4">
                        <div class="font-medium text-foreground">{{ $project->title }}</div>
                        <div class="text-sm text-muted-foreground truncate max-w-xs">
                            {{ Str::limit($project->description, 100) }}
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex flex-wrap gap-1.5">
                            @foreach ($project->categories as $category)
                                <x-badge color="{{ $category->color ?? '#eee' }}">
                                    {{ $category->name }}
                                </x-badge>
                            @endforeach
                            
                            @if($project->categories->isEmpty())
                                <span class="text-sm text-muted-foreground">Sem categorias</span>
                            @endif
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="text-sm text-muted-foreground">
                            {{ $project->created_at->format('d/m/Y') }}
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex space-x-2">
                            <x-button href="{{ route('projects.edit', $project) }}" variant="outline" size="sm">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit mr-1">
                                    <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                    <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                                </svg>
                                Editar
                            </x-button>
                            <form action="{{ route('projects.destroy', $project) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir este projeto?')">
                                @csrf
                                @method('DELETE')
                                <x-button type="submit" variant="destructive" size="sm">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 mr-1">
                                        <polyline points="3 6 5 6 21 6"></polyline>
                                        <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                        <line x1="10" y1="11" x2="10" y2="17"></line>
                                        <line x1="14" y1="11" x2="14" y2="17"></line>
                                    </svg>
                                    Excluir
                                </x-button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </x-data-table>
        </div>
        
        <div class="mt-6">
            {{ $projects->links() }}
        </div>
    </div>
</div>
@endsection 