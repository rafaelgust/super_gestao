@extends('site.layouts.site')

@section('titulo', 'Energia Solar e Aquecedores')

@section('conteudo')

<!-- Hero Section -->
<section class="hero-section position-relative overflow-hidden">
    <div class="hero-bg"></div>
    <div class="container-fluid h-100">
        <div class="row h-100 align-items-center">
            <div class="col-lg-6 col-xl-5 offset-xl-1">
                <div class="hero-content">
                    <div class="badge-container mb-4">
                        <span class="hero-badge">
                            <i class="bi bi-sun-fill me-2"></i>
                            Energia Solar & Sustentabilidade
                        </span>
                    </div>
                    <h1 class="hero-title">
                        <span class="brand-highlight">R&S</span><br>
                        <span class="hero-subtitle">Energia Solar</span>
                    </h1>
                    <p class="hero-description">
                        Transforme sua casa ou empresa com energia limpa e econômica. 
                        Especialistas em <strong>placas solares</strong> e <strong>aquecedores solares</strong> 
                        com mais de 15 anos de experiência.
                    </p>
                    <div class="hero-stats mb-4">
                        <div class="row g-3">
                            <div class="col-4">
                                <div class="stat-item">
                                    <div class="stat-number">15+</div>
                                    <div class="stat-label">Anos</div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="stat-item">
                                    <div class="stat-number">500+</div>
                                    <div class="stat-label">Projetos</div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="stat-item">
                                    <div class="stat-number">95%</div>
                                    <div class="stat-label">Economia</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="hero-actions">
                        <a href="#orcamento" class="btn btn-primary btn-lg me-3">
                            <i class="bi bi-calculator me-2"></i>Solicitar Orçamento
                        </a>
                        <a href="#servicos" class="btn btn-outline-light btn-lg">
                            <i class="bi bi-play-circle me-2"></i>Nossos Serviços
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-xl-6">
                <div class="hero-image">
                    <div class="image-container">
                        <img src="{{ asset('img/hero-solar-new.jpg') }}" alt="Instalação de Energia Solar" class="img-fluid">
                        <div class="floating-card">
                            <div class="card-icon">
                                <i class="bi bi-lightning-charge-fill"></i>
                            </div>
                            <div class="card-content">
                                <div class="card-number">95%</div>
                                <div class="card-text">Economia na Conta</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Scroll Indicator -->
    <div class="scroll-indicator">
        <a href="#servicos" class="scroll-link">
            <i class="bi bi-chevron-down"></i>
        </a>
    </div>
</section>

<!-- Services Section -->
<section id="servicos" class="services-section py-5">
    <div class="container">
        <div class="section-header text-center mb-5">
            <h2 class="section-title">Nossos Serviços</h2>
            <p class="section-subtitle">Soluções completas em energia solar para sua casa ou empresa</p>
        </div>
        <div class="row g-4">
            @php
                $servicos = [
                    [
                        'icon' => 'bi-sun-fill', 
                        'color' => 'warning', 
                        'titulo' => 'Placas Solares', 
                        'desc' => 'Sistemas fotovoltaicos de alta eficiência para reduzir sua conta de energia',
                        'features' => ['Instalação profissional', 'Garantia de 25 anos', 'Monitoramento remoto']
                    ],
                    [
                        'icon' => 'bi-thermometer-sun', 
                        'color' => 'primary', 
                        'titulo' => 'Aquecedores Solares', 
                        'desc' => 'Aquecimento sustentável de água com tecnologia solar avançada',
                        'features' => ['Economia até 80%', 'Baixa manutenção', 'Ecologicamente correto']
                    ],
                    [
                        'icon' => 'bi-tools', 
                        'color' => 'success', 
                        'titulo' => 'Instalação', 
                        'desc' => 'Instalação profissional com equipe certificada e experiente',
                        'features' => ['Equipe certificada', 'Projeto personalizado', 'Suporte completo']
                    ],
                    [
                        'icon' => 'bi-gear-fill', 
                        'color' => 'info', 
                        'titulo' => 'Manutenção', 
                        'desc' => 'Manutenção preventiva e corretiva para máxima eficiência',
                        'features' => ['Manutenção preventiva', 'Suporte técnico', 'Peças originais']
                    ],
                ];
            @endphp
            @foreach($servicos as $index => $s)
            <div class="col-lg-6 col-xl-3">
                <div class="service-card" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                    <div class="service-icon bg-{{ $s['color'] }}">
                        <i class="bi {{ $s['icon'] }}"></i>
                    </div>
                    <h4 class="service-title">{{ $s['titulo'] }}</h4>
                    <p class="service-description">{{ $s['desc'] }}</p>
                    <ul class="service-features">
                        @foreach($s['features'] as $feature)
                        <li><i class="bi bi-check-circle-fill text-{{ $s['color'] }}"></i> {{ $feature }}</li>
                        @endforeach
                    </ul>
                    <a href="#orcamento" class="service-link">Saiba mais <i class="bi bi-arrow-right"></i></a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Why Choose Us Section -->
