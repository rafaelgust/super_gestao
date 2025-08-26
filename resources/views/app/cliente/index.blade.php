@extends('app.layouts.app')

@section('titulo', 'Clientes')

@section('conteudo')
    <div class="container">
        @component('app.layouts._components.search-header', [
            'titulo' => 'Clientes',
            'placeholder' => 'Buscar cliente...',
            'rota_pesquisa' => route('cliente.index'),
            'rota_criar' => route('cliente.create'),
            'texto_btn' => 'Adicionar Cliente'
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
                        <table id="cliente-tabela" class="table table-striped table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>
                                        <i class="bi bi-person-fill me-2"></i>Nome
                                    </th>
                                    <th>
                                        <i class="bi bi-card-text me-2"></i>CPF
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
            url: '/cliente/lista',
            tbodySelector: '#cliente-tabela tbody',
            colunas: [
                { data: 'nome', title: 'Nome' },
                { data: 'cpf', title: 'CPF' },
                { data: 'email', title: 'Email' },
                { data: 'telefone', title: 'Telefone' },
                { 
                    data: 'id', 
                    title: 'Ações', 
                    render: function(data, type, row) {
                        return `
                            <div class="d-flex justify-content-center gap-2">
                                <a href="/cliente/${data}" 
                                   class="btn btn-outline-info btn-sm" 
                                   style="border-radius: 8px;"
                                   data-bs-toggle="tooltip" 
                                   title="Visualizar cliente">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a href="/cliente/${data}/edit" 
                                   class="btn btn-outline-warning btn-sm" 
                                   style="border-radius: 8px;"
                                   data-bs-toggle="tooltip" 
                                   title="Editar cliente">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <a href="/venda/create?clienteId=${data}" 
                                   class="btn btn-success btn-sm" 
                                   style="border-radius: 8px; background: linear-gradient(45deg, #10b981, #059669); border: none;"
                                   data-bs-toggle="tooltip" 
                                   title="Nova venda">
                                    <i class="bi bi-cart-plus"></i>
                                </a>
                            </div>
                        `;
                    }
                }
            ],
            language: {
                emptyTable: "Nenhum cliente encontrado."
            }
        });
    });
</script>
