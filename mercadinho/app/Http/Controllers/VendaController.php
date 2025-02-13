<?php

namespace App\Http\Controllers;

use App\Models\Venda;
use App\Models\Produto;
use App\Models\Cliente;
use Illuminate\Http\Request;

class VendaController extends Controller
{
    // Exibe a lista de vendas
    public function index()
    {

        $vendas = Venda::with(['produtos'])->get();

        return view('vendas.index', compact('vendas'));
    }


    // Exibe o formulário para cadastrar uma nova venda
    public function create()
    {
        $clientes = Cliente::all();      // Busca todos os clientes
        $produtos = Produto::all();        // Busca todos os produtos (se necessário para essa view)
        return view('vendas.create', compact('clientes', 'produtos'));
    }


    public function store(Request $request)
    {
        // Validar os dados
        $validated = $request->validate([
            'cliente_id' => 'required|exists:clientes,id',
            'valor_total' => 'required|numeric|min:0',
            'produtos' => 'required|array',
            'produtos.*.quantidade' => 'required|numeric|min:1',
        ]);

        // Criar a venda com a data/hora atual
        $venda = new Venda();
        $venda->cliente_id = $request->cliente_id;
        $venda->valor_total = $request->valor_total;
        $venda->data_compra = now(); // <-- Aqui salva a data/hora atual da compra
        $venda->save();

        // Adicionar produtos à venda e atualizar estoque
        foreach ($request->produtos as $produtoId => $produtoData) {
            $produto = Produto::findOrFail($produtoId);
            $quantidade = $produtoData['quantidade'];

            if ($produto->quantidade < $quantidade) {
                return back()->with('error', 'Estoque insuficiente para o produto: ' . $produto->nome);
            }

            $produto->quantidade -= $quantidade;
            $produto->save();

            $venda->produtos()->attach($produtoId, [
                'quantidade' => $quantidade,
                'preco' => $produto->preco,
            ]);
        }

        return redirect()->route('vendas.index')->with('success', 'Venda realizada com sucesso!');
    }



    // Exibe o formulário para editar uma venda (caso necessário)
    public function edit($id)
    {
        $venda = Venda::findOrFail($id);
        $clientes = Cliente::all();
        $produtos = Produto::all();
        return view('vendas.edit', compact('venda', 'clientes', 'produtos'));
    }

    public function update(Request $request, $id)
    {
        $venda = Venda::findOrFail($id);

        // Validar os dados
        $validated = $request->validate([
            'cliente_id' => 'required|exists:clientes,id',
            'valor_total' => 'required|numeric|min:0',
            'produtos' => 'required|array',
            'produtos.*' => 'required|numeric|min:1',
        ]);

        // Atualizar a venda
        $venda->cliente_id = $request->cliente_id;

        // Calcular o valor total
        $total = 0;
        foreach ($request->produtos as $produtoId) {
            $produto = Produto::findOrFail($produtoId);
            $quantidade = $request->quantidades[$produtoId]; // Supondo que a quantidade esteja sendo enviada corretamente
            $total += $produto->preco * $quantidade;
        }

        $venda->valor_total = $total; // Atualizando o valor total
        $venda->save();

        // Atualizar os produtos da venda (relacionamento)
        $venda->produtos()->sync($request->produtos);

        return redirect()->route('vendas.index')->with('success', 'Venda atualizada com sucesso!');
    }


    // Exclui uma venda
    public function destroy($id)
    {
        $venda = Venda::findOrFail($id);
        $venda->delete();
        return redirect()->route('vendas.index')->with('success', 'Venda excluída com sucesso!');
    }
}