<section class="why-choose-section py-5 bg-light">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-6">
                <div class="content-block">
                    <h2 class="block-title">Por que Escolher a R&S?</h2>
                    <p class="block-subtitle">Somos referência em energia solar com soluções personalizadas para cada cliente</p>
                    
                    @php
                        $vantagens = [
                            ['icon' => 'bi-award-fill', 'color' => 'warning', 'titulo' => 'Experiência Comprovada', 'desc' => '15+ anos no mercado de energia solar'],
                            ['icon' => 'bi-shield-fill-check', 'color' => 'success', 'titulo' => 'Garantia Total', 'desc' => 'Garantia de até 25 anos nos equipamentos'],
                            ['icon' => 'bi-people-fill', 'color' => 'primary', 'titulo' => 'Equipe Certificada', 'desc' => 'Profissionais qualificados e certificados'],
                            ['icon' => 'bi-headset', 'color' => 'info', 'titulo' => 'Suporte Completo', 'desc' => 'Atendimento e suporte técnico especializado'],
                        ];
                    @endphp
                    
                    <div class="advantages-list">
                        @foreach($vantagens as $v)
                        <div class="advantage-item">
                            <div class="advantage-icon bg-{{ $v['color'] }}">
                                <i class="bi {{ $v['icon'] }}"></i>
                            </div>
                            <div class="advantage-content">
                                <h5>{{ $v['titulo'] }}</h5>
                                <p>{{ $v['desc'] }}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="image-gallery">
                    <div class="gallery-main">
                        <img src="{{ asset('img/solar-service-1.jpg') }}" alt="Instalação Solar" class="img-fluid rounded-4">
                    </div>
                    <div class="gallery-secondary">
                        <img src="{{ asset('img/solar-service-2.jpg') }}" alt="Placas Solares" class="img-fluid rounded-4">
                        <img src="{{ asset('img/solar-service-3.jpg') }}" alt="Equipe Técnica" class="img-fluid rounded-4">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Contact Section -->
<section id="orcamento" class="contact-section py-5">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-6">
                <div class="contact-info">
                    <h2 class="section-title mb-4">Solicite seu Orçamento Gratuito</h2>
                    <p class="section-subtitle mb-4">
                        Faça uma simulação personalizada e descubra quanto você pode economizar 
                        com energia solar. Nossa equipe vai até você para avaliar seu projeto.
                    </p>
                    
                    <div class="info-items">
                        <div class="info-item">
                            <div class="info-icon bg-warning">
                                <i class="bi bi-clock-fill"></i>
                            </div>
                            <div class="info-content">
                                <h5>Resposta em 24h</h5>
                                <p>Retornamos seu contato em até 24 horas</p>
                            </div>
                        </div>
                        <div class="info-item">
                            <div class="info-icon bg-success">
                                <i class="bi bi-geo-alt-fill"></i>
                            </div>
                            <div class="info-content">
                                <h5>Visita Técnica Gratuita</h5>
                                <p>Avaliação completa no local sem custo</p>
                            </div>
                        </div>
                        <div class="info-item">
                            <div class="info-icon bg-primary">
                                <i class="bi bi-shield-fill-check"></i>
                            </div>
                            <div class="info-content">
                                <h5>Garantia Total</h5>
                                <p>Equipamentos com garantia de até 25 anos</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="contact-form-container">
                    <div class="form-header">
                        <h3>Entre em Contato</h3>
                        <p>Preencha o formulário e nossa equipe entrará em contato</p>
                    </div>
                    @component('site.layouts._components.form_contato', ['motivo_contatos' => $motivo_contatos])
                    @endcomponent
                    
                    <div class="contact-methods mt-4">
                        <h6 class="mb-3">Ou fale conosco diretamente:</h6>
                        <div class="d-flex gap-3 flex-wrap">
                            <a href="tel:+5511999998888" class="contact-btn whatsapp">
                                <i class="bi bi-whatsapp"></i>
                                <span>WhatsApp</span>
                            </a>
                            <a href="tel:+5511999998888" class="contact-btn phone">
                                <i class="bi bi-telephone-fill"></i>
                                <span>Telefone</span>
                            </a>
                            <a href="mailto:contato@rs-energia.com.br" class="contact-btn email">
                                <i class="bi bi-envelope-fill"></i>
                                <span>E-mail</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Benefits Section -->
