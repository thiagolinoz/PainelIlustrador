@extends('layouts.site')

@section('content')
<section class="imagens-portfolio">
  <div class="container">
    <div class="row">
    	<div class="col-sm-12 conteudo-sobre">
          <h1>Meu Portfolio</h1>
				<div class="grid">
					<div class="grid-sizer"></div>						                
         	 @foreach($portfolio as $p)
            	<div class="grid-item"><a data-fancybox="gallery" href='{{ asset("images/portfolio/$p->imagem")}}' data-caption="{{$p->legenda}}"><img class="img-fluid" src='{{ asset("images/portfolio/$p->imagem")}}'></a></div>
          	 @endforeach
          	</div>
      </div> 	
    </div>
  </div>
</section>
<script type="text/javascript" >
	var $grid = $('.grid').masonry({
  				itemSelector: '.grid-item',
  				columnWidth: '.grid-sizer',
  				percentPosition: true
	});
	$grid.imagesLoaded().progress(function () {
		$grid.masonry();
	});
</script>
@endsection      

