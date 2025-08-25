@extends('app.layouts.app')

@section('titulo', 'Produtos')

@section('conteudo')
    <div class="container">
        @component('app.layouts._components.search-header', [
            'titulo' => 'Produtos',
            'placeholder' => 'Buscar produto...',
            'rota_pesquisa' => route('produto.index'),
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
        @empty($produtos)
            <div class="row justify-content-center mt-4">
                <div class="col-12">
                    <div class="card border-0 shadow-sm" style="background: linear-gradient(135deg, #fef3c7, #fde68a); border-radius: 16px;">
                        <div class="card-body text-center py-5">
                            <i class="bi bi-box-seam display-1 text-warning mb-3"></i>
                            <h5 class="text-dark mb-2">Nenhum produto encontrado</h5>
                            <p class="text-muted mb-0">Adicione produtos ao seu catálogo</p>
                        </div>
                    </div>
                </div>
            </div>
        @else
        <div class="row justify-content-center mt-4">
            <div class="col-12">
                <div class="row g-4">
                    @foreach ($produtos as $produto)
                        <div class="col-lg-6 col-xl-4">
                            <div class="card border-0 shadow-sm h-100" style="border-radius: 16px; overflow: hidden; transition: all 0.3s ease;">
                                <!-- Imagem do produto -->
                                <div class="card-img-top position-relative" style="height: 200px; background: linear-gradient(135deg, #f8fafc, #e2e8f0);">
                                    @if($produto->imagem)
                                        <img src="{{ asset('storage/' . $produto->imagem) }}" 
                                             alt="{{ $produto->nome }}" 
                                             class="w-100 h-100" 
                                             style="object-fit: cover;">
                                    @else
                                        <div class="d-flex align-items-center justify-content-center h-100">
                                            <i class="bi bi-image display-4 text-muted"></i>
                                        </div>
                                    @endif
                                    
                                    <!-- Badge de status -->
                                    <div class="position-absolute top-0 end-0 m-3">
                                        <span class="badge {{ $produto->status == 'ativo' ? 'bg-success' : 'bg-secondary' }} px-3 py-2" style="border-radius: 12px;">
                                            {{ $produto->status == '1' ? 'Ativo' : 'Inativo' }}
                                        </span>
                                    </div>
                                </div>
                                
                                <!-- Conteúdo do card -->
                                <div class="card-body d-flex flex-column">
                                    <h5 class="card-title fw-bold text-dark mb-2">{{ $produto->nome }}</h5>
                                    <p class="card-text text-muted mb-3 flex-grow-1" style="font-size: 0.9rem;">
                                        {{ Str::limit($produto->descricao, 80) }}
                                    </p>
                                    
                                    <!-- Botões de ação -->
                                    <div class="d-flex gap-2 mt-auto">
                                        <a href="{{ route('produto.show', $produto->id) }}" 
                                           class="btn btn-outline-info btn-sm flex-fill" 
                                           style="border-radius: 8px;"
                                           data-bs-toggle="tooltip" 
                                           title="Visualizar produto">
                                            <i class="bi bi-eye me-1"></i>Ver
                                        </a>
                                        <a href="{{ route('produto.edit', $produto->id) }}" 
                                           class="btn btn-warning btn-sm flex-fill" 
                                           style="border-radius: 8px; background: linear-gradient(45deg, #f59e0b, #d97706); border: none; color: white;"
                                           data-bs-toggle="tooltip" 
                                           title="Editar produto">
                                            <i class="bi bi-pencil me-1"></i>Editar
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                
                <!-- Paginação -->
                @if($produtos->hasPages())
                    <div class="d-flex justify-content-center mt-5">
                        <div class="card border-0 shadow-sm" style="border-radius: 12px;">
                            <div class="card-body py-3">
                                @if(request()->has('buscar'))
                                    {{ $produtos->appends(['buscar' => request('buscar'), 'page' => $produtos->currentPage()])->links('pagination::bootstrap-5') }}
                                @else
                                    {{ $produtos->links('pagination::bootstrap-5') }}
                                @endif
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
        
        @endif
    </div>
@endsection