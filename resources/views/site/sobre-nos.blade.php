@extends('site.layouts.site')

@section('titulo', 'Sobre Nós')

@section('conteudo')
<div class="container">
    <div class="row align-items-center g-5">
        <div class="col-lg-7">
            <div class="mb-4">
                <span class="badge bg-success bg-gradient px-3 py-2 rounded-pill mb-3" style="font-size: 0.9rem;">
                    🚀 Quem Somos
                </span>
                <h1 class="display-4 fw-bold text-dark mb-3" style="line-height: 1.2;">
                    Sobre o <span class="text-success position-relative">
                        Sistema Super Gestão
                        <svg class="position-absolute" style="bottom: -10px; left: 0; width: 100%; height: 12px;" viewBox="0 0 300 12" fill="none">
                            <path d="M0 8C50 2 100 0 150 4C200 8 250 6 300 4" stroke="#198754" stroke-width="3" stroke-linecap="round"/>
                        </svg>
                    </span>
                </h1>
                <p class="lead text-muted mb-4" style="font-size: 1.2rem;">
                    O Super Gestão nasceu da necessidade de simplificar e otimizar a administração de empresas de todos os portes. 
                    Nossa missão é fornecer uma solução intuitiva, eficiente e completa para ajudar gestores a alcançarem melhores resultados.
                </p>
            </div>
            <div class="mb-4">
                <h3 class="h5 text-dark mb-3 fw-semibold">Nossos Valores</h3>
                <div class="row g-3">
                    @php
                        $valores = [
                            ['icon' => 'bi-lightbulb-fill', 'color' => 'success', 'texto' => 'Inovação constante'],
                            ['icon' => 'bi-people-fill', 'color' => 'primary', 'texto' => 'Compromisso com o cliente'],
                            ['icon' => 'bi-shield-check', 'color' => 'info', 'texto' => 'Transparência e ética'],
                            ['icon' => 'bi-star-fill', 'color' => 'warning', 'texto' => 'Excelência no atendimento'],
                        ];
                    @endphp
                    @foreach($valores as $v)
                    <div class="col-md-6">
                        <div class="d-flex align-items-center p-3 bg-white rounded-3 shadow-sm border-start border-{{ $v['color'] }} border-4 hover-card">
                            <div class="me-3">
                                <div class="bg-{{ $v['color'] }} bg-gradient rounded-circle d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                                    <i class="bi {{ $v['icon'] }} text-white fs-5"></i>
                                </div>
                            </div>
                            <div>
                                <span class="fw-semibold text-dark">{{ $v['texto'] }}</span>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="mt-4">
                <div class="card shadow-lg rounded-4 overflow-hidden">
                    <div class="row g-0 align-items-center">
                        <div class="col-md-5">
                            <img src="{{ asset('img/equipe.jpg') }}" alt="Nossa Equipe" class="img-fluid w-100 h-100 object-fit-cover" style="min-height: 180px;">
                        </div>
                        <div class="col-md-7">
                            <div class="card-body">
                                <h5 class="card-title fw-bold mb-2 text-success">Nossa Equipe</h5>
                                <p class="card-text text-muted mb-0" style="font-size: 1rem;">
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Non possimus veritatis officia quibusdam beatae, unde voluptatem totam explicabo eos aliquam vel repellendus atque! Quisquam officia tempora at, esse doloremque repellendus.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-5">
            <div class="position-sticky" style="top: 2rem;">
                <div class="card border-0 shadow-lg rounded-4 overflow-hidden mb-4">
                    <div class="bg-success bg-gradient text-white p-4">
                        <div class="d-flex align-items-center">
                            <div class="bg-white bg-opacity-20 rounded-circle me-3 d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                                <i class="bi bi-clock-history text-success"></i>
                            </div>
                            <div>
                                <h3 class="mb-1 fw-bold">Nossa História</h3>
                                <p class="mb-0 opacity-90">Conheça nossa trajetória</p>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-4">
                        <p class="card-text text-muted" style="font-size: 1.1rem;">
                            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Suscipit, sequi sit ratione, soluta quas dolor, error ipsa alias odit cumque molestias tempora modi voluptatem ducimus eum harum veniam? Corporis, error.
                        </p>
                        <div class="alert alert-light border-0 bg-light rounded-3 mb-0">
                            <div class="d-flex align-items-center">
                                <div class="text-success me-3">
                                    <i class="bi bi-graph-up-arrow"></i>
                                </div>
                                <div>
                                    <small class="text-muted">
                                        Crescimento contínuo, inovação e foco no cliente são nossos pilares.
                                    </small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-center mt-3">
                    <a href="{{ route('site.index') }}" class="btn btn-outline-success rounded-pill px-4">
                        <i class="bi bi-arrow-left me-2"></i>Voltar para o início
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.hover-card, .card, .btn { transition: all 0.3s ease; }
.hover-card { cursor: pointer; }
.hover-card:hover { transform: translateY(-5px); box-shadow: 0 8px 25px rgba(0,0,0,0.15) !important; }
.btn:hover { transform: translateY(-2px); box-shadow: 0 4px 12px rgba(0,0,0,0.15); }
@keyframes fadeInUp { from { opacity: 0; transform: translateY(30px);} to { opacity: 1; transform: translateY(0);} }
.display-4 { animation: fadeInUp 0.8s ease-out; }
@media (max-width: 768px) {
    .display-4 { font-size: 2rem !important; }
    .lead { font-size: 1rem !important; }
    .hover-card { margin-bottom: 1rem; }
}
</style>
@endsection