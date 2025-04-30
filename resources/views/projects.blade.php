@extends('layouts.home')

@section('content')
    <div class="space-y-6">
        <div class="flex justify-between items-center">
            <h1 class="text-2xl font-bold text-white">Projetos</h1>
            
            <div class="flex items-center space-x-2">
                <form action="{{ route('projects.index') }}" method="GET" class="flex">
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
                        placeholder="Buscar projetos..."
                      />
                    </div>
                </form>

                @if(request('search') || request('category'))
                    <a href="{{ route('projects.index') }}"
                       class="bg-[#2a2726] text-[#d1cdc7] rounded-xl px-4 h-[45px] flex items-center text-sm 
                              border border-[#3a3635] hover:border-[#4a4645] transition-all duration-200">
                        <span>Limpar</span>
                    </a>
                @endif
            </div>
        </div>

        @if(isset($categories) && $categories->count() > 0)
            <div class="flex flex-wrap gap-2 py-2">
                @foreach($categories as $category)
                    @php
                        $isActive = request('category') == $category->id;
                        $bgColor = $isActive ? ($category->color ?? '#3a3635') : '#3a3635';
                    @endphp
                    <a href="{{ route('projects.index', ['category' => $category->id]) }}" 
                       class="inline-flex items-center rounded-full border border-transparent px-2.5 py-0.5 text-xs font-semibold transition-colors {{ $isActive ? 'font-semibold ring-2 ring-offset-2' : '' }}"
                       style="background-color: {{ $bgColor }}; color: #d1cdc7; {{ $isActive ? 'box-shadow: inset 0 0 0 1px '.($category->color ? $category->color : '#4a4645').'; --tw-ring-color: '.($category->color ? $category->color : '#4a4645').'; --tw-ring-offset-color: #1a1a1a;' : '' }}">
                        {{ $category->name }}
                    </a>
                @endforeach
            </div>
        @endif

        @if($projects->isEmpty())
            <div class="text-center py-12">
                <p class="text-gray-400">Nenhum projeto encontrado.</p>
            </div>
        @else
            <div class="space-y-6">
                @foreach($projects as $project)
                    <a href="{{ $project->link ?? '#' }}" target="_blank" rel="noopener noreferrer" class="block project-card-link no-underline">
                        <div class="card w-full">
                            <div class="mac-header">
                                <span class="red"></span>
                                <span class="yellow"></span>
                                <span class="green"></span>
                            </div>
                            
                            <div class="flex flex-col md:flex-row gap-6 mt-4">
                                <div class="md:w-1/3 lg:w-3/5 flex-shrink-0">
                                    <div class="image-container rounded-2xl h-48 overflow-hidden border border-[#3f3f46] flex items-center justify-center bg-[#282728]">
                                        @if($project->image_path)
                                            <img 
                                                src="{{ asset($project->image_path) }}" 
                                                alt="{{ $project->title }}" 
                                                class="project-image"
                                                style="object-fit: contain; width: 100%; height: 100%; background: #282728;"
                                            >
                                        @else
                                            <div class="project-image-placeholder">
                                                <span>Sem Imagem</span>
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                <div class="flex-grow flex flex-col">
                                    <span class="card-title block mb-1">{{ $project->title }}</span>
                                    <p class="card-description mb-3">{{ $project->description }}</p>
                                    
                                    @if($project->categories && $project->categories->count() > 0)
                                        <div class="mt-auto pt-4">
                                            @foreach($project->categories as $category)
                                                <span class="card-tag" style="background-color: {{ $category->color ?? '#0d1117' }}; border: 1px solid {{ $category->color ? darken_color($category->color, 20) : '#333' }};">
                                                    {{ $category->name }}
                                                </span>
                                            @endforeach
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
            
            <div class="mt-6">
                {{ $projects->links() }}
            </div>
        @endif
    </div>
@endsection

@section('styles')
<link rel="stylesheet" href="{{ asset('css/search-bar.css') }}">
<style>
    /* Estilização da paginação */
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
        background-color: #1f2838;
        color: #fff;
        border-radius: 4px;
        font-size: 0.875rem;
        transition: background-color 0.2s;
    }
    
    .pagination li a:hover {
        background-color: #374151;
    }
    
    .pagination li.active span {
        background-color: #4f46e5;
    }
    
    .pagination li.disabled span {
        background-color: #1f2838;
        color: #6b7280;
        cursor: not-allowed;
    }
    
    /* Layout responsivo para projetos */
    @media (max-width: 767px) {
        .md\:w-1\/3, .md\:w-1\/4 {
            width: 100%;
        }
        .card {
             padding: 15px;
        }
        .card-title {
            font-size: 1rem;
        }
        .card-description {
            font-size: 0.8rem;
        }
    }

    /* Novo estilo do Card Mac */
    .project-card-link {
        text-decoration: none;
        display: block;
    }
    .card {
      padding: 20px;
      border: 1px solid #2a2726;
      border-radius: 10px;
      background-color: #292727;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
      cursor: pointer;
      transition:
        transform 0.2s,
        box-shadow 0.2s;
      position: relative;
      font-family:
        system-ui,
        -apple-system,
        BlinkMacSystemFont,
        "Segoe UI",
        Roboto,
        Oxygen,
        Ubuntu,
        Cantarell,
        "Open Sans",
        "Helvetica Neue",
        sans-serif;
    }

    .card:hover {
      transform: translateY(-5px);
      box-shadow: 0 6px 12px rgba(0, 0, 0, 0.4);
      border-color: #4a4645;
    }

    .mac-header {
      display: flex;
      align-items: center;
      gap: 8px;
      margin-bottom: 15px;
    }

    .mac-header span {
      display: inline-block;
      width: 12px;
      height: 12px;
      border-radius: 50%;
    }

    .mac-header .red {
      background-color: #ff5f57;
    }

    .mac-header .yellow {
      background-color: #ffbd2e;
    }

    .mac-header .green {
      background-color: #28c941;
    }

    .card-title {
      font-size: 1.125rem;
      font-weight: 600;
      margin: 0 0 10px;
      color: #e6e6ef;
      display: block;
      line-height: 1.3;
    }

    .card-description {
      font-size: 0.875rem;
      color: #a0aec0;
      margin-bottom: 15px;
      line-height: 1.5;
    }

    .card .card-tag {
      display: inline-block;
      font-size: 0.75rem;
      border-radius: 9999px;
      padding: 3px 10px;
      color: #e2e8f0;
      margin-right: 4px;
      margin-bottom: 4px;
      font-weight: 600;
      border: 1px solid transparent;
    }

    /* Container da Imagem com Aspect Ratio 16:9 */
    .image-container {
      position: relative;
      width: 100%;
      padding-top: 56.25%; /* 16:9 Aspect Ratio (9 / 16 * 100) */
      background-color: #1f2838; /* Cor de fundo para área da imagem */
      /* border: 1px solid #333; */ /* Já tem borda inline */
      border-radius: 5px; 
      overflow: hidden; 
    }
    
    /* Imagem e Placeholder posicionados absolutamente dentro do container */
    .project-image,
    .project-image-placeholder {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        display: block; /* Para imagem */
        object-fit: cover; /* Para imagem */
        border-radius: 0; /* Borda arredondada vai no container */
    }
    
    /* Estilos específicos do Placeholder */
    .project-image-placeholder {
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: #2d3748; /* Um cinza escuro */
        color: #718096; /* Cinza mais claro para o texto */
        font-size: 0.875rem;
    }
</style>
@endsection

