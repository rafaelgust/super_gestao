<style>
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
</style>

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