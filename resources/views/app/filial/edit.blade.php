@extends('app.layouts.app')

@section('titulo', 'Filial')

@section('conteudo')
    <div class="container my-4">
        <div class="row mb-4">
            <div class="col text-center">
                <h2>Editar Filial</h2>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-4">
                <form method="post" action="{{ route('filial.update', $filial->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <input type="text" name="nome" class="form-control @error('nome') is-invalid @enderror" placeholder="Nome do Filial" value="{{ old('nome', $filial->nome) }}">
                        @if ($errors->has('nome'))
                            <div class="error-form-contato">
                                {{ $errors->first('nome') }}
                            </div>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Atualizar</button>
                </form>
            </div>
        </div>
    </div>
@endsection