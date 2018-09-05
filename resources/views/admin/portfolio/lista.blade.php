@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">Criar Novo</div>
      <div class="card-body">
        <a href="{{url('admin/portfolio/create')}}"><i class="fas fa-plus-circle"></i> Criar</a>
      </div>
</div>
<div class="card">
    <div class="card-header">Listagem</div>

    <div class="card-body">
        <div class="row">
          <span class="col-md-2 col-lg-2">Imagem</span>
          <span class="col-md-2 col-lg-2">Legenda</span>
          <span class="col-md-2 col-lg-2">Ativo</span>
          <span class="col-md-2 col-lg-2">Ordem</span>
          <span class="col-md-2 col-lg-2">Editar</span>
          <span class="col-md-2 col-lg-2">Deletar</span>
        </div>
        <hr/>
        @if (!is_null($imagens))
          @foreach($imagens as $imagem)
            <div class="row">
              <span class="col-md-2 col-lg-2"><img src="{{asset('/images/portfolio/'.$imagem->imagem)}}" width="100" height="100"/></span>
              <span class="col-md-2 col-lg-2">{{$imagem->legenda}}</span>
              <span class="col-md-2 col-lg-2">{{SimNaoFunction($imagem->ativo)}}</span>
              <span class="col-md-2 col-lg-2">{{$imagem->ordem}}</span>
              <span class="col-md-2 col-lg-2">
                <a href='{{url("admin/portfolio/$imagem->id/edit")}}'><i class="fas fa-edit"></i></a>
              </span>
              <span class="col-md-2 col-lg-2">
                <a href='{{url("admin/portfolio/confirm/$imagem->id")}}'><i class="fas fa-trash"></i></a>
              </span>
            </div>
            <hr/>
          @endforeach
        @endif
    </div>
</div>
@endsection
