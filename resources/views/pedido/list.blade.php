@extends('base')
@section('titulo', 'Listagem de Pedidos')
@section('conteudo')

<div class="card shadow p-4 mb-4 border-success">
    <h3 class="text-success mb-4">Listagem de Pedidos</h3>

    <form action="{{ route('pedido.search') }}" method="post" class="row g-3 mb-4">
        @csrf
        <div class="col-md-4">
            <label for="tipo" class="form-label">Tipo</label>
            <select name="tipo" id="tipo" class="form-select border-success">
                <option value="codigo">Código</option>
                <option value="data">Data</option>
                <option value="total">Total</option>
            </select>
        </div>

        <div class="col-md-5">
            <label for="valor" class="form-label">Valor</label>
            <input type="text" name="valor" id="valor" class="form-control border-success" value="{{ old('valor') }}">
        </div>

        <div class="col-md-3 d-flex align-items-end">
            <button type="submit" class="btn btn-success me-2">Buscar</button>
            <a href="{{ route('pedido.create') }}" class="btn btn-outline-success">Novo</a>
            <a href="{{ route('pedido.pdf') }}" target="_blank" class="btn btn-outline-primary">Gerar PDF</a>
        </div>
    </form>

    <div class="table-responsive">
        <table class="table table-hover align-middle">
            <thead class="table-success">
                <tr>
                    <th>ID</th>
                    <th>Código</th>
                    <th>Data</th>
                    <th>Total</th>
                    <th class="text-center">Editar</th>
                    <th class="text-center">Excluir</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($dados as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->codigo }}</td>
                        <td>{{ \Carbon\Carbon::parse($item->data)->format('d/m/Y') }}</td>
                        <td>R$ {{ number_format($item->total, 2, ',', '.') }}</td>
                        <td class="text-center">
                            <a href="{{ route('pedido.edit', $item->id) }}" class="btn btn-sm btn-outline-success">Editar</a>
                        </td>
                        <td class="text-center">
                            <form action="{{ route('pedido.destroy', $item->id) }}" method="post" onsubmit="return confirm('Deseja remover este pedido?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger">Remover</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="6" class="text-center text-muted">Nenhum pedido encontrado.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@stop
