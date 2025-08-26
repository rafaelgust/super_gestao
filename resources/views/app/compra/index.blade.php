@extends('app.layouts.app')

@section('titulo', 'Compras')

@section('conteudo')
    <div class="container">
        @component('app.layouts._components.search-header', [
            'titulo' => 'Compras',
            'placeholder' => 'Buscar compra...',
            'rota_pesquisa' => route('compra.index'),
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
        @empty($compras)
            <div class="row justify-content-center mt-4">
                <div class="col-12">
                    <div class="card border-0 shadow-sm" style="background: linear-gradient(135deg, #fef3c7, #fde68a); border-radius: 16px;">
                        <div class="card-body text-center py-5">
                            <i class="bi bi-cart-dash display-1 text-warning mb-3"></i>
                            <h5 class="text-dark mb-2">Nenhuma compra encontrada</h5>
                            <p class="text-muted mb-0">Registre suas compras com fornecedores</p>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="card border-0 shadow-sm" style="border-radius: 16px; overflow: hidden;">
                        <div class="table-responsive">
                            <table id="compra-tabela" class="table table-hover align-middle mb-0">
                                <thead>
                                    <tr>
                                        <th class="py-3 px-4 border-0">
                                            <i class="bi bi-building me-2"></i>Fornecedor
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
                                    @foreach($compras as $compra)
                                        <tr class="border-bottom" style="border-color: #f1f5f9 !important;">
                                            <td class="py-3 px-4">
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar-placeholder me-3" style="width: 40px; height: 40px; background: linear-gradient(45deg, #f97316, #ea580c); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; font-weight: bold;">
                                                        {{ strtoupper(substr($compra->fornecedor->nome, 0, 1)) }}
                                                    </div>
                                                    <span class="fw-semibold text-dark">{{ $compra->fornecedor->nome }}</span>
                                                </div>
                                            </td>
                                            <td class="py-3 px-4 text-center">
                                                <span class="badge bg-info px-3 py-2" style="border-radius: 12px;">{{ $compra->itens->count() }}</span>
                                            </td>
                                            <td class="py-3 px-4 text-center">
                                                <span class="fw-bold text-success">R$ {{ number_format($compra->valor_total, 2, ',', '.') }}</span>
                                            </td>
                                            <td class="py-3 px-4 text-center">
                                                <span class="text-muted">{{ date('d/m/Y', strtotime($compra->data_pedido)) }}</span>
                                            </td>
                                            <td class="py-3 px-4 text-center">
                                                <span class="text-muted">{{ date('d/m/Y', strtotime($compra->data_entrega)) }}</span>
                                            </td>
                                            <td class="py-3 px-4 text-center">
                                                <span class="badge bg-primary px-3 py-2" style="border-radius: 12px;">{{ $compra->status }}</span>
                                            </td>
                                            <td class="py-3 px-4">
                                                <div class="d-flex justify-content-center gap-2">
                                                    @if(strtolower($compra->status) === 'concluido')
                                                        <a href="{{ route('compra.show', $compra->id) }}" 
                                                           class="btn btn-outline-success btn-sm" 
                                                           style="border-radius: 8px;"
                                                           data-bs-toggle="tooltip" 
                                                           title="Mostrar compra">
                                                            <i class="bi bi-eye"></i>
                                                        </a>
                                                    @else
                                                        <a href="{{ route('compra.edit', $compra->id) }}" 
                                                           class="btn btn-outline-warning btn-sm" 
                                                           style="border-radius: 8px;"
                                                           data-bs-toggle="tooltip" 
                                                           title="Editar compra">
                                                            <i class="bi bi-pencil"></i>
                                                        </a>
                                                    @endif
                                                    <form action="{{ route('compra.destroy', $compra->id) }}" method="POST" class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" 
                                                                class="btn btn-outline-danger btn-sm" 
                                                                style="border-radius: 8px;"
                                                                data-bs-toggle="tooltip" 
                                                                title="Excluir compra"
                                                                onclick="return confirm('Tem certeza que deseja excluir esta compra?')">
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
<script>
    $(document).ready(function(){
        $('#compra-tabela').DataTable();
    });
</script>
@endsection