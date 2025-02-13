<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    // Exibe a lista de clientes
    public function index()
    {
        $clientes = Cliente::all();
        return view('clientes.index', compact('clientes'));
    }

    // Exibe o formulário para cadastrar um novo cliente
    public function create()
    {
        return view('clientes.create');
    }

    // Armazena um novo cliente
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'telefone' => 'required|regex:/^[0-9]{10,11}$/',
            'email' => 'required|email',
            
        ]);

        $cliente = new Cliente();
        $cliente->nome = $request->nome;
        $cliente->telefone = $request->telefone;
        $cliente->email = $request->email;
        $cliente->save();

        $request->validate([
            'telefone' => ['required', 'regex:/^\(\d{2}\) \d{5}-\d{4}$/']
        ]);
        

        return redirect()->route('clientes.index')->with('success', 'Cliente cadastrado com sucesso!');
    }

    // Exibe o formulário para editar um cliente
    public function edit($id)
    {
        $cliente = Cliente::findOrFail($id);
        return view('clientes.edit', compact('cliente'));
    }

    // Atualiza as informações de um cliente
    public function update(Request $request, $id)
    {
        $request->validate([
            'nome' => 'required',
            'telefone' => 'required',
            'email' => 'required|email',
        ]);

        $cliente = Cliente::findOrFail($id);
        $cliente->nome = $request->nome;
        $cliente->telefone = $request->telefone;
        $cliente->email = $request->email;
        $cliente->save();

        $request->validate([
            'telefone' => ['required', 'regex:/^\(\d{2}\) \d{5}-\d{4}$/']
        ]);
        

        return redirect()->route('clientes.index')->with('success', 'Cliente atualizado com sucesso!');
    }

    // Exclui um cliente
    public function destroy($id)
    {
        $cliente = Cliente::findOrFail($id);
        $cliente->delete();

        return redirect()->route('clientes.index')->with('success', 'Cliente excluído com sucesso!');
    }
}

