@extends('app.layouts.app')

@section('titulo', 'Vendas')

@section('conteudo')
    <div class="container my-4">
        <div class="row mb-4">
            <div class="col text-center">
                <h2>Vendas</h2>
            </div>
        </div>
        <div class="row mb-3 justify-content-center">
            <div class="col-md-8 d-flex align-items-center justify-content-between">
                <form action="{{ route('venda.index') }}" method="GET" class="w-100 d-flex gap-2">
                    <div class="input-group">
                        <input type="text" id="buscar" name="buscar" class="form-control" placeholder="Buscar venda..." value="{{ request('buscar') }}">
                        <button type="submit" class="btn btn-primary">Pesquisar</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            </div>
        </div>
        @empty($vendas)
            <div class="row justify-content-center mt-4">
                <div class="col-12 col-md-8">
                    <div class="alert alert-warning text-center" role="alert">
                        Nenhuma venda encontrada.
                    </div>
                </div>
            </div>
        @else
            <div class="row justify-content-center">
                <div class="col-12 col-md-10">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="text-center">Cliente</th>
                                <th class="text-center">Quantidade de Itens</th>
                                <th class="text-center">Valor do Pedido</th>
                                <th class="text-center">Data do Pedido</th>
                                <th class="text-center">Data da Entrega</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($vendas as $venda)
                                <tr>
                                    <td class="text-start">{{ $venda->cliente->nome }}</td>
                                    <td class="text-center">{{ $venda->itens->count() }}</td>
                                    <td class="text-center">R$ {{ number_format($venda->valor_total, 2, ',', '.') }}</td>
                                    <td class="text-center">{{ date('d/m/Y', strtotime($venda->data_pedido)) }}</td>
                                    <td class="text-center">{{ date('d/m/Y', strtotime($venda->data_entrega)) }}</td>
                                    <td class="text-center">{{ $venda->status }}</td>
                                    <td>
                                        <a href="{{ route('venda.edit', $venda->id) }}" class="btn btn-warning btn-sm">Editar</a>
                                        <form action="{{ route('venda.destroy', $venda->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Excluir</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endempty
@endsection