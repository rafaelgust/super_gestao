@extends('app.layouts.app')

@section('conteudo')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <h2 class="mb-4">Dashboard</h2>
        </div>
    </div>

    <!-- Cards de Estatísticas Principais -->
    <div class="row mb-4">
        <div class="col-md-3 col-sm-6 mb-3">
            <div class="card text-white bg-primary">
                <div class="card-header">
                    <i class="fas fa-building"></i> Filiais
                </div>
                <div class="card-body">
                    <h3 class="card-title">{{ $filiais ?? 0 }}</h3>
                    <p class="card-text">Total de filiais cadastradas</p>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 mb-3">
            <div class="card text-white bg-success">
                <div class="card-header">
                    <i class="fas fa-box"></i> Produtos
                </div>
                <div class="card-body">
                    <h3 class="card-title">{{ $produtos ?? 0 }}</h3>
                    <p class="card-text">Total de produtos cadastrados</p>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 mb-3">
            <div class="card text-white bg-info">
                <div class="card-header">
                    <i class="fas fa-users"></i> Clientes
                </div>
                <div class="card-body">
                    <h3 class="card-title">{{ $clientes ?? 0 }}</h3>
                    <p class="card-text">Total de clientes cadastrados</p>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 mb-3">
            <div class="card text-white bg-warning">
                <div class="card-header">
                    <i class="fas fa-truck"></i> Fornecedores
                </div>
                <div class="card-body">
                    <h3 class="card-title">{{ $fornecedores ?? 0 }}</h3>
                    <p class="card-text">Total de fornecedores cadastrados</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Seção de Pedidos -->
    <div class="row">
        <!-- Pedidos de Compra -->
        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-header bg-light">
                    <h5 class="mb-0">
                        <i class="fas fa-shopping-cart"></i> Pedidos de Compra
                    </h5>
                </div>
                <div class="card-body">
                    <div class="row text-center">
                        <div class="col-4">
                            <div class="border-right">
                                <h4 class="text-primary">{{ $pedidosCompra['criado'] ?? 0 }}</h4>
                                <small class="text-muted">Criado</small>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="border-right">
                                <h4 class="text-warning">{{ $pedidosCompra['aguardando'] ?? 0 }}</h4>
                                <small class="text-muted">Aguardando</small>
                            </div>
                        </div>
                        <div class="col-4">
                            <h4 class="text-success">{{ $pedidosCompra['entregue'] ?? 0 }}</h4>
                            <small class="text-muted">Entregue</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pedidos de Venda -->
        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-header bg-light">
                    <h5 class="mb-0">
                        <i class="fas fa-chart-line"></i> Pedidos de Venda
                    </h5>
                </div>
                <div class="card-body">
                    <div class="row text-center">
                        <div class="col-4">
                            <div class="border-right">
                                <h4 class="text-primary">{{ $pedidosVenda['criado'] ?? 0 }}</h4>
                                <small class="text-muted">Criado</small>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="border-right">
                                <h4 class="text-warning">{{ $pedidosVenda['aguardando'] ?? 0 }}</h4>
                                <small class="text-muted">Aguardando</small>
                            </div>
                        </div>
                        <div class="col-4">
                            <h4 class="text-success">{{ $pedidosVenda['entregue'] ?? 0 }}</h4>
                            <small class="text-muted">Entregue</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Gráfico de Compras vs Vendas -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-light">
                    <h5 class="mb-0">
                        <i class="fas fa-chart-bar"></i> Compras vs Vendas por Período (R$)
                    </h5>
                </div>
                <div class="card-body">
                    <canvas id="comprasVendasChart" width="400" height="100"></canvas>
                </div>
            </div>
        </div>
    </div>

    <!-- Container de Estoque -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-light">
                    <h5 class="mb-0">
                        <i class="fas fa-warehouse"></i> Situação do Estoque
                    </h5>
                </div>
                <div class="card-body">
                    <div class="row text-center">
                        <div class="col-md-3 col-sm-6 mb-3">
                            <div class="border-right">
                                <h4 class="text-success">{{ $estoque['disponivel'] ?? 0 }}</h4>
                                <small class="text-muted">Produtos Disponíveis</small>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 mb-3">
                            <div class="border-right">
                                <h4 class="text-warning">{{ $estoque['baixo'] ?? 0 }}</h4>
                                <small class="text-muted">Estoque Baixo</small>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 mb-3">
                            <div class="border-right">
                                <h4 class="text-danger">{{ $estoque['esgotado'] ?? 0 }}</h4>
                                <small class="text-muted">Esgotado</small>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 mb-3">
                            <h4 class="text-info">R$ {{ number_format(($estoque['valor_total'] ?? 0), 2, ',', '.') }}</h4>
                            <small class="text-muted">Valor Total em Estoque</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js@3.9.1"></script>
<script>
console.log('Iniciando carregamento do Chart.js');

document.addEventListener('DOMContentLoaded', function() {
    console.log('Script Chart.js carregado e DOM pronto.');

    const canvas = document.getElementById('comprasVendasChart');
    if (!canvas) {
        console.error('Elemento <canvas> com ID "comprasVendasChart" não encontrado.');
        return;
    }

    const ctx = canvas.getContext('2d');
    
    // Dados de exemplo - substitua pelos dados reais do controller
    const comprasData = {!! json_encode($graficoCompras ?? [45000, 52000, 38000, 67000, 54000, 71000]) !!};
    const vendasData = {!! json_encode($graficoVendas ?? [62000, 58000, 74000, 81000, 69000, 85000]) !!};
    const labels = {!! json_encode($graficoLabels ?? ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho']) !!};
    
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: 'Compras (R$)',
                data: comprasData,
                backgroundColor: 'rgba(255, 99, 132, 0.6)',
                borderColor: 'rgba(255, 99, 132, 1)',
                borderWidth: 1
            }, {
                label: 'Vendas (R$)',
                data: vendasData,
                backgroundColor: 'rgba(54, 162, 235, 0.6)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            interaction: {
                mode: 'index',
                intersect: false,
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        callback: function(value) {
                            return 'R$ ' + value.toLocaleString('pt-BR', {
                                minimumFractionDigits: 0,
                                maximumFractionDigits: 0
                            });
                        }
                    }
                }
            },
            plugins: {
                title: {
                    display: true,
                    text: 'Comparativo Mensal - Compras vs Vendas'
                },
                legend: {
                    display: true,
                    position: 'top'
                },
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            const value = context.parsed.y;
                            return context.dataset.label + ': R$ ' + value.toLocaleString('pt-BR', {
                                minimumFractionDigits: 2,
                                maximumFractionDigits: 2
                            });
                        },
                        footer: function(tooltipItems) {
                            let compra = 0;
                            let venda = 0;
                            
                            tooltipItems.forEach(function(tooltipItem) {
                                if (tooltipItem.dataset.label === 'Compras (R$)') {
                                    compra = tooltipItem.parsed.y;
                                } else if (tooltipItem.dataset.label === 'Vendas (R$)') {
                                    venda = tooltipItem.parsed.y;
                                }
                            });
                            
                            if (compra > 0 && venda > 0) {
                                const diferenca = venda - compra;
                                const tipo = diferenca >= 0 ? 'Lucro' : 'Prejuízo';
                                return tipo + ': R$ ' + Math.abs(diferenca).toLocaleString('pt-BR', {
                                    minimumFractionDigits: 2,
                                    maximumFractionDigits: 2
                                });
                            }
                            return '';
                        }
                    }
                }
            }
        }
    });
});
</script>
@endsection
