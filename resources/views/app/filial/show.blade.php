@extends('app.layouts.app')

@section('titulo', 'Filial')

@section('conteudo')
    <div class="container my-4">
        <div class="row mb-4">
            <div class="col text-center">
                <h2>Filial</h2>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $filial->nome }}</h5>
                        <div class="d-flex justify-content-between mt-4">
                            <a href="{{ route('filial.edit', $filial->id) }}" class="btn btn-primary">Editar</a>
                            <form action="{{ route('filial.destroy', $filial->id) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja apagar este filial?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Apagar</button>
                            </form>
                        </div>
                        <div class="mt-4">
                            <h6>Detalhes:</h6>
                            <p><strong>ID:</strong> {{ $filial->id }}</p>
                            <p><strong>Endereço:</strong> {{ $filial->endereco }}</p>
                            <p><strong>Telefone:</strong> {{ $filial->telefone }}</p>
                        </div>
                        <h6>Lista de Produtos:</h6>
                        <ul>
                            @foreach ($filial->produtos as $produto)
                                <li>{{ $produto->nome }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection