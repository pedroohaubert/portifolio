<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>{{ config('app.name', 'Portfólio') }}</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- Livewire Styles -->
    @livewireStyles
    
    <!-- Componentes de estilo -->
    <style>
        :root {
            --background: 0 0% 100%;
            --foreground: 222.2 84% 4.9%;
            --card: 0 0% 100%;
            --card-foreground: 222.2 84% 4.9%;
            --popover: 0 0% 100%;
            --popover-foreground: 222.2 84% 4.9%;
            --primary: 221.2 83.2% 53.3%;
            --primary-foreground: 210 40% 98%;
            --secondary: 210 40% 96.1%;
            --secondary-foreground: 222.2 47.4% 11.2%;
            --muted: 210 40% 96.1%;
            --muted-foreground: 215.4 16.3% 46.9%;
            --accent: 210 40% 96.1%;
            --accent-foreground: 222.2 47.4% 11.2%;
            --destructive: 0 84.2% 60.2%;
            --destructive-foreground: 210 40% 98%;
            --border: 214.3 31.8% 91.4%;
            --input: 214.3 31.8% 91.4%;
            --ring: 221.2 83.2% 53.3%;
        }
        
        body {
            font-family: 'Inter', sans-serif;
            background-color: hsl(var(--background));
            color: hsl(var(--foreground));
        }
    </style>
    
    @stack('styles')
</head>
<body>
    <div class="min-h-screen mx-auto bg-background">
        <header class="bg-card border-b border-border">
            <div class="container mx-auto px-4 py-4 flex items-center justify-between">
                <a href="/" class="text-xl font-bold text-foreground">Portfólio</a>
                <nav class="flex items-center space-x-6">
                    <a href="/" class="text-blue-600 hover:text-foreground">Home</a>
                    <a href="/projects" class="text-muted-foreground hover:text-foreground">Projetos</a>
                    <a href="/posts" class="text-muted-foreground hover:text-foreground">Blog</a>
                    <a href="/about" class="text-muted-foreground hover:text-foreground">Sobre</a>
                    <a href="/dashboard" class="text-muted-foreground hover:text-foreground">Dashboard</a>
                </nav>
            </div>
        </header>
        
        <main>
            @yield('content')
        </main>
        
        <footer class="bg-card border-t border-border py-6 mt-12">
            <div class="container mx-auto px-4">
                <div class="text-center text-muted-foreground">
                    <p>&copy; {{ date('Y') }} - Pedro Haubert. Todos os direitos reservados.</p>
                </div>
            </div>
        </footer>
    </div>
    
    <!-- Livewire Scripts -->
    @livewireScripts
    
    @stack('scripts')
</body>
</html>