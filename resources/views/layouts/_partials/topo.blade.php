<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
    <div class="container">
    
        <a class="navbar-brand" href="{{ route('site.index') }}">
            <img src="{{ asset('img/logo.png') }}" alt="Logo Super Gestão" height="50">
        </a>
        
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarNav">
        
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                @guest
                    <li class="nav-item">
                        <a class="nav-link fw-semibold" href="{{ route('site.index') }}">Principal</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-semibold" href="{{ route('site.sobre-nos') }}">Sobre Nós</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-semibold" href="{{ route('site.contato') }}">Contato</a>
                    </li>
                @endguest

                @auth
                    <li class="nav-item">
                        <a class="nav-link fw-semibold" href="{{ route('filial.index') }}">Filiais</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-semibold" href="{{ route('produto.index') }}">Produtos</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle fw-semibold" href="#" id="vendasDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Vendas
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="vendasDropdown">
                            <li><a class="dropdown-item" href="{{ route('cliente.index') }}">Clientes</a></li>
                            <li><a class="dropdown-item" href="{{ route('venda.index') }}">Pedidos</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle fw-semibold" href="#" id="comprasDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Compras
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="comprasDropdown">
                            <li><a class="dropdown-item" href="{{ route('fornecedor.index') }}">Fornecedores</a></li>
                            <li><a class="dropdown-item" href="{{ route('compra.index') }}">Pedidos</a></li>
                        </ul>
                    </li>
                @endauth
            </ul>
            
            <div class="d-flex align-items-center ms-auto">
                @guest
                    <div class="d-flex gap-2">
                        <a class="btn btn-outline-primary" href="{{ route('login') }}">Entrar</a>
                        <a class="btn btn-primary" href="{{ route('register') }}">Registrar</a>
                    </div>
                @endguest

                @auth
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle d-flex align-items-center" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="bi bi-person-circle me-2 fs-5"></i>
                                {{ Auth::user()->name }}
                            </a>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    {{ __('Sair') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    </ul>
                @endauth
            </div>
            
        </div>
    </div>
</nav>