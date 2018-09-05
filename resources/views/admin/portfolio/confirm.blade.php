@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="card">
        <div class="card-header">Deletar</div>

        <div class="card-body">
          <div class="row">
            <form method="POST" action='{{ url("admin/portfolio/$imagem->id") }}'>
              @method('DELETE')
                @csrf
                <div class="form-group">
                  <p>Deseja deletar este conteudo?</p>
                </div>
                <div class="row">
                  <div class="form-group col-lg-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Sim') }}
                    </button>
                    <button type="button" class="btn btn-primary" onClick="history.back();">
                        {{ __('Nao') }}
                    </button>
                  </div>
                </div>
              </div>
        </div>

    </div>
  </div>
</div>
@endsection
