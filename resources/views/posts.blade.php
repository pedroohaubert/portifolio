@extends('layouts.home')

@section('content')
    <div class="space-y-6">
        <div class="flex justify-between items-center">
            <h1 class="text-2xl font-bold text-white">Posts</h1>
            
            <div class="flex items-center space-x-2">
                <form action="{{ route('posts.index') }}" method="GET" class="flex">
                    <div class="group">
                      <svg viewBox="0 0 24 24" aria-hidden="true" class="search-icon">
                        <g>
                          <path
                            d="M21.53 20.47l-3.66-3.66C19.195 15.24 20 13.214 20 11c0-4.97-4.03-9-9-9s-9 4.03-9 9 4.03 9 9 9c2.215 0 4.24-.804 5.808-2.13l3.66 3.66c.147.146.34.22.53.22s.385-.073.53-.22c.295-.293.295-.767.002-1.06zM3.5 11c0-4.135 3.365-7.5 7.5-7.5s7.5 3.365 7.5 7.5-3.365 7.5-7.5 7.5-7.5-3.365-7.5-7.5z"
                          ></path>
                        </g>
                      </svg>
                      <input
                        id="search" 
                        class="search-input" 
                        type="search"
                        name="search" 
                        value="{{ request('search') }}" 
                        placeholder="Buscar posts..."
                      />
                    </div>
                </form>

                @if(request('search') || request('topic'))
                    <a href="{{ route('posts.index') }}" 
                       class="bg-[#2a2726] text-[#d1cdc7] rounded-xl px-4 h-[45px] flex items-center text-sm 
                              border border-[#3a3635] hover:border-[#4a4645] transition-all duration-200">
                        <span>Limpar</span>
                    </a>
                @endif
            </div>
        </div>

        @if(isset($topics) && $topics->count() > 0)
            <div class="flex flex-wrap gap-2 py-2">
                @foreach($topics as $topic)
                    @php
                        $isActive = request('topic') == $topic->id;
                        // Usando cores mais próximas do tema zinc para os filtros de tópico
                        $bgColor = $isActive ? ($topic->color ?? '#52525b') : '#3f3f46'; // zinc-600 e zinc-700
                        $borderColor = $topic->color ?? '#a1a1aa'; // zinc-400
                    @endphp
                    <a href="{{ route('posts.index', ['topic' => $topic->id]) }}" 
                       class="inline-flex items-center rounded-full border border-transparent px-2.5 py-0.5 text-xs font-semibold transition-colors {{ $isActive ? 'font-semibold ring-2 ring-offset-2' : '' }}"
                       style="background-color: {{ $bgColor }}; color: #e4e4e7; {{ $isActive ? '--tw-ring-color: '.$borderColor.'; --tw-ring-offset-color: #18181b;' : '' }}">
                        {{ $topic->name }}
                    </a>
                @endforeach
            </div>
        @endif

        @if($posts->isEmpty())
            <div class="text-center py-12">
                <p class="text-gray-400">Nenhum post encontrado.</p>
            </div>
        @else
            <div class="space-y-6">
                @foreach($posts as $post)
                    {{-- Novo Card Estilo SocialCard --}}
                    <div class="w-full bg-[#2a2726] border border-[#3a3635] rounded-3xl shadow-xl overflow-hidden">
                        <div class="p-6">
                            {{-- Seção do Autor --}}
                            <div class="flex items-center justify-between mb-4">
                                <div class="flex items-center gap-3">
                                    <img
                                        src="{{ asset('pfp.jpeg') }}" 
                                        alt="Pedro Haubert"
                                        class="w-10 h-10 rounded-full ring-2 ring-zinc-800" {{-- Alterado para ring-zinc-800 para contraste no tema escuro --}}
                                    />
                                    <div>
                                        <h3 class="text-sm font-medium text-zinc-100">
                                            Pedro Haubert
                                        </h3>
                                        <p class="text-xs text-zinc-400">
                                            pedrohaubert1@gmail.com · {{ $post->updated_at->diffForHumans() }} {{-- Usando updated_at e diffForHumans --}}
                                        </p>
                                    </div>
                                </div>
                                {{-- Botão "Mais" (sem funcionalidade por enquanto) --}}
                                <button
                                    type="button"
                                    class="p-2 hover:bg-zinc-800 rounded-full transition-colors"
                                    title="Mais opções" {{-- Adicionado title para acessibilidade --}}
                                >
                                    {{-- Ícone de MoreHorizontal (simulado com SVG ou pode usar um ícone real se tiver uma biblioteca) --}}
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-zinc-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z" />
                                    </svg>
                                </button>
                            </div>

                            {{-- Seção de Conteúdo (Descrição) --}}
                            <p class="text-zinc-300 text-sm mb-4">
                                {{ $post->description }}
                            </p>

                            {{-- Seção de Link (Título do Post) --}}
                            <div class="mb-4 rounded-2xl border border-zinc-700 overflow-hidden hover:border-zinc-600 transition-colors">
                                <a href="{{ route('posts.show', $post) }}" class="block p-4 bg-zinc-800/50 hover:bg-zinc-800/80 transition-colors">
                                    <div class="flex items-center gap-3">
                                         {{-- Ícone de Link (simulado com SVG) --}}
                                         <div class="p-2 bg-zinc-700 rounded-xl">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-zinc-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                              <path stroke-linecap="round" stroke-linejoin="round" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1" />
                                            </svg>
                                         </div>
                                        <div>
                                            <h4 class="text-sm font-medium text-zinc-100">
                                                {{ $post->title }}
                                            </h4>
                                            {{-- Poderia adicionar uma pequena descrição do link se desejado --}}
                                            {{-- <p class="text-xs text-zinc-400">Leia o post completo</p> --}}
                                        </div>
                                    </div>
                                </a>
                            </div>

                            {{-- Seção de Engajamento e Tópicos (agora juntos) --}}
                            <div class="flex items-center justify-between pt-4 border-t border-zinc-800">
                                {{-- Botões (Esquerda) --}}
                                <div class="flex items-center gap-6">
                                    {{-- Botão Like --}}
                                    <button 
                                        type="button"
                                        class="flex items-center gap-2 text-sm text-zinc-400 hover:text-rose-600 transition-colors like-button"
                                        data-post-id="{{ $post->id }}"
                                    >
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 heart-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                        </svg>
                                    </button>
    
                                    {{-- Botão Share --}}
                                    <button 
                                        type="button"
                                        class="flex items-center gap-2 text-sm text-zinc-400 hover:text-blue-500 transition-colors share-button"
                                        data-link="{{ route('posts.show', $post) }}"
                                        data-post-id="{{ $post->id }}"
                                    >
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                          <path stroke-linecap="round" stroke-linejoin="round" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6.016l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.367 2.684 3 3 0 00-5.367-2.684z" />
                                        </svg>
                                    </button>
                                </div>
                                
                                {{-- Badges/Tópicos (Direita) --}}
                                @if($post->topics && $post->topics->count() > 0)
                                    <div class="flex flex-wrap gap-1 justify-end">
                                        @foreach($post->topics as $topic)
                                            <span class="inline-flex items-center rounded-full border border-transparent px-2.5 py-0.5 text-xs font-semibold transition-colors" 
                                                  style="background-color: {{ $topic->color ?? '#3f3f46' }}; color: #e4e4e7;">
                                                {{ $topic->name }}
                                            </span>
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            
            <div class="mt-8"> {{-- Aumentado o margin-top para espaçamento --}}
                {{ $posts->links() }}
            </div>
        @endif
    </div>
@endsection

@section('styles')
<link rel="stylesheet" href="{{ asset('css/search-bar.css') }}">
<style>
    /* Estilização da paginação (mantida, mas ajustada para cores zinc) */
    .pagination {
        display: flex;
        justify-content: center;
        list-style: none;
        padding: 0;
        margin: 0;
    }
    
    .pagination li {
        margin: 0 3px;
    }
    
    .pagination li a, .pagination li span {
        display: block;
        padding: 8px 12px;
        background-color: #27272a; /* zinc-800 */
        color: #e4e4e7; /* zinc-200 */
        border: 1px solid #3f3f46; /* zinc-700 */
        border-radius: 4px;
        font-size: 0.875rem;
        transition: background-color 0.2s, border-color 0.2s;
    }
    
    .pagination li a:hover {
        background-color: #3f3f46; /* zinc-700 */
        border-color: #52525b; /* zinc-600 */
    }
    
    .pagination li.active span {
        background-color: #6366f1; /* indigo-500 (exemplo, pode ajustar) */
        border-color: #6366f1;
        color: #fff;
    }
    
    .pagination li.disabled span {
        background-color: #18181b; /* zinc-900 */
        color: #71717a; /* zinc-500 */
        border-color: #27272a; /* zinc-800 */
        cursor: not-allowed;
    }
</style>
@endsection

@section('scripts')
    {{-- Incluiremos o script para os botões aqui, que será comum a posts.blade e show.blade --}}
    @include('partials.post-actions-script')
@endsection

