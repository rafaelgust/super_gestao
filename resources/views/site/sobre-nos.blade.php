@extends('site.layouts.site')

@section('titulo', 'Sobre Nós')

@section('conteudo')
<div class="container my-5">
    <div class="row align-items-center">
        <div class="col-md-7">
            <div class="mb-4">
                <h1 class="display-4">Sobre o Sistema Super Gestão</h1>
                <p class="lead">
                    O Super Gestão nasceu da necessidade de simplificar e otimizar a administração de empresas de todos os portes. 
                    Nossa missão é fornecer uma solução intuitiva, eficiente e completa para ajudar gestores a alcançarem melhores resultados.
                </p>
            </div>
            <div class="mb-4">
                <h3>Nossos Valores</h3>
                <ul class="list-unstyled">
                    <li class="mb-2 d-flex align-items-center">
                        <img src="{{ asset('img/check.png') }}" alt="Check" class="me-2" style="width: 24px;">
                        <span class="text-white bg-success px-2 py-1 rounded">Inovação constante</span>
                    </li>
                    <li class="mb-2 d-flex align-items-center">
                        <img src="{{ asset('img/check.png') }}" alt="Check" class="me-2" style="width: 24px;">
                        <span class="text-white bg-success px-2 py-1 rounded">Compromisso com o cliente</span>
                    </li>
                    <li class="mb-2 d-flex align-items-center">
                        <img src="{{ asset('img/check.png') }}" alt="Check" class="me-2" style="width: 24px;">
                        <span class="text-white bg-success px-2 py-1 rounded">Transparência e ética</span>
                    </li>
                    <li class="mb-2 d-flex align-items-center">
                        <img src="{{ asset('img/check.png') }}" alt="Check" class="me-2" style="width: 24px;">
                        <span class="text-white bg-success px-2 py-1 rounded">Excelência no atendimento</span>
                    </li>
                </ul>
            </div>
            <div>
                <img src="{{ asset('img/equipe.jpg') }}" alt="Nossa Equipe" class="img-fluid rounded shadow">
            </div>
        </div>
        <div class="col-md-5">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h2 class="card-title mb-3">Nossa História</h2>
                    <p class="card-text">
                        Fundada em 2020, a Super Gestão reúne profissionais apaixonados por tecnologia e gestão empresarial. 
                        Ao longo dos anos, evoluímos nosso sistema para atender às necessidades reais do mercado, sempre ouvindo nossos clientes e aprimorando nossos serviços.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection