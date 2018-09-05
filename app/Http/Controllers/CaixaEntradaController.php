<?php

namespace App\Http\Controllers;

use App\CaixaEntrada;
use Illuminate\Http\Request;

class CaixaEntradaController extends Controller
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
        $contatos = \App\CaixaEntrada::where('deleted',0)->orderBy('created_at','desc')->get();

        return view('admin.caixaEntrada.lista', ['contatos' => $contatos]);
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
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contato = \App\CaixaEntrada::where('id', $id)->first();

        return view('admin.caixaEntrada.show',['contato' => $contato]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CaixaEntrada  $caixaEntrada
     * @return \Illuminate\Http\Response
     */
    public function edit(CaixaEntrada $caixaEntrada)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CaixaEntrada  $caixaEntrada
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CaixaEntrada $caixaEntrada)
    {
        //
    }

    /**
     * Confirm to set as deleted the specified resource.
     *
     * @param  int id
     * @return \Illuminate\Http\Response
     */
    public function confirm($id)
    {
        $contato = \App\CaixaEntrada::where('id', $id)->first();
        return view('admin.caixaEntrada.confirm', ['contato' => $contato]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contato = \App\CaixaEntrada::find($id);

        $contato->deleted = '1';
        $contato->save();

        return redirect('admin/caixaEntrada')->with('status', 'Conteudo removido');

    }
}
