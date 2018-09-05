@extends('layouts.site')

@section('content')
<section class="lista-loja">
  <div class="container">
    <div class="row">
    	<div class="col-lg-3 col-md-4">
          <h1>Minha Loja</h1>
         	<div class="intro-loja d-none d-sm-block">
					<h1>{{$sobre->titulo}}</h1>
					{!! $sobre->conteudo !!}								
				</div>
      </div>
       <div class="col-lg-9 col-md-8">      
				<div class="row produtos">
         	 @foreach($produto as $p)
					<div class="col-lg-3 col-md-6 produto">               	 	
               	<div class="moldura-produto">
               		<img class="img-fluid imagem-loja" src='{{ asset("images/produto/$p->imagem")}}' width="200" heigth="200">
               	</div>
						<div class="titulo-produto">
							<p>{{$p->titulo}}</p>
						</div>
						<div class="wrapper-botao"> 
							<div class="botao-loja">
								<a href='{{url("loja-detalhe/$p->id")}}' alt="comprar" title="comprar">Comprar <i class="fas fa-shopping-bag"></i></a>                	 
							</div>
						</div>								
					</div>                	 
          	 @endforeach
      		</div>
      		<div class="row align-items-center justify-content-center">
      			{{ $produto->links() }}
      		</div>	  
      	</div>  	  	
      </div> 	
    </div>
  </div>
</section>
@endsection