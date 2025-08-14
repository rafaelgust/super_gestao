@extends('app.layouts.app')

@section('titulo', 'Fornecedor')

@section('conteudo')
    <div class="container my-4">
        <div class="row mb-4">
            <div class="col text-center">
                <h2>Fornecedor</h2>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $fornecedor->nome }}</h5>
                        <p class="card-text"><strong>CNPJ:</strong> {{ $fornecedor->cnpj }}</p>
                        <p class="card-text"><strong>E-mail:</strong> {{ $fornecedor->email }}</p>
                        <p class="card-text"><strong>Telefone:</strong> {{ $fornecedor->telefone }}</p>
                        <div class="d-flex justify-content-between mt-4">
                            <a href="{{ route('fornecedor.edit', $fornecedor->id) }}" class="btn btn-primary">Editar</a>
                            <form action="{{ route('fornecedor.destroy', $fornecedor->id) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja apagar este fornecedor?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Apagar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection