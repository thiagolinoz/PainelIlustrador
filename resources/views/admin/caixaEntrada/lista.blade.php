@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">Listagem</div>

    <div class="card-body">
       <div class="row">
          <span class="col-md-2 col-lg-2">Nome</span>
          <span class="col-md-3 col-lg-3">E-mail</span>
          <span class="col-md-3 col-lg-3">Assunto</span>
          <span class="col-md-2 col-lg-2">Editar</span>
          <span class="col-md-2 col-lg-2">Deletar</span>
        </div>
        <hr/>
        @foreach($contatos as $contato)
        <div class="row">
          <span class="col-md-2 col-lg-2">{{$contato->nome}}</span>
          <span class="col-md-3 col-lg-3">{{$contato->email}}</span>
          <span class="col-md-3 col-lg-3">{{$contato->assunto}}</span>
          <span class="col-md-2 col-lg-2">
            <a href='{{url("admin/caixaEntrada/$contato->id")}}'><i class="fas fa-edit"></i></a>
          </span>
          <span class="col-md-2 col-lg-2">
            <a href='{{url("admin/caixaEntrada/confirm/$contato->id")}}'><i class="fas fa-trash"></i></a>
          </span>
        </div>
        <hr/>
        @endforeach
    </div>
</div>
@endsection
