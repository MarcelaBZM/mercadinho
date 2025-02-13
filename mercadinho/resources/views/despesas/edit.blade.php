@extends('layouts.app')

@section('content')
<<div class="container">
    <h1>Editar Despesa</h1>

    <form action="{{ route('despesas.update', $despesa->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="descricao" class="form-label">Descrição</label>
            <input type="text" name="descricao" class="form-control" id="descricao" 
                   value="{{ $despesa->descricao }}" required>
        </div>

        <div class="mb-3">
            <label for="valor" class="form-label">Valor</label>
            <input type="number" name="valor" class="form-control" id="valor" step="0.01" 
                   value="{{ $despesa->valor }}" required>
        </div>

        <div class="mb-3">
            <label for="data" class="form-label">Data</label>
            <input type="date" name="data" class="form-control" id="data" 
                   value="{{ $despesa->data }}" required>
        </div>

        <button type="submit" class="btn btn-success">Atualizar</button>
    </form>
</div>

@endsection
