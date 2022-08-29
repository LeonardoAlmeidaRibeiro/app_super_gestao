<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContatoController extends Controller
{
    public function contato(Request $request){
        

        echo '<prev>';
        print_r($request->all());
        echo '</prev>';
        echo $request->input('nome');
        echo '<br>';
        echo  $request->input('email');

        //dd($request);
        //var_dump($_GET);
        return view('site.contato',['titulo'=>'Contato']);
    }
}
