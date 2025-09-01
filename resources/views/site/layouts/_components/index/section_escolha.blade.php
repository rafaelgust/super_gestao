<style>
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
</style>

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