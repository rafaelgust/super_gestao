<div id="sidebar">
    <div id="completed" class="d-flex flex-column flex-shrink-0 p-3 bg-dark text-white sidebar-collapsed" style="width: 60px;">
        <div class="text-center">
            <a href="/" class="d-flex align-items-center justify-content-center text-white text-decoration-none">
                <img src="{{ asset('img/logo.png') }}" alt="Logo Super Gestão" height="40" width="40">
            </a>
        </div>
        <hr>
        @php
            $sidebarLinks = [
                [
                    'link' => route('home'),
                    'icon' => 'bi bi-person-fill',
                    'text' => 'Dashboard',
                ],
                [
                    'link' => '#',
                    'icon' => 'bi bi-envelope',
                    'text' => 'Contatos',
                ],
                'divider',
                [
                    'link' => route('filial.index'),
                    'icon' => 'bi bi-geo-alt',
                    'text' => 'Filias',
                ],
                [
                    'link' => route('produto.index'),
                    'icon' => 'bi bi-box',
                    'text' => 'Produtos',
                ],
                'divider',
                [
                    'link' => route('cliente.index'),
                    'icon' => 'bi bi-people',
                    'text' => 'Clientes',
                ],
                [
                    'link' => route('venda.index'),
                    'icon' => 'bi bi-table',
                    'text' => 'Pedidos de Vendas',
                ],
                'divider',
                [
                    'link' => route('fornecedor.index'),
                    'icon' => 'bi bi-truck',
                    'text' => 'Fornecedor',
                ],
                [
                    'link' => route('compra.index'),
                    'icon' => 'bi bi-table',
                    'text' => 'Pedidos de Compras',
                ],
            ];
        @endphp
        <ul class="nav nav-pills flex-column mb-auto">
            @foreach ($sidebarLinks as $item)
                @if ($item === 'divider')
                    <hr>
                @else
                    <li>
                        <a href="{{ $item['link'] }}" class="nav-link text-white d-flex align-items-center sidebar-item">
                            <div class="me-2">
                                <i class="{{ $item['icon'] }}"></i>
                            </div>
                            <span class="sidebar-text d-none">{{ $item['text'] }}</span>
                        </a>
                    </li>
                @endif
            @endforeach
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
        overflow-y: scroll;
        scrollbar-width: none;   /* Firefox */
        -ms-overflow-style: none;   /* IE e Edge antigo */
        width: 80px;
    }

    /* Chrome, Safari, Edge */
    #sidebar #completed::-webkit-scrollbar {
    display: none;
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