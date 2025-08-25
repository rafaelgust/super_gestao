<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Filial;
use App\Models\Fornecedor;
use App\Models\PedidoCompra;
use App\Models\PedidoVenda;
use App\Models\Produto;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $quantidadeDeFiliais = Filial::count();
        $quantidadeDeProdutos = Produto::count();
        $quantidadeDeClientes = Cliente::count();
        $quantidadeDeFornecedores = Fornecedor::count();

        $quantidadePedidosDeCompraComStatus = [
            'criado' => PedidoCompra::where('status', 'criado')->count(),
            'em andamento' => PedidoCompra::where('status', 'em andamento')->count(),
            'concluido' => PedidoCompra::where('status', 'concluido')->count(),
        ];

        $quantidadePedidosDeVendaComStatus = [
            'criado' => PedidoVenda::where('status', 'criado')->count(),
            'em andamento' => PedidoVenda::where('status', 'em andamento')->count(),
            'concluido' => PedidoVenda::where('status', 'concluido')->count(),
        ];

        return view('app.home', 
            compact(
                'quantidadeDeFiliais',
                'quantidadeDeProdutos',
                'quantidadeDeClientes',
                'quantidadeDeFornecedores',
                'quantidadePedidosDeCompraComStatus',
                'quantidadePedidosDeVendaComStatus'
            ));
    }
}
