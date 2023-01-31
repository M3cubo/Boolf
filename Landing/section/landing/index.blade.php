<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8"/>

<title>Boolf</title>

<!--SEO-->
<meta name="description" content="Boolf es la aplicación online para leer los mejores libros clásicos. Descubre libros, sigue autores y crea tus colecciones." />
<meta name="keywords" content="boolf, leer online, leer libros online" />

<!--Facebook-->
<meta property="og:title" content="Las mejores obras clásicas" />
<meta property="og:type" content="website" />
<meta property="og:image" content="http://boolf.com/img/img/tablet.png" />
<meta property="og:url" content="http://boolf.com/" />
<meta property="og:description" content="Disfruta de los mejores libros para leer online. Los relatos de Kafka y Dostoyevski. La filosofía desde Platón hasta Nietzsche. Las grandes tragedias de Sófocles y Shakespeare. Y puedes seguir autores, crear colecciones y mucho más." />

@include(Config::get('rv.header'))

<script>
document.onreadystatechange = function(){if(document.readyState=='complete'){

//Detectar IE
function detectIE() {

    var ms_ie = false;
    var ua = window.navigator.userAgent;
    var old_ie = ua.indexOf('MSIE ');
    var new_ie = ua.indexOf('Trident/');

    if ((old_ie > -1) || (new_ie > -1)) {
        ms_ie = true;
    }

    if ( ms_ie ) {
        $(".photo_landing").css({"position": "absolute"});
    }

}

//Detectar si es una tablet o móvil
function detectVideo(){

	if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
		//
		var fondo = $('<img src="img/bg/books.jpg" id="bg" class="bg_top" alt="Fondo">')
			.appendTo($("#main_landing"));


	}else{

		var video = $('<video autoplay loop poster="img/bg/landing.jpg" id="bgvid" muted preload="none">')
	        .append('<source src="img/video/movie.webm" type="video/webm">')
	        .append('<source src="img/video/movie.mp4" type="video/mp4">')
	        .appendTo($("#videoHolder"));

	}

}

$(document).ready(function() {
    detectVideo();
    detectIE();
    $('#carousel-feature').carousel();
});

@include(Config::get('rv.analytics'))
}}
</script>

</head>
<body>

<section id="main_landing" class="landing_shadow">

@include(Config::get('rv.nav'))

<!--<img src="img/bg/books.jpg" id="bg" class="bg_top display_mobile" alt="Fondo">-->

<div id="videoHolder">

<!--<video autoplay loop poster="img/bg/landing.jpg" id="bgvid" class="hide_mobile" muted preload='none'>

  <source src="img/video/movie.webm" type="video/webm">
  <source src="img/video/movie.mp4" type="video/mp4">

</video>-->

</div><!--/videoHolder-->

<div class="container">
  
  <h2 id="title_landing">
    {{trans('landing.titulo')}}
    <!--Los libros que te definen-->
    <div id="span_title">{{trans('landing.subtitulo')}}</div>
    <a href="#first_feature" class="boton_landing scroll_page">{{trans('landing.boton_scroll')}}</a>
  </h2>
  
</div><!--/container-->

</section><!--/main_landing-->

<div id="video-spacer"></div>
  
