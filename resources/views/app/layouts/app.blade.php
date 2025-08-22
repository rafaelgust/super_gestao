<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Super Gestão - @yield('titulo')</title>
        <meta charset="utf-8">

        <!-- Scripts -->
        @vite(['resources/sass/app.scss', 'resources/js/app.js'])
        {{-- Se quiser manter o estilo antigo, pode deixar a linha abaixo também --}}
        <!-- <link rel="stylesheet" href=" asset('css/estilo_basico.css') "> -->
        <script src="{{ asset('js/jquery-3.7.1.min.js') }}"></script>
    </head>
    <body>
        @include('app.layouts._partials.sidebar')
        <main style="margin-left: 80px;" class="p-3">
            @yield('conteudo')
        </main>
    </body>
</html>