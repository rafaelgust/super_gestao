<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Super Gestão - @yield('titulo')</title>
        <meta charset="utf-8">

        <!-- Scripts -->
        @vite(['resources/sass/app.scss', 'resources/js/app.js'])
        {{-- Se quiser manter o estilo antigo, pode deixar a linha abaixo também --}}
        <!-- <link rel="stylesheet" href=" asset('css/estilo_basico.css') "> -->
    </head>
    
    <body>
        @include('site.layouts._partials.topo')
        <main class="pt-5" style="margin-top: 40px;background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%); min-height: 100vh; padding: 60px 0;">
            @yield('conteudo')
        </main>
        @include('site.layouts._partials.rodape')
    </body>
</html>