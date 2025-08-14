{{ $slot }}

<style>
    .error-form-contato {
        text-align: start;
        padding: 11px;
        background-color: #dc3545;
        color: white;
        border-radius: 0.375rem;
        width: 100%;
        font-size: 0.875rem;
        margin-top: 0.25rem;
    }
    .success-form-contato {
        text-align: start;
        padding: 11px;
        background-color: #198754;
        color: white;
        border-radius: 0.375rem;
        width: 100%;
        font-size: 0.875rem;
        margin-top: 0.25rem;
    }
</style>

<form action="{{ route('site.contato.store') }}" method="POST" class="p-4 border rounded shadow-sm bg-light">
    @csrf
    <div class="mb-3">
        <input name="nome" type="text" class="form-control @error('nome') is-invalid @enderror" placeholder="Nome" value="{{ old('nome') }}">
        @if ($errors->has('nome'))
            <div class="error-form-contato">
                {{ $errors->first('nome') }}
            </div>
        @endif
    </div>
    <div class="mb-3">
        <input name="telefone" type="text" class="form-control @error('telefone') is-invalid @enderror" placeholder="Telefone" value="{{ old('telefone') }}">
        @if ($errors->has('telefone'))
            <div class="error-form-contato">
                {{ $errors->first('telefone') }}
            </div>
        @endif
    </div>
    <div class="mb-3">
        <input name="email" type="text" class="form-control @error('email') is-invalid @enderror" placeholder="E-mail" value="{{ old('email') }}">
        @if ($errors->has('email'))
            <div class="error-form-contato">
                {{ $errors->first('email') }}
            </div>
        @endif
    </div>
    <div class="mb-3">
        <select name="motivo_id" class="form-select @error('motivo_contatos_id') is-invalid @enderror">
            <option value="">Qual o motivo do contato?</option>
            @isset($motivo_contatos)
                @foreach($motivo_contatos as $motivo_contato)
                    <option value="{{ $motivo_contato->id }}" {{ old('motivo_id') == $motivo_contato->id ? 'selected' : '' }}>{{ $motivo_contato->motivo }}</option>
                @endforeach
            @endisset
        </select>
        @if ($errors->has('motivo_contatos_id'))
            <div class="error-form-contato">
                {{ $errors->first('motivo_contatos_id') }}
            </div>
        @endif
    </div>
    <div class="mb-3">
        <textarea name="mensagem" class="form-control @error('mensagem') is-invalid @enderror" rows="4">{{ old('mensagem', 'Preencha aqui a sua mensagem') }}</textarea>
        @if ($errors->has('mensagem'))
            <div class="error-form-contato">
                {{ $errors->first('mensagem') }}
            </div>
        @endif
    </div>
    @if (session('success'))
        <div class="success-form-contato mb-3">
            {{ session('success') }}
        </div>
    @endif
    <button type="submit" class="btn btn-primary w-100">ENVIAR</button>
</form>
