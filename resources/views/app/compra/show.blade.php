@extends('app.layouts.app')

@section('titulo', 'Visualizar Pedido de Compra')

@section('conteudo')

<div class="container my-4">
    <div class="card shadow-lg border-0">
        <div class="card-header bg-primary text-white text-center">
            <h2 class="mb-0">Visualizar Pedido de Compra</h2>
        </div>
        <div class="card-body">
            <div class="mb-4">
                <div class="row mb-3">
                    <div class="col-md-6 mb-2">
                        <div class="p-3 bg-light rounded shadow-sm h-100">
                            <strong class="text-secondary">Fornecedor:</strong>
                            <span class="ms-2">{{ $compra->fornecedor->nome ?? '-' }}</span>
                        </div>
                    </div>
                    <div class="col-md-6 mb-2">
                        <div class="p-3 bg-light rounded shadow-sm h-100">
                            <strong class="text-secondary">Nota Fiscal:</strong>
                            <span class="ms-2">{{ $compra->nota_fiscal }}</span>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4 mb-2">
                        <div class="p-3 bg-light rounded shadow-sm h-100">
                            <strong class="text-secondary">Data do Pedido:</strong>
                            <span class="ms-2">{{ \Carbon\Carbon::parse($compra->data_pedido)->format('d/m/Y') }}</span>
                        </div>
                    </div>
                    <div class="col-md-4 mb-2">
                        <div class="p-3 bg-light rounded shadow-sm h-100">
                            <strong class="text-secondary">Data de Entrega:</strong>
                            <span class="ms-2">{{ \Carbon\Carbon::parse($compra->data_entrega)->format('d/m/Y') }}</span>
                        </div>
                    </div>
                    <div class="col-md-4 mb-2">
                        <div class="p-3 bg-light rounded shadow-sm h-100">
                            <strong class="text-secondary">Status:</strong>
                            <span class="ms-2 badge 
                                @if($compra->status == 'aprovado') bg-success 
                                @elseif($compra->status == 'pendente') bg-warning text-dark
                                @else bg-secondary @endif
                                px-3 py-2 fs-6">
                                {{ ucfirst($compra->status) }}
                            </span>
                        </div>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-md-12">
                        <div class="p-3 bg-light rounded shadow-sm d-flex align-items-center justify-content-between">
                            <strong class="text-secondary">Valor Total:</strong>
                            <span class="fw-bold text-success fs-4">R$ {{ number_format($compra->valor_total, 2, ',', '.') }}</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-12">
                    <div class="card border-0 shadow-sm">
                        <div class="card-header bg-secondary text-white text-center">
                            <h4 class="mb-0"><strong>Produtos do Pedido</strong></h4>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-bordered align-middle mb-0" id="lista-produtos-adicionados">
                                    <thead class="table-light">
                                        <tr>
                                            <th class="text-center" style="width: 110px;">Imagem</th>
                                            <th>Nome</th>
                                            <th class="text-center" style="width: 140px;">Valor Unitário</th>
                                            <th class="text-center" style="width: 120px;">Quantidade</th>
                                            <th class="text-center" style="width: 140px;">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($compra->itens as $item)
                                            <tr>
                                                <td class="text-center">
                                                    @if($item->produto->imagem)
                                                        <img src="{{ asset('storage/' . $item->produto->imagem) }}" alt="{{ $item->produto->nome }}" class="img-thumbnail border-0 shadow-sm" style="max-width: 90px; max-height: 90px;">
                                                    @else
                                                        <span class="text-muted">Sem imagem</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <span class="fw-semibold">{{ $item->produto->nome }}</span>
                                                    @if($item->produto->descricao)
                                                        <div class="text-muted small">{{ $item->produto->descricao }}</div>
                                                    @endif
                                                </td>
                                                <td class="text-center">R$ {{ number_format($item->preco_unitario, 2, ',', '.') }}</td>
                                                <td class="text-center">{{ $item->quantidade }}</td>
                                                <td class="text-center fw-bold text-success">R$ {{ number_format($item->quantidade * $item->preco_unitario, 2, ',', '.') }}</td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="5" class="text-center text-muted">Nenhum produto adicionado ao pedido.</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection