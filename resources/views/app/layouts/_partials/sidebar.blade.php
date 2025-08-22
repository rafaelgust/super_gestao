<div id="sidebar">
    <div id="completed" class="d-flex flex-column flex-shrink-0 p-3 bg-dark text-white sidebar-collapsed" style="width: 60px;">
        <div class="text-center">
            <a href="/" class="d-flex align-items-center justify-content-center text-white text-decoration-none">
                <img src="{{ asset('img/logo.png') }}" alt="Logo Super Gestão" height="40" width="40">
            </a>
        </div>
        <hr>
        <ul class="nav nav-pills flex-column mb-auto">
            <li>
                <a href="{{ route('home') }}" class="nav-link text-white d-flex align-items-center sidebar-item">
                    <div class="me-2">
                        <i class="bi bi-person-fill"></i>
                    </div>
                    <span class="sidebar-text d-none">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="#" class="nav-link text-white d-flex align-items-center sidebar-item">
                    <div class="me-2">
                        <i class="bi bi-envelope"></i>
                    </div>
                    <span class="sidebar-text d-none">Contatos</span>
                </a>
            </li>
            <hr>
            <li>
                <a href="{{ route('filial.index') }}" class="nav-link text-white d-flex align-items-center sidebar-item">
                    <div class="me-2">
                        <i class="bi bi-geo-alt"></i>
                    </div>
                    <span class="sidebar-text d-none">Filias</span>
                </a>
            </li>
            <li>
                <a href="{{ route('produto.index') }}" class="nav-link text-white d-flex align-items-center sidebar-item">
                    <div class="me-2">
                        <i class="bi bi-box"></i>
                    </div>
                    <span class="sidebar-text d-none">Produtos</span>
                </a>
            </li>
            <hr>
            <li>
                <a href="{{ route('cliente.index') }}" class="nav-link text-white d-flex align-items-center sidebar-item">
                    <div class="me-2">
                        <i class="bi bi-people"></i>
                    </div>
                    <span class="sidebar-text d-none">Clientes</span>
                </a>
            </li>
            <li>
                <a href="{{ route('venda.index') }}" class="nav-link text-white d-flex align-items-center sidebar-item">
                    <div class="me-2">
                        <i class="bi bi-table"></i>
                    </div>
                    <span class="sidebar-text d-none">Pedidos de Vendas</span>
                </a>
            </li>
            <hr>
            <li>
                <a href="{{ route('fornecedor.index') }}" class="nav-link text-white d-flex align-items-center sidebar-item">
                    <div class="me-2">
                        <i class="bi bi-truck"></i>
                    </div>
                    <span class="sidebar-text d-none">Fornecedor</span>
                </a>
            </li>
            <li>
                <a href="{{ route('compra.index') }}" class="nav-link text-white d-flex align-items-center sidebar-item">
                    <div class="me-2">
                        <i class="bi bi-table"></i>
                    </div>
                    <span class="sidebar-text d-none">Pedidos de Compras</span>
                </a>
            </li>
        </ul>
        <hr>
        <div class="dropdown">
            <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle sidebar-item" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
                <span class="sidebar-text d-none"><strong>mdo</strong></span>
            </a>
            <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                <li><a class="dropdown-item" href="#">Configurações</a></li>
                <li><a class="dropdown-item" href="#">Perfil</a></li>
                <li><hr class="dropdown-divider"></li>
                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="dropdown-item">Sair</button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
    <div id="basic"></div>
</div>

<style>
    #sidebar {
        z-index: 1;
        position: fixed;
    }

    #sidebar #completed {
        background-color: #333;
        color: white;
        position: fixed;
        top: 0;
        left: 0;
        height: 100%;
        transition: width 0.3s ease;
        overflow-x: hidden;
        width: 80px;
    }

    #sidebar #completed.sidebar-expanded {
        width: 250px !important;
    }

    #sidebar #completed.sidebar-collapsed {
        width: 80px !important;
    }

    .sidebar-text {
        transition: opacity 0.2s;
        white-space: nowrap;
    }

    .sidebar-expanded .sidebar-text {
        display: inline !important;
        opacity: 1;
        margin-left: 0;
    }

    .sidebar-collapsed .sidebar-text {
        display: none !important;
        opacity: 0;
        margin-left: 0;
    }

    #close-sidebar {
        transition: opacity 0.2s;
    }

    #close-sidebar.d-none {
        opacity: 0;
        pointer-events: none;
    }

    #close-sidebar:not(.d-none) {
        opacity: 1;
    }
</style>

<script>
    $(document).ready(function() {
        // Expande a sidebar ao clicar nela
        $('#sidebar #completed').on('mouseenter', function(e) {
            if (!$(this).hasClass('sidebar-expanded')) {
            $(this).removeClass('sidebar-collapsed').addClass('sidebar-expanded');
            $('.sidebar-text').removeClass('d-none');
            $('#close-sidebar').removeClass('d-none');
            }
            e.stopPropagation();
        });

        $('#sidebar #completed').on('mouseleave', function(e) {
            if ($(this).hasClass('sidebar-expanded')) {
            $(this).removeClass('sidebar-expanded').addClass('sidebar-collapsed');
            $('.sidebar-text').addClass('d-none');
            $('#close-sidebar').addClass('d-none');
            }
            e.stopPropagation();
        });

        // Fecha a sidebar ao clicar fora dela
        $(document).on('click', function(event) {
            if (!$(event.target).closest('#sidebar #completed').length) {
                $('#sidebar #completed').removeClass('sidebar-expanded').addClass('sidebar-collapsed');
                $('.sidebar-text').addClass('d-none');
                $('#close-sidebar').addClass('d-none');
            }
        });
    });
</script>