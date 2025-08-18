<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Super Gestão - @yield('titulo')</title>
        <meta charset="utf-8">

        <!-- Scripts -->
        @vite(['resources/sass/app.scss', 'resources/js/app.js'])
        {{-- Se quiser manter o estilo antigo, pode deixar a linha abaixo também --}}
        <!-- <link rel="stylesheet" href=" asset('css/estilo_basico.css') "> -->
        @include('sweetalert2::index')

    </head>
    <body>
        @include('layouts._partials.topo')
        <main class="py-4">
            @yield('content')
        </main>
    </body>
</html>
