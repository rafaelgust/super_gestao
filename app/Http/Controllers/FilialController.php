<?php

namespace App\Http\Controllers;

use App\Models\Filial;
use Illuminate\Http\Request;

class FilialController extends Controller
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
            $filiais = Filial::when($buscar, function ($query) use ($buscar) {
                $query->where(function ($q) use ($buscar) {
                    $q->where('nome', 'like', "%$buscar%");
                });
            })->paginate(10);

            return view("app.filial.index", [
                'filiais' => $filiais,
                'request' => $request->all()
            ]);
        }

        $filiais = Filial::paginate(10);

        return view('app.filial.index', compact('filiais'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('app.filial.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $regras = [
            'nome' => 'required|string|max:100|unique:filiais,nome'
        ];

        $feedback = [
            'required' => 'O campo :attribute é obrigatório.',
            'max' => 'O campo :attribute não pode ter mais de :max caracteres.',
            'unique' => 'O :attribute informado já está cadastrado.',
        ];

        $request->validate($regras, $feedback);

        Filial::create($request->all());

        return redirect()->route('filial.index')
            ->with('success', 'filial cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $filial = Filial::find($id);

        if (!$filial) {
            return redirect()->route('filial.index')
                ->with('error', 'filial não encontrado!');
        }

        return view('app.filial.show', compact('filial'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $filial = Filial::find($id);

        if (!$filial) {
            return redirect()->route('filial.index')
                ->with('error', 'filial não encontrado!');
        }

        return view('app.filial.edit', compact('filial'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $regras = [
            'nome' => 'required|string|max:100|unique:filiais,nome,' . $id,
        ];

        $feedback = [
            'required' => 'O campo :attribute é obrigatório.',
            'max' => 'O campo :attribute não pode ter mais de :max caracteres.',
            'unique' => 'O :attribute informado já está cadastrado.',
        ];

        $request->validate($regras, $feedback);

        $filial = filial::find($id);

        if (!$filial) {
            return redirect()->route('filial.index')
                ->with('error', 'filial não encontrado!');
        }

        $filial->update($request->all());

        return redirect()->route('filial.index')
            ->with('success', 'filial ' . $filial->nome . ' foi atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $filial = Filial::find($id);

        if (!$filial) {
            return redirect()->route('filial.index')
                ->with('error', 'filial não encontrado!');
        }

        $filial->delete();

        return redirect()->route('filial.index')
            ->with('success', 'filial ' . $filial->nome . ' foi removido com sucesso!');
    }
}