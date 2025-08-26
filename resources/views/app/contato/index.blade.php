@extends('app.layouts.app')

@section('titulo', 'Contatos')

@section('conteudo')
    <div class="container">
        <h1 class="mb-4">Lista de Contatos</h1>
        <div class="card rounded">
            <div class="table-responsive">
                <table id="tabela-contatos" class="table table-striped table-hover table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">Nome</th>
                            <th scope="col">Email</th>
                            <th scope="col">Telefone</th>
                            <th scope="col">Motivo</th>
                            <th scope="col">Mensagem</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
<script>
    document.addEventListener('DOMContentLoaded', function() {
        carregarTabela({
            url: '/contato/lista',
            tbodySelector: '#tabela-contatos tbody',
            colunas: [
                { data: 'nome', title: 'Nome' },
                { data: 'email', title: 'Email' },
                { data: 'telefone', title: 'Telefone' },
                { data: 'motivo', title: 'Motivo' },
                { data: 'mensagem', title: 'Mensagem' }
            ]
        });
    });
</script>
