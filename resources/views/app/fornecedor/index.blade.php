@extends('app.layouts.app')

@section('titulo', 'Fornecedores')

@section('conteudo')
    <div class="container">
        @component('app.layouts._components.search-header', [
            'titulo' => 'Fornecedores',
            'placeholder' => 'Buscar fornecedor...',
            'rota_pesquisa' => route('fornecedor.index'),
            'rota_criar' => route('fornecedor.create'),
            'texto_btn' => 'Adicionar Fornecedor'
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
                <div class="card rounded">
                    <div class="table-responsive">
                        <table id="fornecedor-tabela" class="table table-striped table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>
                                        <i class="bi bi-building me-2"></i>Nome
                                    </th>
                                    <th>
                                        <i class="bi bi-card-text me-2"></i>CNPJ
                                    </th>
                                    <th>
                                        <i class="bi bi-envelope-fill me-2"></i>E-mail
                                    </th>
                                    <th>
                                        <i class="bi bi-telephone-fill me-2"></i>Telefone
                                    </th>
                                    <th>
                                        <i class="bi bi-gear-fill me-2"></i>Ações
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- Conteúdo dinâmico via JS --}}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>  
    </div>
@endsection
<script>
    document.addEventListener('DOMContentLoaded', function() {
        carregarTabela({
            url: '/fornecedor/lista',
            tbodySelector: '#fornecedor-tabela tbody',
            colunas: [
                { 
                    data: 'nome', 
                    title: 'Nome',
                    render: function(data, type, row) {
                        return `
                            <div class="d-flex align-items-center">
                                <div class="avatar-placeholder me-3" style="width: 40px; height: 40px; background: linear-gradient(45deg, #f97316, #ea580c); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; font-weight: bold;">
                                    ${data ? data.charAt(0).toUpperCase() : ''}
                                </div>
                                <span class="fw-semibold text-dark">${data}</span>
                            </div>
                        `;
                    }
                },
                { data: 'cnpj', title: 'CNPJ', render: function(data){ return `<span class="badge bg-light text-dark border" style="font-family: monospace;">${data}</span>`; } },
                { data: 'email', title: 'Email', render: function(data){ return `<span class="text-muted">${data}</span>`; } },
                { data: 'telefone', title: 'Telefone', render: function(data){ return `<span class="text-muted">${data}</span>`; } },
                { 
                    data: 'id', 
                    title: 'Ações', 
                    render: function(data, type, row) {
                        return `
                            <div class="d-flex justify-content-center gap-2">
                                <a href="/fornecedor/${data}" 
                                   class="btn btn-outline-info btn-sm" 
                                   style="border-radius: 8px;"
                                   data-bs-toggle="tooltip" 
                                   title="Visualizar fornecedor">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a href="/fornecedor/edit/${data}" 
                                   class="btn btn-outline-warning btn-sm" 
                                   style="border-radius: 8px;"
                                   data-bs-toggle="tooltip" 
                                   title="Editar fornecedor">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <a href="/pedido/compra/criar/${data}" 
                                   class="btn btn-success btn-sm" 
                                   style="border-radius: 8px; background: linear-gradient(45deg, #10b981, #059669); border: none;"
                                   data-bs-toggle="tooltip" 
                                   title="Nova compra">
                                    <i class="bi bi-cart-plus"></i>
                                </a>
                            </div>
                        `;
                    }
                }
            ],
            language: {
                emptyTable: "Nenhum fornecedor encontrado."
            }
        });
    });
</script>