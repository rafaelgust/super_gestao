<?php

namespace App\Http\Controllers;

use App\Models\SiteContato;
use Illuminate\Http\Request;

class ContatoController extends Controller
{
    public function store(Request $request)
    {
        $regras = [ 'nome' => 'required|string|max:100',
            'email' => 'required|email|max:80',
            'telefone' => 'required|string|max:20',
            'motivo_id' => 'required|exists:contato_motivos,id',
            'mensagem' => 'required|string|max:200',];

        $feedback = [
            'required' => 'O campo :attribute é obrigatório.',
            'email' => 'O e-mail deve ser um endereço de e-mail válido.',
            'max' => 'O campo :attribute deve ter no máximo :max caracteres.',
            'exists' => 'O campo :attribute deve ser um valor existente.',
        ];

        $request->validate($regras, $feedback);

        try {
            SiteContato::create($request->all());
            return redirect()->back()->with('success', 'Mensagem enviada com sucesso!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Erro ao enviar mensagem.');
        }
    }
}
