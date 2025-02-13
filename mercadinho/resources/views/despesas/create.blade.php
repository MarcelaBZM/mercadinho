@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Cadastrar Despesa</h1>

    <form action="{{ route('despesas.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="descricao" class="form-label">Descrição</label>
            <input type="text" name="descricao" class="form-control" id="descricao" required>
        </div>

        <div class="mb-3">
            <label for="valor" class="form-label">Valor</label>
            <input type="number" name="valor" class="form-control" id="valor" step="0.01" required>
        </div>

        <div class="mb-3">
            <label for="data" class="form-label">Data</label>
            <input type="date" name="data" class="form-control" id="data" required>
        </div>

        <button type="submit" class="btn btn-success">Cadastrar</button>
    </form>
</div>
@endsection
