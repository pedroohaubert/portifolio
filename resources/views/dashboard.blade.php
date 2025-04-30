@extends('layouts.app')

@section('content')
<div class="bg-background text-foreground min-h-screen py-12">
    <div class="container max-w-5xl mx-auto px-4">
        <h1 class="text-3xl font-bold mb-8">Dashboard</h1>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <x-dashboard-card 
                title="Gerenciar Posts" 
                description="Criar, editar e visualizar posts do blog."
                href="{{ route('posts.admin') }}" 
            />

            <x-dashboard-card 
                title="Gerenciar Projetos" 
                description="Adicionar um novo projeto ao portfólio."
                href="{{ route('projects.admin') }}" 
            />

            <x-dashboard-card 
                title="Gerenciar Tópicos" 
                description="Criar e organizar tópicos para os posts."
                href="{{ route('topics.admin') }}" 
            />

            <x-dashboard-card 
                title="Gerenciar Categorias" 
                description="Criar, editar e visualizar categorias para projetos."
                href="{{ route('categories.admin') }}" 
            />
        </div>
    </div>
</div>
@endsection 