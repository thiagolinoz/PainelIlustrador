@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">Editar</div>
    <div class="card-body">
          <form class="form-horizontal"  method="POST" action='{{ url("admin/sobre/$sobre->id") }}'>
            @method('PUT')
              @csrf

              <div class="form-group row">
                  <label for="titulo" class="col-sm-2  control-label">{{ __('Titulo') }}</label>

                  <div class="col-sm-8">
                      <input id="titulo" type="text" class="form-control" name="titulo" value="{{ $sobre->titulo }}" required>
                  </div>
              </div>
              <div class="form-group row">
                  <label for="conteudo" class="col-sm-2 control-label">{{ __('Conteudo') }}</label>

                  <div class="col-sm-8">
                      <textarea id="conteudo" class="form-control" name="conteudo"  required>{{ $sobre->conteudo }}</textarea>
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
