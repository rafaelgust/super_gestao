<?php

namespace App\Http\Controllers;

use App\Models\Fornecedor;
use App\Models\PedidoCompra;
use App\Models\Produto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PedidoCompraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
         $buscar = $request->input('buscar');

        if ($buscar != null) {
            $compras = PedidoCompra::when($buscar, function ($query) use ($buscar) {
                $query->where('id', $buscar)
                    ->orWhereHas('fornecedor', function ($q) use ($buscar) {
                        $q->where('nome', 'like', "%$buscar%");
                    });
            })->paginate(10);

            return view("app.compra.index", [
                'compras' => $compras,
                'request' => $request->all()
            ]);
        }

        $compras = PedidoCompra::paginate(10);

        return view('app.compra.index', [
            'compras' => $compras
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($produtoId)
    {
        $fornecedores = Fornecedor::all();
        $produtos = Produto::all();

        return view('app.compra.create', compact('produtoId', 'fornecedores', 'produtos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $regras = [
            'nota_fiscal' => 'required|string|max:255',
            'fornecedor_id' => 'required|exists:fornecedores,id',
            'produtos' => 'required|array',
            'produtos.*.id' => 'required|exists:produtos,id',
            'produtos.*.quantidade' => 'required|integer|min:1',
            'produtos.*.preco' => 'required|numeric|min:0',
            'valor_total' => 'required|numeric|min:0',
        ];

        $feedbacks = [
            'required' => 'O campo :attribute é obrigatório.',
            'string' => 'O campo :attribute deve ser uma string.',
            'max' => 'O campo :attribute não pode ter mais de :max caracteres.',
            'exists' => 'O campo :attribute deve existir na tabela :table.',
            'array' => 'O campo :attribute deve ser um array.',
            'integer' => 'O campo :attribute deve ser um número inteiro.',
            'min' => 'O campo :attribute deve ser maior ou igual a :min.',
            'numeric' => 'O campo :attribute deve ser um número.',
        ];

        $request->validate($regras, $feedbacks);

        // criar pedidos compras pra depois criar os itens pedidos compras

        // Utiliza transação para garantir integridade dos dados
        DB::beginTransaction();

        try {
            $pedidoCompra = PedidoCompra::create([
            'nota_fiscal' => $request->input('nota_fiscal'),
            'fornecedor_id' => $request->input('fornecedor_id'),
            'valor_total' => $request->input('valor_total'),
            'status' => 'criado',
            'data_pedido' => $request->input('data_pedido'),
            'data_entrega' => $request->input('data_entrega')
            ]);

            foreach ($request->input('produtos') as $produto) {
            $pedidoCompra->itens()->create([
                'produto_id' => $produto['id'],
                'quantidade' => $produto['quantidade'],
                'preco_unitario' => $produto['preco']
            ]);
            }

            DB::commit();

            return response()->json(['message' => 'Pedido criado com sucesso', 'pedido_compra_id' => $pedidoCompra->id], 201);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['error' => 'Erro ao criar pedido', 'details' => $e->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $compra = PedidoCompra::with('itens.produto')->findOrFail($id);
        $fornecedores = Fornecedor::all();

        $statusList = ['criado', 'em andamento', 'concluido'];

        return view('app.compra.edit', compact('compra', 'fornecedores', 'statusList'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $compra = PedidoCompra::findOrFail($id);

        $regras = [
            'status' => 'required|string|in:criado,em andamento,concluido',
            'data_entrega' => 'required|date|after:data_pedido'
        ];

        $feedbacks = [
            'status.required' => 'O campo status é obrigatório.',
            'status.string' => 'O campo status deve ser uma string.',
            'status.in' => 'O campo status deve ser um dos seguintes valores: criado, em andamento, concluído.',
            'data_entrega.required' => 'O campo data_entrega é obrigatório.',
            'data_entrega.date' => 'O campo data_entrega deve ser uma data válida.',
            'data_entrega.after' => 'O campo data_entrega deve ser uma data após a data_pedido.'
        ];

        $request->validate($regras, $feedbacks);

        // Utiliza transação para garantir integridade dos dados
        DB::beginTransaction();

        try {
            $compra->update([
                'nota_fiscal' => $compra->nota_fiscal,
                'fornecedor_id' => $compra->fornecedor_id,
                'valor_total' => $compra->valor_total,
                'status' => $request->input('status'),
                'data_pedido' => $compra->data_pedido,
                'data_entrega' => $request->input('data_entrega')
            ]);
        
            DB::commit();

            return response()->json(['message' => 'Pedido atualizado com sucesso', 'pedido_compra_id' => $compra->id], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['error' => 'Erro ao atualizar pedido', 'details' => $e->getMessage()], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $pedidoCompra = PedidoCompra::findOrFail($id);
        $pedidoCompra->delete();

        if($pedidoCompra->trashed()) {
            return redirect()->route('compra.index')->with('success', 'Pedido excluído com sucesso.');
        } else {
            return redirect()->route('compra.index')->with('error', 'Erro ao excluir pedido.');
        }
    }
}
