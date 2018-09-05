<?php

namespace App\Http\Controllers;

use Validator;
use Storage;
use App\Medidas;
use Illuminate\Http\Request;

class MedidasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		  $medidas = \App\Medidas::where('deleted',0)->get();
		  	        
        return view('admin.medidas.lista',['medidas' => $medidas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.medidas.create');
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
        		'medidas' => 'required'
        ]);
        
        if($validator->fails()){
				redirect('admin/medidas/create')->withErrors($validator)->withInput();        
        }
        
        $medidas = new Medidas;
        
        $medidas->medidas = $request->input('medidas');
        $medidas->ativo = $request->input('ativo');
        $medidas->save();
        
        return redirect('admin/medidas')->with('status', 'Conteudo criado');
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
        $medidas = \App\Medidas::where('id', $id)->first();
        
        return view('admin.medidas.edit',['medidas' => $medidas]);
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
        $medidas = \App\Medidas::find($id);
        
        $medidas->medidas = $request->input('medidas');
        $medidas->ativo = $request->input('ativo');
        $medidas->save();
        
        return redirect('admin/medidas')->with('status', 'Conteudo atualizado');
    }
    
    public function confirm($id)
    {
        $medidas = \App\Medidas::where('id', $id)->first();
        return view('admin.medidas.confirm', ['medidas' => $medidas]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $medidas = \App\Medidas::find($id);
        
        $medidas->deleted = '1';
        $medidas->save();
        
        return redirect('admin/medidas')->with('status', 'Conteudo removido');
    }
}
