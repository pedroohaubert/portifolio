@extends('layouts.home')


@section('content')
    <div>
        <p class="text-sm text-gray-400 mb-4">Sou um desenvolvedor web e estudante apaixonado por criar soluções inovadoras
            e
            eficientes com tecnologias modernas e IA. Estou sempre explorando novas ferramentas, aprimorando minhas
            habilidades
            e buscando transformar ideias em experiências digitais impactantes.</p>

        <ul class="list-none space-y-2 text-sm text-gray-300 mb-4 pl-5">
            <li class="relative group transition-transform duration-500 ease-out hover:translate-x-2">
                <span
                    class="absolute -left-5 top-1/2 -translate-y-1/2 transform rotate-45 transition-all duration-500 group-hover:rotate-0 group-hover:scale-75 text-gray-100 text-xs">■</span>
                Ciência da computação @Feevale
            </li>
            <li class="relative group transition-transform duration-500 ease-out hover:translate-x-2">
                <span
                    class="absolute -left-5 top-1/2 -translate-y-1/2 transform rotate-45 transition-all duration-500 group-hover:rotate-0 group-hover:scale-75 text-gray-100 text-xs">■</span>
                Finalista FEBIC (Feira Brasileira de Iniciação Científica)
            </li>
            <li class="relative group transition-transform duration-500 ease-out hover:translate-x-2">
                <span
                    class="absolute -left-5 top-1/2 -translate-y-1/2 transform rotate-45 transition-all duration-500 group-hover:rotate-0 group-hover:scale-75 text-gray-100 text-xs">■</span>
                Menção Honrosa Hackatime @Faccat&Sicredi
            </li>
            <li class="relative group transition-transform duration-500 ease-out hover:translate-x-2">
                <span
                    class="absolute -left-5 top-1/2 -translate-y-1/2 transform rotate-45 transition-all duration-500 group-hover:rotate-0 group-hover:scale-75 text-gray-100 text-xs">■</span>
                Técnico em informática @CIMOL
            </li>
            <li class="relative group transition-transform duration-500 ease-out hover:translate-x-2">
                <span
                    class="absolute -left-5 top-1/2 -translate-y-1/2 transform rotate-45 transition-all duration-500 group-hover:rotate-0 group-hover:scale-75 text-gray-100 text-xs">■</span>
                Medalhista Maratona Tech 2024
            </li>
            <li class="relative group transition-transform duration-500 ease-out hover:translate-x-2">
                <span
                    class="absolute -left-5 top-0 mt-[2px] transform rotate-45 transition-all duration-500 group-hover:rotate-0 group-hover:scale-75 text-gray-100 text-xs">■</span>
                Atualmente:
                <ul class="list-none space-y-1 mt-2 ml-0 pl-5 text-gray-300 text-xs">
                    <li class="relative">
                        <span class="absolute -left-5 top-1/2 -translate-y-1/2 text-gray-400">↳</span>
                        Estudando System Design e Design Patterns
                    </li>
                    <li class="relative">
                        <span class="absolute -left-5 top-1/2 -translate-y-1/2 text-gray-400">↳</span>
                        Aprendendo machine learning e deep learning
                    </li>
                    <li class="relative">
                        <span class="absolute -left-5 top-1/2 -translate-y-1/2 text-gray-400">↳</span>
                        Desenvolvendo assistente de IA para BI e análise de dados
                    </li>
                    <li class="relative">
                        <span class="absolute -left-5 top-1/2 -translate-y-1/2 text-gray-400">↳</span>
                        Resolvendo Advent of Code 2024 em Rust
                    </li>
                    <li class="relative">
                        <span class="absolute -left-5 top-1/2 -translate-y-1/2 text-gray-400">↳</span>
                        Treinando modelos de IA com RLHF @Outlier - Freelancer
                    </li>
                </ul>
            </li>
        </ul>
    </div>

    {{-- Carrossel de Logos verdadeiramente infinito --}}
    <div class="mt-6 mb-6">
        <h3 class="text-lg font-semibold text-gray-200  ">Tecnologias</h3>
        
        <div class="logos">
            <div class="logos-slide">
                <!-- Primeiro conjunto -->
                <img src="{{ asset('LaravelIcon.png') }}" alt="Laravel" title="Laravel">
                <img src="{{ asset('NodeJSIcon.png') }}" alt="NodeJS" title="NodeJS">
                <img src="{{ asset('NextjsIcon.png') }}" alt="Next.js" title="Next.js">
                <img src="{{ asset('SpringBootIcon.png') }}" alt="Spring Boot" title="Spring Boot">
                <img src="{{ asset('PythonProgrammingLanguageIcon.png') }}" alt="Python" title="Python">
                <img src="{{ asset('NestJSIcon.png') }}" alt="NestJS" title="NestJS">
                <img src="{{ asset('PostgreSQLIcon.png') }}" alt="PostgreSQL" title="PostgreSQL">
                <img src="{{ asset('MySQLIcon.png') }}" alt="MySQL" title="MySQL">
                <img src="{{ asset('MongoDBIcon.png') }}" alt="MongoDB" title="MongoDB">
                <img src="{{ asset('OracleIcon.png') }}" alt="Oracle" title="Oracle">
                <img src="{{ asset('OpenAIIcon.png') }}" alt="OpenAI" title="OpenAI" class="logo-openai">
                
                <!-- Conjunto duplicado (necessário para o efeito infinito) -->
                <img src="{{ asset('LaravelIcon.png') }}" alt="Laravel" title="Laravel">
                <img src="{{ asset('NodeJSIcon.png') }}" alt="NodeJS" title="NodeJS">
                <img src="{{ asset('NextjsIcon.png') }}" alt="Next.js" title="Next.js">
                <img src="{{ asset('SpringBootIcon.png') }}" alt="Spring Boot" title="Spring Boot">
                <img src="{{ asset('PythonProgrammingLanguageIcon.png') }}" alt="Python" title="Python">
                <img src="{{ asset('NestJSIcon.png') }}" alt="NestJS" title="NestJS">
                <img src="{{ asset('PostgreSQLIcon.png') }}" alt="PostgreSQL" title="PostgreSQL">
                <img src="{{ asset('MySQLIcon.png') }}" alt="MySQL" title="MySQL">
                <img src="{{ asset('MongoDBIcon.png') }}" alt="MongoDB" title="MongoDB">
                <img src="{{ asset('OracleIcon.png') }}" alt="Oracle" title="Oracle">
                <img src="{{ asset('OpenAIIcon.png') }}" alt="OpenAI" title="OpenAI" class="logo-openai">
            </div>
        </div>
    </div>

    {{-- Botão de currículo existente --}}
    <button
        class="group group-hover:before:duration-500 group-hover:after:duration-500 after:duration-500 hover:border-rose-300 hover:before:[box-shadow:_20px_20px_20px_30px_#a21caf] duration-500 before:duration-500 hover:duration-500 underline underline-offset-2 hover:after:-right-8 hover:before:right-12 hover:before:-bottom-8 hover:before:blur hover:underline hover:underline-offset-4  origin-left hover:decoration-2 hover:text-rose-300 relative bg-[#1b1817] h-12 w-48 text-left p-3 text-gray-50 text-sm font-bold rounded-lg  overflow-hidden  before:absolute border border-[#3a3635] before:w-12 before:h-12 before:content[''] before:right-1 before:top-1 before:z-10 before:bg-violet-500 before:rounded-full before:blur-lg  after:absolute after:z-10 after:w-20 after:h-20 after:content['']  after:bg-rose-300 after:right-8 after:top-3 after:rounded-full after:blur-lg">
        <a href="curriculo.pdf" download class="flex items-center justify-between gap-2 w-full h-full">
            Currículo
            <svg xmlns="http://www.w3.org/2000/svg" 
                 class="h-4 w-4 text-white z-50" 
                 fill="none" 
                 viewBox="0 0 24 24" 
                 stroke="currentColor"  
                 stroke-width="2">
                <path stroke-linecap="round" 
                      stroke-linejoin="round" 
                      d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
            </svg>
        </a>
    </button>
