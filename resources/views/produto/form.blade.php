@extends('base')
@section('titulo', isset($dado) ? 'Editar Produto' : 'Novo Produto')
@section('conteudo')

<div class="card shadow p-4 mb-4 border-success">
    <h3 class="text-success mb-4">{{ isset($dado) ? 'Editar Produto' : 'Novo Produto' }}</h3>

    <form action="{{ isset($dado) ? route('produto.update', $dado->id) : route('produto.store') }}" method="post" enctype="multipart/form-data" class="row g-3">
        @csrf
        @if(isset($dado))
            @method('PUT')
        @endif

        <div class="col-md-6">
            <label for="nome" class="form-label">Nome do Produto</label>
            <input type="text" name="nome" id="nome" class="form-control border-success" value="{{ old('nome', $dado->nome ?? '') }}" required>
        </div>

        <div class="col-md-6">
            <label for="colecao_id" class="form-label">Coleção</label>
            <select name="colecao_id" id="colecao_id" class="form-select border-success" required>
                <option value="">Selecione</option>
                @foreach ($colecao as $colecao)
                    <option value="{{ $colecao->id }}" {{ old('colecao_id', $dado->colecao_id ?? '') == $colecao->id ? 'selected' : '' }}>
                        {{ $colecao->nome_colecao }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="col-md-4">
            <label for="preco" class="form-label">Preço</label>
            <input type="number" name="preco" id="preco" step="0.01" class="form-control border-success" value="{{ old('preco', $dado->preco ?? '') }}" required>
        </div>

        <div class="col-md-8">
            <label for="descricao" class="form-label">Descrição</label>
            <textarea name="descricao" id="descricao" rows="2" class="form-control border-success" required>{{ old('descricao', $dado->descricao ?? '') }}</textarea>
        </div>

        <div class="col-md-6">
            <label for="imagem" class="form-label">Imagem</label>
            <input type="file" name="imagem" id="imagem" class="form-control border-success">
        </div>

        @if(isset($dado) && $dado->imagem)
            <div class="col-md-6 d-flex align-items-center">
                <img src="{{ asset('storage/' . $dado->imagem) }}" alt="Imagem do Produto" width="100" class="border rounded">
            </div>
        @endif

        <div class="col-12 d-flex justify-content-end">
            <a href="{{ route('produto.index') }}" class="btn btn-outline-secondary me-2">Voltar</a>
            <button type="submit" class="btn btn-success">{{ isset($dado) ? 'Atualizar' : 'Salvar' }}</button>
        </div>
    </form>
</div>

@stop
