<?php

namespace App\Http\Controllers;

use App\Models\Fornecedor;
use Illuminate\Http\Request;

class FornecedorController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $buscar = $request->input('buscar');

        if ($buscar != null) {
            $fornecedores = Fornecedor::when($buscar, function ($query) use ($buscar) {
                $query->where(function ($q) use ($buscar) {
                    $q->where('nome', 'like', "%$buscar%")
                    ->orWhere('cnpj', 'like', "%$buscar%");
                });
            })->paginate(10);

            return view("app.fornecedor.index", [
                'fornecedores' => $fornecedores,
                'request' => $request->all()
            ]);
        }

        $fornecedores = Fornecedor::paginate(10);

        return view('app.fornecedor.index', compact('fornecedores'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('app.fornecedor.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $regras = [
            'nome' => 'required|string|max:100',
            'cnpj' => 'required|string|max:14|unique:fornecedores,cnpj',
            'telefone' => 'required|string|min:10|max:15',
            'email' => 'required|email|max:100|unique:fornecedores,email,'
        ];

        $feedback = [
            'required' => 'O campo :attribute é obrigatório.',
            'max' => 'O campo :attribute não pode ter mais de :max caracteres.',
            'min' => 'O campo :attribute deve ter pelo menos :min caracteres.',
            'email' => 'O campo :attribute deve ser um e-mail válido.',
            'telefone' => 'O campo :attribute deve ser um telefone válido.',
            'unique' => 'O :attribute informado já está cadastrado.',
        ];

        $request->validate($regras, $feedback);

        Fornecedor::create($request->all());

        return redirect()->route('fornecedor.index')
            ->with('success', 'Fornecedor cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $fornecedor = Fornecedor::find($id);

        if (!$fornecedor) {
            return redirect()->route('fornecedor.index')
                ->with('error', 'Fornecedor não encontrado!');
        }

        return view('app.fornecedor.show', compact('fornecedor'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $fornecedor = Fornecedor::find($id);

        if (!$fornecedor) {
            return redirect()->route('fornecedor.index')
                ->with('error', 'Fornecedor não encontrado!');
        }

        return view('app.fornecedor.edit', compact('fornecedor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $regras = [
            'nome' => 'required|string|max:100',
            'cnpj' => 'required|string|max:14|unique:fornecedores,cnpj,' . $id,
            'telefone' => 'required|string|min:10|max:15',
            'email' => 'required|email|max:100|unique:fornecedores,email,' . $id,
        ];

        $feedback = [
            'required' => 'O campo :attribute é obrigatório.',
            'max' => 'O campo :attribute não pode ter mais de :max caracteres.',
            'min' => 'O campo :attribute deve ter pelo menos :min caracteres.',
            'email' => 'O campo :attribute deve ser um e-mail válido.',
            'telefone' => 'O campo :attribute deve ser um telefone válido.',
            'unique' => 'O :attribute informado já está cadastrado.',
        ];

        $request->validate($regras, $feedback);

        $fornecedor = Fornecedor::find($id);

        if (!$fornecedor) {
            return redirect()->route('fornecedor.index')
                ->with('error', 'Fornecedor não encontrado!');
        }

        $fornecedor->update($request->all());

        return redirect()->route('fornecedor.index')
            ->with('success', 'Fornecedor ' . $fornecedor->nome . ' foi atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Fornecedor $fornecedor)
    {
        $fornecedor->delete();

        return redirect()->route('fornecedor.index')
            ->with('success', 'Fornecedor ' . $fornecedor->nome . ' foi removido com sucesso!');
    }
}
