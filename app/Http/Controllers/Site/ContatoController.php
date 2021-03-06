<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Validator;
use App\CaixaEntrada;
use App\Mail\ContatoSite;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;


class ContatoController extends Controller
{

    public function __construct()
    {

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('site.contato');
    }
    
    public function send(Request $request) 
    {
    	$contato = new CaixaEntrada();
    	
    	 $validator = Validator::make($request->all(),[
            'nome' => 'required',
            'email' => 'required|email',
            'mensagem' => 'required'
        ]);

        if($validator->fails()){
          return redirect('site/contato')->withErros($validator)->withInput();
        }
        
        $contato->nome = $request->input('nome');
        $contato->email = $request->input('email');
        $contato->telefone = $request->input('telefone');
        $contato->assunto = $request->input('assunto');
		  $contato->mensagem = $request->input('mensagem');
		  
		  $contato->save();
		  
		  Mail::to('programador@linoz.com.br')->send(new ContatoSite($request));
		  
		  return redirect()->back()->with('aviso', 'E-mail enviado com sucesso');
    }

}
