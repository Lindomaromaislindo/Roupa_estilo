@extends('base')
@section('titulo', isset($dado) ? 'Editar Pedido' : 'Novo Pedido')
@section('conteudo')

<div class="card shadow p-4 mb-4 border-success">
    <h3 class="text-success mb-4">{{ isset($dado) ? 'Editar Pedido' : 'Novo Pedido' }}</h3>

    <form action="{{ isset($dado) ? route('pedido.update', $dado->id) : route('pedido.store') }}" method="post" class="row g-3">
        @csrf
        @if(isset($dado))
            @method('PUT')
        @endif

        <div class="col-md-4">
            <label for="codigo" class="form-label">Código</label>
            <input type="text" name="codigo" id="codigo" class="form-control border-success" value="{{ old('codigo', $dado->codigo ?? '') }}" required>
        </div>

        <div class="col-md-4">
            <label for="data" class="form-label">Data</label>
            <input type="date" name="data" id="data" class="form-control border-success" value="{{ old('data', isset($dado->data) ? \Carbon\Carbon::parse($dado->data)->format('Y-m-d') : '') }}" required>
        </div>

        <div class="col-md-4">
            <label for="total" class="form-label">Total</label>
            <input type="number" name="total" id="total" step="0.01" class="form-control border-success" value="{{ old('total', $dado->total ?? '') }}" required>
        </div>

        <div class="col-12 d-flex justify-content-end">
            <a href="{{ route('pedido.index') }}" class="btn btn-outline-secondary me-2">Voltar</a>
            <button type="submit" class="btn btn-success">{{ isset($dado) ? 'Atualizar' : 'Salvar' }}</button>
        </div>
    </form>
</div>

@stop
