@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-header bg-primary text-white text-center rounded-top-4 fs-4">
                    {{ __('Cadastro') }}
                </div>

                <div class="card-body bg-light rounded-bottom-4">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-4">
                            <label for="name" class="col-md-4 col-form-label text-md-end fw-semibold">{{ __('Nome') }}</label>
                            <div class="col-md-7">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror rounded-pill" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                @error('name')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label for="email" class="col-md-4 col-form-label text-md-end fw-semibold">{{ __('E-mail') }}</label>
                            <div class="col-md-7">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror rounded-pill" name="email" value="{{ old('email') }}" required autocomplete="email">
                                @error('email')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label for="password" class="col-md-4 col-form-label text-md-end fw-semibold">{{ __('Senha') }}</label>
                            <div class="col-md-7">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror rounded-pill" name="password" required autocomplete="new-password">
                                @error('password')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end fw-semibold">{{ __('Confirme a Senha') }}</label>
                            <div class="col-md-7">
                                <input id="password-confirm" type="password" class="form-control rounded-pill" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-7 offset-md-4">
                                <button type="submit" class="btn btn-success w-100 rounded-pill py-2 fs-5">
                                    {{ __('Cadastrar') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
