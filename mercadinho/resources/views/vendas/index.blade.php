@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="text-success">Lista de Vendas</h2>

    <a href="{{ route('vendas.create') }}" class="btn btn-success">Nova Venda</a>

    <div class="mt-4">
        <h3 class="page-title">Vendas Realizadas</h3>

        <!-- Mensagem de Sucesso -->
        @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <!-- Mensagem de Erro -->
        @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {!! session('error') !!}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        @if($vendas->isNotEmpty())
        <table class="table table-bordered mt-3">
            <thead class="table-success">
                <tr>
                    <th>ID</th>
                    <th>Cliente</th>
                    <th>Data</th>
                    <th>Total</th>
                    <th>Produtos</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($vendas as $venda)
                <tr>
                    <td>{{ $venda->id }}</td>
                    <td>{{ $venda->cliente->nome }}</td>
                    <td>{{ \Carbon\Carbon::parse($venda->data_compra)->format('d/m/Y H:i:s') }}</td>
                    <td>R$ {{ number_format($venda->valor_total, 2, ',', '.') }}</td>
                    <td>
                        @foreach($venda->produtos as $produto)
                        {{ $produto->nome }} ({{ $produto->pivot->quantidade }}) <br>
                        @endforeach
                    </td>
                    <td>
                        <a href="{{ route('vendas.edit', $venda->id) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('vendas.destroy', $venda->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza?')">Excluir</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @else
        <p class="text-danger">Nenhuma venda realizada.</p>
        @endif
    </div>
</div>
@endsection