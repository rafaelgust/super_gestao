@extends('app.layouts.app')

@section('titulo', 'Produtos')

@section('conteudo')
    <div class="container my-4">
        <div class="row mb-4">
            <div class="col text-center">
                <h2>Produtos</h2>
            </div>
        </div>
        <div class="row mb-3 justify-content-center">
            <div class="col-md-8 d-flex align-items-center justify-content-between">
                <form action="{{ route('produto.index') }}" method="GET" class="w-100 d-flex gap-2">
                    <div class="input-group">
                        <input type="text" id="buscar" name="buscar" class="form-control" placeholder="Buscar produto..." value="{{ request('buscar') }}">
                        <button type="submit" class="btn btn-primary">Pesquisar</button>
                    </div>
                </form>
                <a href="{{ route('produto.create') }}" class="btn btn-success ms-2">Adicionar Produto</a>
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
        @empty($produtos)
            <div class="row justify-content-center mt-4">
                <div class="col-12 col-md-10">
                    <div class="alert alert-warning" role="alert">
                        Nenhuma produto encontrada.
                    </div>
                </div>
            </div>
        @else
        <div class="row justify-content-center mt-4">
            <div class="col-12 col-md-10">
                <div class="list-group">
                    @foreach ($produtos as $produto)
                        <div class="list-group-item mb-3">
                            <div class="row align-items-center">
                                <div class="col-md-2 text-center mb-2 mb-md-0">
                                    @if($produto->imagem)
                                        <img src="{{ asset('storage/' . $produto->imagem) }}" alt="{{ $produto->nome }}" class="img-fluid rounded" style="max-height: 100px;">
                                    @else
                                        <span class="text-muted">Sem imagem</span>
                                    @endif
                                </div>
                                <div class="col-md-10">
                                    <h5 class="mb-1">{{ $produto->nome }}</h5>
                                    <p class="mb-2">{{ $produto->descricao }}</p>
                                    <div class="mb-2">
                                        <span class="badge {{ $produto->status == 'ativo' ? 'bg-success' : 'bg-secondary' }}">
                                            {{ $produto->status == '1' ? 'Ativo' : 'Inativo' }}
                                        </span>
                                    </div>
                                    <a href="{{ route('produto.show', $produto->id) }}" class="btn btn-info btn-sm me-1">Ver</a>
                                    <a href="{{ route('produto.edit', $produto->id) }}" class="btn btn-warning btn-sm">Editar</a>
                                    <div class="d-inline">
                                        <a href="{{ route('compra.create', ['produtoId' => $produto->id]) }}" class="btn btn-success ms-2">Adicionar Compra</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                @if(request()->has('buscar'))
                    {{ $produtos->appends(['buscar' => request('buscar'), 'page' => $produtos->currentPage()])->links('pagination::bootstrap-5') }}
                @else
                    {{ $produtos->links('pagination::bootstrap-5') }}
                @endif
            </div>
        </div>
        
        @endif
    </div>
@endsection