@extends('layouts.home')

@section('content')
    <div class="space-y-6">
        <div class="flex items-center gap-4 mb-4">
            <a href="{{ route('posts.index') }}" class="text-gray-400 hover:text-white transition-colors p-2 rounded-full hover:bg-zinc-800" title="Voltar"> 
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
            </a>
        </div>
        
        <div class="w-full bg-[#2a2726] border border-[#3a3635] rounded-3xl shadow-xl overflow-hidden">
            <div class="p-6">
                <div class="flex items-center justify-between mb-4">
                    <div class="flex items-center gap-3">
                        <img
                            src="{{ asset('pfp.jpeg') }}" 
                            alt="Pedro Haubert"
                            class="w-10 h-10 rounded-full ring-2 ring-zinc-800"
                        />
                        <div>
                            <h3 class="text-sm font-medium text-zinc-100">
                                Pedro Haubert
                            </h3>
                            <p class="text-xs text-zinc-400">
                                pedrohaubert1@gmail.com · {{ $post->updated_at->diffForHumans() }}
                            </p>
                        </div>
                    </div>
                    <button type="button" class="p-2 hover:bg-zinc-800 rounded-full transition-colors" title="Mais opções">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-zinc-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z" />
                        </svg>
                    </button>
                </div>

                <h2 class="text-xl font-semibold text-white mb-2">{{ $post->title }}</h2>
                <p class="text-gray-300 text-sm mb-4 italic">{{ $post->description }}</p>

                <div class="mt-6 mb-6 text-gray-200 leading-relaxed prose prose-invert max-w-none">
                    {!! $post->content !!}
                </div>

                <div class="flex items-center justify-between pt-4 border-t border-zinc-800">
                    <div class="flex items-center gap-6">
                        <button 
                            type="button"
                            class="flex items-center gap-2 text-sm text-zinc-400 hover:text-rose-600 transition-colors like-button"
                            data-post-id="{{ $post->id }}"
                        >
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 heart-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                            </svg>
                            <span>Curtir</span>
                        </button>
    
                        <button 
                            type="button"
                            class="flex items-center gap-2 text-sm text-zinc-400 hover:text-blue-500 transition-colors share-button"
                            data-link="{{ route('posts.show', $post) }}"
                            data-post-id="{{ $post->id }}"
                        >
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6.016l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.367 2.684 3 3 0 00-5.367-2.684z" />
                            </svg>
                            <span>Compartilhar</span>
                        </button>
                    </div>

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
    </div>
@endsection

@section('scripts')
    @include('partials.post-actions-script')
@endsection 