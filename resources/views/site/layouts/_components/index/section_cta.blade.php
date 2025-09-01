<style>
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
</style>

<section class="cta-section py-5 bg-gradient">
    <div class="container text-center">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <h2 class="cta-title mb-4">{{ $componentes->where('tipo', 'index_section_cta')->first()->titulo ?? '' }}</h2>
                <p class="cta-subtitle mb-4">
                    {{ $componentes->where('tipo', 'index_section_cta')->first()->valor ?? '' }}
                </p>
                <div class="cta-actions">
                    <a href="#orcamento" class="btn btn-dark btn-lg me-3">
                        <i class="bi bi-calculator me-2"></i>Calcular Economia
                    </a>
                    <a href="tel:+55{{ session('site_informacoes')['telefone_contato'] ?? '' }}" class="btn btn-outline-dark btn-lg">
                        <i class="bi bi-telephone-fill me-2"></i>Ligar Agora
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>