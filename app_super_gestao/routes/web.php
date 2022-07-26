<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return "Olá, seja bem vindo a esse curso!";
// });
Route::get('/', 'PrincipalController@principal')->name('site.index');
Route::get('/sobre-nos', 'SobreNosController@sobreNos')->name('site.sobre-nos');
Route::get('/contato', 'ContatoController@contato')->name('site.contato');

Route::get('/login', function(){ return 'loign';});

//app
Route::prefix('/app')->group(function(){
    Route::get('/clientes', function(){ return 'Clientes';})->name('app.clientes');
    Route::get('/fornecedores','FornecedorController@index')->name('app.fornecedor');
    Route::get('/produtos', function(){ return 'Produtos';})->name('app.produtos');
});
Route::get('/rota1', function () {
    echo 'rota1';
})->name('site.rota1');

Route::get('/rota2', function () {
    return redirect()->route('site.rota1');
})->name('site.rota2');

Route::get('teste/{p1}/{p2}', 'TesteController@teste')->name('teste');

//Route::redirect('rota2','rota1');
Route::fallback(function(){
    echo 'A rota acessada não existe. <a href="'. route('site.index').'">clique aqui</a>';
});
