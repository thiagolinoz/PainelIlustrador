<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
	
   public function medidas()
   {
		return $this->hasMany('App\ProdutoMedida');   
   }
}
