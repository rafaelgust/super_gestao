@extends('site.layouts.site')

@section('titulo', ' - Contato')

@section('conteudo')

<!-- Hero Section -->
<section class="contact-hero py-5 bg-gradient text-dark">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <span class="hero-badge mb-4 text-dark">
                    <i class="bi bi-envelope-fill me-2 "></i>Entre em Contato
                </span>
                <h1 class="hero-title mb-4">Solicite seu Orçamento Gratuito</h1>
                <p class="hero-description text-dark">
                    Nossa equipe está pronta para ajudar você a economizar com energia solar. 
                    Faça uma simulação personalizada e descubra o potencial de economia da sua casa ou empresa.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Contact Form Section -->
<section class="contact-form-section py-5">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-8">
                <div class="contact-form-container">
                    <div class="form-header mb-4">
                        <h2 class="form-title">Preencha o formulário</h2>
                        <p class="form-subtitle">Nossa equipe entrará em contato em até 24 horas</p>
                    </div>
                    
                    <!-- Statistics Cards -->
                    <div class="row g-3 mb-5">
                        <div class="col-md-4">
                            <div class="stat-card">
                                <div class="stat-icon bg-warning">
                                    <i class="bi bi-clock-fill"></i>
                                </div>
                                <div class="stat-content">
                                    <div class="stat-number">24h</div>
                                    <div class="stat-label">Resposta Rápida</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="stat-card">
                                <div class="stat-icon bg-success">
                                    <i class="bi bi-geo-alt-fill"></i>
                                </div>
                                <div class="stat-content">
                                    <div class="stat-number">Grátis</div>
                                    <div class="stat-label">Visita Técnica</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="stat-card">
                                <div class="stat-icon bg-primary">
                                    <i class="bi bi-shield-check-fill"></i>
                                </div>
                                <div class="stat-content">
                                    <div class="stat-number">25 anos</div>
                                    <div class="stat-label">Garantia</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Form -->
                    <div class="form-container">
                        @component('site.layouts._components.form_contato', ['motivo_contatos' => $motivo_contatos])
                        @endcomponent
                    </div>

                    <!-- Benefits Alert -->
                    <div class="benefits-alert mt-4">
                        <div class="alert-icon">
                            <i class="bi bi-lightbulb-fill"></i>
                        </div>
                        <div class="alert-content">
                            <h5>Por que escolher energia solar?</h5>
                            <ul class="benefits-list">
                                <li>Economize até 95% na conta de energia</li>
                                <li>Valorize seu imóvel em até 20%</li>
                                <li>Contribua para um planeta mais sustentável</li>
                                <li>Sistema se paga em 3-7 anos</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4">
                <div class="contact-info-sidebar">
                    <!-- Contact Methods -->
                    <div class="contact-methods mb-4">
                        <h3 class="sidebar-title">Fale Conosco</h3>
                        <div class="contact-method">
                            <div class="method-icon bg-success">
                                <i class="bi bi-whatsapp"></i>
                            </div>
                            <div class="method-content">
                                <h5>WhatsApp</h5>
                                <p>(11) 9999-8888</p>
                                <a href="https://wa.me/5511999998888" class="method-link">Enviar mensagem</a>
                            </div>
                        </div>
                        <div class="contact-method">
                            <div class="method-icon bg-primary">
                                <i class="bi bi-telephone-fill"></i>
                            </div>
                            <div class="method-content">
                                <h5>Telefone</h5>
                                <p>(11) 3333-4444</p>
                                <a href="tel:+551133334444" class="method-link">Ligar agora</a>
                            </div>
                        </div>
                        <div class="contact-method">
                            <div class="method-icon bg-info">
                                <i class="bi bi-envelope-fill"></i>
                            </div>
                            <div class="method-content">
                                <h5>E-mail</h5>
                                <p>contato@rs-energia.com.br</p>
                                <a href="mailto:contato@rs-energia.com.br" class="method-link">Enviar e-mail</a>
                            </div>
                        </div>
                    </div>

                    <!-- Business Hours -->
                    <div class="business-hours mb-4">
                        <h4 class="sidebar-title">Horário de Atendimento</h4>
                        <div class="hours-list">
                            <div class="hour-item">
                                <span class="day">Segunda a Sexta</span>
                                <span class="time">08:00 - 18:00</span>
                            </div>
                            <div class="hour-item">
                                <span class="day">Sábado</span>
                                <span class="time">08:00 - 12:00</span>
                            </div>
                            <div class="hour-item">
                                <span class="day">Domingo</span>
                                <span class="time">Fechado</span>
                            </div>
                        </div>
                    </div>

                    <!-- Emergency Contact -->
                    <div class="emergency-contact">
                        <div class="emergency-header">
                            <i class="bi bi-telephone-fill me-2"></i>
                            <h5>Atendimento de Emergência</h5>
                        </div>
                        <p>Para manutenção de sistemas instalados</p>
                        <a href="tel:+5511999998888" class="btn btn-warning w-100">
                            <i class="bi bi-telephone-fill me-2"></i>Emergência 24h
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Location Section -->
<section class="location-section py-5 bg-light">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-6">
                <div class="location-info">
                    <h2 class="section-title mb-4">Nossa Localização</h2>
                    <div class="location-details">
                        <div class="location-item">
                            <div class="location-icon">
                                <i class="bi bi-geo-alt-fill"></i>
                            </div>
                            <div class="location-content">
                                <h5>Endereço</h5>
                                <p>Rua das Placas Solares, 123<br>Bairro Sustentável<br>São Paulo - SP, 01234-567</p>
                            </div>
                        </div>
                        <div class="location-item">
                            <div class="location-icon">
                                <i class="bi bi-clock-fill"></i>
                            </div>
                            <div class="location-content">
                                <h5>Horário Comercial</h5>
                                <p>Segunda a Sexta: 08:00 - 18:00<br>Sábado: 08:00 - 12:00<br>Domingo: Fechado</p>
                            </div>
                        </div>
                        <div class="location-item">
                            <div class="location-icon">
                                <i class="bi bi-car-front-fill"></i>
                            </div>
                            <div class="location-content">
                                <h5>Estacionamento</h5>
                                <p>Estacionamento gratuito disponível<br>Fácil acesso para clientes</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="map-container">
                    <div class="map-placeholder">
                        <i class="bi bi-geo-alt-fill"></i>
                        <h4>Mapa Interativo</h4>
                        <p>Clique para abrir no Google Maps</p>
                        <a href="https://maps.google.com" class="btn btn-warning">
                            <i class="bi bi-map me-2"></i>Ver no Google Maps
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- FAQ Section -->
<section class="faq-section py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-title">Perguntas Frequentes</h2>
            <p class="section-subtitle">Tire suas dúvidas sobre energia solar</p>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="accordion" id="faqAccordion">
                    @php
                        $faqs = [
                            [
                                'question' => 'Quanto tempo leva para instalar um sistema solar?',
                                'answer' => 'A instalação residencial típica leva de 1 a 3 dias, dependendo do tamanho do sistema. Para projetos comerciais, o prazo pode variar de 1 a 2 semanas.'
                            ],
                            [
                                'question' => 'Qual é a economia real com energia solar?',
                                'answer' => 'A economia pode chegar a 95% da conta de energia elétrica. O valor exato depende do consumo atual, incidência solar e dimensionamento do sistema.'
                            ],
                            [
                                'question' => 'O sistema funciona em dias nublados?',
                                'answer' => 'Sim! Os painéis solares geram energia mesmo em dias nublados, embora com menor eficiência. O sistema é dimensionado considerando essas variações climáticas.'
                            ],
                            [
                                'question' => 'Qual é a vida útil dos painéis solares?',
                                'answer' => 'Os painéis solares têm vida útil superior a 25 anos, com garantia de desempenho. O inversor tem vida útil de 10-15 anos e pode ser substituído quando necessário.'
                            ]
                        ];
                    @endphp
                    @foreach($faqs as $index => $faq)
                    <div class="accordion-item">
                        <h3 class="accordion-header">
                            <button class="accordion-button {{ $index !== 0 ? 'collapsed' : '' }}" type="button" data-bs-toggle="collapse" data-bs-target="#faq{{ $index }}" aria-expanded="{{ $index === 0 ? 'true' : 'false' }}">
                                {{ $faq['question'] }}
                            </button>
                        </h3>
                        <div id="faq{{ $index }}" class="accordion-collapse collapse {{ $index === 0 ? 'show' : '' }}" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                {{ $faq['answer'] }}
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

