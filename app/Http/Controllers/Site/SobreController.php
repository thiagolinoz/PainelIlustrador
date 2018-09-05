<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Sobre;
use Illuminate\Http\Request;


class SobreController extends Controller
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
		  //texto sobre apenas atualiza	        
        $sobre = \App\Sobre::where(['id' => 1, 'deleted' => 0])->first();

        return view('site.sobre', ['sobre' => $sobre]);
    }

}
