@extends('layouts.site')

@section('content')
<section class="imagem-entrada">
  <div class="container">
    <div class="row">
        <div class="conteudo-sobre col-sm-8">
          <h1>Contato</h1>
          @if (session('aviso'))
              <div class="alert alert-success">
                  {{ session('aviso') }}
              </div>
          @endif
          <br>
          <form method="POST" action="{{url('contato/send')}}" class="contato-form">
          	@csrf
				 <div class="form-group">
              <input type="text" name="nome" placeholder="*nome" required />
              <input type="text" name="email" placeholder="*email" required />
             </div>
          
				 <div class="form-group">   
              <input type="text" name="telefone" placeholder=" telefone" required />
				  <input type="text" name="assunto" placeholder=" assunto" required />		              
              
            </div>
          			            
            <div class="form-group">
              <textarea rows="4" name="mensagem" placeholder="*mensagem"></textarea>
					<button type="submit" value="enviar">Enviar</button>		            
            </div>
            
          </form>
        </div>
      <div class="imagem-sobre col-sm-4 text-right">
        <img class="img-fluid" src="{{ asset('images/layout/marina-contato2.png')}}">
      </div>
    </div>
  </div>
</section>
@endsection
