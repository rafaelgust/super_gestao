<?php

namespace App\Http\Controllers;

use App\Models\ContatoMotivo;

class SiteController extends Controller
{

    public function index()
    {
        $motivo_contatos = ContatoMotivo::all();
        return view('site.index', compact('motivo_contatos'));
    }

    public function sobreNos()
    {
        return view('site.sobre-nos');
    }

    public function contato()
    {
        $motivo_contatos = ContatoMotivo::all();
        return view('site.contato', compact('motivo_contatos'));
    }
}