<style>
/* Contact Hero */
.contact-hero {
    background: linear-gradient(135deg, #1e3c72 0%, #2a5298 50%, #ffc107 100%);
    padding: 6rem 0 4rem;
}

.hero-badge {
    background: rgba(255, 255, 255, 0.2);
    color: white;
    padding: 0.75rem 1.5rem;
    border-radius: 50px;
    font-weight: 600;
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.3);
    display: inline-block;
}

.hero-title {
    font-size: 3rem;
    font-weight: 800;
    margin-bottom: 1.5rem;
}

.hero-description {
    font-size: 1.2rem;
    line-height: 1.6;
    color: rgba(255, 255, 255, 0.9);
}

/* Contact Form Section */
.contact-form-section {
    padding: 6rem 0;
}

.contact-form-container {
    background: white;
    padding: 3rem;
    border-radius: 20px;
    box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
}

.form-header {
    text-align: center;
}

.form-title {
    font-size: 2rem;
    font-weight: 700;
    color: #333;
    margin-bottom: 0.5rem;
}

.form-subtitle {
    color: #666;
    font-size: 1.1rem;
}

/* Statistics Cards */
.stat-card {
    background: white;
    padding: 1.5rem;
    border-radius: 15px;
    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
    text-align: center;
    transition: all 0.3s ease;
}

