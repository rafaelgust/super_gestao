<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="{{ route('site.index') }}">
            <img src="{{ asset('img/logo.png') }}" alt="Logo Super Gestão" height="40">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('site.index') }}">Principal</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('site.sobre-nos') }}">Sobre Nós</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('site.contato') }}">Contato</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">Entrar</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">Registrar</a>
                </li>
            </ul>
        </div>
    </div>
</nav>