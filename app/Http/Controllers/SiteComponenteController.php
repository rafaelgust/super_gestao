<?php

namespace App\Http\Controllers;

use App\Models\site_componente;
use App\Models\SiteComponente;
use Illuminate\Http\Request;

class SiteComponenteController extends Controller
{
    public function pegarComponentesPelaPagina($pagina)
    {
        $componentes = SiteComponente::where('tipo', "like", "%$pagina%")->get();
        return $componentes;
    }
}