.stat-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 35px rgba(0, 0, 0, 0.15);
}

.stat-icon {
    width: 60px;
    height: 60px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 1rem;
    font-size: 1.5rem;
    color: white;
}

.stat-number {
    font-size: 1.5rem;
    font-weight: 800;
    color: #333;
}

.stat-label {
    color: #666;
    font-size: 0.9rem;
}

/* Benefits Alert */
.benefits-alert {
    background: linear-gradient(135deg, #fff9e6, #fff3cd);
    padding: 2rem;
    border-radius: 15px;
    display: flex;
    gap: 1.5rem;
    border: 1px solid rgba(255, 193, 7, 0.3);
}

.alert-icon {
    width: 60px;
    height: 60px;
    background: linear-gradient(135deg, #ffc107, #ff8f00);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 1.5rem;
    flex-shrink: 0;
}

.alert-content h5 {
    color: #333;
    font-weight: 700;
    margin-bottom: 1rem;
}

.benefits-list {
    list-style: none;
    padding: 0;
    margin: 0;
}

.benefits-list li {
    padding: 0.25rem 0;
    color: #666;
    position: relative;
    padding-left: 1.5rem;
}

.benefits-list li::before {
    content: '✓';
    position: absolute;
    left: 0;
    color: #ffc107;
    font-weight: bold;
}

/* Contact Info Sidebar */
.contact-info-sidebar {
    background: #f8f9fa;
    padding: 2rem;
    border-radius: 20px;
    height: fit-content;
    position: sticky;
    top: 2rem;
}

.sidebar-title {
    font-size: 1.3rem;
    font-weight: 700;
    color: #333;
    margin-bottom: 1.5rem;
}

.contact-method {
    display: flex;
    gap: 1rem;
    margin-bottom: 2rem;
    padding-bottom: 2rem;
    border-bottom: 1px solid #e9ecef;
}

.contact-method:last-child {
    border-bottom: none;
    margin-bottom: 0;
    padding-bottom: 0;
}

.method-icon {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 1.2rem;
    flex-shrink: 0;
}

.method-content h5 {
    font-weight: 700;
    color: #333;
    margin-bottom: 0.5rem;
}

.method-content p {
    color: #666;
    margin-bottom: 0.5rem;
}

.method-link {
    color: #ffc107;
    text-decoration: none;
    font-weight: 600;
    font-size: 0.9rem;
}

.method-link:hover {
    color: #ff8f00;
}

/* Business Hours */
.business-hours {
    background: white;
    padding: 1.5rem;
    border-radius: 15px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
}

.hours-list {
    space-y: 0.5rem;
}

.hour-item {
    display: flex;
    justify-content: space-between;
    padding: 0.5rem 0;
    border-bottom: 1px solid #f1f3f4;
}

.hour-item:last-child {
    border-bottom: none;
}

.day {
    color: #333;
    font-weight: 500;
}

.time {
    color: #666;
}

/* Emergency Contact */
.emergency-contact {
    background: linear-gradient(135deg, #ffc107, #ff8f00);
    padding: 1.5rem;
    border-radius: 15px;
    color: white;
    text-align: center;
}

.emergency-header {
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 1rem;
}

.emergency-contact p {
    margin-bottom: 1rem;
    opacity: 0.9;
}

/* Location Section */
.location-section {
    padding: 6rem 0;
}

.location-item {
    display: flex;
    gap: 1rem;
    margin-bottom: 2rem;
}

.location-icon {
    width: 50px;
    height: 50px;
    background: linear-gradient(135deg, #ffc107, #ff8f00);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 1.2rem;
    flex-shrink: 0;
}

.location-content h5 {
    font-weight: 700;
    color: #333;
    margin-bottom: 0.5rem;
}

.location-content p {
    color: #666;
    margin: 0;
}

.map-container {
    background: #f8f9fa;
    border-radius: 20px;
    overflow: hidden;
    height: 400px;
}

.map-placeholder {
    height: 100%;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    text-align: center;
    color: #666;
}

.map-placeholder i {
    font-size: 4rem;
    color: #ffc107;
    margin-bottom: 1rem;
}

/* FAQ Section */
.faq-section {
    padding: 6rem 0;
}

.accordion-item {
    border: none;
    border-radius: 15px !important;
    margin-bottom: 1rem;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
}

.accordion-button {
    background: white;
    border: none;
    border-radius: 15px !important;
    font-weight: 600;
    color: #333;
    padding: 1.5rem;
}

.accordion-button:not(.collapsed) {
    background: linear-gradient(135deg, #ffc107, #ff8f00);
    color: white;
}

.accordion-button:focus {
    box-shadow: none;
    border: none;
}

.accordion-body {
    padding: 1.5rem;
    color: #666;
    line-height: 1.6;
}

/* Form Styles */
.form-control, .form-select {
    border: 2px solid #e9ecef;
    border-radius: 10px;
    padding: 0.75rem 1rem;
    transition: all 0.3s ease;
    background: #f8f9fa;
}

.form-control:focus, .form-select:focus {
    border-color: #ffc107;
    box-shadow: 0 0 0 0.2rem rgba(255, 193, 7, 0.25);
    background: white;
}

.btn-primary {
    background: linear-gradient(135deg, #ffc107, #ff8f00);
    border: none;
    border-radius: 10px;
    padding: 0.75rem 2rem;
    font-weight: 600;
    transition: all 0.3s ease;
}

.btn-primary:hover {
    background: linear-gradient(135deg, #ff8f00, #f57c00);
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(255, 193, 7, 0.4);
}

/* Responsive Design */
@media (max-width: 768px) {
    .hero-title {
        font-size: 2rem;
    }
    
    .contact-form-container {
        padding: 2rem;
    }
    
    .contact-info-sidebar {
        margin-top: 3rem;
        position: relative;
        top: auto;
    }
    
    .benefits-alert {
        flex-direction: column;
        text-align: center;
    }
    
    .location-item {
        text-align: center;
        flex-direction: column;
    }
}
</style>
@endsection