<section class="benefits-section py-5 bg-dark text-white">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-title text-white mb-3">Vantagens da Energia Solar</h2>
            <p class="section-subtitle text-light">Invista no futuro sustentável e economize desde o primeiro dia</p>
        </div>
        <div class="row g-4">
            @php
                $beneficios = [
                    ['icon' => 'bi-piggy-bank-fill', 'color' => 'success', 'titulo' => 'Economia de até 95%', 'desc' => 'Reduza drasticamente sua conta de energia elétrica'],
                    ['icon' => 'bi-leaf-fill', 'color' => 'success', 'titulo' => 'Energia Limpa', 'desc' => 'Contribua para um planeta mais sustentável'],
                    ['icon' => 'bi-arrow-up-circle-fill', 'color' => 'warning', 'titulo' => 'Valorização do Imóvel', 'desc' => 'Aumente o valor de revenda do seu imóvel'],
                    ['icon' => 'bi-tools', 'color' => 'primary', 'titulo' => 'Baixa Manutenção', 'desc' => 'Sistema durável com mínima necessidade de manutenção'],
                    ['icon' => 'bi-graph-up-arrow', 'color' => 'info', 'titulo' => 'Retorno Garantido', 'desc' => 'Investimento se paga em média entre 3-7 anos'],
                    ['icon' => 'bi-shield-fill-check', 'color' => 'danger', 'titulo' => 'Tecnologia Confiável', 'desc' => 'Equipamentos de última geração com alta eficiência'],
                ];
            @endphp
            @foreach($beneficios as $index => $b)
            <div class="col-lg-4 col-md-6">
                <div class="benefit-card" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                    <div class="benefit-icon bg-{{ $b['color'] }}">
                        <i class="bi {{ $b['icon'] }}"></i>
                    </div>
                    <h4 class="benefit-title">{{ $b['titulo'] }}</h4>
                    <p class="benefit-description">{{ $b['desc'] }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="cta-section py-5 bg-gradient">
    <div class="container text-center">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <h2 class="cta-title mb-4">Pronto para Economizar com Energia Solar?</h2>
                <p class="cta-subtitle mb-4">
                    Junte-se a mais de 500 clientes satisfeitos que já estão economizando com energia solar. 
                    Solicite seu orçamento gratuito agora mesmo!
                </p>
                <div class="cta-actions">
                    <a href="#orcamento" class="btn btn-dark btn-lg me-3">
                        <i class="bi bi-calculator me-2"></i>Calcular Economia
                    </a>
                    <a href="tel:+5511999998888" class="btn btn-outline-dark btn-lg">
                        <i class="bi bi-telephone-fill me-2"></i>Ligar Agora
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
/* Hero Section */
.hero-section {
    min-height: 100vh;
    background: linear-gradient(135deg, #1e3c72 0%, #2a5298 50%, #ffc107 100%);
    color: white;
    display: flex;
    align-items: center;
}

.hero-bg {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 1000"><defs><pattern id="sun" x="0" y="0" width="100" height="100" patternUnits="userSpaceOnUse"><circle cx="50" cy="50" r="2" fill="%23ffffff" opacity="0.1"/></pattern></defs><rect width="100%" height="100%" fill="url(%23sun)"/></svg>');
    opacity: 0.1;
}

.hero-content {
    position: relative;
    z-index: 2;
}

.hero-badge {
    background: rgba(255, 255, 255, 0.2);
    color: white;
    padding: 0.75rem 1.5rem;
    border-radius: 50px;
    font-weight: 600;
    font-size: 0.9rem;
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.3);
}

.hero-title {
    font-size: 4rem;
    font-weight: 800;
    line-height: 1.1;
    margin-bottom: 1.5rem;
}

.brand-highlight {
    color: #ffc107;
    position: relative;
}

.brand-highlight::after {
    content: '';
    position: absolute;
    bottom: 5px;
    left: 0;
    width: 100%;
    height: 4px;
    background: #ffc107;
    border-radius: 2px;
}

.hero-subtitle {
    color: rgba(255, 255, 255, 0.9);
    font-weight: 300;
}

.hero-description {
    font-size: 1.2rem;
    line-height: 1.6;
    margin-bottom: 2rem;
    color: rgba(255, 255, 255, 0.9);
}

.hero-stats {
    background: rgba(255, 255, 255, 0.1);
    padding: 1.5rem;
    border-radius: 15px;
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.2);
}

