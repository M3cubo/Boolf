<!--Favicon-->

<link rel="icon" href="<?php echo URL::to('favicon.ico'); ?>">

<!-- Estilos CSS -->
{{ HTML::style('css/styles.css') }}

<!--JQuery-->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<!--{{ Html::script('js/jquery.js') }}-->
{{ Html::script('js/bootstrap.min.js') }}

{{ Html::script('js/pjax.js') }}
{{ Html::script('js/jquery.cookie.js') }}
{{ Html::script('js/blur.js') }}
{{ Html::script('js/scrollbar.js') }}
{{ Html::script('js/fastclick.js')}}
<!--Form-->
{{ Html::script('js/parsley/parsley.remote.js') }}
{{ Html::script('js/parsley/parsley.js') }}
{{ Html::script('js/parsley/es.js') }}
{{ Html::script('js/icheck.js') }}

<!--Funciones-->
{{ Html::script('js/funciones.js') }}
    
<!-- Etiquetas Meta -->
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<!--[if lt IE 9]>
<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
<![endif]-->