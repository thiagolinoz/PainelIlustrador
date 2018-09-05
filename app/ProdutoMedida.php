<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProdutoMedida extends Model
{
	 protected $fillable = ['medidas_id', 'botao1', 'botao2', 'botao3', 'preco'];
	 
    public function produtos()
    {
		return $this->belongsTo('App\Produto');    
    }
}
