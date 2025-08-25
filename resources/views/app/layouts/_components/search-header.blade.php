<div class="mb-2">
    <div class="text-center">
        <h1 class="display-5 fw-bold text-dark mb-3">{{ $titulo }}</h1>
        <div class="mx-auto" style="width: 100px; height: 4px; background: linear-gradient(45deg, #6366f1, #8b5cf6, #ec4899); border-radius: 2px;"></div>
    </div>
</div>

<div class="card shadow-sm border-0 mb-4">
    <div class="card-body py-4">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="d-flex flex-column flex-lg-row align-items-stretch gap-3">
                    <div class="flex-grow-1 m-auto">
                        <form action="{{ $rota_pesquisa }}" method="GET">
                            <div class="input-group input-group-lg">
                                <span class="input-group-text bg-white border-end-0" style="border-color: #e2e8f0;">
                                    <i class="bi bi-search text-muted"></i>
                                </span>
                                <input type="text" 
                                       id="buscar" 
                                       name="buscar" 
                                       class="form-control border-start-0 shadow-sm" 
                                       placeholder="{{ $placeholder }}" 
                                       value="{{ request('buscar') }}"
                                       style="border-color: #e2e8f0; font-size: 1rem;">
                                <button type="submit" class="btn btn-primary px-4 shadow-sm" style="background: linear-gradient(45deg, #6366f1, #8b5cf6); border: none;">
                                    <i class="bi bi-search me-2"></i>Pesquisar
                                </button>
                            </div>
                        </form>
                    </div>
                    
                    <!-- Botão de adicionar -->
                    @if(isset($rota_criar))
                        <div class="d-flex justify-content-center justify-content-lg-end">
                            <a href="{{ $rota_criar }}" 
                               class="btn btn-success btn-lg px-4 py-3 shadow-sm d-flex align-items-center gap-2"
                               style="background: linear-gradient(45deg, #10b981, #059669); border: none; border-radius: 12px; min-width: 200px; justify-content: center;">
                                <i class="bi bi-plus-circle-fill fs-5"></i>
                                <span class="fw-semibold">{{ $texto_btn }}</span>
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>