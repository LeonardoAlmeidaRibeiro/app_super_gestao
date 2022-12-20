<?php

namespace App\Http\Controllers;

use App\Produto;
use App\ProdutoDetalhe;
use App\Unidade;
use Illuminate\Http\Request;

use function GuzzleHttp\Promise\all;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $produtos = Produto::paginate(10);

        foreach($produtos as $key=>$produto){
            // print_r($produto->getAttributes());
            // echo '<br><br>';

            $produtoDetalhe = ProdutoDetalhe::where('produto_id',$produto->id)->first();
            if(isset($produtoDetalhe)){
                $produtos[$key]['comprimento']=$produtoDetalhe->comprimento;
                $produtos[$key]['altura']=$produtoDetalhe->altura;
                $produtos[$key]['largura']=$produtoDetalhe->largura ;
            }
        }

        return view('app.produto.index', ['produtos' => $produtos, 'request' => $request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $unidades = Unidade::all();
        return view('app.produto.create',['unidades'=>$unidades]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $regras=[
            'nome'=>'required|min:2|max:40',
            'descricao'=>'required|min:2|max:250',
            'peso'=>'required|integer',
            'unidade_id'=>'exists:unidades,id'
        ];
        $feedback=[
            'required'            => 'O campo :attribute deve ser preenchido',
            'nome.min'            => 'O campo  deve conter no mínimo 2 caracteres',
            'nome.max'            => 'O campo  deve conter no máximo 250 caracteres',
            'descricao.min'       => 'O campo deve conter no mínimo 2 caracteres',
            'descricao.max'       => 'O campo deve conter no máximo 250 caracteres',
            'peso.integer'        => 'O campo de peso deve ser um valor inteiro',
            'unidade_id.exists'   => 'A unidade de medida informada não existe'
        ];
        $request->validate($regras,$feedback);

        Produto::create($request->all());
        return redirect()->route('app.produto');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function show(Produto $produto)
    {
        
        return view('app.produto.show',['produto'=>$produto]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function edit(Produto $produto)
    {
        $unidades = Unidade::all();
        return view('app.produto.edit',['produto'=>$produto,'unidades'=>$unidades]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produto $produto)
    {
        $produto->update($request->all());
        return redirect()->route('app.produto.show',['produto'=>$produto->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produto $produto)
    {
        $produto->delete();
        return redirect()->route('app.produto');
    }
}