.stat-item {
    text-align: center;
}

.stat-number {
    font-size: 2rem;
    font-weight: 800;
    color: #ffc107;
}

.stat-label {
    font-size: 0.9rem;
    color: rgba(255, 255, 255, 0.8);
}

.hero-actions .btn {
    padding: 1rem 2rem;
    font-weight: 600;
    border-radius: 50px;
    transition: all 0.3s ease;
}

.hero-actions .btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
}

.hero-image {
    position: relative;
    z-index: 2;
}

.image-container {
    position: relative;
    border-radius: 20px;
    overflow: hidden;
    box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
}

.floating-card {
    position: absolute;
    bottom: 20px;
    right: 20px;
    background: white;
    padding: 1.5rem;
    border-radius: 15px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
    display: flex;
    align-items: center;
    gap: 1rem;
}

.card-icon {
    width: 50px;
    height: 50px;
    background: linear-gradient(135deg, #ffc107, #ff8f00);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 1.5rem;
}

.card-number {
    font-size: 1.5rem;
    font-weight: 800;
    color: #333;
}

.card-text {
    font-size: 0.9rem;
    color: #666;
}

.scroll-indicator {
    position: absolute;
    bottom: 30px;
    left: 50%;
    transform: translateX(-50%);
    z-index: 2;
}

.scroll-link {
    color: white;
    font-size: 2rem;
    animation: bounce 2s infinite;
}

/* Services Section */
.services-section {
    padding: 6rem 0;
}

.section-header {
    margin-bottom: 4rem;
}

.section-title {
    font-size: 2.5rem;
    font-weight: 700;
    color: #333;
    margin-bottom: 1rem;
}

.section-subtitle {
    font-size: 1.2rem;
    color: #666;
    max-width: 600px;
    margin: 0 auto;
}

.service-card {
    background: white;
    padding: 2.5rem;
    border-radius: 20px;
    box-shadow: 0 5px 30px rgba(0, 0, 0, 0.1);
    text-align: center;
    height: 100%;
    transition: all 0.3s ease;
    border: 1px solid rgba(0, 0, 0, 0.05);
}

.service-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 20px 60px rgba(0, 0, 0, 0.15);
}

.service-icon {
    width: 80px;
    height: 80px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 1.5rem;
    font-size: 2rem;
    color: white;
}

.service-title {
    font-size: 1.3rem;
    font-weight: 700;
    color: #333;
    margin-bottom: 1rem;
}

.service-description {
    color: #666;
    margin-bottom: 1.5rem;
    line-height: 1.6;
}

.service-features {
    list-style: none;
    padding: 0;
    margin-bottom: 1.5rem;
}

.service-features li {
    padding: 0.5rem 0;
    color: #666;
    font-size: 0.9rem;
}

.service-link {
    color: #ffc107;
    text-decoration: none;
    font-weight: 600;
    transition: all 0.3s ease;
}

.service-link:hover {
    color: #ff8f00;
    text-decoration: none;
}

/* Why Choose Section */
.why-choose-section {
    padding: 6rem 0;
}

.content-block {
    padding-right: 2rem;
}

.block-title {
    font-size: 2.5rem;
    font-weight: 700;
    color: #333;
    margin-bottom: 1rem;
}

.block-subtitle {
    font-size: 1.2rem;
    color: #666;
    margin-bottom: 3rem;
}

.advantages-list {
    space-y: 2rem;
}

.advantage-item {
    display: flex;
    align-items: flex-start;
    gap: 1.5rem;
    margin-bottom: 2rem;
}

.advantage-icon {
    width: 60px;
    height: 60px;
    border-radius: 15px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.5rem;
    color: white;
    flex-shrink: 0;
}

