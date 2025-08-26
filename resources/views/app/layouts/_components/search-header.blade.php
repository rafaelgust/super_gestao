<div class="card shadow-sm border-0 mb-4">
    <div class="card-body py-4">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h1 class="display-5 fw-bold text-dark mb-3 text-start">{{ $titulo }}</h1>
                <div class="mt-2" style="width: 100px; height: 4px; background: linear-gradient(45deg, #6366f1, #8b5cf6, #ec4899); border-radius: 2px;"></div>
            </div>
            @if(isset($rota_criar))
                <div class="col-md-6 text-end">
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
