@extends('app.layouts.app')

@section('titulo', 'Produtos')
<style>
    .product-card {
        border-radius: 16px;
        overflow: hidden;
        transition: all 0.3s ease;
        max-width: 320px;
        background: #fff;
        border: 1px solid #eee;
    }

    .product-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
    }

    #search {
        border-radius: 20px;
        padding: 10px 20px;
        border: 1px solid #ddd;
        box-shadow: none;
    }

    .produtos-container {
        display: flex;
        flex-wrap: wrap;
        gap: 30px;
        align-items: center;
        justify-content: center;
        align-content: flex-start;
    }

    .produtos-container .col-md-3 {
        display: flex;
        justify-content: center;
        height: 500px;
        width: 230px;
    }

    .controladores-container {
        padding-top: 10px;
        padding-bottom: 10px;
    }
</style>

@section('conteudo')
    <div class="container">
        @component('app.layouts._components.search-header', [
            'titulo' => 'Catálogo de Produtos',
            'rota_criar' => route('produto.create'),
            'texto_btn' => 'Adicionar Produto'
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
            <table id="produtos-table" style="display:none;">
                <thead>
                    <tr><th>Nome</th></tr>
                </thead>
            </table>
            <div class="d-flex justify-content-between gap-3">
                <select id="status-select" class="form-select mb-4">
                    <option value="">Selecione um status</option>
                    <option value="ativo">Ativo</option>
                    <option value="inativo">Inativo</option>
                </select>
                <select id="estoque-select" class="form-select mb-4">
                    <option value="">Selecione uma situação de estoque</option>
                    <option value="em_estoque">Em Estoque</option>
                    <option value="fora_estoque">Fora de Estoque</option>
                </select>
                <select id="filial-select" class="form-select mb-4">
                    <option value="">Selecione uma filial</option>
                    @foreach($filiais as $filial)
                        <option value="{{ $filial->id }}">{{ $filial->nome }}</option>
                    @endforeach
                </select>
            </div>
            <input type="text" id="search" class="form-control mb-4" placeholder="Digite para buscar...">
            <div class="controladores-container dataTables_wrapper no-footer">
                <div id="length-container"></div>
                <div id="pagination-container-top"></div>
            </div>
            <div class="produtos-container" id="produtos-container"></div>
            <div class="controladores-container dataTables_wrapper no-footer">
                <div id="info-container"></div>
                <div id="pagination-container-bottom"></div>
            </div>
        </div>
    </div>
<script>
  $(document).ready(function() {
    const produtos = @json($produtos);

    var table = $('#produtos-table').DataTable({
        data: produtos,
        dom: 'lrtip',
        paging: true,
        searching: true,
        info: true,
        lengthMenu: [5, 10, 25, 50],
        columns: [{ data: "nome" }],
        initComplete: function () {
            $('#length-container').append($(this.api().table().container()).find('.dataTables_length'));
            $('#info-container').append($(this.api().table().container()).find('.dataTables_info'));
            // Adiciona a paginação no topo e no rodapé
            const $paginate = $(this.api().table().container()).find('.dataTables_paginate');
            $('#pagination-container-top').append($paginate);
            $('#pagination-container-bottom').append($paginate.clone(true));
        }
    });

    table.on('draw', function () {
        var data = table.rows({ page: 'current' }).data();
        var container = $('#produtos-container').empty();

        $.each(data, function(i, row) {
            let quantidade = row.quantidade ?? 0;
            let statusBadge = quantidade > 0 
                ? `<span class="badge bg-success">${quantidade} em estoque</span>`
                : `<span class="badge bg-danger">Fora de estoque</span>`;

            container.append(`
                <div class="col-md-3">
                    <div class="card h-100 shadow-sm product-card mx-auto">
                        <img src="/storage/${row.imagem}" class="card-img-top p-3" style="object-fit:contain; height:220px;">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title text-truncate" style="display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden;">${row.nome}</h5>
                            <p class="card-text text-muted small flex-grow-1" style="display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden;">${row.descricao ?? 'Sem descrição'}</p>
                            <div class="d-flex justify-content-between align-items-center mt-3">
                                <span class="fw-bold fs-5 text-primary">${row.valor_venda ?? '0.00'}</span>
                                ${statusBadge}
                            </div>
                            <div class="d-grid gap-2 mt-3">
                                <a href="/produto/${row.id}" class="btn btn-outline-primary">Detalhes</a>
                                <a href="/produto/${row.id}/edit" class="btn btn-warning text-white">Editar</a>
                            </div>
                        </div>
                    </div>
                </div>
            `);
        });

        // Atualiza a paginação inferior sempre que a tabela for redesenhada
        const $paginate = $('#pagination-container-top').find('.dataTables_paginate');
        $('#pagination-container-bottom').empty().append($paginate.clone(true));
    });

    $('#search').on('keyup', function () {
        table.search(this.value).draw();
    });

    table.draw();
});
</script>
@endsection