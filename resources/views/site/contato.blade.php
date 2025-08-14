@extends('site.layouts.site')

@section('titulo', 'Contato')

@section('conteudo')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h2 class="card-title mb-3">Entre em Contato</h2>
                    <p class="card-text">Preencha o formulário abaixo e nossa equipe retornará o mais breve possível.</p>
                    @component('site.layouts._components.form_contato', ['motivo_contatos' => $motivo_contatos])
                    @endcomponent
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
