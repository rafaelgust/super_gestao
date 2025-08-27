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
            <div id="lista-card-produtos"></div>
        </div>
    </div>
<script>
function DataCardTable(data, renderCard, containerId) {
    const container = document.getElementById(containerId);

    const tableElement = document.createElement('table');
    tableElement.id = 'data-table';
    tableElement.style.display = 'none';
    const thead = document.createElement('thead');
    const tr = document.createElement('tr');
    const th = document.createElement('th');
    th.textContent = 'Item';
    tr.appendChild(th);
    thead.appendChild(tr);
    tableElement.appendChild(thead);
    container.appendChild(tableElement);

    const inputSearch = document.createElement('input');
    inputSearch.type = 'text';
    inputSearch.id = 'search-input';
    inputSearch.className = 'form-control mb-4';
    inputSearch.placeholder = 'Digite para buscar...';
    container.appendChild(inputSearch);

    const topControls = document.createElement('div');
    topControls.className = 'controls-container dataTables_wrapper no-footer';
    const lengthContainer = document.createElement('div');
    lengthContainer.id = 'length-container';
    topControls.appendChild(lengthContainer);
    const paginationTop = document.createElement('div');
    paginationTop.id = 'pagination-top';
    topControls.appendChild(paginationTop);
    container.appendChild(topControls);

    const itemsContainer = document.createElement('div');
    itemsContainer.id = 'items-container';
    itemsContainer.style.display = 'flex';
    itemsContainer.style.flexWrap = 'wrap';
    itemsContainer.style.gap = '30px';
    itemsContainer.style.alignItems = 'center';
    itemsContainer.style.justifyContent = 'center';
    itemsContainer.style.alignContent = 'flex-start';
    container.appendChild(itemsContainer);

    const bottomControls = document.createElement('div');
    bottomControls.className = 'controls-container dataTables_wrapper no-footer';
    const infoContainer = document.createElement('div');
    infoContainer.id = 'info-container';
    bottomControls.appendChild(infoContainer);
    const paginationBottom = document.createElement('div');
    paginationBottom.id = 'pagination-bottom';
    bottomControls.appendChild(paginationBottom);
    container.appendChild(bottomControls);

    var table = $('#data-table').DataTable({
        data: data,
        dom: 'lrtip',
        paging: true,
        searching: true,
        info: true,
        lengthMenu: [5, 10, 25, 50],
        columns: [{ data: "nome" }],
        initComplete: function () {
            $('#length-container').append($(this.api().table().container()).find('.dataTables_length'));
            $('#info-container').append($(this.api().table().container()).find('.dataTables_info'));

            const $paginate = $(this.api().table().container()).find('.dataTables_paginate');
            $('#pagination-top').append($paginate);
            $('#pagination-bottom').append($paginate.clone(true));
        }
    });

    table.on('draw', function () {
        var data = table.rows({ page: 'current' }).data();
        var container = $('#items-container').empty();

        $.each(data, function (i, row) {
            let card = renderCard(row);
            container.append(card);
        });

        const $paginate = $('#pagination-top').find('.dataTables_paginate');
        $('#pagination-bottom').empty().append($paginate.clone(true));
    });

    $('#search-input').on('keyup', function () {
        table.search(this.value).draw();
    });

    table.draw();
}
$(document).ready(function() {
    const produtos = @json($produtos);

    function renderCard(row) {
        let quantidade = row.quantidade ?? 0;
        let statusBadge = quantidade > 0
            ? `<span class="badge bg-success">${row.quantidade ?? 0} em estoque</span>`
            : `<span class="badge bg-danger">Fora de estoque</span>`;

        return `
            <div class="col-md-2">
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
        `;
    }

    DataCardTable(produtos, renderCard, "lista-card-produtos");

});
</script>
@endsection