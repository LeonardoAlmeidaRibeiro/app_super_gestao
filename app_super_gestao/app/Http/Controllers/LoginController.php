<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class LoginController extends Controller
{
    public function index(){
        return view('site.login',['titulo'=>'Login']);
    }

    public function autenticar(Request $request){
        //regras de autenticacao
        $regras = [
            'usuario' => 'email',
            'senha' => 'required'
        ];
        $feddback = [
            'usuario.email'=> 'O campo usuário (e-mail) é obrigátório ',
            'senha.required'=> 'O campo senha é obrigatório'
        ];
        //return 'Chegamos até aqui!';
        $request->validate($regras,$feddback);

        $email = $request->get('usuario');
        $password = $request->get('senha');


        $user = new User();
        $usuario = $user->where('email',$email)->where('password', $password)->get()->first();

        if(isset($usuario->name)){
            echo 'Usuário existe';
        } else {
            return redirect()->route('site.login', ['erro'=>1]);
        }
        
    }
}
