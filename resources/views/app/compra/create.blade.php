@extends('app.layouts.app')

@section('titulo', 'Compras')

@section('conteudo')

    <div class="container my-3">
        <h2 class="text-center mb-4">Criar Pedido de Compra</h2>
        <div style=" display: grid; align-content: center; justify-content: space-evenly; align-items: stretch; justify-items: stretch; ">
            <form action="" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="select-fornecedores" class="form-label">Fornecedor</label>
                    <input type="text" class="form-control" id="select-fornecedores" name="fornecedor_nome" value="{{ $fornecedor->nome }} (ID: {{ $fornecedor->id }})" disabled>
                    <input type="hidden" name="fornecedor_id" value="{{ $fornecedor->id }}">
                </div>
                <div class="mb-3">
                    <label for="input-nota-fiscal" class="form-label">Nota Fiscal</label>
                    <input type="text" class="form-control" id="input-nota-fiscal" name="nota_fiscal" placeholder="Digite o número da nota fiscal" required value="{{ old('nota_fiscal') }}">
                    @error('nota_fiscal')
                        <div class="text-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label for="input-data-pedido" class="form-label">Data do Pedido</label>
                            <input type="date" class="form-control" id="input-data-pedido" name="data_pedido" required value="{{ old('data_pedido') }}">
                            @error('data_pedido')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3">
                            <label for="input-data-entrega" class="form-label">Data de Entrega</label>
                            <input type="date" class="form-control" id="input-data-entrega" name="data_entrega" required value="{{ old('data_entrega') }}">
                            @error('data_entrega')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="select-produtos" class="form-label">Produto</label>
                    <select id="select-produtos" class="form-select" required>
                        <option value="">Selecione um produto</option>
                        @foreach($produtos as $produto)
                            <option value="{{ $produto->id }}" {{ old('produto_id', $produtoId ?? '') == $produto->id ? 'selected' : '' }}>{{ $produto->nome }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="mb-3 d-flex align-items-center gap-3">
                            <div class="border rounded p-2 bg-light" style="width: 220px; height: 220px; display: flex; align-items: center; justify-content: center;">
                                <img id="imagem-produto"
                                    src="{{ isset($produtos[0]) && $produtos[0]->imagem ? asset('storage/' . $produtos[0]->imagem) : asset('images/no-image.jpg') }}"
                                    alt="Imagem do Produto"
                                    style="max-width: 200px; max-height: 200px; object-fit: contain; transition: box-shadow 0.2s;"
                                    class="shadow-sm"
                                >
                            </div>
                        </div>
                    </div>
                    <div class="col text-start">
                        <div class="mb-3">
                            <label for="input-preco-produto" class="form-label">Valor do Produto</label>
                            <input type="number" step="0.01" min="0" class="form-control" id="input-preco-produto" name="preco_produto" placeholder="Digite o valor pago" required>
                        </div>
                        <div class="mb-3">
                            <button class="btn btn-primary" id="btn-adicionar-produto" onclick="pedidoCompra.adicionarProduto(event)">Adicionar Produto</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="row mb-3">
            
            <div class="mb-3">
                <h4 class="text-center pb-3"><strong>Produtos Adicionados ao Pedido</strong></h4>
                <table class="table table-bordered align-middle" id="lista-produtos-adicionados">
                    <thead>
                        <tr>
                            <th class="text-center">Imagem</th>
                            <th>Nome</th>
                            <th class="text-center">Valor Unitário</th>
                            <th class="text-center">Quantidade</th>
                            <th class="text-center">Total</th>
                            <th class="text-center">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Linhas dos produtos adicionados serão inseridas via JS -->
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row mt-5">
            <div class="mb-3 col">
                <span class="fw-semibold">Valor Total:</span>
                <span id="valor-total" class="fw-bold text-success ms-2">R$ 0,00</span>
            </div>
            <div class="mb-3 text-end col">
                <button class="btn btn-primary" id="btn-finalizar-compra" onclick="pedidoCompra.finalizarPedido(event)">Finalizar Compra</button>
            </div>
        </div>
    </div>
@endsection
<script>
document.addEventListener('DOMContentLoaded', function() {
    var selectProdutos = document.getElementById('select-produtos');
    var idProdutoInicial = selectProdutos.value;
    console.log('Produto selecionado ao carregar:', idProdutoInicial);

    selectProdutos.addEventListener('change', function() {
        var produtoId = this.value;
        console.log('Produto selecionado:', produtoId);
    });

    // Atualiza a imagem do produto selecionado
    var imagemProduto = document.getElementById('imagem-produto');
    var produtos = @json($produtos);

    imagemProduto.src = '{{ asset('img/no-image.jpg') }}';

    function atualizarImagem(produtoId) {
        var produto = produtos.find(p => p.id == produtoId);
        if (produto && produto.imagem) {
            imagemProduto.src = '/storage/' + produto.imagem;
        } else {
            imagemProduto.src = '{{ asset('img/no-image.jpg') }}';
        }
    }

    // Atualiza imagem ao carregar a página
    atualizarImagem(selectProdutos.value);

    // Atualiza imagem ao trocar seleção
    selectProdutos.addEventListener('change', function() {
        atualizarImagem(this.value);
    });
});


class PedidoCompra {
    constructor(notaFiscal, fornecedorId, produtos) {
        this.notaFiscal = notaFiscal;
        this.fornecedorId = fornecedorId;
        this.produtos = produtos;
    }

    adicionarProduto(e) {
        if (e) e.preventDefault();

        let selectProdutos = document.getElementById('select-produtos');
        let produtoId = selectProdutos.value;
        if (!produtoId) return;

        let produtos = @json($produtos);
        let produto = produtos.find(p => p.id == produtoId);
        if (!produto) return;

        let precoInput = document.getElementById('input-preco-produto');
        let preco = parseFloat(precoInput.value);
        if (isNaN(preco) || preco <= 0) return;

        // Verifica se o produto já foi adicionado
        let produtoExistente = this.produtos.find(p => p.id === produto.id);
        if (produtoExistente) {
            
            Swal.fire({
                title: 'Produto já adicionado',
                text: 'O Produto ' + produtoExistente.nome + ' já foi adicionado ao pedido.',
                icon: 'info',
                confirmButtonText: 'OK'
            });

        } else {
            let novoProduto = new Produto(
            produto.id,
            produto.nome,
            preco,
            produto.imagem ? '/storage/' + produto.imagem : '{{ asset("images/no-image.jpg") }}'
            );
            this.produtos.push(novoProduto);
        }

        // Limpa o campo de preço
        precoInput.value = '';
        this.renderizarLista();
    }

    removerProduto(produtoId) {
        this.produtos = this.produtos.filter(p => p.id !== produtoId);
        this.renderizarLista();
    }

    aumentarQuantidadeProduto(produtoId) {
        let produto = this.produtos.find(p => p.id === produtoId);
        if (produto) {
            produto.quantidade += 1;
        }
        this.renderizarLista();
    }

    diminuirQuantidadeProduto(produtoId) {
        let produto = this.produtos.find(p => p.id === produtoId);
        if (produto && produto.quantidade > 1) {
            produto.quantidade -= 1;
        } else {
            this.removerProduto(produtoId);
        }
        this.renderizarLista();
    }

    renderizarLista() {
        let tbody = document.querySelector('#lista-produtos-adicionados tbody');
        tbody.innerHTML = '';
        let total = 0;
        this.produtos.forEach(produto => {
            let tr = produto.renderizarItem();
            tbody.appendChild(tr);
            total += produto.preco * produto.quantidade;
        });
        document.getElementById('valor-total').innerText = 'R$ ' + total.toFixed(2).replace('.', ',');
    }

    finalizarPedido(e) {
        if (e) e.preventDefault();

        if (this.produtos.length === 0) {
            Swal.fire({
                title: 'Nenhum produto adicionado',
                text: 'Adicione pelo menos um produto ao pedido antes de finalizar.',
                icon: 'warning',
                confirmButtonText: 'OK'
            });
            return;
        }

        // Coleta dados do formulário
        const notaFiscal = document.getElementById('input-nota-fiscal').value;
        const fornecedorId = document.querySelector('input[name="fornecedor_id"]').value;
        const data_do_pedido = document.getElementById('input-data-pedido').value;
        const data_entrega = document.getElementById('input-data-entrega').value;

        if (!notaFiscal || !fornecedorId || !data_do_pedido || !data_entrega) {
            Swal.fire({
                title: 'Campos obrigatórios',
                text: 'Preencha todos os campos obrigatórios.',
                icon: 'warning',
                confirmButtonText: 'OK'
            });
            return;
        }

        const payload = {
            nota_fiscal: notaFiscal,
            fornecedor_id: fornecedorId,
            valor_total: this.produtos.reduce((total, p) => total + (p.preco * p.quantidade), 0).toFixed(2),
            data_pedido: document.getElementById('input-data-pedido').value,
            data_entrega: document.getElementById('input-data-entrega').value,
            produtos: this.produtos.map(p => ({
                id: p.id,
                quantidade: p.quantidade,
                preco: p.preco
            }))
        };

        fetch('/pedido/compra', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('input[name=_token]').value
            },
            body: JSON.stringify(payload)
        })
        .then(async response => {
            if (response.ok) {

                Swal.fire({
                    title: 'Pedido finalizado com sucesso!',
                    text: 'O seu pedido foi registrado.',
                    icon: 'success',
                    timer: 2000,
                    showConfirmButton: false,
                    willClose: () => {
                        window.location.href = '/pedido/compra';
                    }
                });

            } else {
                const contentType = response.headers.get('content-type');
                if (contentType && contentType.includes('application/json')) {
                    const data = await response.json();
                    throw new Error(data.message || 'Erro ao finalizar pedido.');
                } else {
                    const text = await response.text();
                    throw new Error('Erro inesperado: ' + text.substring(0, 200));
                }
            }
        })
        .catch(error => {
            Swal.fire({
                title: 'Erro ao finalizar pedido',
                text: error.message,
                icon: 'error',
                confirmButtonText: 'OK'
            });
        });
    }
}

