@extends('layouts.app')

@section('content')
<div class="bg-background text-foreground min-h-screen py-12">
    <div class="container max-w-5xl mx-auto px-4">
        <div class="mb-10">
            <div class="flex items-center mb-4">
                <a href="{{ route('topics.admin') }}" class="text-muted-foreground hover:text-foreground mr-4">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left">
                        <line x1="19" y1="12" x2="5" y2="12"></line>
                        <polyline points="12 19 5 12 12 5"></polyline>
                    </svg>
                </a>
                <h1 class="text-3xl font-bold flex items-center">
                    <x-badge class="mr-3 text-base" color="{{ $topic->color ?? '#eee' }}">{{ $topic->name }}</x-badge>
                    Tópico: {{ $topic->name }}
                </h1>
            </div>
            
            <div class="flex items-center space-x-3 mt-4">
                <x-button href="{{ route('topics.edit', $topic) }}" variant="outline" size="sm">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit mr-1">
                        <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                        <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                    </svg>
                    Editar Tópico
                </x-button>
                
                <form action="{{ route('topics.destroy', $topic) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir este tópico?')">
                    @csrf
                    @method('DELETE')
                    <x-button type="submit" variant="destructive" size="sm">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 mr-1">
                            <polyline points="3 6 5 6 21 6"></polyline>
                            <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                            <line x1="10" y1="11" x2="10" y2="17"></line>
                            <line x1="14" y1="11" x2="14" y2="17"></line>
                        </svg>
                        Excluir Tópico
                    </x-button>
                </form>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="md:col-span-1">
                <div class="bg-card rounded-lg border border-border shadow-sm p-6">
                    <h2 class="text-xl font-semibold mb-4">Informações</h2>
                    
                    <div class="space-y-4">
                        <div>
                            <h3 class="text-sm font-medium text-muted-foreground mb-1">Nome</h3>
                            <p>{{ $topic->name }}</p>
                        </div>
                        
                        <div>
                            <h3 class="text-sm font-medium text-muted-foreground mb-1">Slug</h3>
                            <p class="font-mono text-sm bg-muted p-1 rounded">{{ $topic->slug }}</p>
                        </div>
                        
                        <div>
                            <h3 class="text-sm font-medium text-muted-foreground mb-1">Cor</h3>
                            @if ($topic->color)
                            <div class="flex items-center">
                                <div class="w-6 h-6 rounded-full mr-2" style="background-color: {{ $topic->color }}"></div>
                                <span class="font-mono text-sm">{{ $topic->color }}</span>
                            </div>
                            @else
                            <p>Não definida</p>
                            @endif
                        </div>
                        
                        <div>
                            <h3 class="text-sm font-medium text-muted-foreground mb-1">Criado em</h3>
                            <p>{{ $topic->created_at->format('d/m/Y H:i') }}</p>
                        </div>
                        
                        <div>
                            <h3 class="text-sm font-medium text-muted-foreground mb-1">Atualizado em</h3>
                            <p>{{ $topic->updated_at->format('d/m/Y H:i') }}</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="md:col-span-2">
                <div class="bg-card rounded-lg border border-border shadow-sm p-6">
                    <div class="flex items-center justify-between mb-4">
                        <h2 class="text-xl font-semibold">Posts Relacionados</h2>
                        <div class="text-sm text-muted-foreground">
                            {{ $topic->posts_count }} {{ $topic->posts_count === 1 ? 'post' : 'posts' }}
                        </div>
                    </div>
                    
                    @if($topic->posts_count > 0)
                        <p class="text-center py-10 text-muted-foreground">
                            Para visualizar ou gerenciar posts relacionados, acesse a 
                            <a href="{{ route('posts.admin') }}" class="text-primary hover:underline">
                                administração de posts
                            </a>
                            e utilize os filtros.
                        </p>
                    @else
                        <div class="py-10 text-center text-muted-foreground">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mx-auto mb-4 opacity-30" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                            <p class="mb-2 font-medium">Nenhum post relacionado</p>
                            <p>Este tópico ainda não foi utilizado em nenhum post.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 