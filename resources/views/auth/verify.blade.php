@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-primary text-white text-center h5">
                    {{ __('Verifique seu endereço de e-mail') }}
                </div>

                <div class="card-body text-center">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Um novo link de verificação foi enviado para o seu e-mail.') }}
                        </div>
                    @endif

                    <p class="mb-3">
                        {{ __('Antes de continuar, por favor verifique seu e-mail para o link de verificação.') }}
                    </p>
                    <p>
                        {{ __('Se você não recebeu o e-mail') }},
                        <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                            @csrf
                            <button type="submit" class="btn btn-link p-0 m-0 align-baseline text-primary fw-bold">
                                {{ __('clique aqui para solicitar outro') }}
                            </button>.
                        </form>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