const pedidoCompra = new PedidoCompra(
    '',
    @json(old('fornecedor_id', isset($fornecedorId) ? $fornecedorId : null)),
    []
);

class Produto {
    constructor(id, nome, preco, imagem) {
        this.id = id;
        this.nome = nome;
        this.preco = preco;
        this.imagem = imagem;
        this.quantidade = 1;
    }

    renderizarItem() {
        let tr = document.createElement('tr');
        tr.innerHTML = `
            <td class="text-center"><img src="${this.imagem}" alt="${this.nome}" style="width:40px;height:40px;object-fit:contain;"></td>
            <td>${this.nome}</td>
            <td class="text-center">R$ ${this.preco.toFixed(2).replace('.', ',')}</td>
            <td class="text-center">
                <div class="d-flex align-items-center justify-content-center">
                    <button type="button" class="btn btn-sm btn-outline-secondary me-1">-</button>
                    <span class="mx-2">${this.quantidade}</span>
                    <button type="button" class="btn btn-sm btn-outline-secondary ms-1">+</button>
                </div>
            </td>
            <td class="text-center">R$ ${(this.preco * this.quantidade).toFixed(2).replace('.', ',')}</td>
            <td class="text-center">
                <button type="button" class="btn btn-sm btn-outline-danger">&times;</button>
            </td>
        `;

        // Adiciona eventos aos botões
        const btnDiminuir = tr.querySelector('button.btn-outline-secondary.me-1');
        const btnAumentar = tr.querySelector('button.btn-outline-secondary.ms-1');
        const btnRemover = tr.querySelector('button.btn-outline-danger');

        btnDiminuir.addEventListener('click', () => {
            pedidoCompra.diminuirQuantidadeProduto(this.id);
        });
        btnAumentar.addEventListener('click', () => {
            pedidoCompra.aumentarQuantidadeProduto(this.id);
        });
        btnRemover.addEventListener('click', () => {
            pedidoCompra.removerProduto(this.id);
        });

        return tr;
    }
}
</script>