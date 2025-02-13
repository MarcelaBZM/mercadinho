@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="page-title">Despesas</h1>
    <a href="{{ route('despesas.create') }}" class="btn btn-add mb-3">Cadastrar Despesa</a>

    <table class="table mt-3">
        <thead class="table-success">
            <tr>
                <th>Descrição</th>
                <th>Valor</th>
                <th>Data</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($despesas as $despesa)
            <tr>
                <td>{{ $despesa->descricao }}</td>
                <td>R$ {{ number_format($despesa->valor, 2, ',', '.') }}</td>
                <td>{{ \Carbon\Carbon::parse($despesa->data)->format('d/m/Y') }}</td>
                <td>
                    <a href="{{ route('despesas.edit', $despesa->id) }}" class="btn btn-editar btn-sm">Editar</a>
                    <form action="{{ route('despesas.destroy', $despesa->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Tem certeza que deseja excluir?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-excluir btn-sm">Excluir</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
