@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="page-title my-4">Lista de Produtos</h1>
    <a href="{{ route('produtos.create') }}" class="btn btn-add mb-3">Novo Produto</a>
    <table class="table table-bordered mt-3">
        <thead class="table-success">
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Categoria</th>
                <th>Preço</th>
                <th>Quantidade</th>
                <th>Foto</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($produtos as $produto)
            <tr>
                <td>{{ $produto->id }}</td>
                <td>{{ $produto->nome }}</td>
                <td>{{ $produto->categoria->nome }}</td>
                <td>R$ {{ number_format($produto->preco, 2, ',', '.') }}</td>
                <td>{{ $produto->quantidade }}</td>
                <td>
                    @if ($produto->foto)
                    <img src="{{ Storage::url($produto->foto) }}" alt="Foto do produto" class="produto-imagem">
                    @else
                    <span>Sem imagem</span>
                    @endif
                </td>
                <td>
                    <a href="{{ route('produtos.edit', $produto->id) }}" class="btn btn-editar btn-sm">Editar</a>
                    <form action="{{ route('produtos.destroy', $produto->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-excluir btn-sm" onclick="return confirm('Tem certeza?')">Excluir</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection