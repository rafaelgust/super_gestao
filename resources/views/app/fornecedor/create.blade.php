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
                        <input type="text" name="cnpj_sem_formatacao" class="form-control @error('cnpj') is-invalid @enderror" placeholder="CNPJ" value="{{ old('cnpj') }}">
                        <input type="hidden" name="cnpj" value="{{ old('cnpj') }}">
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
<script>
    
    document.addEventListener('DOMContentLoaded', function() {
        //script para auto corrigir o campo de cnpj, em que apaga os caracteres especiais durante a digitação, mantendo apenas os números
        var cnpjSemFormatacaoInput = document.querySelector('input[name="cnpj_sem_formatacao"]');
        var cnpjHiddenInput = document.querySelector('input[name="cnpj"]');
        cnpjSemFormatacaoInput.addEventListener('input', function() {
            var onlyNumbers = this.value.replace(/[^\d]/g, '');
            cnpjHiddenInput.value = onlyNumbers;
        });

        //formatar o campo do telefone para que quando for digitado um numero ele fique (xx) xxxx-xxxx ou (xx) xxxxx-xxxx
        var telefoneInput = document.querySelector('input[name="telefone"]');
        telefoneInput.addEventListener('input', function() {
            var onlyNumbers = this.value.replace(/[^\d]/g, '');
            var formatted = onlyNumbers.replace(/(\d{2})(\d{4,5})(\d{4})/, '($1) $2-$3');
            this.value = formatted;
        });
    });
</script>