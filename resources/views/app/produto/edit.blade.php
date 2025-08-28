@extends('app.layouts.app')

@section('titulo', 'Produto')

@section('conteudo')
    <div class="container my-4">
        <div class="row mb-4">
            <div class="col text-center">
                <h2 class="fw-bold">Editar Produto</h2>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                <form method="post" action="{{ route('produto.update', $produto->id) }}" enctype="multipart/form-data" class="shadow p-4 rounded bg-white">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="nome" class="form-label fw-semibold">Nome do Produto</label>
                        <input type="text" name="nome" id="nome" class="form-control @error('nome') is-invalid @enderror" placeholder="Digite o nome do produto" value="{{ old('nome', $produto->nome) }}">
                        @if ($errors->has('nome'))
                            <div class="text-danger small mt-1">
                                {{ $errors->first('nome') }}
                            </div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="descricao" class="form-label fw-semibold">Descrição</label>
                        <textarea name="descricao" id="descricao" class="form-control @error('descricao') is-invalid @enderror" placeholder="Digite a descrição do produto" rows="4">{{ old('descricao', $produto->descricao) }}</textarea>
                        @if ($errors->has('descricao'))
                            <div class="text-danger small mt-1">
                                {{ $errors->first('descricao') }}
                            </div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="imagem" class="form-label fw-semibold">Imagem do Produto</label>
                        <input type="file" name="imagem" id="imagem" class="form-control @error('imagem') is-invalid @enderror" onchange="loadFile(event)">
                        @if ($errors->has('imagem'))
                            <div class="text-danger small mt-1">
                                {{ $errors->first('imagem') }}
                            </div>
                        @endif
                    </div>
                    <div class="mb-3 text-center">
                        @if($produto->imagem)
                            <div class="p-2 border rounded bg-light d-inline-block shadow-sm mb-2">
                                <img id="img" src="{{ asset('storage/' . $produto->imagem) }}" alt="Imagem Atual" class="img-fluid rounded" style="max-width: 250px; max-height: 250px; object-fit: cover;" />
                            </div>
                        @endif
                    </div>
                    <div>
                        <h5 class="mb-3 fw-bold">Detalhes do Produto</h5>
                        @php
                            $detalhes = $produto->detalhes ?? null;
                        @endphp
                        @foreach(['peso' => 'Peso (KG)', 'largura' => 'Largura (CM)', 'altura' => 'Altura (CM)', 'comprimento' => 'Comprimento (CM)'] as $field => $label)
                            <div class="mb-3">
                                <label for="{{ $field }}" class="form-label fw-semibold">{{ $label }}</label>
                                <input
                                    type="number"
                                    step="0.01"
                                    min="0"
                                    max="99999999.99"
                                    name="{{ $field }}"
                                    id="{{ $field }}"
                                    class="form-control @error($field) is-invalid @enderror"
                                    value="{{ old($field, isset($detalhes->$field) ? number_format($detalhes->$field, 2, '.', '') : '') }}"
                                    placeholder="{{ $label }}"
                                >
                                @error($field)
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                        @endforeach
                    </div>
                    <button type="submit" class="btn btn-primary w-100 fw-bold">Atualizar Produto</button>
                </form>
            </div>
        </div>
    </div>
<script>
var loadFile = function(event) {
    var output = document.getElementById('img');
    output.src = URL.createObjectURL(event.target.files[0]);
    output.style.display = 'block';
    output.onload = function() {
        URL.revokeObjectURL(output.src);
    }
};
</script>
@endsection