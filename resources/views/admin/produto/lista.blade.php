@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">Criar Novo</div>
      <div class="card-body">
        <a href="{{url('admin/produto/create')}}"><i class="fas fa-plus-circle"></i> Criar</a>
      </div>
</div>
<div class="card">
    <div class="card-header">Listagem</div>

    <div class="card-body">
        <div class="row">
          <span class="col-md-2 col-lg-2">Imagem</span>
          <span class="col-md-2 col-lg-2">Descricao</span>
          <span class="col-md-2 col-lg-2">Ativo</span>
          <span class="col-md-2 col-lg-2">Ordem</span>
          <span class="col-md-2 col-lg-2">Editar</span>
          <span class="col-md-2 col-lg-2">Deletar</span>
        </div>
        <hr/>
        @if (!is_null($produtos))
          @foreach($produtos as $produto)
            <div class="row">
              <span class="col-md-2 col-lg-2"><img src="{{asset('/images/produto/'.$produto->imagem)}}" width="100" height="100"/></span>
              <span class="col-md-2 col-lg-2">{{$produto->descricao}}</span>
              <span class="col-md-2 col-lg-2">{{SimNaoFunction($produto->ativo)}}</span>
              <span class="col-md-2 col-lg-2">{{$produto->ordem}}</span>
              <span class="col-md-2 col-lg-2">
                <a href='{{url("admin/produto/$produto->id/edit")}}'><i class="fas fa-edit"></i></a>
              </span>
              <span class="col-md-2 col-lg-2">
                <a href='{{url("admin/produto/confirm/$produto->id")}}'><i class="fas fa-trash"></i></a>
              </span>
            </div>
            <hr/>
          @endforeach
        @endif
    </div>
</div>
@endsection
