@extends('site.layouts.site')

@section('titulo', 'Energia Solar e Aquecedores')

@section('conteudo')

<!-- Hero Section -->
@include('site.layouts._components.index.section_cabecalho')

<!-- Services Section -->
@include('site.layouts._components.index.section_servicos')

<!-- Why Choose Us Section -->
@include('site.layouts._components.index.section_escolha')

<!-- Contact Section -->
@include('site.layouts._components.index.section_contato', ['motivo_contatos' => $motivo_contatos])

<!-- Benefits Section -->
@include('site.layouts._components.index.section_beneficios')

<!-- CTA Section -->
@include('site.layouts._components.index.section_cta')

<style>
/* Animations */
@keyframes bounce {
    0%, 20%, 50%, 80%, 100% {
        transform: translateY(0) translateX(-50%);
    }
    40% {
        transform: translateY(-30px) translateX(-50%);
    }
    60% {
        transform: translateY(-15px) translateX(-50%);
    }
}

/* Responsive Design */
@media (max-width: 768px) {
    .hero-title {
        font-size: 2.5rem;
    }
    
    .section-title {
        font-size: 2rem;
    }
    
    .hero-actions .btn {
        display: block;
        width: 100%;
        margin-bottom: 1rem;
    }
    
    .contact-btn {
        font-size: 0.9rem;
        padding: 0.6rem 1.2rem;
    }
    
    .content-block {
        padding-right: 0;
        margin-bottom: 3rem;
    }
    
    .contact-form-container {
        padding: 2rem;
    }
}

/* Smooth Scrolling */
html {
    scroll-behavior: smooth;
}

/* Form Styles */
.form-control, .form-select {
    border: 2px solid #e9ecef;
    border-radius: 10px;
    padding: 0.75rem 1rem;
    transition: all 0.3s ease;
}

.form-control:focus, .form-select:focus {
    border-color: #ffc107;
    box-shadow: 0 0 0 0.2rem rgba(255, 193, 7, 0.25);
}

.btn-primary {
    background: linear-gradient(135deg, #ffc107, #ff8f00);
    border: none;
    border-radius: 10px;
    padding: 0.75rem 2rem;
    font-weight: 600;
    transition: all 0.3s ease;
}

.btn-primary:hover {
    background: linear-gradient(135deg, #ff8f00, #f57c00);
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(255, 193, 7, 0.4);
}
</style>
@endsection
