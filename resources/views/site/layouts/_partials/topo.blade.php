<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
    <div class="container">
        
        <a class="navbar-brand d-flex align-items-center" href="{{ route('site.index') }}">
            <div class="brand-logo">
                <div class="logo-icon">
                    <i class="bi bi-sun-fill"></i>
                </div>
                <div class="brand-text">
                    <span class="brand-name">R&S</span>
                    <span class="brand-subtitle">Energia Solar</span>
                </div>
            </div>
        </a>
        
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('site.index') }}">
                        <i class="bi bi-house-fill me-1"></i>Início
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('site.sobre-nos') }}">
                        <i class="bi bi-people-fill me-1"></i>Sobre Nós
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('site.contato') }}">
                        <i class="bi bi-envelope-fill me-1"></i>Contato
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="servicesDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-gear-fill me-1"></i>Serviços
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="servicesDropdown">
                        <li><a class="dropdown-item" href="#servicos"><i class="bi bi-sun me-2"></i>Placas Solares</a></li>
                        <li><a class="dropdown-item" href="#servicos"><i class="bi bi-thermometer-sun me-2"></i>Aquecedores Solares</a></li>
                        <li><a class="dropdown-item" href="#servicos"><i class="bi bi-tools me-2"></i>Instalação</a></li>
                        <li><a class="dropdown-item" href="#servicos"><i class="bi bi-gear me-2"></i>Manutenção</a></li>
                    </ul>
                </li>
            </ul>
            
            <div class="d-flex align-items-center">
                <div class="navbar-contact me-3 d-none d-lg-block">
                    <small class="text-muted">Ligue agora:</small><br>
                    <strong class="text-warning">(11) 9999-8888</strong>
                </div>
                
                @guest
                    <div class="d-flex gap-2">
                        <a class="btn btn-outline-warning btn-sm" href="{{ route('login') }}">
                            <i class="bi bi-box-arrow-in-right me-1"></i>Entrar
                        </a>
                        <a class="btn btn-warning btn-sm" href="{{ route('register') }}">
                            <i class="bi bi-person-plus me-1"></i>Registrar
                        </a>
                    </div>
                @endguest

                @auth
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle d-flex align-items-center" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <div class="user-avatar me-2">
                                    <i class="bi bi-person-circle"></i>
                                </div>
                                {{ Auth::user()->name }}
                            </a>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('home') }}">
                                    <i class="bi bi-speedometer2 me-2"></i>Painel Administrativo
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="bi bi-box-arrow-right me-2"></i>{{ __('Sair') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    </ul>
                @endauth
                
                <a href="#orcamento" class="btn btn-warning btn-sm ms-2">
                    <i class="bi bi-calculator me-1"></i>Orçamento Grátis
                </a>
            </div>
        </div>
    </div>
</nav>

<!-- Add space for fixed navbar -->
<div style="height: 80px;"></div>

<style>
.navbar {
    padding: 1rem 0;
    transition: all 0.3s ease;
    backdrop-filter: blur(10px);
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
}

.brand-logo {
    display: flex;
    align-items: center;
    gap: 0.75rem;
}

.logo-icon {
    width: 50px;
    height: 50px;
    background: linear-gradient(135deg, #ffc107, #ff8f00);
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 1.5rem;
    position: relative;
    overflow: hidden;
}

.logo-icon::before {
    content: '';
    position: absolute;
    top: -50%;
    left: -50%;
    width: 200%;
    height: 200%;
    background: linear-gradient(45deg, transparent, rgba(255, 255, 255, 0.3), transparent);
    transform: rotate(45deg);
    animation: shine 3s infinite;
}

@keyframes shine {
    0% { transform: translateX(-100%) translateY(-100%) rotate(45deg); }
    50% { transform: translateX(100%) translateY(100%) rotate(45deg); }
    100% { transform: translateX(-100%) translateY(-100%) rotate(45deg); }
}

.brand-text {
    display: flex;
    flex-direction: column;
    line-height: 1;
}

.brand-name {
    font-size: 1.5rem;
    font-weight: 800;
    color: #333;
    letter-spacing: -0.5px;
}

.brand-subtitle {
    font-size: 0.75rem;
    color: #666;
    font-weight: 500;
    margin-top: -2px;
}

.navbar-nav .nav-link {
    font-weight: 500;
    color: #333 !important;
    padding: 0.5rem 1rem;
    border-radius: 8px;
    transition: all 0.3s ease;
    position: relative;
}

.navbar-nav .nav-link:hover,
.navbar-nav .nav-link.active {
    color: #ffc107 !important;
    background: rgba(255, 193, 7, 0.1);
    transform: translateY(-1px);
}

.navbar-nav .nav-link i {
    font-size: 0.9rem;
}

.dropdown-menu {
    border: none;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
    border-radius: 12px;
    padding: 0.5rem 0;
    margin-top: 0.5rem;
}

.dropdown-item {
    padding: 0.75rem 1.5rem;
    font-weight: 500;
    color: #333;
    transition: all 0.3s ease;
}

.dropdown-item:hover {
    background: rgba(255, 193, 7, 0.1);
    color: #ffc107;
    transform: translateX(5px);
}

.dropdown-item i {
    width: 20px;
    text-align: center;
}

.navbar-contact {
    text-align: right;
    line-height: 1.2;
}

.user-avatar {
    width: 35px;
    height: 35px;
    background: linear-gradient(135deg, #ffc107, #ff8f00);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 1.2rem;
}

.btn {
    border-radius: 8px;
    font-weight: 600;
    transition: all 0.3s ease;
    border: 2px solid transparent;
}

.btn-warning {
    background: linear-gradient(135deg, #ffc107, #ff8f00);
    border-color: #ffc107;
    color: white;
}

.btn-warning:hover {
    background: linear-gradient(135deg, #ff8f00, #f57c00);
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(255, 193, 7, 0.4);
}

.btn-outline-warning {
    color: #ffc107;
    border-color: #ffc107;
}

.btn-outline-warning:hover {
    background: #ffc107;
    border-color: #ffc107;
    color: white;
    transform: translateY(-2px);
}

/* Mobile improvements */
@media (max-width: 991px) {
    .navbar-collapse {
        background: white;
        padding: 1rem;
        border-radius: 12px;
        margin-top: 1rem;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
    }
    
    .navbar-contact {
        text-align: center;
        margin: 1rem 0;
    }
    
    .d-flex.gap-2 {
        justify-content: center;
        width: 100%;
    }
    
    .btn {
        flex: 1;
        margin: 0.25rem;
    }
}

/* Scrolled state */
.navbar.scrolled {
    padding: 0.5rem 0;
    background: rgba(255, 255, 255, 0.95) !important;
}

.navbar.scrolled .logo-icon {
    width: 40px;
    height: 40px;
    font-size: 1.2rem;
}

.navbar.scrolled .brand-name {
    font-size: 1.3rem;
}

.navbar.scrolled .brand-subtitle {
    font-size: 0.7rem;
}
</style>