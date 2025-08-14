@extends('app.layouts.app')

@section('titulo', 'Cliente')

@section('conteudo')
    <div class="container my-4">
        <div class="row mb-4">
            <div class="col text-center">
                <h2>Cliente</h2>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $cliente->nome }}</h5>
                        <p class="card-text"><strong>CPF:</strong> {{ $cliente->cpf }}</p>
                        <p class="card-text"><strong>E-mail:</strong> {{ $cliente->email }}</p>
                        <p class="card-text"><strong>Telefone:</strong> {{ $cliente->telefone }}</p>
                        <div class="d-flex justify-content-between mt-4">
                            <a href="{{ route('cliente.edit', $cliente->id) }}" class="btn btn-primary">Editar</a>
                            <form action="{{ route('cliente.destroy', $cliente->id) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja apagar este cliente?');">
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