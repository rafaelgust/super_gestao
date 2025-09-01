@php
    $site_informacoes = session('site_informacoes');
@endphp

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>{{ $site_informacoes['nome'] ?? '' }} @yield('titulo')</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="{{ $site_informacoes['descricao'] ?? '' }}">
        <meta name="keywords" content="{{ $site_informacoes['keywords'] ?? '' }}">
        
        <!-- Favicon -->
        <link rel="icon" type="image/x-icon" href="{{ asset('img/favicon.ico') }}">
        
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
        
        <!-- AOS Animation Library -->
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
        
        <!-- Scripts -->
        @vite(['resources/sass/app.scss', 'resources/js/app.js'])
        
        <!-- Custom Styles -->
        <style>
            body {
                font-family: 'Inter', sans-serif;
                line-height: 1.6;
                color: #333;
                overflow-x: hidden;
            }
            
            /* Smooth scrolling */
            html {
                scroll-behavior: smooth;
                overflow-x: hidden;
            }
            
            /* Custom scrollbar */
            ::-webkit-scrollbar {
                width: 8px;
            }
            
            ::-webkit-scrollbar-track {
                background: #f1f1f1;
            }
            
            ::-webkit-scrollbar-thumb {
                background: #ffc107;
                border-radius: 4px;
            }
            
            ::-webkit-scrollbar-thumb:hover {
                background: #ff8f00;
            }
            
            /* Loading Animation */
            .page-loader {
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: linear-gradient(135deg, #1e3c72 0%, #2a5298 50%, #ffc107 100%);
                display: flex;
                justify-content: center;
                align-items: center;
                z-index: 9999;
                transition: opacity 0.5s ease;
            }
            
            .loader-content {
                text-align: center;
                color: white;
            }
            
            .loader-icon {
                width: 60px;
                height: 60px;
                border: 4px solid rgba(255, 255, 255, 0.3);
                border-radius: 50%;
                border-top-color: #ffc107;
                animation: spin 1s ease-in-out infinite;
                margin: 0 auto 1rem;
            }
            
            @keyframes spin {
                to { transform: rotate(360deg); }
            }
            
            .loader-text {
                font-size: 1.2rem;
                font-weight: 600;
                margin-top: 1rem;
            }
            
            /* Hide loader when page is loaded */
            .loaded .page-loader {
                opacity: 0;
                pointer-events: none;
            }
            
            /* Navbar improvements */
            .navbar {
                transition: all 0.3s ease;
                backdrop-filter: blur(10px);
            }
            
            .navbar.scrolled {
                background: rgba(255, 255, 255, 0.95) !important;
                box-shadow: 0 2px 20px rgba(0, 0, 0, 0.1);
            }
            
            /* Utility classes */
            .bg-gradient {
                background: linear-gradient(135deg, #ffc107 0%, #ff8f00 100%);
            }
            
            /* Button hover effects */
            .btn {
                transition: all 0.3s ease;
                border-radius: 10px;
                font-weight: 600;
            }
            
            .btn:hover {
                transform: translateY(-2px);
                box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            }
            
            /* Card animations */
            .card {
                transition: all 0.3s ease;
                border: none;
                box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
            }
            
            .card:hover {
                transform: translateY(-5px);
                box-shadow: 0 15px 35px rgba(0, 0, 0, 0.15);
            }

            /* Responsive fixes for small devices */
            @media (max-width: 575.98px) {
                .container, .container-fluid {
                    padding-left: 10px;
                    padding-right: 10px;
                }
                
                .row {
                    margin-left: -5px;
                    margin-right: -5px;
                }
                
                .row > * {
                    padding-left: 5px;
                    padding-right: 5px;
                }
            }
        </style>
    </head>
    
    <body>
        <!-- Page Loader -->
        <div class="page-loader">
            <div class="loader-content">
                <div class="loader-icon"></div>
                <div class="loader-text">{{ $site_informacoes['nome'] }}</div>
            </div>
        </div>
        
        @include('site.layouts._partials.topo')
        
        <main>
            @yield('conteudo')
        </main>
        
        @include('site.layouts._partials.rodape')
        
        <!-- AOS Animation Script -->
        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        
        <!-- Custom Scripts -->
        <script>
            // Initialize AOS
            AOS.init({
                duration: 800,
                easing: 'ease-in-out',
                once: true,
                offset: 100
            });
            
            // Page loader
            window.addEventListener('load', function() {
                document.body.classList.add('loaded');
            });
            
            // Navbar scroll effect
            window.addEventListener('scroll', function() {
                const navbar = document.querySelector('.navbar');
                if (window.scrollY > 50) {
                    navbar.classList.add('scrolled');
                } else {
                    navbar.classList.remove('scrolled');
                }
            });
            
            // Smooth scroll for anchor links
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function (e) {
                    e.preventDefault();
                    const target = document.querySelector(this.getAttribute('href'));
                    if (target) {
                        target.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });
                    }
                });
            });
            
            // Form validation improvements
            const forms = document.querySelectorAll('form');
            forms.forEach(form => {
                form.addEventListener('submit', function(e) {
                    const submitBtn = form.querySelector('button[type="submit"]');
                    if (submitBtn) {
                        submitBtn.innerHTML = '<i class="bi bi-hourglass-split me-2"></i>Enviando...';
                        submitBtn.disabled = true;
                    }
                });
            });
            
            // Add interactive elements
            const interactiveElements = document.querySelectorAll('.service-card, .benefit-card, .advantage-item');
            interactiveElements.forEach(element => {
                element.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateY(-5px)';
                });
                
                element.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateY(0)';
                });
            });
        </script>
    </body>
</html>