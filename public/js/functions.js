$(function(){
	$("#medidas").change(function(){
		var medida_id	= $(this).val();
		var CSRF_TOKEN = $('input[name="csrf-token"]').attr('content'); 	
		if(medida_id !== ""){
			$.ajax({
				dataType : 'json', 
				url:"/produto/botaoJson",
				type: 'POST',
				data: {_token: CSRF_TOKEN,
						 medida_id: medida_id},
				 beforeSend : function(){
               $("#resultado").html("Aguarde...");
          	},			
				success: function(dados){
					$(".botao_pagmento").html(dados.botao1+dados.botao2+dados.botao3);
					$(".preco").html(dados.preco);				
				},
				fail: function(jqXHR, textStatus, dados){
					console.error(dados);				
				}
			});
		}	
	});
});