@extends('base')
@section('titulo', isset($dado) ? 'Editar Produto' : 'Novo Produto')
@section('conteudo')

<div class="card shadow p-4 mb-4 border-success">
    <h3 class="text-success mb-4">
        {{ isset($dado) ? 'Editar Produto' : 'Novo Produto' }}
    </h3>

    @php
        $action = isset($dado)
            ? route('produto.update', $dado->id)
            : route('produto.store');
    @endphp

    <form action="{{ $action }}" method="post" enctype="multipart/form-data" class="row g-3">
        @csrf
        @if(isset($dado))
            @method('PUT')
        @endif

        <div class="col-md-6">
            <label for="nome" class="form-label">Nome</label>
            <input
                type="text"
                name="nome"
                id="nome"
                class="form-control border-success"
                value="{{ old('nome', $dado->nome ?? '') }}"
                placeholder="Nome do produto"
                required
            >
        </div>

        <div class="col-md-6">
            <label for="colecao_id" class="form-label">Coleção</label>
            <select
                name="colecao_id"
                id="colecao_id"
                class="form-select border-success"
                required
            >
                <option value="">Selecione uma coleção</option>
                @foreach($colecao as $c)
                    <option
                        value="{{ $c->id }}"
                        {{ old('colecao_id', $dado->colecao_id ?? '') == $c->id ? 'selected' : '' }}
                    >
                        {{ $c->nome_colecao }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="col-md-4">
            <label for="preco" class="form-label">Preço (R$)</label>
            <input
                type="number"
                step="0.01"
                name="preco"
                id="preco"
                class="form-control border-success"
                value="{{ old('preco', $dado->preco ?? '') }}"
                placeholder="Ex: 99.90"
                required
            >
        </div>

        <div class="col-md-8">
            <label for="descricao" class="form-label">Descrição</label>
            <textarea
                name="descricao"
                id="descricao"
                class="form-control border-success"
                rows="3"
                placeholder="Descrição do produto"
                required
            >{{ old('descricao', $dado->descricao ?? '') }}</textarea>
        </div>

        <div class="col-md-12">
            <label for="imagem" class="form-label">Imagem</label>
            <input
                type="file"
                name="imagem"
                id="imagem"
                class="form-control border-success"
                {{ isset($dado) ? '' : 'required' }}
            >
            @if(isset($dado) && $dado->imagem)
                <small class="text-muted">Imagem atual: {{ $dado->imagem }}</small>
            @endif
        </div>

        <div class="col-12 d-flex justify-content-end mt-4">
            <a href="{{ route('produto.index') }}" class="btn btn-outline-secondary me-2">Voltar</a>
            <button type="submit" class="btn btn-success">
                {{ isset($dado) ? 'Atualizar' : 'Salvar' }}
            </button>
        </div>
    </form>
</div>

@stop
