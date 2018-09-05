@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">Caixa de Entrada</div>

    <div class="card-body">
        <div class="row">
          <span class="col-md-2 col-lg-2">
            <label for="name">Nome:</label>
          </span>
          <span class="col-md-10 col-lg-10">
            <p>{{$contato->nome}}</p>
          </span>
        </div>
        <hr/>
        <div class="row">
          <span class="col-md-2 col-lg-2">
            <label for="name">E-mail:</label>
          </span>
          <span class="col-md-10 col-lg-10">
            <p>{{$contato->email}}</p>
          </span>
        </div>
        <hr/>
        <div class="row">
          <span class="col-md-2 col-lg-2">
            <label for="name">Telefone:</label>
          </span>
          <span class="col-md-10 col-lg-10">
            <p>{{$contato->telefone}}</p>
          </span>
        </div>
        <hr/>
        <div class="row">
          <span class="col-md-2 col-lg-2">
            <label for="name">Assunto:</label>
          </span>
          <span class="col-md-10 col-lg-10">
            <p>{{$contato->assunto}}</p>
          </span>
        </div>
        <hr/>
        <div class="row">
          <span class="col-md-2 col-lg-2">
            <label for="name">Mensagem:</label>
          </span>
          <span class="col-md-10 col-lg-10">
            <p>{{$contato->mensagem}}</p>
          </span>
        </div>
        <hr/>
    </div>
</div>
@endsection