<section id="content_landing">

	<article id="feature_init">

		<div class="container">

    	<div class="row">
		  
		  <div class="col-md-4">
		  	<i class="fa fa-tablet"></i>
		  	<h4>{{trans('landing.ti_columna1')}}</h4>
		  	<p>{{trans('landing.te_columna1')}}</p>
		  </div>

		  <div class="col-md-4">
		  	<i class="fa fa-bicycle"></i>
		  	<h4>{{trans('landing.ti_columna2')}}</h4>
		  	<p>{{trans('landing.te_columna2')}}</p>
		  </div>

		  <div class="col-md-4">
		  	<i class="fa fa-exclamation"></i>
		  	<h4>{{trans('landing.ti_columna3')}}</h4>
		  	<p>{{trans('landing.te_columna3')}}</p>
		  </div>

		</div>

		</div>

    </article>

  	<article class="moment moment-text moment-right" id="first_feature">

		<div class="container">
		  
		  <div class="info_landing">
		  <h3>{{trans('landing.ti_parte1')}}</h3>
		  <p>
		  {{trans('landing.te_parte1')}}
		  </p>
		  </div>

		  <img src="img/img/tablet.png" alt="Responsive" title="Diseñado para ti">

		</div>

    </article>

    <article class="moment moment-image">
      
      <!--<h2>Title Text</h2>-->
      <div class="moment-clipper">
        <div class="photo_landing" id="first_photo"></div>
      </div>

    </article>

    <article class="moment moment-text moment-left">

		<div class="container">

		  <div class="info_landing">
		  <h3>{{trans('landing.ti_parte2')}}</h3>
		  <p>
		    {{trans('landing.te_parte2')}}
		  </p>
		  </div>

		  <img src="img/img/mobile.png" alt="Libros" title="Las mejores obras clásicas">

		</div>

    </article>

    <article class="moment moment-image">
      
      <div class="moment-clipper">
        <div class="photo_landing" id="second_photo"></div>
      </div>

    </article>

    <!--<article id="feature_upload">

    </article>-->
   
   	<article class="moment moment-text moment-right">

		<div class="container">
		  
		  <div class="info_landing">
		  <h3>{{trans('landing.ti_parte3')}}</h3>
		  <p>
		  {{trans('landing.te_parte3')}}
		  </p>
		  </div>
		  
		  <img src="img/img/computer.png" alt="Autores" title="Sigue y descubre">

		</div>

    </article>

    <article id="feature_app">

		<div class="container medium">
		  
		 	<h3>{{trans('landing.app')}}</h3>	  
			
			<div id="icon_app">
				<img src="img/img/app/app_icon.png" alt="App Boolf" title="App Boolf">
			</div>

			<div id="buttons_app">
			 	<img src="img/img/app/grey_app_store.png" alt="App Store" title="App Store">
				<img src="img/img/app/grey_google_play.png" alt="Google Play" title="Google Play">
			</div>

		</div>

    </article>

    <article id="feature_options">

    	<div class="container max">

    	<div class="row row-features">
		  
		  <div class="col-md-4">
		  	<img src="img/icons/feature/bookshelf.png" alt="Feature 1">
		  	<h4>{{trans('landing.ti_caracteristica1')}}</h4>
		  	<p>
		  		{{trans('landing.te_caracteristica1')}}
		  	</p>
		  </div>

		  <div class="col-md-4">
		  	<img src="img/icons/feature/travelerbag.png" alt="Feature 1">
		  	<h4>{{trans('landing.ti_caracteristica2')}}</h4>
		  	<p>
		  		{{trans('landing.te_caracteristica2')}}
		  	 </p>
		  </div>

		  <div class="col-md-4">
		  	<img src="img/icons/feature/tablet.png" alt="Feature 1">
		  	<h4>{{trans('landing.ti_caracteristica3')}}</h4>
		  	<p>
		  		{{trans('landing.te_caracteristica3')}}
		  	</p>
		  </div>

		</div>

		</div>

    </article>

    <!--<article id="feature_testimonial" class="moment moment-text">

		<div class="container medium">

			<div id="carousel-feature" class="carousel slide" data-ride="carousel">
			  
			  <ol class="carousel-indicators">
			    <li data-target="#carousel-feature" data-slide-to="0" class="active"></li>
			    <li data-target="#carousel-feature" data-slide-to="1"></li>
			    <li data-target="#carousel-feature" data-slide-to="2"></li>
			  </ol>

			  <div class="carousel-inner" role="listbox">
			    
			    <div class="item active">
			      <div class="carousel-caption">
			        "La mejor aplicación de libros del año. Un diseño intuitivo, que hace una delicia leer y descubrir nuevos libros."
			        <span>NeoTeo</span>
			      </div>
			    </div>

			    <div class="item">
			      <div class="carousel-caption">
			        "Nada que ver con las aplicaciones para leer online convencionales. Una aplicación con personalidad, 
			        que hace de Internet un lugar mejor."
			        <span>El País</span>
			      </div>
			    </div>

			    <div class="item">
			      <div class="carousel-caption">
			        "¡Fantástica! Ninguna se le iguala, y la comunidad es lo mejor: aquí no se lee Crepúsculo, se lee a Kafka."
			        <span>TechCrunch</span>
			      </div>
			    </div>

			  </div>

			</div>

		</div>

    </article>-->

    <div id="feature_register">

	  <div class="container">
	    <h3>
	    {{trans('landing.registro')}}
	    <br/><a href="registrar" class="boton_landing">{{trans('landing.boton_registro')}}</a>
	    </h3>
	  </div>

	</div>

	@include(Config::get('rv.footer'))

</section>

</body>
</html>