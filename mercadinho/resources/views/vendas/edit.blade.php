@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Venda</h1>

    <form action="{{ route('vendas.update', $venda->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="cliente_id" class="form-label">Cliente</label>
            <select name="cliente_id" id="cliente_id" class="form-control" required>
                @foreach ($clientes as $cliente)
                    <option value="{{ $cliente->id }}" @if($venda->cliente_id == $cliente->id) selected @endif>{{ $cliente->nome }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="produtos" class="form-label">Produtos</label>
            <select name="produtos[]" id="produtos" class="form-control" multiple required>
                @foreach ($produtos as $produto)
                    <option value="{{ $produto->id }}" @if(in_array($produto->id, $venda->produtos->pluck('id')->toArray())) selected @endif>{{ $produto->nome }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="valor_total" class="form-label">Valor Total</label>
            <input type="number" name="valor_total" class="form-control" id="valor_total" step="0.01" value="{{ old('valor_total', $venda->valor_total) }}" required>
        </div>

        <button type="submit" class="btn btn-warning">Atualizar Venda</button>
    </form>
</div>
@endsection
