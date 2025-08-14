@extends('site.layouts.site')

@section('titulo', 'Início')

@section('conteudo')
<div class="container my-5">
    <div class="row align-items-center">
        <div class="col-md-7">
            <div class="mb-4">
                <h1 class="display-4">Sistema Super Gestão</h1>
                <p class="lead">A solução completa para gerenciar sua empresa de forma simples e eficiente.</p>
            </div>
            <ul class="list-unstyled mb-4">
                <li class="mb-2 d-flex align-items-center">
                    <img src="{{ asset('img/check.png') }}" alt="Check" class="me-2" style="width: 24px;">
                    <span class="text-white bg-success px-2 py-1 rounded">Gestão de clientes</span>
                </li>
                <li class="mb-2 d-flex align-items-center">
                    <img src="{{ asset('img/check.png') }}" alt="Check" class="me-2" style="width: 24px;">
                    <span class="text-white bg-success px-2 py-1 rounded">Gestão de fornecedores</span>
                </li>
                <li class="mb-2 d-flex align-items-center">
                    <img src="{{ asset('img/check.png') }}" alt="Check" class="me-2" style="width: 24px;">
                    <span class="text-white bg-success px-2 py-1 rounded">Gestão de produtos</span>
                </li>
                <li class="mb-2 d-flex align-items-center">
                    <img src="{{ asset('img/check.png') }}" alt="Check" class="me-2" style="width: 24px;">
                    <span class="text-white bg-success px-2 py-1 rounded">Gestão de pedidos</span>
                </li>
                <li class="mb-2 d-flex align-items-center">
                    <img src="{{ asset('img/check.png') }}" alt="Check" class="me-2" style="width: 24px;">
                    <span class="text-white bg-success px-2 py-1 rounded">Gestão de compras</span>
                </li>
            </ul>
            <div>
                <img src="{{ asset('img/player_video.jpg') }}" alt="Demonstração do Sistema" class="img-fluid rounded shadow">
            </div>
        </div>
        <div class="col-md-5">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h2 class="card-title mb-3">Contato</h2>
                    <p class="card-text">Ficou com alguma dúvida? Entre em contato com nossa equipe pelo formulário abaixo.</p>
                    @component('site.layouts._components.form_contato', ['motivo_contatos' => $motivo_contatos])
                    @endcomponent
                </div>
            </div>
        </div>
    </div>
</div>

@endsection