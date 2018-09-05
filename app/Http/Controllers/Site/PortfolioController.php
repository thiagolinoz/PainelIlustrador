<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Portfolio;
use Illuminate\Http\Request;


class PortfolioController extends Controller
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
        $portfolio = \App\Portfolio::where(array('deleted' => 0, 'ativo' => 1))
        ->orderBy('ordem', 'asc')->get();

        return view('site.portfolio', ['portfolio' => $portfolio]);
    }

}
