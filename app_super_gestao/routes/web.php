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
Route::get('/', 'PrincipalController@principal');
Route::get('/sobre-nos', 'SobreNosController@sobreNos');
Route::get('/contato', 'ContatoController@contato');
// Route::get('/contato/{nome?}/{categoria?}/{assunto?}/{mensagem?}', function (string $nome = 'Desconhecido', string $categoria = 'Informação', string $assunto = 'contato', string $mensagem = 'Mensagem nao informada') {
//     echo "Estamos aqui: " . $nome . " - " . $categoria . " -    " . $assunto . " - " . $mensagem;
// });

Route::get('/contato/{nome}/{categoria_id}', function (string $nome = 'Desconhecido', int $categoria_id = 1)  {
    echo "Estamos aqui: " . $nome .'<br>'. " Categoria: " . $categoria_id;
})->where('categoria_id','[0-9]+')->where('nome','[A-Za-z]+');
