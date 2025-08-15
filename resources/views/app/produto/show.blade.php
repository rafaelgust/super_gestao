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
                <div class="mb-3">
                    <label class="form-label fw-bold">Nome do Produto:</label>
                    <div class="form-control-plaintext">{{ $produto->nome }}</div>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">Descrição:</label>
                    <div class="form-control-plaintext">{{ $produto->descricao }}</div>
                </div>
                <div class="mb-3 text-center">
                    <label class="form-label fw-bold">Imagem:</label>
                    <br>
                    @if($produto->imagem)
                        <div class="p-2 border rounded bg-light d-inline-block shadow-sm">
                            <img src="{{ asset('storage/' . $produto->imagem) }}" alt="Imagem do Produto" class="img-fluid rounded" style="max-width: 250px; max-height: 250px; object-fit: cover;" />
                        </div>
                    @else
                        <div class="text-muted fst-italic mt-2">Nenhuma imagem cadastrada.</div>
                    @endif
                </div>
                <div>
                    <h5>Detalhes do Produto:</h5>
                    <ul class="list-unstyled">
                        <li>
                            Peso: {{ optional($produto->detalhes)->peso ?? '---' }} kg
                        </li>
                        <li>
                            Dimensões: 
                            {{ optional($produto->detalhes)->altura ?? '---' }} x 
                            {{ optional($produto->detalhes)->largura ?? '---' }} x 
                            {{ optional($produto->detalhes)->comprimento ?? '---' }} cm
                        </li>
                    </ul>
                </div>
                <div class="d-flex justify-content-between mt-4">
                    <a href="{{ route('produto.edit', $produto->id) }}" class="btn btn-primary">Editar</a>
                    <form action="{{ route('produto.destroy', $produto->id) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja apagar este produto?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Apagar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection