@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2>Editar Produto</h2>

    <form action="{{ route('produtos.update', $produto->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nome" class="form-label">Nome:</label>
            <input type="text" class="form-control" id="nome" name="nome" value="{{ $produto->nome }}" required>
        </div>

        <div class="mb-3">
            <label for="categoria_id" class="form-label">Categoria:</label>
            <select class="form-control" id="categoria_id" name="categoria_id" required>
                @foreach($categorias as $categoria)
                    <option value="{{ $categoria->id }}" @if($produto->categoria_id == $categoria->id) selected @endif>
                        {{ $categoria->nome }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="preco" class="form-label">Preço:</label>
            <input type="number" class="form-control" id="preco" name="preco" step="0.01" value="{{ $produto->preco }}" required>
        </div>

        <div class="mb-3">
            <label for="quantidade" class="form-label">Quantidade:</label>
            <input type="number" class="form-control" id="quantidade" name="quantidade" value="{{ $produto->quantidade }}" required>
        </div>

        <div class="mb-3">
            <label for="foto" class="form-label">Foto (opcional):</label>
            <input type="file" class="form-control" id="foto" name="foto">
            @if($produto->foto)
                <img src="{{ asset('storage/' . $produto->foto) }}" width="100" class="mt-2">
            @endif
        </div>

        <button type="submit" class="btn btn-success">Atualizar</button>
        <a href="{{ route('produtos.index') }}" class="btn btn-secondary">Voltar</a>
    </form>
</div>
@endsection
