@extends('app.layouts.app')

@section('titulo', 'Filiais')

@section('conteudo')
    <div class="container my-4">
        <div class="row mb-4">
            <div class="col text-center">
                <h2>Filiais</h2>
            </div>
        </div>
        <div class="row mb-3 justify-content-center">
            <div class="col-md-8 d-flex align-items-center justify-content-between">
                <form action="{{ route('filial.index') }}" method="GET" class="w-100 d-flex gap-2">
                    <div class="input-group">
                        <input type="text" id="buscar" name="buscar" class="form-control" placeholder="Buscar filial..." value="{{ request('buscar') }}">
                        <button type="submit" class="btn btn-primary">Pesquisar</button>
                    </div>
                </form>
                <a href="{{ route('filial.create') }}" class="btn btn-success ms-2">Adicionar Filial</a>
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
        @empty($filiais)
            <div class="row justify-content-center mt-4">
                <div class="col-12 col-md-10">
                    <div class="alert alert-warning" role="alert">
                        Nenhuma filial encontrada.
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
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($filiais as $filial)
                        <tr>
                            <td>{{ $filial->nome }}</td>
                            <td class="text-center">
                            <a href="{{ route('filial.show', $filial->id) }}" class="btn btn-info btn-sm mb-1">Ver</a>
                            <a href="{{ route('filial.edit', $filial->id) }}" class="btn btn-warning btn-sm mb-1">Editar</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    </table>
                </div>
                @if(request()->has('buscar'))
                    {{ $filiais->appends(['buscar' => request('buscar'), 'page' => $filiais->currentPage()])->links('pagination::bootstrap-5') }}
                @else
                    {{ $filiais->links('pagination::bootstrap-5') }}
                @endif
                               
            </div>
        </div>
        
        @endif
    </div>
@endsection