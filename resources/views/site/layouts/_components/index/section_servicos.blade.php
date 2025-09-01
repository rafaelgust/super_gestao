<style>
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
</style>

<section id="servicos" class="services-section py-5">
    <div class="container">
        <div class="section-header text-center">
            <h2 class="section-title pt-5">{{ $componentes->where('tipo', 'index_section_servico')->first()->titulo ?? '' }}</h2>
            <p class="section-subtitle">{{ $componentes->where('tipo', 'index_section_servico')->first()->valor ?? '' }}</p>
        </div>
        <div class="row g-4">
            @foreach ($componentes->where('tipo', 'index_section_servico_itens') as $servico)
            @php
                $itens = explode(',', $servico->valor);
            @endphp
            <div class="col-lg-6 col-xl-3">
                <div class="service-card" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                    <div class="service-icon" style="background-color: {{ $servico->cor ?? '#ffc107' }};">
                        <i class="bi {{ $servico->icone ?? '' }}"></i>
                    </div>
                    <h4 class="service-title">{{ $servico->titulo ?? '' }}</h4>
                    <p class="service-description">{{ $servico->descricao ?? '' }}</p>
                    <ul class="service-features">
                        @foreach($itens as $feature)
                        <li><i class="bi bi-check-circle-fill" style="color: {{ $servico->cor ?? '#ffc107' }};"></i> {{ $feature }}</li>
                        @endforeach
                    </ul>
                    <a href="{{ $servico->url ?? '#' }}" class="service-link">Saiba mais <i class="bi bi-arrow-right"></i></a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>