@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4">Relatório de Vendas</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Cliente</th>
                <th>Produtos</th>
                <th>Valor Total</th>
                <th>Data</th>
            </tr>
        </thead>
        <tbody>
            @foreach($vendas as $venda)
            <tr>
                <td>{{ $venda->cliente->nome }}</td>
                <td>
                    @foreach($venda->produtos as $produto)
                        {{ $produto->nome }} (R$ {{ number_format($produto->pivot->preco, 2, ',', '.') }})<br>
                    @endforeach
                </td>
                <td>R$ {{ number_format($venda->valor_total, 2, ',', '.') }}</td>
                <td>{{ $venda->created_at->format('d/m/Y H:i') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
