@extends('app.layouts.app')

@section('titulo', 'Editar Pedido de Compra')

@section('conteudo')

    <div class="container my-3">
        <h2 class="text-center mb-4">Editar Pedido de Compra</h2>
        <div style=" display: grid; align-content: center; justify-content: space-evenly; align-items: stretch; justify-items: stretch; ">
            <form action="" method="POST" id="form-editar-compra">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="select-fornecedores" class="form-label">Fornecedor</label>
                    <select id="select-fornecedores" name="fornecedor_id" class="form-select" required disabled>
                        <option value="" disabled {{ empty(old('fornecedor_id', $compra->fornecedor_id ?? '')) ? 'selected' : '' }}>Selecione um fornecedor</option>
                        @foreach($fornecedores as $fornecedor)
                            <option value="{{ $fornecedor->id }}" {{ old('fornecedor_id', $compra->fornecedor_id ?? '') == $fornecedor->id ? 'selected' : '' }}>
                                {{ $fornecedor->nome }}
                            </option>
                        @endforeach
                    </select>
                    <input type="hidden" name="fornecedor_id" value="{{ old('fornecedor_id', $compra->fornecedor_id ?? '') }}">
                    @error('fornecedor_id')
                        <div class="text-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="input-nota-fiscal" class="form-label">Nota Fiscal</label>
                    <input type="text" class="form-control" id="input-nota-fiscal" name="nota_fiscal" placeholder="Digite o número da nota fiscal" required value="{{ old('nota_fiscal', $compra->nota_fiscal) }}" readonly>
                    @error('nota_fiscal')
                        <div class="text-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label for="input-data-pedido" class="form-label">Data do Pedido</label>
                            <input type="date" class="form-control" id="input-data-pedido" name="data_pedido" required value="{{ old('data_pedido', $compra->data_pedido) }}" readonly>
                            @error('data_pedido')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3">
                            <label for="input-data-entrega" class="form-label">Data de Entrega</label>
                            <input type="date" class="form-control" id="input-data-entrega" name="data_entrega" required value="{{ old('data_entrega', $compra->data_entrega) }}">
                            @error('data_entrega')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="select-status" class="form-label">Status</label>
                    <select id="select-status" name="status" class="form-select" required>
                        @foreach($statusList as $status)
                            <option value="{{ $status }}" {{ old('status', $compra->status) == $status ? 'selected' : '' }}>{{ ucfirst($status) }}</option>
                        @endforeach
                    </select>
                    @error('status')
                        <div class="text-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="row">
                    <div class="mb-3 row text-center">
                        <span class="fw-semibold">Valor Total:</span>
                        <span id="valor-total" class="fw-bold text-success ms-2">R$ {{ number_format($compra->valor_total, 2, ',', '.') }}</span>
                    </div>
                    <div class="mb-3 row">
                        <button class="btn btn-primary" id="btn-finalizar-compra" onclick="pedidoCompra.salvarPedido(event)">Salvar Alterações</button>
                    </div>
                    <div class="mb-3 row">
                        <button class="btn btn-success" id="btn-finalizar-compra" onclick="pedidoCompra.finalizarPedido(event)">Concluir Pedido</button>
                    </div>
                    <div class="mb-3 row">
                        <button type="button" class="btn btn-danger" onclick="pedidoCompra.apagarPedido({{ $compra->id }})">Apagar Pedido</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="row mb-3">
            <div class="mb-3">
                <h4 class="text-center pb-3"><strong>Produtos do Pedido</strong></h4>
                <div class="table-responsive">
                    <table class="table table-bordered align-middle mb-0" id="lista-produtos-adicionados">
                        <thead class="table-light">
                            <tr>
                                <th class="text-center" style="width: 110px;">Imagem</th>
                                <th>Nome</th>
                                <th class="text-center" style="width: 140px;">Valor Unitário</th>
                                <th class="text-center" style="width: 120px;">Quantidade</th>
                                <th class="text-center" style="width: 140px;">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($compra->itens as $item)
                                <tr>
                                    <td class="text-center">
                                        @if($item->produto->imagem)
                                            <img src="{{ asset('storage/' . $item->produto->imagem) }}" alt="{{ $item->produto->nome }}" class="img-thumbnail" style="max-width: 90px; max-height: 90px;">
                                        @else
                                            <span class="text-muted">Sem imagem</span>
                                        @endif
                                    </td>
                                    <td>
                                        <span class="fw-semibold">{{ $item->produto->nome }}</span>
                                        @if($item->produto->descricao)
                                            <div class="text-muted small">{{ $item->produto->descricao }}</div>
                                        @endif
                                    </td>
                                    <td class="text-center">R$ {{ number_format($item->preco_unitario, 2, ',', '.') }}</td>
                                    <td class="text-center">{{ $item->quantidade }}</td>
                                    <td class="text-center fw-bold text-success">R$ {{ number_format($item->quantidade * $item->preco_unitario, 2, ',', '.') }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center text-muted">Nenhum produto adicionado ao pedido.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
<script>
    const pedidoCompra = (() => {
        // Função utilitária para exibir alertas SweetAlert
        function showAlert({ title, text, icon, timer = null, redirect = null }) {
            Swal.fire({
                title,
                text,
                icon,
                timer,
                showConfirmButton: !timer,
                willClose: () => {
                    if (redirect) window.location.href = redirect;
                }
            });
        }

        // Função utilitária para tratar respostas fetch
        async function handleResponse(response, successMsg, redirectUrl) {
            if (response.ok) {
                showAlert({ title: successMsg, text: '', icon: 'success', timer: 2000, redirect: redirectUrl });
            } else {
                const contentType = response.headers.get('content-type');
                let errorMsg = 'Erro inesperado.';
                if (contentType && contentType.includes('application/json')) {
                    const data = await response.json();
                    errorMsg = data.message || errorMsg;
                } else {
                    const text = await response.text();
                    errorMsg = errorMsg + ' ' + text.substring(0, 200);
                }
                throw new Error(errorMsg);
            }
        }

        // Função para atualizar ou concluir pedido
        async function submitPedido(event, url, payload, successMsg) {
            event.preventDefault();
            try {
                const response = await fetch(url, {
                    method: 'PUT',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('input[name=_token]').value
                    },
                    body: JSON.stringify(payload)
                });
                await handleResponse(response, successMsg, '/pedido/compra');
            } catch (error) {
                showAlert({ title: 'Erro ao atualizar pedido', text: error.message, icon: 'error' });
            }
        }

        // Função para apagar pedido
        async function apagarPedido(compraId) {
            if (confirm('Tem certeza que deseja apagar este pedido?')) {
                try {
                    const response = await fetch(`/pedido/compra/${compraId}`, {
                        method: 'DELETE',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('input[name=_token]').value
                        }
                    });
                    await handleResponse(response, 'Pedido apagado com sucesso!', '/pedido/compra');
                } catch (error) {
                    showAlert({ title: 'Erro ao apagar pedido', text: error.message, icon: 'error' });
                }
            }
        }

        return {
            salvarPedido: function(event) {
                const form = document.getElementById('form-editar-compra');
                const payload = {
                    data_entrega: form.data_entrega.value,
                    status: form.status.value
                };
                submitPedido(event, `/pedido/compra/{{ $compra->id }}`, payload, 'Pedido atualizado com sucesso!');
            },
            finalizarPedido: function(event) {
                const form = document.getElementById('form-editar-compra');
                const payload = {
                    data_entrega: form.data_entrega.value,
                    status: 'concluido'
                };
                submitPedido(event, `/pedido/compra/{{ $compra->id }}`, payload, 'Pedido atualizado com sucesso!');
            },
            apagarPedido
        };
    })();
</script>
