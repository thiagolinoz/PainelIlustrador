@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row justify-content-center">
      <div class="col-md-2">
        <div class="card">
          <div class="card-header">Menu</div>

          <div class="card-body">
           <p><a href="{{ url('admin/sobre') }}">Texto Perfil/Loja</a></p>
           <p><a href="{{ url('admin/portfolio') }}">Portfolio</a></p>
           <p><a href="{{ url('admin/caixaEntrada') }}">Caixa de e-mail</a></p>
			  <p><a href="{{ url('admin/medidas') }}">Medidas</a></p>	                    
           <p><a href="{{ url('admin/produto') }}">Loja</a></p>
          </div>
        </div>
      </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Painel Administrativo</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    Bem-Vindo, {{ Auth::user()->name }} !
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
