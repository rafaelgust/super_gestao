<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ContatoController;
use App\Http\Controllers\FilialController;
use App\Http\Controllers\FornecedorController;
use App\Http\Controllers\HomeController;
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

        Route::resource('fornecedor', FornecedorController::class);
        Route::resource('cliente', ClienteController::class);
        Route::resource('filial', FilialController::class);
});