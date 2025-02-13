@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="text-success">Nova Venda</h2>

    <form action="{{ route('vendas.store') }}" method="POST">
        @csrf

        <!-- Campo oculto para valor total -->
        <input type="hidden" name="valor_total" id="valor_total">

        <!-- Seleção do Cliente -->
        <div class="mb-3">
            <label for="cliente_id" class="form-label">Cliente</label>
            <select name="cliente_id" class="form-control" required>
                <option value="">Selecione um Cliente</option>
                @foreach($clientes as $cliente)
                    <option value="{{ $cliente->id }}">{{ $cliente->nome }}</option>
                @endforeach
            </select>
        </div>

        <!-- Produtos -->
        <h3 class="page-title">Produtos</h3>
        <table class="table">
            <thead>
                <tr>
                    <th>Selecionar</th>
                    <th>Produto</th>
                    <th>Preço</th>
                    <th>Quantidade</th>
                </tr>
            </thead>
            <tbody>
                @foreach($produtos as $produto)
                    <tr>
                        <td>
                            <input type="checkbox" name="produtos[{{ $produto->id }}][selecionado]" class="produto-selecionado" data-id="{{ $produto->id }}" data-preco="{{ $produto->preco }}">
                        </td>
                        <td>{{ $produto->nome }}</td>
                        <td>R$ {{ number_format($produto->preco, 2, ',', '.') }}</td>
                        <td>
                            <input type="number" name="produtos[{{ $produto->id }}][quantidade]" min="1" value="1" class="form-control quantidade-produto" data-id="{{ $produto->id }}" disabled>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Total da Compra -->
        <h4>Total: <span id="totalCompra">R$ 0,00</span></h4>

        <!-- Botão de Compra -->
        <button type="submit" class="btn btn-success">Realizar Compra</button>
    </form>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const checkboxes = document.querySelectorAll(".produto-selecionado");
        const totalCompra = document.getElementById("totalCompra");
        const campoValorTotal = document.getElementById("valor_total");

        function calcularTotal() {
            let total = 0;
            checkboxes.forEach(checkbox => {
                if (checkbox.checked) {
                    let id = checkbox.dataset.id;
                    let preco = parseFloat(checkbox.dataset.preco);
                    let quantidade = document.querySelector(`input[name="produtos[${id}][quantidade]"]`).value;
                    total += preco * quantidade;
                }
            });
            totalCompra.textContent = `R$ ${total.toFixed(2).replace(".", ",")}`;
            
            // Atualizar o valor_total no campo oculto
            campoValorTotal.value = total.toFixed(2);
        }

        checkboxes.forEach(checkbox => {
            checkbox.addEventListener("change", function () {
                let id = this.dataset.id;
                let inputQuantidade = document.querySelector(`input[name="produtos[${id}][quantidade]"]`);
                inputQuantidade.disabled = !this.checked;
                calcularTotal();
            });
        });

        document.querySelectorAll(".quantidade-produto").forEach(input => {
            input.addEventListener("input", calcularTotal);
        });
    });
</script>
@endsection