@endsection

@section('scripts')
<script>
    // Este script não é realmente necessário para o carrossel, 
    // mas poderia ser usado para interações adicionais
    document.addEventListener('DOMContentLoaded', function() {
        // O carrossel funciona puramente com CSS
    });
</script>
@endsection

@section('styles')
<style>
    /* Implementação de carrossel verdadeiramente infinito */
    .logos {
        overflow: hidden;
        padding: 30px 0;
        background: transparent;
        position: relative;
        width: 100%;
    }

    /* Gradientes de fade nas bordas */
    .logos:before,
    .logos:after {
        position: absolute;
        top: 0;
        width: 150px;
        height: 100%;
        content: "";
        z-index: 2;
    }

    .logos:before {
        left: 0;
        background: linear-gradient(to right, rgba(27, 24, 23, 1) 0%, rgba(27, 24, 23, 0) 100%);
    }

    .logos:after {
        right: 0;
        background: linear-gradient(to left, rgba(27, 24, 23, 1) 0%, rgba(27, 24, 23, 0) 100%);
    }

    .logos-slide {
        display: flex;
        width: max-content; /* Importante: permite que o conteúdo determine a largura */
        animation: slide 25s linear infinite;
    }

    .logos-slide img {
        height: 40px;
        margin: 0 20px; /* Espaçamento reduzido */
        opacity: 0.9;
        transition: all 0.3s ease;
    }

    .logos-slide img:hover {
        transform: scale(1.2);
        opacity: 1;
        filter: brightness(1.2); /* Mantém o brilho no hover individual */
    }

    /* Filtro específico para logo OpenAI */
    .logo-openai {
       filter: brightness(0) invert(1);
    }

    /* Garante que o filtro de hover da OpenAI também funcione */
    .logos-slide img.logo-openai:hover {
        transform: scale(1.2);
        opacity: 1;
        /* Combina o filtro de inversão com o de brilho no hover */
        filter: brightness(0) invert(1) brightness(1.2); 
    }

    @keyframes slide {
        from {
            transform: translateX(0);
        }
        to {
            transform: translateX(-50%);
        }
    }
</style>
@endsection
