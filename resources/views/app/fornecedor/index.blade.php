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
        @empty($fornecedores)
            <div class="row justify-content-center mt-4">
                <div class="col-12">
                    <div class="card border-0 shadow-sm" style="background: linear-gradient(135deg, #fef3c7, #fde68a); border-radius: 16px;">
                        <div class="card-body text-center py-5">
                            <i class="bi bi-building display-1 text-warning mb-3"></i>
                            <h5 class="text-dark mb-2">Nenhum fornecedor encontrado</h5>
                            <p class="text-muted mb-0">Cadastre fornecedores para começar a fazer compras</p>
                        </div>
                    </div>
                </div>
            </div>
        @else
        <div class="row justify-content-center mt-4">
            <div class="col-12">
                <div class="card border-0 shadow-sm" style="border-radius: 16px; overflow: hidden;">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead>
                                <tr>
                                    <th class="py-3 px-4 border-0">
                                        <i class="bi bi-building me-2"></i>Nome
                                    </th>
                                    <th class="py-3 px-4 border-0">
                                        <i class="bi bi-card-text me-2"></i>CNPJ
                                    </th>
                                    <th class="py-3 px-4 border-0">
                                        <i class="bi bi-envelope-fill me-2"></i>E-mail
                                    </th>
                                    <th class="py-3 px-4 border-0">
                                        <i class="bi bi-telephone-fill me-2"></i>Telefone
                                    </th>
                                    <th class="py-3 px-4 border-0 text-center">
                                        <i class="bi bi-gear-fill me-2"></i>Ações
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($fornecedores as $fornecedor)
                                <tr class="border-bottom" style="border-color: #f1f5f9 !important;">
                                    <td class="py-3 px-4">
                                        <div class="d-flex align-items-center">
                                            <div class="avatar-placeholder me-3" style="width: 40px; height: 40px; background: linear-gradient(45deg, #f97316, #ea580c); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; font-weight: bold;">
                                                {{ strtoupper(substr($fornecedor->nome, 0, 1)) }}
                                            </div>
                                            <span class="fw-semibold text-dark">{{ $fornecedor->nome }}</span>
                                        </div>
                                    </td>
                                    <td class="py-3 px-4">
                                        <span class="badge bg-light text-dark border" style="font-family: monospace;">{{ $fornecedor->cnpj }}</span>
                                    </td>
                                    <td class="py-3 px-4">
                                        <span class="text-muted">{{ $fornecedor->email }}</span>
                                    </td>
                                    <td class="py-3 px-4">
                                        <span class="text-muted">{{ $fornecedor->telefone }}</span>
                                    </td>
                                    <td class="py-3 px-4">
                                        <div class="d-flex justify-content-center gap-2">
                                            <a href="{{ route('fornecedor.show', $fornecedor->id) }}" 
                                               class="btn btn-outline-info btn-sm" 
                                               style="border-radius: 8px;"
                                               data-bs-toggle="tooltip" 
                                               title="Visualizar fornecedor">
                                                <i class="bi bi-eye"></i>
                                            </a>
                                            <a href="{{ route('fornecedor.edit', $fornecedor->id) }}" 
                                               class="btn btn-outline-warning btn-sm" 
                                               style="border-radius: 8px;"
                                               data-bs-toggle="tooltip" 
                                               title="Editar fornecedor">
                                                <i class="bi bi-pencil"></i>
                                            </a>
                                            <a href="{{ route('compra.create', ['fornecedorId' => $fornecedor->id]) }}" 
                                               class="btn btn-success btn-sm" 
                                               style="border-radius: 8px; background: linear-gradient(45deg, #10b981, #059669); border: none;"
                                               data-bs-toggle="tooltip" 
                                               title="Nova compra">
                                                <i class="bi bi-cart-plus"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    
                    <!-- Paginação -->
                    @if($fornecedores->hasPages())
                        <div class="card-footer bg-light border-0" style="border-radius: 0 0 16px 16px;">
                            <div class="d-flex justify-content-center">
                                @if(request()->has('buscar'))
                                    {{ $fornecedores->appends(['buscar' => request('buscar'), 'page' => $fornecedores->currentPage()])->links('pagination::bootstrap-5') }}
                                @else
                                    {{ $fornecedores->links('pagination::bootstrap-5') }}
                                @endif
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        
        @endif
    </div>
@endsection