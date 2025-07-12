<?php

namespace App\Http\Controllers;

use App\Models\Fornecedor;
use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    public function index()
    {
        $dados = Fornecedor::orderBy('nome')->get();
        return view('fornecedor.list', ['dados' => $dados]);
    }

    public function create()
    {
        return view('fornecedor.form');
    }

    public function edit(string $id)
    {
        $dado = Fornecedor::findOrFail($id);
        return view('fornecedor.form', ['dado' => $dado]);
    }

    private function validateRequest(Request $request)
    {
        $request->validate([
            'nome'     => 'required|string|max:255',
            'email'    => 'required|email|unique:fornecedor,email,' . $request->id,
            'telefone' => 'required|string|max:20',
            'empresa'  => 'nullable|string|max:255',
            'endereco' => 'nullable|string|max:255',
        ], [
            'nome.required'     => 'O campo nome é obrigatório',
            'email.required'    => 'O campo email é obrigatório',
            'email.email'       => 'Informe um email válido',
            'email.unique'      => 'Este email já está em uso',
            'telefone.required' => 'O telefone é obrigatório',
        ]);
    }

    public function store(Request $request)
    {
        $this->validateRequest($request);
        Fornecedor::create($request->all());

        return redirect('fornecedor')->with('success', 'Fornecedor cadastrado com sucesso!');
    }

    public function update(Request $request, string $id)
    {
        $request->merge(['id' => $id]);
        $this->validateRequest($request);

        $fornecedor = Fornecedor::findOrFail($id);
        $fornecedor->update($request->all());

        return redirect('fornecedor')->with('success', 'Fornecedor atualizado com sucesso!');
    }

    public function destroy(string $id)
    {
        $fornecedor = Fornecedor::findOrFail($id);
        $fornecedor->delete();

        return redirect('fornecedor')->with('success', 'Fornecedor removido com sucesso!');
    }

    public function search(Request $request)
    {
        if (!empty($request->valor)) {
            $dados = Fornecedor::where($request->tipo, 'like', "%{$request->valor}%")->get();
        } else {
            $dados = Fornecedor::all();
        }

        return view('fornecedor.list', ['dados' => $dados]);
    }
}
