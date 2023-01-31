<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8"/>

<title>{{trans('terminos.title')}}</title>

@include(Config::get('rv.header'))

</head>
<body>

<header>

@include(Config::get('rv.nav'))

<h2>{{trans('terminos.titulo')}}</h2>

</header><!--/header-->

<div class="container_landing">
<div class="container medium">

<article id="wrap_landing">

    <div id="section_terms">
        
    {{trans('terminos.todo')}}

    </div>
    
</article>

</div>
</div><!--/container_landing-->

@include(Config::get('rv.footer'))

</body>
</html>