@extends('layouts.site')

@section('content')
<section class="imagem-entrada">
  <div class="container">
    <div class="row">
        <div class="conteudo-sobre col-sm-6">
          <h1>{{$sobre->titulo}}</h1>
          <br>
          {!! $sobre->conteudo !!}
        </div>
      <div class="imagem-sobre col-sm-6 text-right">
        <img class="img-fluid" src="{{ asset('images/layout/marina-sobre.png')}}">
      </div>
    </div>
  </div>
</section>
@endsection 
