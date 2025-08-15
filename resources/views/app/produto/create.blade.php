@extends('app.layouts.app')

@section('titulo', 'Produto')

@section('conteudo')
    <div class="container my-4">
        <div class="row mb-4">
            <div class="col text-center">
                <h2>Produto</h2>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-4">
                <form method="post" action="{{ route('produto.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <input type="text" name="nome" class="form-control @error('nome') is-invalid @enderror" placeholder="Nome do Produto" value="{{ old('nome') }}">
                        @if ($errors->has('nome'))
                            <div class="error-form-contato">
                                {{ $errors->first('nome') }}
                            </div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <textarea name="descricao" class="form-control @error('descricao') is-invalid @enderror" placeholder="Descrição">{{ old('descricao') }}</textarea>
                        @if ($errors->has('descricao'))
                            <div class="error-form-contato">
                                {{ $errors->first('descricao') }}
                            </div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <input type="file" name="imagem" class="form-control @error('imagem') is-invalid @enderror" onchange="loadFile(event)">
                        @if ($errors->has('imagem'))
                            <div class="error-form-contato">
                                {{ $errors->first('imagem') }}
                            </div>
                        @endif
                    </div>
                    <div class="mb-3 text-center">
                        <img id="img-preview" src="#" alt="Preview da Imagem" style="display:none;" />
                    </div>
                    <button type="submit" class="btn btn-success w-100">Cadastrar</button>
                </form>
            </div>
        </div>
    </div>
<script>
var loadFile = function(event) {
    var output = document.getElementById('img-preview');
    output.src = URL.createObjectURL(event.target.files[0]);
    output.style.display = 'block';
    output.onload = function() {
        URL.revokeObjectURL(output.src);
    }
};
</script>
@endsection