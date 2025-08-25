@extends('app.layouts.app')

@section('titulo', 'Clientes')

@section('conteudo')
    <div class="container">
        @component('app.layouts._components.search-header', [
            'titulo' => 'Clientes',
            'placeholder' => 'Buscar cliente...',
            'rota_pesquisa' => route('cliente.index'),
            'rota_criar' => route('cliente.create'),
            'texto_btn' => 'Adicionar Cliente'
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
        @empty($clientes)
            <div class="row justify-content-center mt-4">
                <div class="col-12 col-md-10">
                    <div class="alert alert-warning" role="alert">
                        Nenhum cliente encontrado.
                    </div>
                </div>
            </div>
        @else
        <div class="row justify-content-center mt-4">
            <div class="col-12 col-md-10">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped align-middle">
                    <thead>
                        <tr class="text-center">
                        <th>Nome</th>
                        <th>CPF</th>
                        <th>E-mail</th>
                        <th>Telefone</th>
                        <th>Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($clientes as $cliente)
                        <tr>
                            <td>{{ $cliente->nome }}</td>
                            <td>{{ $cliente->cpf }}</td>
                            <td>{{ $cliente->email }}</td>
                            <td>{{ $cliente->telefone }}</td>
                            <td class="text-center">
                                <a href="{{ route('cliente.show', $cliente->id) }}" class="btn btn-info btn-sm mb-1">Ver</a>
                                <a href="{{ route('cliente.edit', $cliente->id) }}" class="btn btn-warning btn-sm mb-1">Editar</a>
                                <a href="{{ route('venda.create', ['clienteId' => $cliente->id]) }}" class="btn btn-success ms-2">Adicionar Venda</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    </table>
                </div>
                @if(request()->has('buscar'))
                    {{ $clientes->appends(['buscar' => request('buscar'), 'page' => $clientes->currentPage()])->links('pagination::bootstrap-5') }}
                @else
                    {{ $clientes->links('pagination::bootstrap-5') }}
                @endif
                               
            </div>
        </div>
        
        @endif
    </div>
@endsection