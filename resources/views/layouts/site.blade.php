<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Marina Ilustradora</title>
			
		  <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="{{asset('css/bootstrap/bootstrap.min.css')}}" type="text/css">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
			<!-- Styles -->
        <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css">
			<!-- fancybox -->
			<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.3.5/jquery.fancybox.min.css" />	      
        
        <!-- jQuery library -->
        <script src="{{ asset('js/libraries/jquery-3.3.1.min.js') }}"></script>
        <!-- Latest compiled JavaScript -->
        <script src="{{asset('js/bootstrap/bootstrap.min.js')}}"></script>
        <!-- fontawesome  -->
        <script src="{{ asset('js/libraries/fontawesome-all.js') }}" defer></script>
        <!--		  masonry gallery	        -->
		  <script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>
			<!--			imagesLoaded		  -->
		  <script src="https://unpkg.com/imagesloaded@4/imagesloaded.pkgd.min.js"></script>        
			<!--		funcoes site	     -->
		  <script src="{{ asset('js/functions.js') }}"></script>
        
		  <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.3.5/jquery.fancybox.min.js"></script>

 
    </head>
    <header>
      <div class="container-fluid">
          <nav class="navbar navbar-expand-sm navbar-light">
          	<a class="navbar-brand" href=""><img src="{{ asset('images/layout/logo-marina-novo.png')}}"></a>
				  <div class="d-lg-none d-md-none d-sm-block">	              
	              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
				        <span class="navbar-toggler-icon"></span>
				     </button>
			     </div>
				<div class="collapse navbar-collapse" id="myNavbar">
	            <ul class="navbar-nav">
	              <li class="nav-item col-xl-4">
	                <a class="nav-link" href="{{ url('portfolio') }}">Portfolio</a>
	              </li>
	              <li class="nav-item col-xl-4">
	                <a class="nav-link" href="{{ url('sobre') }}">Sobre</a>
	              </li>
	              <li class="nav-item col-xl-4">
	                <a class="nav-link" href="{{ url('loja') }}">Loja</a>
	              </li>
	              <li class="nav-item col-xl-3">
	                <a class="nav-link" href="#">Blog</a>
	              </li>
	              <li class="nav-item col-xl-4">
	                <a class="nav-link" href="{{ url('contato') }}">Contato</a>
	              </li>
	            </ul>
	          </div>
	           
          </nav>
      </div>
    </header>
    <body>
       @yield('content')	
      <section class="redes-sociais">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-1 col-md-2 align-redes">
              <img src="{{ asset('images/layout/ig.png')}}" id="instagram_icon">
            </div>
            <div class="col-lg-1 col-md-2 align-redes">
              <img src="{{ asset('images/layout/fb.png')}}" id="facebook_icon">
            </div>
            <div class="col-lg-3 col-md-4 logo-redes-align">
              <img class="img-fluid" src="{{ asset('images/layout/logo-marina-novo-wt.png')}}" id="logo_sociais">
            </div>
            <div class="col-lg-1 col-md-2 align-redes">
              <img src="{{ asset('images/layout/youtube.png')}}" id="youtube_icon">
            </div>
            <div class="col-lg-1 col-md-2 align-redes">
              <img src="{{ asset('images/layout/pintrest.png')}}" id="pintrest_icon">
            </div>
          </div>
        </div>
      </section>
      <footer class="footer-pink">
        <div class="container">
          <div class="row titulo">
              <h1 class="col-sm-12 text-center">Contato</h1>
          </div>
          <div class="row contato-footer">
            <div class="col-sm-3">
              <input type="text" name="nome" placeholder="*nome" required />
            </div>
            <div class="col-sm-3">
              <textarea rows="4" name="mensagem" placeholder="*mensagem"></textarea>
            </div>
            <div class="col-sm-3">
              <input type="text" name="telefone" placeholder=" telefone" required />
            </div>
          </div>
          <div class="row contato-footer">
            <div class="col-sm-3">
              <input type="text" name="email" placeholder="*email" required />
            </div>
            <div class="col-sm-3">
            </div>
            <div class="col-sm-3">
              <button type="submit" value="enviar">Enviar</button>
            </div>
          </div>
        </div>
      </footer>
    </body>
</html>
