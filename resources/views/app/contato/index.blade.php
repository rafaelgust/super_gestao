@extends('app.layouts.app')

@section('titulo', 'Contatos')

@section('conteudo')
    <div class="container">
        <h1 class="mb-4">Lista de Contatos</h1>
        @if($contatos->isEmpty())
            <div class="alert alert-info">Nenhum contato encontrado.</div>
        @else
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Mensagem</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($contatos as $contato)
                        <tr>
                            <td>{{ $contato->nome }}</td>
                            <td>{{ $contato->email }}</td>
                            <td>{{ $contato->mensagem }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection