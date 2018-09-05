<?php

namespace App\Http\Controllers;

use Validator;
use Storage;
use App\Portfolio;
use Illuminate\Http\Request;

class PortfolioController extends Controller
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
        $imagens = \App\Portfolio::where('deleted',0)->get();

        return view('admin.portfolio.lista',['imagens' => $imagens]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.portfolio.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'imagem' => 'required|image'
        ]);

        if($validator->fails()){
          return redirect('admin/portfolio/create')->withErros($validator)->withInput();
        }
        $file = new Portfolio;
        
        //faz upload do arquivo
        $arquivo = $request->file('imagem');

        $fileName = time().'.'.$arquivo->getClientOriginalExtension();
        $arquivo->move(public_path('/images/portfolio'), $fileName);

        $file->imagem = $fileName;
        $file->ordem = $request->input('ordem');
        $file->legenda = $request->input('legenda');
        $file->ativo = $request->input('ativo');

        $file->save();

        return redirect('admin/portfolio')->with('status', 'Conteudo criado');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function show(Portfolio $portfolio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $imagem = \App\Portfolio::where('id', $id)->first();

        return view('admin.portfolio.edit', ['imagem' => $imagem]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $file = \App\Portfolio::find($id);
        $arquivo = $request->file('imagem');

        //checa se existe arquivo novo
        if(!empty($arquivo)){
          $fileName = time().'.'.$arquivo->getClientOriginalExtension();
          $arquivo->move(public_path('/images/portfolio'), $fileName);
          $file->imagem = $fileName;
        }

        $file->ordem = $request->input('ordem');
        $file->legenda = $request->input('legenda');
        $file->ativo = $request->input('ativo');

        $file->save();

        return redirect('admin/portfolio')->with('status', 'Conteudo atualizado');
    }

    /**
     * Confirm to set as deleted the specified resource.
     *
     * @param  int id
     * @return \Illuminate\Http\Response
     */
    public function confirm($id)
    {
        $imagem = \App\Portfolio::where('id', $id)->first();
        return view('admin.portfolio.confirm', ['imagem' => $imagem]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $file = \App\Portfolio::find($id);

        $file->deleted = '1';
        $file->save();

        return redirect('admin/portfolio')->with('status', 'Conteudo removido');
    }
}
