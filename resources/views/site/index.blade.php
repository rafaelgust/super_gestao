@extends('site.layouts.site')

@section('titulo', 'Início')

@section('conteudo')
<div class="container">
    <div class="row align-items-center g-5">
        <div class="col-lg-7">
            <div class="mb-5">
                <span class="badge bg-primary bg-gradient px-3 py-2 rounded-pill mb-3" style="font-size: 0.9rem;">
                    ✨ Sistema de Gestão Empresarial
                </span>
                <h1 class="display-3 fw-bold text-dark mb-4" style="line-height: 1.2;">
                    Sistema 
                    <span class="text-primary position-relative">
                        Super Gestão
                        <svg class="position-absolute" style="bottom: -10px; left: 0; width: 100%; height: 12px;" viewBox="0 0 300 12" fill="none">
                            <path d="M0 8C50 2 100 0 150 4C200 8 250 6 300 4" stroke="#0d6efd" stroke-width="3" stroke-linecap="round"/>
                        </svg>
                    </span>
                </h1>
                <p class="lead text-muted mb-4" style="font-size: 1.3rem; line-height: 1.6;">
                    A solução completa para transformar a gestão da sua empresa com 
                    <strong class="text-primary">simplicidade</strong> e 
                    <strong class="text-success">eficiência</strong>.
                </p>
            </div>

            <div class="mb-5">
                <h3 class="h5 text-dark mb-4 fw-semibold">Principais Funcionalidades</h3>
                <div class="row g-3">
                    @php
                        $funcionalidades = [
                            ['icon' => 'bi bi-person-fill', 'color' => 'primary', 'titulo' => 'Gestão de Clientes', 'desc' => 'Controle completo da base de clientes'],
                            ['icon' => 'bi bi-truck', 'color' => 'success', 'titulo' => 'Gestão de Fornecedores', 'desc' => 'Organize seus parceiros comerciais'],
                            ['icon' => 'bi bi-box', 'color' => 'info', 'titulo' => 'Gestão de Produtos', 'desc' => 'Controle de estoque inteligente'],
                            ['icon' => 'bi bi-cart', 'color' => 'warning', 'titulo' => 'Gestão de Pedidos', 'desc' => 'Processos de venda otimizados'],
                            ['icon' => 'bi bi-credit-card', 'color' => 'danger', 'titulo' => 'Gestão de Compras', 'desc' => 'Controle financeiro inteligente'],
                        ];
                    @endphp
                    @foreach($funcionalidades as $f)
                    <div class="col-md-6">
                        <div class="d-flex align-items-center p-3 bg-white rounded-3 shadow-sm border-start border-{{ $f['color'] }} border-4 hover-card">
                            <div class="me-3">
                                <div class="bg-{{ $f['color'] }} bg-gradient rounded-circle d-flex align-items-center justify-content-center" style="width: 45px; height: 45px;">
                                    <i class="fas fa-{{ $f['icon'] }} text-white"></i>
                                </div>
                            </div>
                            <div>
                                <h6 class="mb-1 fw-semibold text-dark">{{ $f['titulo'] }}</h6>
                                <small class="text-muted">{{ $f['desc'] }}</small>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <div class="position-relative">
                <div class="bg-white p-4 rounded-4 shadow-lg">
                    <div class="d-flex align-items-center mb-3">
                        <div class="bg-primary bg-gradient rounded-circle me-3 d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                            <i class="bi bi-play text-white"></i>
                        </div>
                        <div>
                            <h5 class="mb-0 fw-semibold text-dark">Demonstração do Sistema</h5>
                            <small class="text-muted">Veja como funciona na prática</small>
                        </div>
                    </div>
                    <div class="position-relative overflow-hidden rounded-3">
                        <img src="{{ asset('img/player_video.jpg') }}" alt="Demonstração do Sistema" class="img-fluid w-100" style="border-radius: 12px;">
                        <div class="position-absolute top-50 start-50 translate-middle">
                            <button class="btn btn-light btn-lg rounded-circle shadow-lg" style="width: 70px; height: 70px;">
                                <i class="bi bi-play text-primary fs-4"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-5">
            <div class="position-sticky" style="top: 2rem;">
                <div class="card border-0 shadow-lg rounded-4 overflow-hidden">
                    <div class="bg-primary bg-gradient text-white p-4">
                        <div class="d-flex align-items-center">
                            <div class="bg-white bg-opacity-20 rounded-circle me-3 d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                                <i class="bi bi-envelope-fill text-primary"></i>
                            </div>
                            <div>
                                <h3 class="mb-1 fw-bold">Entre em Contato</h3>
                                <p class="mb-0 opacity-90">Estamos aqui para ajudar você!</p>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-4">
                        <div class="row g-3 mb-4">
                            <div class="col-6">
                                <div class="text-center p-3 bg-light rounded-3">
                                    <div class="h4 text-primary mb-1 fw-bold">24h</div>
                                    <small class="text-muted">Resposta Rápida</small>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="text-center p-3 bg-light rounded-3">
                                    <div class="h4 text-success mb-1 fw-bold">100%</div>
                                    <small class="text-muted">Suporte Gratuito</small>
                                </div>
                            </div>
                        </div>
                        <div class="alert alert-light border-0 bg-light rounded-3 mb-4">
                            <div class="d-flex">
                                <div class="text-primary me-3">
                                    <i class="fas fa-info-circle"></i>
                                </div>
                                <div>
                                    <small class="text-muted">
                                        Tem dúvidas sobre o sistema? Nossa equipe especializada está pronta para esclarecer todas as suas questões e ajudar na implementação.
                                    </small>
                                </div>
                            </div>
                        </div>
                        @component('site.layouts._components.form_contato', ['motivo_contatos' => $motivo_contatos])
                        @endcomponent
                    </div>
                    <div class="card-footer bg-light border-0 p-4">
                        <div class="d-flex align-items-center justify-content-center text-muted">
                            <i class="fas fa-shield-alt me-2"></i>
                            <small>Seus dados estão seguros conosco</small>
                        </div>
                    </div>
                </div>
                <div class="mt-4 text-center">
                    <p class="text-muted mb-3">Ou entre em contato diretamente:</p>
                    <div class="d-flex justify-content-center gap-3">
                        <a href="#" class="btn btn-outline-primary rounded-pill px-4">
                            <i class="fab fa-whatsapp me-2"></i>WhatsApp
                        </a>
                        <a href="#" class="btn btn-outline-success rounded-pill px-4">
                            <i class="fas fa-phone me-2"></i>Telefone
                        </a>
                    </div>
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
.display-3 { animation: fadeInUp 0.8s ease-out; }
@media (max-width: 768px) {
    .display-3 { font-size: 2.5rem !important; }
    .lead { font-size: 1.1rem !important; }
    .hover-card { margin-bottom: 1rem; }
}
.form-control:focus, .form-select:focus {
    border-color: #0d6efd;
    box-shadow: 0 0 0 0.2rem rgba(13,110,253,0.25);
}
</style>
@endsection
