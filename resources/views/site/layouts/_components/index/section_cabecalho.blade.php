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
    padding-top: 40px;
}

@media (min-width: 1350px) {
    .hero-content {
        padding-top: 0px;
    }
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
    margin-bottom: 20px
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
</style>
<section class="hero-section position-relative overflow-hidden">
    <div class="hero-bg"></div>
    <div class="container-fluid h-100">
        <div class="row h-100 align-items-center">
            <div class="col-lg-6 col-xl-5 offset-xl-1">
                <div class="hero-content">
                    <div class="badge-container mb-4">
                        <span class="hero-badge">
                            <i class="{{ $componentes->where('tipo', 'index_section_cabecalho_hero_badge')->first()->icone ?? '' }}"></i>
                            {{ $componentes->where('tipo', 'index_section_cabecalho_hero_badge')->first()->titulo ?? '' }}
                        </span>
                    </div>
                    <h1 class="hero-title">
                        <span class="brand-highlight">{{ session('site_informacoes')['nome'] ?? '' }}</span><br>
                        <span class="hero-subtitle">{{ session('site_informacoes')['descricao_area'] ?? '' }}</span>
                    </h1>
                    <p class="hero-description">
                        {!! session('site_informacoes')['descricao_html'] ?? '' !!}
                    </p>
                    <div class="hero-stats mb-4">
                        <div class="row g-3">
                            @foreach ($componentes->where('tipo', 'index_section_cabecalho_hero_itens')->sortBy('ordem') as $estatistica)
                                <div class="col-4">
                                    <div class="stat-item">
                                        <div class="stat-number">{{ $estatistica->valor ?? '' }}</div>
                                        <div class="stat-label">{{ $estatistica->titulo ?? '' }}</div>
                                    </div>
                                </div>
                            @endforeach
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
                        <img src="{{ asset($componentes->where('tipo', 'index_section_cabecalho_hero_imagem')->first()->valor ?? '') }}" alt="{{ $componentes->where('tipo', 'index_section_cabecalho_hero_imagem')->first()->titulo ?? '' }}" class="img-fluid">
                        <div class="floating-card">
                            <div class="card-icon">
                                <i class="{{ $componentes->where('tipo', 'index_section_cabecalho_hero_item_top')->first()->icone ?? '' }}"></i>
                            </div>
                            <div class="card-content">
                                <div class="card-number">{{ $componentes->where('tipo', 'index_section_cabecalho_hero_item_top')->first()->valor ?? '' }}</div>
                                <div class="card-text">{{ $componentes->where('tipo', 'index_section_cabecalho_hero_item_top')->first()->titulo ?? '' }}</div>
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