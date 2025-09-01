<style>
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
</style>

<section class="benefits-section py-5 bg-dark text-white">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-title text-white mb-3">{{ $componentes->where('tipo', 'index_section_beneficio')->first()->titulo ?? '' }}</h2>
            <p class="section-subtitle text-light">{{ $componentes->where('tipo', 'index_section_beneficio')->first()->valor ?? '' }}</p>
        </div>
        <div class="row g-4">
            @foreach ($componentes->where('tipo', 'index_section_beneficio_itens')->sortBy('ordem') as $item)
            <div class="col-lg-4 col-md-6">
                <div class="benefit-card">
                    <div class="benefit-icon" style="background-color: {{ $item['cor'] ?? '#28a745' }}">
                        <i class="{{ $item['icone'] }}"></i>
                    </div>
                    <h4 class="benefit-title">{{ $item['titulo'] }}</h4>
                    <p class="benefit-description">{{ $item['valor'] }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
