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
