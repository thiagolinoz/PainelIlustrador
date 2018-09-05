<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Produto;
use App\Http\Controllers\Controller;

class ProdutoController extends Controller
{
    public function __construct()
    {

    }
    
    public function index()
    {
		  //resultado c/ paginacao	        
        $produto = \App\Produto::where(array('deleted' => 0, 'ativo' => 1))
        ->orderBy('ordem', 'asc')->paginate(8);
        
        //texto loja apenas atualiza
        $sobre = \App\Sobre::where(['id' => 2, 'deleted' => 0])->first();

        return view('site.produto', ['produto' => $produto, 'sobre' => $sobre]);
    }
    
    public function detalhe($id)
    {
    	if(is_null($id)){
			  return redirect('loja');    	
    	}
    	
 	   $produto = \App\Produto::where('id', $id)->first();
     
      $medidasProdutosObj = \App\Produto::find($id);
      $medidasProdutos = $medidasProdutosObj->medidas()->where('deleted', 0)->get();
      
     $medidas = \App\Medidas::where(['deleted' => 0, 'ativo' => 1])->get();
	  //envia array c medidas e id	
     foreach($medidas as $m){
     	$arrayMedidas[$m->id ] = $m->medidas;
     }	
     //inverte p/ usar c array search, que vai fazer busca e mostrar valor achado
     $arrayMedidas = array_flip($arrayMedidas);

     $wsdl = "http://ws.correios.com.br/calculador/CalcPrecoPrazo.asmx?WSDL";
     
     return view('site.produto-detalhe',['produto' => $produto, 'medidasProdutos' => $medidasProdutos, 'arrayMedidas' => $arrayMedidas]);
    }
    
    public function botaoJson(Request $request)
    {
		$id = $request->input('medida_id');
		$botao = \App\ProdutoMedida::where('id', $id)->first();
		
		return response()->json([
			'botao1'	=> $botao->botao1,
			'botao2' => $botao->botao2,
			'botao3' => $botao->botao3,
			'preco' => $botao->preco,	
		]);		
    }
    
    public function agradecimento()
    {
		return view('site.produto-agradecimento');    
    }
}
