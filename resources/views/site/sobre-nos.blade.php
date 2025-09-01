@extends('site.layouts.site')

@section('titulo', 'Sobre Nós')

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
                        Sobre a <span class="text-warning">R&S Energia Solar</span>
                    </h1>
                    <p class="hero-description mb-4 text-dark">
                        Há mais de 15 anos transformando a relação das pessoas com a energia, 
                        oferecendo soluções sustentáveis e econômicas em energia solar.
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
                                    <div class="stat-label text-dark">Projetos</div>
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
                    <img src="{{ asset('img/about-hero.jpg') }}" alt="Equipe R&S Energia Solar" class="img-fluid rounded-4">
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
                        Democratizar o acesso à energia solar no Brasil, oferecendo soluções 
                        personalizadas que geram economia e contribuem para um planeta mais sustentável.
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
                        Ser a empresa líder em energia solar, reconhecida pela excelência 
                        no atendimento, qualidade dos produtos e inovação tecnológica.
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
                        Sustentabilidade, transparência, inovação e compromisso com a 
                        satisfação dos nossos clientes são os pilares que guiam nossa empresa.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- History Section -->
<section class="history-section py-5 bg-light">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-6">
                <div class="content-block" data-aos="fade-right">
                    <h2 class="section-title mb-4">Nossa História</h2>
                    <div class="timeline">
                        <div class="timeline-item">
                            <div class="timeline-year">2009</div>
                            <div class="timeline-content">
                                <h4>Fundação</h4>
                                <p>A R&S Energia Solar nasce com o sonho de tornar a energia solar acessível para todos.</p>
                            </div>
                        </div>
                        <div class="timeline-item">
                            <div class="timeline-year">2015</div>
                            <div class="timeline-content">
                                <h4>Expansão</h4>
                                <p>Ampliamos nossa equipe e começamos a atender empresas de médio e grande porte.</p>
                            </div>
                        </div>
                        <div class="timeline-item">
                            <div class="timeline-year">2020</div>
                            <div class="timeline-content">
                                <h4>Inovação</h4>
                                <p>Implementamos tecnologias de monitoramento remoto e sistema de gestão inteligente.</p>
                            </div>
                        </div>
                        <div class="timeline-item">
                            <div class="timeline-year">2025</div>
                            <div class="timeline-content">
                                <h4>Liderança</h4>
                                <p>Mais de 500 projetos realizados e reconhecimento como referência no mercado.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="image-showcase" data-aos="fade-left">
                    <div class="showcase-main">
                        <img src="{{ asset('img/company-history.jpg') }}" alt="História da Empresa" class="img-fluid rounded-4">
                    </div>
                    <div class="showcase-floating">
                        <div class="floating-stat">
                            <div class="stat-icon">
                                <i class="bi bi-award-fill"></i>
                            </div>
                            <div class="stat-info">
                                <div class="stat-title">Certificações</div>
                                <div class="stat-subtitle">INMETRO & ANEEL</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Team Section -->
<section class="team-section py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-title mb-3">Nossa Equipe</h2>
            <p class="section-subtitle">Profissionais especializados e certificados em energia solar</p>
        </div>
        <div class="row g-4">
            @php
                $team = [
                    [
                        'name' => 'Roberto Silva',
                        'position' => 'Diretor Técnico',
                        'experience' => '15+ anos',
                        'image' => 'team-member-1.jpg',
                        'specialties' => ['Projetos Fotovoltaicos', 'Sistemas de Grande Porte']
                    ],
                    [
                        'name' => 'Sofia Rodrigues',
                        'position' => 'Engenheira Solar',
                        'experience' => '10+ anos',
                        'image' => 'team-member-2.jpg',
                        'specialties' => ['Dimensionamento', 'Eficiência Energética']
                    ],
                    [
                        'name' => 'Carlos Mendes',
                        'position' => 'Técnico de Instalação',
                        'experience' => '8+ anos',
                        'image' => 'team-member-3.jpg',
                        'specialties' => ['Instalação Residencial', 'Manutenção Preventiva']
                    ],
                    [
                        'name' => 'Ana Costa',
                        'position' => 'Consultora Comercial',
                        'experience' => '5+ anos',
                        'image' => 'team-member-1.jpg',
                        'specialties' => ['Consultoria Técnica', 'Atendimento ao Cliente']
                    ]
                ];
            @endphp
            @foreach($team as $index => $member)
            <div class="col-lg-3 col-md-6">
                <div class="team-card" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                    <div class="team-image">
                        <img src="{{ asset('img/' . $member['image']) }}" alt="{{ $member['name'] }}" class="img-fluid">
                        <div class="team-overlay">
                            <div class="team-social">
                                <a href="#" class="social-link"><i class="bi bi-linkedin"></i></a>
                                <a href="#" class="social-link"><i class="bi bi-envelope"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="team-content">
                        <h4 class="team-name">{{ $member['name'] }}</h4>
                        <p class="team-position">{{ $member['position'] }}</p>
                        <div class="team-experience">
                            <i class="bi bi-clock me-2"></i>{{ $member['experience'] }}
                        </div>
                        <div class="team-specialties">
                            @foreach($member['specialties'] as $specialty)
                            <span class="specialty-tag">{{ $specialty }}</span>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Certifications Section -->
