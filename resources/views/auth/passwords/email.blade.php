@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-primary text-white text-center fs-4">
                    {{ __('Redefinir Senha') }}
                </div>

                <div class="card-body bg-light">
                    @if (session('status'))
                        <div class="alert alert-success text-center" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="mb-4 row align-items-center">
                            <label for="email" class="col-md-4 col-form-label text-md-end fw-bold">
                                {{ __('Endereço de E-mail') }}
                            </label>
                            <div class="col-md-6">
                                <input id="email" type="email"
                                    class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" required autocomplete="email" autofocus
                                    placeholder="Digite seu e-mail">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4 d-grid">
                                <button type="submit" class="btn btn-primary btn-lg">
                                    {{ __('Enviar link de redefinição') }}
                                </button>
                            </div>
                        </div>
                    </form>
                    <div class="text-center mt-4">
                        <a href="{{ route('login') }}" class="text-decoration-none">
                            {{ __('Voltar para o login') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
