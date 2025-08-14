<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiteController extends Controller
{
    /**
     * Display the main page of the site.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('site.index');
    }

    /**
     * Display the "Sobre Nós" page.
     *
     * @return \Illuminate\View\View
     */
    public function sobreNos()
    {
        return view('site.sobre-nos');
    }

    /**
     * Display the "Contato" page.
     *
     * @return \Illuminate\View\View
     */
    public function contato()
    {
        return view('site.contato');
    }
}
