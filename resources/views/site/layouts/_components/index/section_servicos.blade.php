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
            <h2 class="section-title pt-5">Nossos Serviços</h2>
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