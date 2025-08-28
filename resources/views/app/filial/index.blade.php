@extends('app.layouts.app')

@section('titulo', 'Filiais')

@section('conteudo')
    <div class="container">
        @component('app.layouts._components.search-header', [
            'titulo' => 'Filiais',
            'rota_criar' => route('filial.create'),
            'texto_btn' => 'Adicionar Filial'
        ])
        @endcomponent
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show shadow-sm border-0" role="alert" style="background: linear-gradient(45deg, #d1fae5, #a7f3d0); color: #065f46; border-radius: 12px;">
                        <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
            </div>
        </div>
        <div class="row justify-content-center mt-4">
            <div class="col-12">
                <div class="card border-0 shadow-sm" style="border-radius: 16px; overflow: hidden;">
                    <div class="table-responsive">
                        <table id="tabela-filiais" class="table table-hover align-middle mb-0">
                            <thead>
                                <tr>
                                    <th class="py-3 px-4 border-0">
                                        <i class="bi bi-geo-alt-fill me-2"></i>Nome da Filial
                                    </th>
                                    <th class="py-3 px-4 border-0 text-center">
                                        <i class="bi bi-gear-fill me-2"></i>Ações
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        carregarTabela({
            url: '/filial/lista',
            tbodySelector: '#tabela-filiais tbody',
            colunas: [
                { data: 'nome', title: 'Nome da Filial' },
                { data: 'id', title: 'Ações', render: function(data, type, row) {
                    return `
                        <div class="d-flex justify-content-center gap-2">
                            <a href="/filial/${data}" class="btn btn-outline-info btn-sm" style="border-radius: 8px;" data-bs-toggle="tooltip" title="Visualizar filial">
                                <i class="bi bi-eye"></i>
                            </a>
                            <a href="/filial/edit/${data}" class="btn btn-outline-warning btn-sm" style="border-radius: 8px;" data-bs-toggle="tooltip" title="Editar filial">
                                <i class="bi bi-pencil"></i>
                            </a>
                        </div>
                    `;
                }}
            ]
        });
    });
</script>
@endsection
