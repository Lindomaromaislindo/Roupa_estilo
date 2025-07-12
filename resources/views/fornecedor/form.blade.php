@extends('base')
@section('titulo', 'Formulário Fornecedor')
@section('conteudo')

<div class="card shadow p-4 mb-4 border-success">
    <h3 class="text-success mb-4">Formulário Fornecedor</h3>

    @php
        $action = !empty($dado->id)
            ? route('fornecedor.update', $dado->id)
            : route('fornecedor.store');
    @endphp

    <form action="{{ $action }}" method="post" class="row g-3">
        @csrf
        @if (!empty($dado->id))
            @method('put')
        @endif

        <div class="col-md-6">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" name="nome" id="nome"
                   value="{{ old('nome', $dado->nome ?? '') }}"
                   class="form-control border-success" required>
        </div>

        <div class="col-md-6">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email"
                   value="{{ old('email', $dado->email ?? '') }}"
                   class="form-control border-success" required>
        </div>

        <div class="col-md-6">
            <label for="telefone" class="form-label">Telefone</label>
            <input type="text" name="telefone" id="telefone"
                   value="{{ old('telefone', $dado->telefone ?? '') }}"
                   class="form-control border-success" required>
        </div>

        <div class="col-md-6">
            <label for="empresa" class="form-label">Empresa</label>
            <input type="text" name="empresa" id="empresa"
                   value="{{ old('empresa', $dado->empresa ?? '') }}"
                   class="form-control border-success">
        </div>

        <div class="col-md-12">
            <label for="endereco" class="form-label">Endereço</label>
            <input type="text" name="endereco" id="endereco"
                   value="{{ old('endereco', $dado->endereco ?? '') }}"
                   class="form-control border-success">
        </div>

        <div class="col-12 d-flex justify-content-end mt-4">
            <a href="{{ route('fornecedor.index') }}" class="btn btn-outline-secondary me-2">Voltar</a>
            <button type="submit" class="btn btn-success">Salvar</button>
        </div>
    </form>
</div>

@stop
