@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">Listagem</div>

    <div class="card-body">
        <form method="POST" action='{{ url("admin/portfolio/$imagem->id") }}' enctype="multipart/form-data">
          @method('PUT')
            @csrf

            <div class="form-group row">
                <label for="imagem" class="col-sm-2 col-lg-2 control-label">{{ __('Imagem Atual') }}</label>

                <div class="col-md-10">
                    <img src="{{asset('/images/portfolio/'.$imagem->imagem)}}" width="100" height="100"/>
                </div>
            </div>
            <div class="form-group row">
                <label for="imagem" class="col-sm-2 control-label">{{ __('Imagem') }}</label>

                <div class="col-md-10">
                    <input id="imagem" type="file" class="form-control" name="imagem">
                </div>
            </div>
            <div class="form-group row">
                <label for="legenda" class="col-sm-2 control-label">{{ __('Legenda') }}</label>

                <div class="col-md-10 col-lg-10">
                    <input id="legenda" type="text" class="form-control" name="legenda" value="{{$imagem->legenda}}">
                </div>
            </div>
            <div class="form-group row">
                <label for="ordem" class="col-sm-2 control-label">{{ __('Ordem') }}</label>

                <div class="col-md-3 col-lg-3">
                    <input id="ordem" type="text" class="form-control" name="ordem" value="{{$imagem->ordem}}">
                </div>
            </div>
            <div class="form-group row">
                <label for="ordem" class="col-sm-2 control-label">{{ __('Ativo') }}</label>

                <div class="col-md-2 col-lg-2">
                    <select name='ativo'>
                      <option value="1">sim</option>
                      <option value="0" <?= $imagem->ativo == 0 ? 'selected' : '' ?>>não</option>
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
