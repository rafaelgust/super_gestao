<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ContatoController;
use App\Http\Controllers\FilialController;
use App\Http\Controllers\FornecedorController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PedidoCompraController;
use App\Http\Controllers\PedidoVendaController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [SiteController::class, 'index'])->name('site.index');
Route::get('/sobre-nos', [SiteController::class, 'sobreNos'])->name('site.sobre-nos');
Route::get('/contato', [SiteController::class, 'contato'])->name('site.contato');
Route::post('/contato', [ContatoController::class, 'store'])
        ->name('site.contato.store');

Auth::routes(['verify' => true]);

Route::middleware(['verified'])->group(function () {
        Route::get('/home', 
                [HomeController::class, 'index'])
                        ->name('home');

        Route::get('/pedido/compra', [PedidoCompraController::class, 'index'])
                ->name('compra.index');
        Route::get('/pedido/compra/criar/{fornecedorId}', [PedidoCompraController::class, 'create'])
                ->name('compra.create');
        Route::post('/pedido/compra', [PedidoCompraController::class, 'store'])
                ->name('compra.store');
        Route::get('/pedido/compra/edit/{compraId}', [PedidoCompraController::class, 'edit'])
                ->name('compra.edit');
        Route::get('/pedido/compra/{compraId}', [PedidoCompraController::class, 'show'])
                ->name('compra.show');
        Route::put('/pedido/compra/{compraId}', [PedidoCompraController::class, 'update'])
                ->name('compra.update');
        Route::delete('/pedido/compra/{compraId}', [PedidoCompraController::class, 'destroy'])
        ->name('compra.destroy');


        Route::get('/pedido/venda', [PedidoVendaController::class, 'index'])
                ->name('venda.index');
        Route::get('/pedido/venda/criar/{clienteId}', [PedidoVendaController::class, 'create'])
                ->name('venda.create');
        Route::post('/pedido/venda', [PedidoVendaController::class, 'store'])
                ->name('venda.store');
        Route::get('/pedido/venda/edit/{vendaId}', [PedidoVendaController::class, 'edit'])
                ->name('venda.edit');
        Route::put('/pedido/venda/{vendaId}', [PedidoVendaController::class, 'update'])
                ->name('venda.update');
        Route::delete('/pedido/venda/{vendaId}', [PedidoVendaController::class, 'destroy'])
                ->name('venda.destroy');

        Route::get('/contato/index', [ContatoController::class, 'index'])
                ->name('contato.index');
        Route::get('/contato/lista', [ContatoController::class, 'lista'])
                ->name('contato.lista');

        Route::get('/cliente', [ClienteController::class, 'index'])
                ->name('cliente.index');
        Route::get('/cliente/lista', [ClienteController::class, 'lista'])
                ->name('cliente.lista');
        Route::get('/cliente/create', [ClienteController::class, 'create'])
                ->name('cliente.create');
        Route::post('/cliente/store', [ClienteController::class, 'store'])
                ->name('cliente.store');
        Route::get('/cliente/{id}', [ClienteController::class, 'show'])
                ->name('cliente.show');
        Route::get('/cliente/edit/{id}', [ClienteController::class, 'edit'])
                ->name('cliente.edit');
        Route::get('/cliente/update/{id}', [ClienteController::class, 'update'])
                ->name('cliente.update');
        Route::get('/cliente/destroy/{id}', [ClienteController::class, 'destroy'])
                ->name('cliente.destroy');

      
        Route::get('/fornecedor', [FornecedorController::class, 'index'])
                ->name('fornecedor.index');
        Route::get('/fornecedor/lista', [FornecedorController::class, 'lista'])
                ->name('fornecedor.lista');
        Route::get('/fornecedor/create', [FornecedorController::class, 'create'])
                ->name('fornecedor.create');
        Route::post('/fornecedor/store', [FornecedorController::class, 'store'])
                ->name('fornecedor.store');
        Route::get('/fornecedor/{id}', [FornecedorController::class, 'show'])
                ->name('fornecedor.show');
        Route::get('/fornecedor/edit/{id}', [FornecedorController::class, 'edit'])
                ->name('fornecedor.edit');
        Route::get('/fornecedor/update/{id}', [FornecedorController::class, 'update'])
                ->name('fornecedor.update');
        Route::get('/fornecedor/destroy/{id}', [FornecedorController::class, 'destroy'])
                ->name('fornecedor.destroy');

      
        Route::resource('filial', FilialController::class);
        Route::resource('produto', ProdutoController::class);
});