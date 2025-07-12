<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class PedidoController extends Controller
{
    public function index()
    {
        $dados = Pedido::orderBy('data', 'desc')->get();
        return view('pedido.list', ['dados' => $dados]);
    }

    public function create()
    {
        return view('pedido.form');
    }

    public function edit(string $id)
    {
        $dado = Pedido::findOrFail($id);
        return view('pedido.form', ['dado' => $dado]);
    }

    private function validateRequest(Request $request)
    {
        $request->validate([
            'codigo' => 'required|string|max:20',
            'data'   => 'required|date',
            'total'  => 'required|numeric|min:0',
        ], [
            'codigo.required' => 'O campo código é obrigatório',
            'data.required'   => 'O campo data é obrigatório',
            'total.required'  => 'O campo total é obrigatório',
        ]);
    }

    public function store(Request $request)
    {
        $this->validateRequest($request);
        Pedido::create($request->all());

        return redirect('pedido')->with('success', 'Pedido cadastrado com sucesso!');
    }

    public function update(Request $request, string $id)
    {
        $request->merge(['id' => $id]);
        $this->validateRequest($request);

        $pedido = Pedido::findOrFail($id);
        $pedido->update($request->all());

        return redirect('pedido')->with('success', 'Pedido atualizado com sucesso!');
    }

    public function destroy(string $id)
    {
        $pedido = Pedido::findOrFail($id);
        $pedido->delete();

        return redirect('pedido')->with('success', 'Pedido removido com sucesso!');
    }

    public function search(Request $request)
    {
        $dados = !empty($request->valor)
            ? Pedido::where($request->tipo, 'like', "%{$request->valor}%")->get()
            : Pedido::all();

        return view('pedido.list', ['dados' => $dados]);
    }

    public function report()
    {
        $pedido = Pedido::orderBy('data')->get();
    
        $data = [
            'titulo'  => 'Listagem de Pedidos',
            'pedido' => $pedido,
        ];
    
        $pdf = Pdf::loadView('pedido.report', $data);
        return $pdf->download('relatorio_pedido.pdf');
    }
}