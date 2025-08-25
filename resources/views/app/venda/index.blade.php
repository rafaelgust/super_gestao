@extends('app.layouts.app')

@section('titulo', 'Vendas')

@section('conteudo')
    <div class="container">
        @component('app.layouts._components.search-header', [
            'titulo' => 'Vendas',
            'placeholder' => 'Buscar venda...',
            'rota_pesquisa' => route('venda.index'),
        ])
        @endcomponent
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show shadow-sm border-0" role="alert" style="background: linear-gradient(45deg, #d1fae5, #a7f3d0); color: #065f46; border-radius: 12px;">
                        <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
            </div>
        </div>
        @empty($vendas)
            <div class="row justify-content-center mt-4">
                <div class="col-12">
                    <div class="card border-0 shadow-sm" style="background: linear-gradient(135deg, #fef3c7, #fde68a); border-radius: 16px;">
                        <div class="card-body text-center py-5">
                            <i class="bi bi-cart-x display-1 text-warning mb-3"></i>
                            <h5 class="text-dark mb-2">Nenhuma venda encontrada</h5>
                            <p class="text-muted mb-0">Registre suas primeiras vendas aqui</p>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="card border-0 shadow-sm" style="border-radius: 16px; overflow: hidden;">
                        <div class="table-responsive">
                            <table class="table table-hover align-middle mb-0">
                                <thead>
                                    <tr>
                                        <th class="py-3 px-4 border-0">
                                            <i class="bi bi-person-fill me-2"></i>Cliente
                                        </th>
                                        <th class="py-3 px-4 border-0 text-center">
                                            <i class="bi bi-box me-2"></i>Itens
                                        </th>
                                        <th class="py-3 px-4 border-0 text-center">
                                            <i class="bi bi-currency-dollar me-2"></i>Valor Total
                                        </th>
                                        <th class="py-3 px-4 border-0 text-center">
                                            <i class="bi bi-calendar-event me-2"></i>Data Pedido
                                        </th>
                                        <th class="py-3 px-4 border-0 text-center">
                                            <i class="bi bi-truck me-2"></i>Data Entrega
                                        </th>
                                        <th class="py-3 px-4 border-0 text-center">
                                            <i class="bi bi-flag me-2"></i>Status
                                        </th>
                                        <th class="py-3 px-4 border-0 text-center">
                                            <i class="bi bi-gear-fill me-2"></i>Ações
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($vendas as $venda)
                                        <tr class="border-bottom" style="border-color: #f1f5f9 !important;">
                                            <td class="py-3 px-4">
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar-placeholder me-3" style="width: 40px; height: 40px; background: linear-gradient(45deg, #10b981, #059669); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; font-weight: bold;">
                                                        {{ strtoupper(substr($venda->cliente->nome, 0, 1)) }}
                                                    </div>
                                                    <span class="fw-semibold text-dark">{{ $venda->cliente->nome }}</span>
                                                </div>
                                            </td>
                                            <td class="py-3 px-4 text-center">
                                                <span class="badge bg-info px-3 py-2" style="border-radius: 12px;">{{ $venda->itens->count() }}</span>
                                            </td>
                                            <td class="py-3 px-4 text-center">
                                                <span class="fw-bold text-success">R$ {{ number_format($venda->valor_total, 2, ',', '.') }}</span>
                                            </td>
                                            <td class="py-3 px-4 text-center">
                                                <span class="text-muted">{{ date('d/m/Y', strtotime($venda->data_pedido)) }}</span>
                                            </td>
                                            <td class="py-3 px-4 text-center">
                                                <span class="text-muted">{{ date('d/m/Y', strtotime($venda->data_entrega)) }}</span>
                                            </td>
                                            <td class="py-3 px-4 text-center">
                                                <span class="badge bg-primary px-3 py-2" style="border-radius: 12px;">{{ $venda->status }}</span>
                                            </td>
                                            <td class="py-3 px-4">
                                                <div class="d-flex justify-content-center gap-2">
                                                    <a href="{{ route('venda.edit', $venda->id) }}" 
                                                       class="btn btn-outline-warning btn-sm" 
                                                       style="border-radius: 8px;"
                                                       data-bs-toggle="tooltip" 
                                                       title="Editar venda">
                                                        <i class="bi bi-pencil"></i>
                                                    </a>
                                                    <form action="{{ route('venda.destroy', $venda->id) }}" method="POST" class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" 
                                                                class="btn btn-outline-danger btn-sm" 
                                                                style="border-radius: 8px;"
                                                                data-bs-toggle="tooltip" 
                                                                title="Excluir venda"
                                                                onclick="return confirm('Tem certeza que deseja excluir esta venda?')">
                                                            <i class="bi bi-trash"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        @endempty
@endsection