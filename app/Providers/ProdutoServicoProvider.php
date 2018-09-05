<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use SoapClient;

class ProdutoServicoProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * SOAP client frete correios
     * valor frete dos correios
     * 
     *@var array
     *@return json
     * 
     */
     public function clientFreteCorreios($params)
     {
        $wsdl = "http://ws.correios.com.br/calculador/CalcPrecoPrazo.asmx?WSDL";

        $client = new SoapClient($wsdl);

        return json_encode($client->CalcPrecoPrazo($parms));
     }
}
