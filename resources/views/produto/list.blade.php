@extends('base')
@section('titulo', 'Listagem de Produtos')
@section('conteudo')

<div class="card shadow p-4 mb-4 border-primary">
    <h3 class="text-success mb-4">Listagem de Produtos</h3>

    <form action="{{ route('produto.search') }}" method="post" class="row g-3 mb-4">
        @csrf
        <div class="col-md-4">
            <label for="tipo" class="form-label">Buscar por</label>
            <select name="tipo" id="tipo" class="form-select border-success">
                <option value="nome">Nome</option>
                <option value="descricao">Descrição</option>
            </select>
        </div>

        <div class="col-md-5">
            <label for="valor" class="form-label">Valor</label>
            <input type="text" name="valor" id="valor" placeholder="Digite o valor" value="{{ old('valor') }}" class="form-control border-success">
        </div>

        <div class="col-md-3 d-flex align-items-end">
            <button type="submit" class="btn btn-success me-2">Buscar</button>
            <a href="{{ route('produto.create') }}" class="btn btn-outline-success">Novo Produto</a>
        </div>
    </form>

    <div class="table-responsive">
        <table class="table table-hover align-middle">
            <thead class="table-success">
                <tr>
                    <th>#</th>
                    <th class="text-center">Imagem</th>
                    <th>Nome</th>
                    <th>Coleção</th>
                    <th>Preço</th>
                    <th>Descrição</th>
                    <th class="text-center">Editar</th>
                    <th class="text-center">Excluir</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($dados as $produto)
                    <tr>
                        <td>{{ $produto->id }}</td>
                        <td class="text-center">
                            @if ($produto->imagem && file_exists(public_path('storage/' . $produto->imagem)))
                                <img src="{{ asset('storage/' . $produto->imagem) }}" alt="Imagem do produto"
                                     width="100" height="100" class="border mx-auto d-block">
                            @else
                                <span class="text-muted">Sem imagem</span>
                            @endif
                        </td>
                        <td>{{ $produto->nome }}</td>
                        <td>{{ $produto->colecao->nome_colecao ?? 'N/A' }}</td>
                        <td>R$ {{ number_format($produto->preco, 2, ',', '.') }}</td>
                        <td>{{ Str::limit($produto->descricao, 50) }}</td>
                        <td class="text-center">
                            <a href="{{ route('produto.edit', $produto->id) }}" class="btn btn-sm btn-outline-success">Editar</a>
                        </td>
                        <td class="text-center">
                            <form action="{{ route('produto.destroy', $produto->id) }}" method="post" onsubmit="return confirm('Deseja remover este produto?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger">Remover</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center text-muted">Nenhum produto encontrado.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@stop
