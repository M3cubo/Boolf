<!--Favicon-->

<link rel="icon" href="<?php echo URL::to('favicon.ico'); ?>">

<!-- Estilos CSS -->
{{ HTML::style('css/styles.css') }}

<!--JQuery-->
<!--<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>-->
{{ Html::script('js/jquery.js', array('defer' => 'defer')) }}
{{ Html::script('js/bootstrap.min.js', array('defer' => 'defer')) }}

{{ Html::script('js/pjax.js', array('defer' => 'defer')) }}
{{ Html::script('js/jquery.cookie.js', array('defer' => 'defer')) }}
{{ Html::script('js/blur.js', array('defer' => 'defer')) }}
{{ Html::script('js/scrollbar.js', array('defer' => 'defer')) }}
{{ Html::script('js/waitForImages.js', array('defer' => 'defer')) }}

{{ Html::script('js/fastclick.js', array('defer' => 'defer')) }}

<!--Form-->
{{ Html::script('js/parsley/parsley.remote.js', array('defer' => 'defer')) }}
{{ Html::script('js/parsley/parsley.js', array('defer' => 'defer')) }}
{{ Html::script('js/parsley/es.js', array('defer' => 'defer')) }}


<!--Funciones-->
{{ Html::script('js/funciones.js', array('defer' => 'defer')) }}
    
<!-- Etiquetas Meta -->
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<!--[if lt IE 9]>
<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
<![endif]-->