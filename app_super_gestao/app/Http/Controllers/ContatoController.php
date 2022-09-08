<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SiteContato;
use App\MotivoContato;

class ContatoController extends Controller
{
    public function contato(Request $request)
    {


        //    $contato = new SiteContato();
        //    $contato->nome = $request->input('nome');
        //    $contato->telefone = $request->input('telefone');
        //    $contato->email = $request->input('email');
        //    $contato->motivo_contato = $request->input('motivo_contato');
        //    $contato->mensagem = $request->input('mensagem');

        //    //print_r($contato->getAttributes());
        //    $contato->save();

        // $contato = new SiteContato();
        // $contato->fill($request->all());
        // $contato->save();

        $motivo_contatos = MotivoContato::all();
        return view('site.contato', ['titulo' => 'Contato', 'motivo_contatos' => $motivo_contatos]);
    }

    public function salvar(Request $request)
    {
        $regras = [
            'nome' => 'required|min:3|max:40|unique:site_contatos',
            'telefone' => 'required',
            'email' => 'email',
            'motivo_contatos_id' => 'required',
            'mensagem' => 'required',
        ];
        $feedback = [
            'nome.required'=>'O campo nome precisa ser preenchido!',
            'nome.min'=> ' O campo nome prescisa possuir mais de três caracteres',
            'nome.max'=> ' O comapo nome pode ter no máximo 4o caracteres',
            'nome.unique'=> 'O nome informado deve ser único',
            'telefone.required'=> 'O campo do telefone de contato deve ser preenchido',
            'email.email'=>'Insira um email válido',
            'motivo_contatos_id.required'=> 'Selecione o motivo de contato',
            'mensagem.required'=>'preecnhe o campo de mensagem'
        ];
        // $request->validate(
        //     [
        //         'nome' => 'required|min:3|max:40|unique:site_contatos',
        //         'telefone' => 'required',
        //         'email' => 'email',
        //         'motivo_contatos_id' => 'required',
        //         'mensagem' => 'required',
        //     ],
        //     [
        //         'nome.required'=>'O campo nome precisa ser preenchido!',
        //         'nome.min'=> ' O campo nome prescisa possuir mais de três caracteres',
        //         'nome.max'=> ' O comapo nome pode ter no máximo 4o caracteres',
        //         'nome.unique'=> 'O nome informado deve ser único',
        //         'telefone.required'=> 'O campo do telefone de contato deve ser preenchido',
        //         'email.email'=>'Insira um email válido',
        //         'motivo_contatos_id.required'=> 'Selecione o motivo de contato',
        //         'mensagem.required'=>'preecnhe o campo de mensagem'
        //     ]
        // );
        $request->validate($regras, $feedback);
        SiteContato::create($request->all());
        return redirect()->route('site.index');
    }
}
