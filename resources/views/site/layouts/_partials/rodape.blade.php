<footer class="bg-dark text-white">
    <div class="container p-4">
        <div class="row my-4">

            <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                <div class="rounded-circle bg-warning bg-gradient d-flex align-items-center justify-content-center mb-4 mx-auto" style="width: 100px; height: 100px;">
                    <i class="bi bi-sun-fill text-white" style="font-size: 2.5rem;"></i>
                </div>
                <p class="text-center fw-bold text-warning fs-5">R&S Energia Solar</p>
                <p class="text-muted text-center">Transformando luz solar em economia para você.</p>
            </div>

            <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                <h5 class="text-uppercase mb-4 text-warning">Serviços</h5>
                <ul class="list-unstyled">
                    <li class="mb-2"><a href="{{ route('site.sobre-nos') }}" class="text-light text-decoration-none hover-link">Placas Solares</a></li>
                    <li class="mb-2"><a href="{{ route('site.sobre-nos') }}" class="text-light text-decoration-none hover-link">Aquecedores Solares</a></li>
                    <li class="mb-2"><a href="{{ route('site.contato') }}" class="text-light text-decoration-none hover-link">Instalação</a></li>
                    <li class="mb-2"><a href="{{ route('site.contato') }}" class="text-light text-decoration-none hover-link">Manutenção</a></li>
                </ul>
            </div>

            <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                <h5 class="text-uppercase mb-4 text-warning">Contato</h5>
                <ul class="list-unstyled">
                    <li class="mb-2"><p><i class="bi bi-geo-alt-fill pe-2 text-warning"></i>São Paulo, SP, Brasil</p></li>
                    <li class="mb-2"><p><i class="bi bi-telephone-fill pe-2 text-warning"></i>(11) 9999-8888</p></li>
                    <li class="mb-2"><p><i class="bi bi-envelope-fill pe-2 text-warning"></i>contato@rs-energia.com.br</p></li>
                    <li class="mb-2"><p><i class="bi bi-clock-fill pe-2 text-warning"></i>Seg a Sex: 8h às 18h</p></li>
                </ul>
            </div>

            <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                <h5 class="text-uppercase mb-4 text-warning">Siga-nos</h5>
                <div class="mt-4 d-flex justify-content-center justify-content-lg-start gap-3">
                    <a href="#" class="btn btn-warning btn-floating" role="button"><i class="bi bi-facebook"></i></a>
                    <a href="#" class="btn btn-warning btn-floating" role="button"><i class="bi bi-linkedin"></i></a>
                    <a href="#" class="btn btn-warning btn-floating" role="button"><i class="bi bi-youtube"></i></a>
                    <a href="#" class="btn btn-warning btn-floating" role="button"><i class="bi bi-instagram"></i></a>
                </div>
                <div class="mt-3">
                    <small class="text-muted">Acompanhe nossos projetos e dicas de energia sustentável</small>
                </div>
            </div>
            
        </div>
    </div>

    <div class="text-center p-3 bg-black">
        © {{ date('Y') }} Copyright:
        <a class="text-warning fw-semibold text-decoration-none" href="/">R&S Energia Solar</a>
        - Todos os direitos reservados
    </div>
</footer>

<style>
.hover-link:hover {
    color: #ffc107 !important;
    transition: color 0.3s ease;
}
.btn-floating {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
}
</style>