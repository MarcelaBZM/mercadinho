<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Models\Categoria;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    // Exibe a lista de produtos
    public function index()
    {
        $produtos = Produto::all();
        return view('produtos.index', compact('produtos'));
    }




    // Exibe o formulário para cadastrar um novo produto
    public function create()
    {
        $categorias = Categoria::all();  // Pega todas as categorias
        return view('produtos.create', compact('categorias'));
    }

    // Armazena o novo produto no banco de dados
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'categoria_id' => 'required',
            'preco' => 'required|numeric',
            'quantidade' => 'required|integer',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        ]);

        $produto = new Produto();
        $produto->nome = $request->nome;
        $produto->categoria_id = $request->categoria_id;
        $produto->preco = $request->preco;
        $produto->quantidade = $request->quantidade;

        // Se houver foto, faz o upload
        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('produtos', 'public');
            $produto->foto = $fotoPath;
        }

        $produto->save();

        return redirect()->route('produtos.index')->with('success', 'Produto cadastrado com sucesso!');
    }

    // Exibe o formulário para editar um produto
    public function edit($id)
    {
        $produto = Produto::findOrFail($id);
        $categorias = Categoria::all();
        return view('produtos.edit', compact('produto', 'categorias'));
    }

    // Atualiza um produto existente no banco
    public function update(Request $request, $id)
    {
        $request->validate([
            'nome' => 'required',
            'categoria_id' => 'required',
            'preco' => 'required|numeric',
            'quantidade' => 'required|integer',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        ]);

        $produto = Produto::findOrFail($id);
        $produto->nome = $request->nome;
        $produto->categoria_id = $request->categoria_id;
        $produto->preco = $request->preco;
        $produto->quantidade = $request->quantidade;

        // Se houver foto, faz o upload
        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('public/produtos');
            $produto->foto = basename($fotoPath);
        }



        $produto->save();

        return redirect()->route('produtos.index')->with('success', 'Produto atualizado com sucesso!');
    }

    // Exclui um produto
    public function destroy($id)
    {
        $produto = Produto::findOrFail($id);
        $produto->delete();

        return redirect()->route('produtos.index')->with('success', 'Produto excluído com sucesso!');
    }
}
