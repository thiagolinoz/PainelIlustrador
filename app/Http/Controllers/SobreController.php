<?php

namespace App\Http\Controllers;

use Validator;
use App\Sobre;
use Illuminate\Http\Request;


class SobreController extends Controller
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
        $sobre = \App\Sobre::where('deleted', 0)->get();

        return view('admin.sobre.lista', ['sobre' => $sobre]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $sobre = \App\Sobre::where('id', $id)->first();

      return view('admin.sobre.edit', ['sobre' => $sobre]);
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
        $sobre = \App\Sobre::find($id);

        $validator = Validator::make($request->all(),[
          'titulo' => 'required',
          'conteudo' => 'required'
        ]);

        if($validator->fails()){
          return redirect('admin/sobre')->withErros($validator)->withInput();
        }

          $sobre->titulo = $request->input('titulo');
          $sobre->conteudo = $request->input('conteudo');

          $sobre->save();

          return redirect('admin/sobre')->with('status', 'Conteudo atualizado');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

}
