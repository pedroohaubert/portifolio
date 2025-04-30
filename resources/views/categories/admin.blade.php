@extends('layouts.app')

@section('content')
<div class="bg-background text-foreground min-h-screen py-12">
    <div class="container mx-auto px-4">
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-3xl font-bold">Gerenciar Categorias</h1>
            <a href="{{ route('categories.create') }}" class="bg-primary text-primary-foreground hover:bg-primary/90 px-4 py-2 rounded-md transition duration-300">
                Nova Categoria
            </a>
        </div>

        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-6" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif
        
         @if(session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-6" role="alert">
                <span class="block sm:inline">{{ session('error') }}</span>
            </div>
        @endif

        <div class="bg-card shadow overflow-hidden sm:rounded-lg">
            <table class="min-w-full divide-y divide-border">
                <thead class="bg-muted/50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-muted-foreground uppercase tracking-wider">
                            Nome
                        </th>
                         <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-muted-foreground uppercase tracking-wider">
                            Cor
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-muted-foreground uppercase tracking-wider">
                            Projetos
                        </th>
                        <th scope="col" class="relative px-6 py-3">
                            <span class="sr-only">Ações</span>
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-card divide-y divide-border">
                    @forelse ($categories as $category)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-foreground">
                                {{ $category->name }}
                            </td>
                             <td class="px-6 py-4 whitespace-nowrap text-sm text-muted-foreground">
                                <span class="inline-block w-4 h-4 rounded-full mr-2" style="background-color: {{ $category->color }};"></span>
                                {{ $category->color }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-muted-foreground">
                                {{ $category->projects_count }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium space-x-2">
                                <a href="{{ route('categories.edit', $category) }}" class="text-indigo-600 hover:text-indigo-900">Editar</a>
                                <form action="{{ route('categories.destroy', $category) }}" method="POST" class="inline-block" onsubmit="return confirm('Tem certeza que deseja excluir esta categoria? Esta ação não pode ser desfeita.');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900">Excluir</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-6 py-4 whitespace-nowrap text-sm text-muted-foreground text-center">
                                Nenhuma categoria encontrada.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-8">
            {{ $categories->links() }} 
        </div>

    </div>
</div>
@endsection 