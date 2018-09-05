@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">Criar Novo</div>
      <div class="card-body">
        <a href="{{url('admin/medidas/create')}}"><i class="fas fa-plus-circle"></i> Criar</a>
      </div>
</div>
<div class="card">
    <div class="card-header">Listagem</div>

    <div class="card-body">
        <div class="row">
          <span class="col-md-3 col-lg-3">Medidas</span>
          <span class="col-md-3 col-lg-3">Ativo</span>
          <span class="col-md-3 col-lg-3">Editar</span>
          <span class="col-md-3 col-lg-3">Deletar</span>
        </div>
        <hr/>
        @if (!is_null($medidas))
          @foreach($medidas as $medida)
            <div class="row">
              <span class="col-md-3 col-lg-3">{{$medida->medidas}}</span>
              <span class="col-md-3 col-lg-3">{{SimNaoFunction($medida->ativo)}}</span>
              <span class="col-md-3 col-lg-3">
                <a href='{{url("admin/medidas/$medida->id/edit")}}'><i class="fas fa-edit"></i></a>
              </span>
              <span class="col-md-3 col-lg-3">
                <a href='{{url("admin/medidas/confirm/$medida->id")}}'><i class="fas fa-trash"></i></a>
              </span>
            </div>
            <hr/>
          @endforeach
        @endif
    </div>
</div>
@endsection
