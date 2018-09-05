@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">Listagem</div>

    <div class="card-body">
        <form method="POST" action='{{ url("admin/medidas/$medidas->id") }}' enctype="multipart/form-data">
          @method('PUT')
            @csrf

            <div class="form-group row">
                <label for="medidas" class="col-sm-2 control-label">{{ __('Medidas') }}</label>

                <div class="col-md-10 col-lg-10">
                    <input id="medidas" type="text" class="form-control" name="medidas" value="{{$medidas->medidas}}">
                </div>
            </div>
            <div class="form-group row">
                <label for="ordem" class="col-sm-2 control-label">{{ __('Ativo') }}</label>

                <div class="col-md-2 col-lg-2">
                    <select name='ativo'>
                      <option value="1">sim</option>
                      <option value="0" <?= $medidas->ativo == 0 ? 'selected' : '' ?>>não</option>
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
