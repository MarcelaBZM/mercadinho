@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2>Nova Categoria</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('categorias.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="nome" class="form-label">Nome da Categoria</label>
        <input type="text" class="form-control" id="nome" name="nome" required>
    </div>
    <button type="submit" class="btn btn-success">Salvar</button>
    </form>

</div>
@endsection
