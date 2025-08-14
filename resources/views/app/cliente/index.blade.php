@extends('app.layouts.app')

@section('titulo', 'Clientes')

@section('conteudo')
    <div class="container my-4">
        <div class="row mb-4">
            <div class="col text-center">
                <h2>Clientes</h2>
            </div>
        </div>
        <div class="row mb-3 justify-content-center">
            <div class="col-md-8 d-flex align-items-center justify-content-between">
                <form action="{{ route('cliente.index') }}" method="GET" class="w-100 d-flex gap-2">
                    <div class="input-group">
                        <input type="text" id="buscar" name="buscar" class="form-control" placeholder="Buscar cliente..." value="{{ request('buscar') }}">
                        <button type="submit" class="btn btn-primary">Pesquisar</button>
                    </div>
                </form>
                <a href="{{ route('cliente.create') }}" class="btn btn-success ms-2">Adicionar Cliente</a>
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