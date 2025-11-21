@extends('site.layouts.site')

@section('titulo', ' - Sobre Nós')

@section('conteudo')

<!-- Hero Section -->
<section class="about-hero py-5 bg-gradient text-white">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-6">
                <div class="hero-content" data-aos="fade-right">
                    <span class="hero-badge mb-4 text-dark">
                        <i class="bi bi-sun-fill me-2"></i>Quem Somos
                    </span>
                    <h1 class="hero-title mb-4 text-dark">
                        Sobre a <span class="text-warning">J.F R&S Aquecedores Solares</span>
                    </h1>
                    <p class="hero-description mb-4 text-dark">
                        Há mais de 15 anos transformando a forma como as pessoas utilizam água quente e energia, 
                        oferecendo soluções completas em aquecimento solar, instalações elétricas, hidráulicas e gás.
                    </p>
                    <div class="hero-stats">
                        <div class="row g-3">
                            <div class="col-4">
                                <div class="stat-card">
                                    <div class="stat-number">15+</div>
                                    <div class="stat-label text-dark">Anos</div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="stat-card">
                                    <div class="stat-number">500+</div>
                                    <div class="stat-label text-dark">Instalações</div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="stat-card">
                                    <div class="stat-number">100%</div>
                                    <div class="stat-label text-dark">Satisfação</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="hero-image" data-aos="fade-left">
                    <img src="{{ asset('img/about-hero.jpg') }}" alt="Equipe J.F R&S Aquecedores Solares" class="img-fluid rounded-4">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Mission Section -->
<section class="mission-section py-5">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-4">
                <div class="mission-card h-100" data-aos="fade-up" data-aos-delay="100">
                    <div class="mission-icon bg-warning">
                        <i class="bi bi-bullseye"></i>
                    </div>
                    <h3 class="mission-title">Nossa Missão</h3>
                    <p class="mission-description">
                        Oferecer excelência em aquecimento solar, instalações elétricas e hidráulicas, proporcionando conforto, segurança e economia para residências e empresas.
                    </p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="mission-card h-100" data-aos="fade-up" data-aos-delay="200">
                    <div class="mission-icon bg-primary">
                        <i class="bi bi-eye"></i>
                    </div>
                    <h3 class="mission-title">Nossa Visão</h3>
                    <p class="mission-description">
                        Ser referência nacional em soluções integradas de engenharia, reconhecida pela qualidade, inovação e atendimento personalizado em todas as nossas áreas de atuação.
                    </p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="mission-card h-100" data-aos="fade-up" data-aos-delay="300">
                    <div class="mission-icon bg-success">
                        <i class="bi bi-heart"></i>
                    </div>
                    <h3 class="mission-title">Nossos Valores</h3>
                    <p class="mission-description">
                        Sustentabilidade, transparência, inovação e compromisso com o conforto e satisfação dos nossos clientes.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="cta-section py-5 bg-gradient">
    <div class="container text-center">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <h2 class="cta-title mb-4">Conheça Mais Sobre Nossas Instalações</h2>
                <p class="cta-subtitle mb-4">
                    Quer saber mais sobre nossa experiência e como podemos ajudar você a economizar com aquecimento solar?
                </p>
                <div class="cta-actions">
                    <a href="{{ route('site.contato') }}" class="btn btn-dark btn-lg me-3">
                        <i class="bi bi-envelope me-2"></i>Entre em Contato
                    </a>
                    <a href="{{ route('site.index') }}" class="btn btn-outline-dark btn-lg">
                        <i class="bi bi-arrow-left me-2"></i>Voltar ao Início
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
/* About Hero Section */
.about-hero {
    background: linear-gradient(135deg, #1e3c72 0%, #2a5298 50%, #ffc107 100%);
    min-height: 70vh;
    display: flex;
    align-items: center;
}

.hero-badge {
    background: rgb(255 193 7 / 15%);
    padding: 0.75rem 1.5rem;
    border-radius: 50px;
    font-weight: 600;
    font-size: 0.9rem;
    backdrop-filter: blur(10px);
    border: 1px solid rgb(255 193 7);
    display: inline-block;
}

.hero-title {
    font-size: 3rem;
    font-weight: 800;
    line-height: 1.2;
}

.hero-description {
    font-size: 1.2rem;
    line-height: 1.6;
    color: rgba(255, 255, 255, 0.9);
}

.hero-stats {
    background: rgba(255, 255, 255, 0.1);
    padding: 1.5rem;
    border-radius: 15px;
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.2);
}

.stat-card {
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

/* Section Titles */
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

/* Mission Section */
.mission-section {
    padding: 6rem 0;
}

.mission-card {
    background: white;
    padding: 3rem 2rem;
    border-radius: 20px;
    box-shadow: 0 5px 30px rgba(0, 0, 0, 0.1);
    text-align: center;
    transition: all 0.3s ease;
    border: 1px solid rgba(0, 0, 0, 0.05);
}

.mission-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 20px 60px rgba(0, 0, 0, 0.15);
}

.mission-icon {
    width: 80px;
    height: 80px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 2rem;
    font-size: 2rem;
    color: white;
}

.mission-title {
    font-size: 1.5rem;
    font-weight: 700;
    color: #333;
    margin-bottom: 1rem;
}

.mission-description {
    color: #666;
    line-height: 1.6;
}

/* Solar Info Section */
.solar-info-section {
    padding: 6rem 0;
}

.solar-info-section p {
    color: #666;
    margin-bottom: 1rem;
    line-height: 1.6;
}

/* CTA Section */
.cta-section {
    padding: 6rem 0;
    background: linear-gradient(135deg, #ffc107 0%, #ff8f00 100%);
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

/* Responsive Design */
@media (max-width: 768px) {
    .hero-title {
        font-size: 2rem;
    }
    
    .section-title {
        font-size: 2rem;
    }
    
    .mission-card {
        padding: 2rem 1.5rem;
    }
    
    .timeline {
        padding-left: 1rem;
    }
    
    .timeline-item {
        padding-left: 2rem;
    }
    
    .team-card {
        margin-bottom: 2rem;
    }
    
    .cta-title {
        font-size: 2rem;
    }
}
</style>
@endsection