<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemDetalhe extends Model
{
    protected $table = 'produtos_detalhes';

    protected $fillable = ['nome', 'descricao', 'peso', 'unidade_id'];

    public function item(){
        return $this->hasOne('App\Item','produto_id','id');
    }
}
