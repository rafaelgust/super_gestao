<div class="mb-4">
    <div class="col text-center">
        <h2 class="fw-bold text-primary">{{ $titulo }}</h2>
        <hr class="w-25 mx-auto mb-0" style="height:3px; background: linear-gradient(90deg, #0d6efd 60%, #198754 100%); border:0;">
    </div>
</div>
<div class="row mb-4 justify-content-center">
    <div class="col-md-10 d-flex flex-column flex-md-row align-items-center justify-content-between gap-3">
        <form action="{{ $rota_pesquisa }}" method="GET" class="flex-grow-1 w-100">
            <div class="input-group">
            <input type="text" id="buscar" name="buscar" class="form-control rounded-start-pill" placeholder="{{ $placeholder }}" value="{{ request('buscar') }}">
            <button type="submit" class="btn btn-primary rounded-end-pill px-4">
                <i class="bi bi-search"></i> Pesquisar
            </button>
            </div>
        </form>
        @if(isset($rota_criar))
            <a href="{{ $rota_criar }}" class="btn btn-success d-flex align-items-center gap-2 shadow-sm px-4 py-2 rounded-pill" style="min-width: 240px;display: flex;justify-content: space-evenly;align-items: center;">
                <i class="bi bi-plus-circle"></i> {{ $texto_btn }}
            </a>
        @endif
    </div>
</div>