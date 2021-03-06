$(function(){
	$("#medidas").change(function(){
		var medida_id = $(this).val();
		var medida_text = $("#medidas option:selected").text();
		var botao_existentes = [];
		//verifica se botao c medidas escolhida existe		
		$(".box_botao_existente").each(function(){
			botao_existentes.push($(this).attr('rel'));
		});
		//caso selecione vazio ou botao existe ignora
		if(medida_id !== "" && botao_existentes.indexOf(medida_id) == -1){
			$("#botoes_pgmto").append('<div class="group-textarea box_botao'+ medida_id +'"><span class="valor_medida">'+ medida_text +'</span><a class="close clickX'+ medida_id +'" href="javascript:void(0)">X</a><div class="form-group row"><label for="botao1" class="col-sm-2 control-label">Primeiro Botao</label><div class="col-md-8 col-lg-8"> <textarea type="text" class="form-control" name="botao['+ medida_id +'][botao1]"></textarea> </div></div><div class="form-group row"><label for="botao2" class="col-sm-2 control-label">Segundo Botao</label><div class="col-md-8 col-lg-8"> <textarea type="text" class="form-control" name="botao['+ medida_id +'][botao2]"></textarea> </div></div><div class="form-group row"><label for="botao3" class="col-sm-2 control-label">Terceiro Botao</label><div class="col-md-8 col-lg-8"> <textarea type="text" class="form-control" name="botao['+ medida_id +'][botao3]"></textarea> </div></div><div class="form-group row"><label for="preco" class="col-sm-2 control-label">Preco</label><div class="col-md-8 col-lg-8"> <input type="text" class="form-control dinheiro" name="botao['+ medida_id +'][preco]"/> </div></div></div>');
			$(".dinheiro").mask('000.000.000.000.000.00', {reverse: true});				
			//oculta medida das opcoes apos selecionar				
			$("#medidas option[value='"+medida_id+"']").hide();
			$('.clickX'+ medida_id +'').click(function(){
				//mostra medida nas opcoes apos ser apagada	
				$("#medidas option[value='"+medida_id+"']").show();
				$(".box_botao"+ medida_id +"").remove();
			});
		}
	});
	//primeiro p/ os novos. segundo p/ o existentes
	$(function(){
		$(".dinheiro").mask('000.000.000.000.000.00', {reverse: true});
	});

});