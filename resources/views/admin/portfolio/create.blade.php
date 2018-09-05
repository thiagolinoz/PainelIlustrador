@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">Listagem</div>

    <div class="card-body">
          <form method="POST" action='{{ url("admin/portfolio") }}' enctype="multipart/form-data">
              @csrf

              <div class="form-group row">
                  <label for="imagem" class="col-sm-2 control-label">{{ __('Imagem') }}</label>

                  <div class="col-md-8">
                      <input id="imagem" type="file" class="form-control" name="imagem" required>
                  </div>
              </div>
              <div class="form-group row">
                  <label for="legenda" class="col-sm-2 control-label">{{ __('Legenda') }}</label>

                  <div class="col-md-8 col-lg-8">
                      <input id="legenda" type="text" class="form-control" name="legenda" >
                  </div>
              </div>
              <div class="form-group row">
                  <label for="ordem" class="col-sm-2 control-label">{{ __('Ordem') }}</label>

                  <div class="col-md-3 col-lg-3">
                      <input id="ordem" type="text" class="form-control" name="ordem" >
                  </div>
              </div>
              <div class="form-group row">
                  <label for="ordem" class="col-sm-2 control-label">{{ __('Ativo') }}</label>

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
