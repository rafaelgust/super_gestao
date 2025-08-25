@extends('app.layouts.app')

@section('titulo', 'Compras')

@section('conteudo')
    <div class="container my-4">
        @component('app.layouts._components.search-header', [
            'titulo' => 'Compras',
            'placeholder' => 'Buscar compra...',
            'rota_pesquisa' => route('compra.index'),
        ])
        @endcomponent
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
        @empty($compras)
            <div class="row justify-content-center mt-4">
                <div class="col-12 col-md-8">
                    <div class="alert alert-warning text-center" role="alert">
                        Nenhuma compra encontrada.
                    </div>
                </div>
            </div>
        @else
            <div class="row justify-content-center">
                <div class="col-12 col-md-10">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="text-center">Fornecedor</th>
                                <th class="text-center">Quantidade de Itens</th>
                                <th class="text-center">Valor do Pedido</th>
                                <th class="text-center">Data do Pedido</th>
                                <th class="text-center">Data da Entrega</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($compras as $compra)
                                <tr>
                                    <td class="text-start">{{ $compra->fornecedor->nome }}</td>
                                    <td class="text-center">{{ $compra->itens->count() }}</td>
                                    <td class="text-center">R$ {{ number_format($compra->valor_total, 2, ',', '.') }}</td>
                                    <td class="text-center">{{ date('d/m/Y', strtotime($compra->data_pedido)) }}</td>
                                    <td class="text-center">{{ date('d/m/Y', strtotime($compra->data_entrega)) }}</td>
                                    <td class="text-center">{{ $compra->status }}</td>
                                    <td>
                                        <a href="{{ route('compra.edit', $compra->id) }}" class="btn btn-warning btn-sm">Editar</a>
                                        <form action="{{ route('compra.destroy', $compra->id) }}" method="POST" class="d-inline">
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