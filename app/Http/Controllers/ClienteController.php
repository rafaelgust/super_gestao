<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
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
            $clientes = Cliente::when($buscar, function ($query) use ($buscar) {
                $query->where(function ($q) use ($buscar) {
                    $q->where('nome', 'like', "%$buscar%")
                    ->orWhere('cpf', 'like', "%$buscar%");
                });
            })->paginate(10);

            return view("app.cliente.index", [
                'clientes' => $clientes,
                'request' => $request->all()
            ]);
        }

        $clientes = Cliente::paginate(10);

        return view('app.cliente.index', compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('app.cliente.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $regras = [
            'nome' => 'required|string|max:100',
            'cpf' => 'required|string|max:11|unique:clientes,cpf',
            'telefone' => 'required|string|min:10|max:15',
            'email' => 'required|email|max:100|unique:clientes,email,'
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

        cliente::create($request->all());

        return redirect()->route('cliente.index')
            ->with('success', 'cliente cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $cliente = Cliente::find($id);

        if (!$cliente) {
            return redirect()->route('cliente.index')
                ->with('error', 'cliente não encontrado!');
        }

        return view('app.cliente.show', compact('cliente'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $cliente = Cliente::find($id);

        if (!$cliente) {
            return redirect()->route('cliente.index')
                ->with('error', 'cliente não encontrado!');
        }

        return view('app.cliente.edit', compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $regras = [
            'nome' => 'required|string|max:100',
            'cpf' => 'required|string|max:11|unique:clientes,cpf,' . $id,
            'telefone' => 'required|string|min:10|max:15',
            'email' => 'required|email|max:100|unique:clientes,email,' . $id,
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

        $cliente = cliente::find($id);

        if (!$cliente) {
            return redirect()->route('cliente.index')
                ->with('error', 'cliente não encontrado!');
        }

        $cliente->update($request->all());

        return redirect()->route('cliente.index')
            ->with('success', 'cliente ' . $cliente->nome . ' foi atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $cliente = Cliente::find($id);

        if (!$cliente) {
            return redirect()->route('cliente.index')
                ->with('error', 'cliente não encontrado!');
        }

        $cliente->delete();

        return redirect()->route('cliente.index')
            ->with('success', 'cliente ' . $cliente->nome . ' foi removido com sucesso!');
    }
}
