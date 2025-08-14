@extends('site.layouts.site')

@section('titulo', 'Contato')

@section('conteudo')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card border-0 shadow-lg rounded-4 overflow-hidden">
                <div class="bg-primary bg-gradient text-white p-4">
                    <div class="d-flex align-items-center">
                        <div class="bg-white bg-opacity-20 rounded-circle me-3 d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                            <i class="bi bi-envelope-fill text-primary"></i>
                        </div>
                        <div>
                            <h2 class="mb-1 fw-bold">Entre em Contato</h2>
                            <p class="mb-0 opacity-90">Estamos prontos para ajudar você!</p>
                        </div>
                    </div>
                </div>
                <div class="card-body p-4">
                    <div class="row g-3 mb-4">
                        <div class="col-6 col-md-4">
                            <div class="text-center p-3 bg-light rounded-3">
                                <div class="h4 text-primary mb-1 fw-bold">24h</div>
                                <small class="text-muted">Resposta Rápida</small>
                            </div>
                        </div>
                        <div class="col-6 col-md-4">
                            <div class="text-center p-3 bg-light rounded-3">
                                <div class="h4 text-success mb-1 fw-bold">100%</div>
                                <small class="text-muted">Suporte Gratuito</small>
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="text-center p-3 bg-light rounded-3">
                                <div class="h4 text-info mb-1 fw-bold"><i class="bi bi-shield-check"></i></div>
                                <small class="text-muted">Dados Seguros</small>
                            </div>
                        </div>
                    </div>
                    <div class="alert alert-light border-0 bg-light rounded-3 mb-4">
                        <div class="d-flex">
                            <div class="text-primary me-3">
                                <i class="bi bi-info-circle-fill"></i>
                            </div>
                            <div>
                                <small class="text-muted">
                                    Tem dúvidas sobre o sistema? Nossa equipe está pronta para esclarecer todas as suas questões e ajudar na implementação.
                                </small>
                            </div>
                        </div>
                    </div>
                    @component('site.layouts._components.form_contato', ['motivo_contatos' => $motivo_contatos])
                    @endcomponent
                </div>
                <div class="card-footer bg-light border-0 p-4">
                    <div class="d-flex align-items-center justify-content-center text-muted">
                        <i class="bi bi-shield-lock-fill me-2"></i>
                        <small>Seus dados estão seguros conosco</small>
                    </div>
                </div>
            </div>
            <div class="mt-4 text-center">
                <p class="text-muted mb-3">Ou entre em contato diretamente:</p>
                <div class="d-flex justify-content-center gap-3 flex-wrap">
                    <a href="#" class="btn btn-outline-primary rounded-pill px-4 mb-2">
                        <i class="bi bi-whatsapp me-2"></i>WhatsApp
                    </a>
                    <a href="#" class="btn btn-outline-success rounded-pill px-4 mb-2">
                        <i class="bi bi-telephone-fill me-2"></i>Telefone
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
.card, .btn { transition: all 0.3s ease; }
.btn:hover { transform: translateY(-2px); box-shadow: 0 4px 12px rgba(0,0,0,0.15); }
@media (max-width: 768px) {
    .card-title { font-size: 1.3rem !important; }
    .btn { font-size: 1rem !important; }
}
.form-control:focus, .form-select:focus {
    border-color: #0d6efd;
    box-shadow: 0 0 0 0.2rem rgba(13,110,253,0.25);
}
</style>
@endsection
