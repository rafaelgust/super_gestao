<?php

namespace App\Http\Controllers;

use App\Models\ContatoMotivo;

class SiteController extends Controller
{
    private function saveDataSiteToSession()
    {
        if (!session()->has('site_informacoes')) {
            $siteController = new SiteClienteController();
            $site = $siteController->pegarInformacoes();
            
            session(['site_informacoes' => $site]);
        }
    }

    public function index()
    {
        $this->saveDataSiteToSession();
        $componentes = (new SiteComponenteController())->pegarComponentesPelaPagina('index');
        
        $motivo_contatos = ContatoMotivo::all();

        return view('site.index', compact('motivo_contatos', 'componentes'));
    }

    public function sobreNos()
    {
        $this->saveDataSiteToSession();
        $siteController = new SiteClienteController();

        return view('site.sobre-nos');
    }

    public function contato()
    {
        $this->saveDataSiteToSession();
        $motivo_contatos = ContatoMotivo::all();

        return view('site.contato', compact('motivo_contatos'));
    }
}
