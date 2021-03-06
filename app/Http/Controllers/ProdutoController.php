<?php

namespace App\Http\Controllers;

use Validator;
use Storage;
use App\Produto;
use App\Medidas;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
	
	 public function __construct()
	 {
	 	$this->middleware('auth');
	 }	
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produtos = \App\Produto::where('deleted',0)->get();
        
        return view('admin.produto.lista',['produtos' => $produtos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	  $medidas = \App\Medidas::where(['deleted' => 0, 'ativo' => 1])->get();
        return view('admin.produto.create', ['medidas' => $medidas]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
	
        $request->validate([
				'imagem' => 'required|image',
        ]);
        
        $produto = new Produto;
        
        $arquivo = $request->file('imagem');
        $fileName = time().'.'.$arquivo->getClientOriginalExtension();
        $arquivo->move(public_path('/images/produto'), $fileName);
        
        $produto->imagem = $fileName;
        $produto->titulo = $request->input('titulo');
        $produto->ordem = $request->input('ordem');
        $produto->descricao = $request->input('descricao');
        $produto->ativo = $request->input('ativo');
        
        $produto->save();
        
        $novoProduto = \App\Produto::find($produto->id);
        
        if($request->input('botao') !== null){
	        foreach($request->input('botao') as $key => $botao){
					 //valida decimal						 
					 $request->validate([
							"botao.$key.preco" => 'regex:/^\d*(\.\d{1,2})?$/',
			        ]);			
					$novoProduto->medidas()->create([
						'medidas_id' => $key,
						'botao1'	=> $botao['botao1'],
						'botao2'	=> $botao['botao2'],
						'botao3'	=> $botao['botao3'],
						'preco' => 	(float)$botao['preco']			
					]);
	        }
	      }  	
        
        return redirect('admin/produto')->with('status', 'Conteudo criado');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $produto = \App\Produto::where('id', $id)->first();
        $medidas = \App\Medidas::where(['deleted' => 0, 'ativo' => 1])->get();
		  //envia array c medidas e id	
        foreach($medidas as $m){
        	$arrayMedidas[$m->id ] = $m->medidas;
        }	
        //inverte p/ usar c array search, que vai fazer busca e mostrar valor achado
        $arrayMedidas = array_flip($arrayMedidas);
        
        $medidasProdutosObj = \App\Produto::find($id);
        $medidasProdutos = $medidasProdutosObj->medidas()->where('deleted', 0)->get();
        
        return view('admin.produto.edit',['produto' => $produto, 'medidas' => $medidas, 'medidasProdutos' => $medidasProdutos, 'arrayMedidas' => $arrayMedidas]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $file = \App\Produto::find($id);
        
        $arquivo = $request->file('imagem');
        
        if(!empty($arquivo)){
				$fileName = time().'.'.$arquivo->getClientOriginalExtension();
				$arquivo->move(public_path('/images/produto'), $fileName);
				$file->imagem = $fileName;         
        }
        $file->titulo = $request->input('titulo');
        $file->descricao = $request->input('descricao');
        $file->ordem = $request->input('ordem');
        $file->ativo = $request->input('ativo');
        
        $file->save();
        
        $novoProduto = \App\Produto::find($id);
        
        foreach($request->input('botao') as $key => $botao){
				//valida decimal        		
        		$request->validate([
					"botao.$key.preco" => 'regex:/^\d*(\.\d{1,2})?$/',
			   ]);
			   //verifica se botao existe	
        		$medidas = $novoProduto->medidas()->where('medidas_id', $key)->first();
				//caso exista atualiza 	        		
        		if(isset($medidas->medidas_id) && $medidas->medidas_id == $key){
					$novoProduto->medidas()->where(['medidas_id' => $key, 'deleted' => 0])->update([
						'botao1'	=> $botao['botao1'],
						'botao2'	=> $botao['botao2'],
						'botao3'	=> $botao['botao3'],
						'preco' => 	(float)$botao['preco']				
					]);
				//senao cria novo ao atualizar	
				}else{
					$novoProduto->medidas()->create([
						'medidas_id' => $key,
						'botao1'	=> $botao['botao1'],
						'botao2'	=> $botao['botao2'],
						'botao3'	=> $botao['botao3'],
						'preco' => 	(float)$botao['preco']				
					]);
				}	
        }	
        
        return redirect('admin/produto/')->with('status', 'Conteudo atualizado');
    }
    
    /**
     * Confirm to set as deleted the specified resource.
     *
     * @param  int id
     * @return \Illuminate\Http\Response
     */
    public function confirm($id)
    {
        $produto = \App\Produto::where('id', $id)->first();
        return view('admin.produto.confirm', ['produto' => $produto]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $produto = \App\Produto::find($id);
        
        $produto->deleted = '1';
        $produto->save();
        
        return redirect('admin/produto')->with('status', 'Conteudo removido');
    }
    
      /**
     * Confirm to set as deleted the specified resource.
     *
     * @param  int id
     * @return \Illuminate\Http\Response
     */
    public function confirmaRemoveBotao($idProduto,$idBotao)
    {
        return view('admin.produto.confirmaRemoveBotao', ['idProduto' => $idProduto, 'idBotao' => $idBotao]);
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function apagaBotao($idProduto,$idBotao)
    {
        $produto = \App\Produto::find($idProduto);
        
        $produto->medidas()->where('id', $idBotao)->update(['deleted' => 1]);
        
        return redirect('admin/produto')->with('status', 'Conteudo removido');
    }
}