<section class="certifications-section py-5 bg-dark text-white">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-title text-white mb-3">Certificações e Parcerias</h2>
            <p class="section-subtitle text-light">Qualidade reconhecida e parcerias estratégicas</p>
        </div>
        <div class="row g-4">
            @php
                $certifications = [
                    ['name' => 'INMETRO', 'desc' => 'Certificação de Qualidade', 'icon' => 'bi-award-fill'],
                    ['name' => 'ANEEL', 'desc' => 'Homologação Técnica', 'icon' => 'bi-shield-check-fill'],
                    ['name' => 'ABGD', 'desc' => 'Associação Brasileira de Geração Distribuída', 'icon' => 'bi-lightning-charge-fill'],
                    ['name' => 'ABSOLAR', 'desc' => 'Associação Brasileira de Energia Solar', 'icon' => 'bi-sun-fill']
                ];
            @endphp
            @foreach($certifications as $index => $cert)
            <div class="col-lg-3 col-md-6">
                <div class="cert-card" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                    <div class="cert-icon">
                        <i class="bi {{ $cert['icon'] }}"></i>
                    </div>
                    <h4 class="cert-name">{{ $cert['name'] }}</h4>
                    <p class="cert-description">{{ $cert['desc'] }}</p>
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
                <h2 class="cta-title mb-4">Conheça Mais Sobre Nossos Projetos</h2>
                <p class="cta-subtitle mb-4">
                    Quer saber mais sobre nossa experiência e como podemos ajudar você a economizar com energia solar?
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
    background: rgba(255, 255, 255, 0.2);
    color: white;
    padding: 0.75rem 1.5rem;
    border-radius: 50px;
    font-weight: 600;
    font-size: 0.9rem;
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.3);
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

/* History Section */
.history-section {
    padding: 6rem 0;
}

.timeline {
    position: relative;
    padding-left: 2rem;
}

.timeline::before {
    content: '';
    position: absolute;
    left: 0;
    top: 0;
    bottom: 0;
    width: 2px;
    background: linear-gradient(to bottom, #ffc107, #ff8f00);
}

.timeline-item {
    position: relative;
    margin-bottom: 3rem;
    padding-left: 3rem;
}

.timeline-item::before {
    content: '';
    position: absolute;
    left: -7px;
    top: 5px;
    width: 14px;
    height: 14px;
    border-radius: 50%;
    background: #ffc107;
    border: 3px solid white;
    box-shadow: 0 0 0 3px #ffc107;
}

.timeline-year {
    font-size: 1.2rem;
    font-weight: 800;
    color: #ffc107;
    margin-bottom: 0.5rem;
}

.timeline-content h4 {
    font-size: 1.1rem;
    font-weight: 700;
    color: #333;
    margin-bottom: 0.5rem;
}

.timeline-content p {
    color: #666;
    margin: 0;
}

.image-showcase {
    position: relative;
}

.showcase-floating {
    position: absolute;
    bottom: 20px;
    right: 20px;
    background: white;
    padding: 1.5rem;
    border-radius: 15px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
}

.floating-stat {
    display: flex;
    align-items: center;
    gap: 1rem;
}

.stat-icon {
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

.stat-title {
    font-weight: 700;
    color: #333;
}

.stat-subtitle {
    font-size: 0.9rem;
    color: #666;
}

/* Team Section */
.team-section {
    padding: 6rem 0;
}

.team-card {
    background: white;
    border-radius: 20px;
    overflow: hidden;
    box-shadow: 0 5px 30px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
}

.team-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 20px 60px rgba(0, 0, 0, 0.15);
}

.team-image {
    position: relative;
    overflow: hidden;
    height: 250px;
}

.team-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: all 0.3s ease;
}

.team-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(135deg, rgba(255, 193, 7, 0.9), rgba(255, 143, 0, 0.9));
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0;
    transition: all 0.3s ease;
}

.team-card:hover .team-overlay {
    opacity: 1;
}

.team-social {
    display: flex;
    gap: 1rem;
}

.social-link {
    width: 40px;
    height: 40px;
    background: white;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #ffc107;
    text-decoration: none;
    transition: all 0.3s ease;
}

.social-link:hover {
    transform: scale(1.1);
    color: #ff8f00;
}

.team-content {
    padding: 2rem;
}

.team-name {
    font-size: 1.3rem;
    font-weight: 700;
    color: #333;
    margin-bottom: 0.5rem;
}

.team-position {
    color: #ffc107;
    font-weight: 600;
    margin-bottom: 1rem;
}

.team-experience {
    color: #666;
    font-size: 0.9rem;
    margin-bottom: 1rem;
}

.team-specialties {
    display: flex;
    flex-wrap: wrap;
    gap: 0.5rem;
}

.specialty-tag {
    background: rgba(255, 193, 7, 0.1);
    color: #ffc107;
    padding: 0.25rem 0.75rem;
    border-radius: 15px;
    font-size: 0.8rem;
    font-weight: 500;
}

/* Certifications Section */
.certifications-section {
    padding: 6rem 0;
}

.cert-card {
    text-align: center;
    padding: 2rem;
}

.cert-icon {
    width: 80px;
    height: 80px;
    border-radius: 50%;
    background: linear-gradient(135deg, #ffc107, #ff8f00);
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 1.5rem;
    font-size: 2rem;
    color: white;
}

.cert-name {
    font-size: 1.3rem;
    font-weight: 700;
    color: white;
    margin-bottom: 1rem;
}

.cert-description {
    color: rgba(255, 255, 255, 0.8);
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