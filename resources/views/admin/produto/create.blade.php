@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">Listagem</div>

    <div class="card-body">
          <form method="POST" action='{{ url("admin/produto") }}' enctype="multipart/form-data">
              @csrf

              <div class="form-group row">
                  <label for="imagem" class="col-sm-2 control-label">{{ __('Imagem') }}</label>

                  <div class="col-md-8">
                      <input id="imagem" type="file" class="form-control" name="imagem" required>
                  </div>
              </div>
              <div class="form-group row">
                  <label for="titulo" class="col-sm-2 control-label">{{ __('Titulo') }}</label>

                  <div class="col-md-8 col-lg-8">
                      <input id="titulo" type="text" class="form-control" name="titulo" >
                  </div>
              </div>
              <div class="form-group row">
                  <label for="descricao" class="col-sm-2 control-label">{{ __('Descricao') }}</label>

                  <div class="col-md-8 col-lg-8">
                      <input id="descricao" type="text" class="form-control" name="descricao" >
                  </div>
              </div>
              <div>
	              <div class="form-group row">
	                  <label for="medidas" class="col-sm-2 control-label">{{ __('Medidas') }}</label>
	
	                  <div class="col-md-8 col-lg-8">
	                      <select name="medidas" id="medidas">
	                      	<option value="" selected>Escolhe uma medida</option>
	                      	@foreach($medidas as $medida)
	                      		<option value="{{$medida->id}}">{{$medida->medidas}}</option>
	                      	@endforeach
	                      </select>
	                  </div>
	              </div>
	              <div id="botoes_pgmto"></div>
	           </div>   
              <div class="form-group row">
                  <label for="ordem" class="col-sm-2 control-label">{{ __('Ordem') }}</label>

                  <div class="col-md-3 col-lg-3">
                      <input id="ordem" type="text" class="form-control" name="ordem" >
                  </div>
              </div>
					<!--  Botoes  -->
				  	
              <div class="form-group row">
                  <label for="ordem" class="col-sm-2 control-label">{{ __('Ativo') }}</label>

                  <div class="col-md-3 col-lg-3">
                      <select name='ativo'>
                        <option value="1" selected>sim</option>
                        <option value="0">não</option>
                      </select>
                  </div>
              </div>
              <div class="form-group row">
                <div class="col-lg-12 col-md-12 text-center">
                  <button type="submit" class="btn btn-primary">
                      {{ __('Salvar') }}
                  </button>
                </div>
              </div>
            </form>
    </div>
</div>
@endsection
