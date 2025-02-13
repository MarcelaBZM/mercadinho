<?php

namespace App\Http\Controllers;

use App\Models\Despesa;
use Illuminate\Http\Request;

class DespesaController extends Controller
{
    // Exibe a lista de despesas
    public function index()
    {
        $despesas = Despesa::all(); // Pega todas as despesas
        return view('despesas.index', compact('despesas'));
    }

    // Exibe o formulário para cadastrar uma nova despesa
    public function create()
    {
        return view('despesas.create');
    }

    // Armazena uma nova despesa
    public function store(Request $request)
    {
        // Validação dos dados
        $request->validate([
            'descricao' => 'required|string|max:255',
            'valor' => 'required|numeric',
            'data' => 'required|date',
        ]);

        // Cria a nova despesa
        $despesa = new Despesa();
        $despesa->descricao = $request->descricao;
        $despesa->valor = $request->valor;
        $despesa->data = $request->data;
        $despesa->save();

        // Redireciona com uma mensagem de sucesso
        return redirect()->route('despesas.index')->with('success', 'Despesa cadastrada com sucesso!');
    
        $request->validate([
            'data' => ['required', 'date', 'before_or_equal:today']
        ]);
        
    
    }

    // Exibe o formulário para editar uma despesa
    public function edit($id)
    {
    $despesa = Despesa::findOrFail($id);
    return view('despesas.edit', compact('despesa'));
    }

    // Atualiza uma despesa existente
    public function update(Request $request, $id)
    {
        // Validação dos dados
        $request->validate([
            'descricao' => 'required|string|max:255',
            'valor' => 'required|numeric',
            'data' => 'required|date',
        ]);

        // Encontra e atualiza a despesa
        $despesa = Despesa::findOrFail($id);
        $despesa->descricao = $request->descricao;
        $despesa->valor = $request->valor;
        $despesa->data = $request->data;
        $despesa->save();

        $request->validate([
            'data' => ['required', 'date', 'before_or_equal:today']
        ]);
        

        // Redireciona com uma mensagem de sucesso
        return redirect()->route('despesas.index')->with('success', 'Despesa atualizada com sucesso!');
    }

    // Exclui uma despesa
    public function destroy($id)
    {
        $despesa = Despesa::findOrFail($id); // Encontra a despesa pelo ID
        $despesa->delete(); // Exclui a despesa

        // Redireciona com uma mensagem de sucesso
        return redirect()->route('despesas.index')->with('success', 'Despesa excluída com sucesso!');
    }


}
