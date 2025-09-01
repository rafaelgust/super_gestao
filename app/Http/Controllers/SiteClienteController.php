<?php

namespace App\Http\Controllers;

use App\Models\SiteCliente;

class SiteClienteController extends Controller
{
    public function pegarInformacoes()
    {
        $cliente = SiteCliente::whereNull('deleted_at')->first();
        return $cliente;
    }

}
