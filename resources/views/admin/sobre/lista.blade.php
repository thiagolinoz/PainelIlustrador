@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">Listagem</div>

    <div class="card-body">
        <div class="row">
          <span class="col-md-4 col-lg-4">Titulo</span>
          <span class="col-md-4 col-lg-4">Conteudo</span>
          <span class="col-md-4 col-lg-4">Editar</span>
        </div>
        <hr/>
        @if (!is_null($sobre))
        	@foreach($sobre as $s)
	        <div class="row">
	          <span class="col-md-4 col-lg-4">{{$s->titulo}}</span>
	          <span class="col-md-4 col-lg-4">{{str_limit($s->conteudo,50)}}</span>
	          <span class="col-md-4 col-lg-4">
	            <a href='{{url("admin/sobre/$s->id/edit")}}'><i class="fas fa-edit"></i></a>
	          </span>
	        </div>
        <hr/>
			@endforeach        
        @endif
    </div>
</div>
  @endsection
