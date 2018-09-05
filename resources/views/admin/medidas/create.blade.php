@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">Listagem</div>

    <div class="card-body">
          <form method="POST" action='{{ url("admin/medidas") }}' enctype="multipart/form-data">
              @csrf

              <div class="form-group row">
                  <label for="medida" class="col-sm-2 control-label">{{ __('Medida') }}</label>

                  <div class="col-md-8 col-lg-8">
                      <input id="medida" type="text" class="form-control" name="medidas" >
                  </div>
              </div>
              <div class="form-group row">
                  <label for="ativo" class="col-sm-2 control-label">{{ __('Ativo') }}</label>

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
