@extends('layouts.app')

@section('content')
<div class="bg-background text-foreground min-h-screen py-12">
    <div class="container max-w-7xl mx-auto px-4">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-8">
            <h1 class="text-3xl font-bold mb-4 md:mb-0">Administração de Posts</h1>
            <x-button href="{{ route('posts.create') }}" variant="primary">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
                </svg>
                Novo Post
            </x-button>
        </div>
        
        @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-6">
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
        @endif
        
        <div class="bg-card rounded-lg border border-border shadow-sm overflow-hidden">
            <x-data-table :headers="['Título', 'Descrição', 'Data', 'Tópicos', 'Ações']">
                @foreach ($posts as $post)
                <tr>
                    <td class="px-6 py-4">
                        <div class="font-medium text-foreground">{{ $post->title }}</div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="text-sm text-muted-foreground">{{ $post->description }}</div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="text-sm text-muted-foreground">
                            {{ $post->created_at->format('d/m/Y') }}
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex flex-wrap gap-1.5">
                            @foreach ($post->topics as $topic)
                                <x-badge color="{{ $topic->color ?? '#eee' }}">
                                    {{ $topic->name }}
                                </x-badge>
                            @endforeach
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex space-x-2">
                            <x-button href="{{ route('posts.edit', $post) }}" variant="outline" size="sm">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit mr-1">
                                    <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                    <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                                </svg>
                                Editar
                            </x-button>
                            <form action="{{ route('posts.destroy', $post) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir este post?')">
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
            {{ $posts->links() }}
        </div>
    </div>
</div>
@endsection 