.advantage-content h5 {
    font-weight: 700;
    color: #333;
    margin-bottom: 0.5rem;
}

.advantage-content p {
    color: #666;
    margin: 0;
}

.image-gallery {
    position: relative;
}

.gallery-main {
    margin-bottom: 2rem;
}

.gallery-secondary {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 1rem;
}

.gallery-secondary img {
    height: 200px;
    object-fit: cover;
}

/* Contact Section */
.contact-section {
    padding: 6rem 0;
    background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
}

.contact-info {
    padding-right: 2rem;
}

.info-items {
    margin-top: 2rem;
}

.info-item {
    display: flex;
    align-items: center;
    gap: 1.5rem;
    margin-bottom: 2rem;
}

.info-icon {
    width: 60px;
    height: 60px;
    border-radius: 15px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.5rem;
    color: white;
}

.info-content h5 {
    font-weight: 700;
    color: #333;
    margin-bottom: 0.5rem;
}

.info-content p {
    color: #666;
    margin: 0;
}

.contact-form-container {
    background: white;
    padding: 3rem;
    border-radius: 20px;
    box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
}

.form-header {
    margin-bottom: 2rem;
    text-align: center;
}

.form-header h3 {
    font-weight: 700;
    color: #333;
    margin-bottom: 0.5rem;
}

.form-header p {
    color: #666;
}

.contact-methods h6 {
    font-weight: 600;
    color: #333;
}

.contact-btn {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    padding: 0.75rem 1.5rem;
    border-radius: 50px;
    text-decoration: none;
    font-weight: 600;
    transition: all 0.3s ease;
    border: 2px solid;
}

.contact-btn.whatsapp {
    background: #25d366;
    color: white;
    border-color: #25d366;
}

.contact-btn.phone {
    background: #007bff;
    color: white;
    border-color: #007bff;
}

.contact-btn.email {
    background: #6c757d;
    color: white;
    border-color: #6c757d;
}

.contact-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
}

/* Benefits Section */
.benefits-section {
    padding: 6rem 0;
}

.benefit-card {
    text-align: center;
    padding: 2rem;
}

.benefit-icon {
    width: 80px;
    height: 80px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 1.5rem;
    font-size: 2rem;
    color: white;
}

.benefit-title {
    font-size: 1.3rem;
    font-weight: 700;
    color: white;
    margin-bottom: 1rem;
}

.benefit-description {
    color: rgba(255, 255, 255, 0.8);
    line-height: 1.6;
}

/* CTA Section */
.cta-section {
    background: linear-gradient(135deg, #ffc107 0%, #ff8f00 100%);
    color: #333;
    padding: 6rem 0;
}

.cta-title {
    font-size: 2.5rem;
    font-weight: 700;
    color: #333;
}

.cta-subtitle {
    font-size: 1.2rem;
    color: #555;
}

.cta-actions .btn {
    padding: 1rem 2rem;
    font-weight: 600;
    border-radius: 50px;
    transition: all 0.3s ease;
}

.cta-actions .btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
}

/* Animations */
@keyframes bounce {
    0%, 20%, 50%, 80%, 100% {
        transform: translateY(0) translateX(-50%);
    }
    40% {
        transform: translateY(-30px) translateX(-50%);
    }
    60% {
        transform: translateY(-15px) translateX(-50%);
    }
}

/* Responsive Design */
@media (max-width: 768px) {
    .hero-title {
        font-size: 2.5rem;
    }
    
    .section-title {
        font-size: 2rem;
    }
    
    .hero-actions .btn {
        display: block;
        width: 100%;
        margin-bottom: 1rem;
    }
    
    .contact-btn {
        font-size: 0.9rem;
        padding: 0.6rem 1.2rem;
    }
    
    .content-block {
        padding-right: 0;
        margin-bottom: 3rem;
    }
    
    .contact-form-container {
        padding: 2rem;
    }
}

/* Smooth Scrolling */
html {
    scroll-behavior: smooth;
}

/* Form Styles */
.form-control, .form-select {
    border: 2px solid #e9ecef;
    border-radius: 10px;
    padding: 0.75rem 1rem;
    transition: all 0.3s ease;
}

.form-control:focus, .form-select:focus {
    border-color: #ffc107;
    box-shadow: 0 0 0 0.2rem rgba(255, 193, 7, 0.25);
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
</style>
@endsection
