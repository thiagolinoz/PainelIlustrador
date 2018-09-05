<?php

/**
*
* Custom helper functions
* created by linoz
* 2018
* 
*/

//altera valor boolean p/ sim ou nao
if(! function_exists('SimNaoFunction')){
	function SimNaoFunction($valor)
	{
		if(isset($valor)){
			return $valor == 1 ? 'Sim' : 'Não';		
		}	
	}
}