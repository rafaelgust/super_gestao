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
            <div class="col-md-4">
                <form method="post" action="{{ route('fornecedor.store') }}">
                    @csrf
                    <div class="mb-3">
                        <input type="text" name="nome" class="form-control @error('nome') is-invalid @enderror" placeholder="Nome do fornecedor" value="{{ old('nome') }}">
                        @if ($errors->has('nome'))
                            <div class="error-form-contato">
                                {{ $errors->first('nome') }}
                            </div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <input type="text" name="cnpj" class="form-control @error('cnpj') is-invalid @enderror" placeholder="CNPJ" value="{{ old('cnpj') }}">
                        @if ($errors->has('cnpj'))
                        <div class="error-form-contato">
                            {{ $errors->first('cnpj') }}
                        </div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="E-mail" value="{{ old('email') }}">
                        @if ($errors->has('email'))
                        <div class="error-form-contato">
                            {{ $errors->first('email') }}
                        </div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <input type="text" name="telefone" class="form-control @error('telefone') is-invalid @enderror" placeholder="Telefone" value="{{ old('telefone') }}">
                        @if ($errors->has('telefone'))
                            <div class="error-form-contato">
                                {{ $errors->first('telefone') }}
                            </div>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-success w-100">Cadastrar</button>
                </form>
            </div>
        </div>
    </div>
@endsection