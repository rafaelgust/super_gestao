<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProdutoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */

    protected function uploadImagem(Request $request): string
    {
        try {
            $image = $request->file('imagem');
            return $image->store('imagens/produtos', 'public');
        } catch (\Exception $e) {
            return response()->json(['error' => 'Falha ao fazer upload da imagem.'], 500);
        }
    }

    protected function removeImagem(string $imagemPath): bool
    {
        try {
            Storage::disk('public')->delete($imagemPath);
        } catch (\Exception $e) {
            return false;
        }
        return true;
    }

    public function index(Request $request)
    {
        $buscar = $request->input('buscar');

        if ($buscar != null) {
            $produtos = Produto::when($buscar, function ($query) use ($buscar) {
                $query->where(function ($q) use ($buscar) {
                    $q->where('nome', 'like', "%$buscar%");
                });
            })->paginate(10);

            return view("app.produto.index", [
                'produtos' => $produtos,
                'request' => $request->all()
            ]);
        }

        $produtos = Produto::paginate(10);

        return view('app.produto.index', compact('produtos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('app.produto.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $regras = [
            'nome' => 'required|string|max:100|unique:produtos,nome',
            'descricao' => 'required|string|max:65535',
            'imagem' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ];

        $feedback = [
            'required' => 'O campo :attribute é obrigatório.',
            'mimes' => 'O campo :attribute deve ser uma imagem válida (jpeg, png, jpg, gif, svg).',
            'max' => 'O campo :attribute não pode ter mais de :max kilobytes.',
        ];

        $request->validate($regras, $feedback);

        $imagem_urn = $this->uploadImagem($request);

        Produto::create(
            array_merge($request->all(),
                ['imagem' => $imagem_urn])
        );

        return redirect()->route('produto.index')
            ->with('success', 'Produto cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $produto = Produto::find($id);

        if (!$produto) {
            return redirect()->route('produto.index')
                ->with('error', 'Produto não encontrado!');
        }

        return view('app.produto.show', compact('produto'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $produto = Produto::find($id);

        if (!$produto) {
            return redirect()->route('produto.index')
                ->with('error', 'Produto não encontrado!');
        }

        return view('app.produto.edit', compact('produto'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $regras = [
            'nome' => 'required|string|max:100|unique:produtos,nome,' . $id,
            'descricao' => 'required|string|max:65535',
            'imagem' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ];

        $feedback = [
            'required' => 'O campo :attribute é obrigatório.',
            'mimes' => 'O campo :attribute deve ser uma imagem válida (jpeg, png, jpg, gif, svg).',
            'max' => 'O campo :attribute não pode ter mais de :max kilobytes.',
        ];

        $request->validate($regras, $feedback);

         $produto = Produto::find($id);

        if (!$produto) {
            return redirect()->route('produto.index')
                ->with('error', 'Produto não encontrado!');
        }


        // validar se no request tem o produto->detalhes
        // se tiver acessar o ProdutoDetalheController e dar create ou update
        $detalhes = $request->filled('peso') ||
            $request->filled('altura') ||
            $request->filled('largura') ||
            $request->filled('comprimento');
        if ($detalhes) {
            try {
                //create ou update
                $detalhesData = $request->only(['peso', 'altura', 'largura', 'comprimento']);
                $produto->detalhes()->updateOrCreate(['produto_id' => $produto->id], $detalhesData);
            } catch (\Exception $e) {
            return redirect()->route('produto.index')
                ->with('error', 'Erro ao salvar detalhes do produto: ' . $e->getMessage());
            }
        }

        $dadosAtualizados = [];

        // Atualiza imagem se houver novo upload
        if ($request->hasFile('imagem')) {
            if ($produto->imagem) {
            $this->removeImagem($produto->imagem);
            }
            $imagem_urn = $this->uploadImagem($request);
            $dadosAtualizados['imagem'] = $imagem_urn;
        }

        // Atualiza apenas campos modificados
        foreach (['nome', 'descricao', 'status'] as $campo) {
            if ($request->has($campo) && $request->input($campo) !== $produto->$campo) {
            $dadosAtualizados[$campo] = $request->input($campo);
            }
        }

        $produto->fill($dadosAtualizados);
        $produto->save();

        return redirect()->route('produto.index')
            ->with('success', 'Produto ' . $produto->nome . ' foi atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $produto = Produto::find($id);

        if (!$produto) {
            return redirect()->route('produto.index')
                ->with('error', 'Produto não encontrado!');
        }

        $isRemoved = $this->removeImagem($produto->imagem);
        if (!$isRemoved) {
            return response()->json(['error' => 'Falha ao remover a imagem.'], 500);
        }

        $produto->delete();

        return redirect()->route('produto.index')
            ->with('success', 'Produto ' . $produto->nome . ' foi removido com sucesso!');
    }
}