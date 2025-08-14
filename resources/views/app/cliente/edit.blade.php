@extends('app.layouts.app')

@section('titulo', 'Cliente')

@section('conteudo')
    <div class="container my-4">
        <div class="row mb-4">
            <div class="col text-center">
                <h2>Editar Cliente</h2>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-4">
                <form method="post" action="{{ route('Cliente.update', $Cliente->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <input type="text" name="nome" class="form-control @error('nome') is-invalid @enderror" placeholder="Nome do Cliente" value="{{ old('nome', $Cliente->nome) }}">
                        @if ($errors->has('nome'))
                            <div class="error-form-contato">
                                {{ $errors->first('nome') }}
                            </div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <input type="text" name="cpf" class="form-control @error('cpf') is-invalid @enderror" placeholder="cpf" value="{{ old('cpf', $Cliente->cpf) }}">
                        @if ($errors->has('cpf'))
                        <div class="error-form-contato">
                            {{ $errors->first('cpf') }}
                        </div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="E-mail" value="{{ old('email', $Cliente->email) }}">
                        @if ($errors->has('email'))
                        <div class="error-form-contato">
                            {{ $errors->first('email') }}
                        </div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <input type="text" name="telefone" class="form-control @error('telefone') is-invalid @enderror" placeholder="Telefone" value="{{ old('telefone', $Cliente->telefone) }}">
                        @if ($errors->has('telefone'))
                            <div class="error-form-contato">
                                {{ $errors->first('telefone') }}
                            </div>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Atualizar</button>
                </form>
            </div>
        </div>
    </div>
@endsection