<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8"/>

<title>{{trans('contacto.title')}}</title>

@include(Config::get('rv.header'))

</head>
<body>

<header>

@include(Config::get('rv.nav'))

<h2>{{trans('contacto.titulo')}}</h2>

</header><!--/header-->

<div class="container_landing">
<div class="container min">

<article id="wrap_landing">
    
    <form class="form form-light form-two-column uppercase" method="post" action="{{Request::root()}}/contacto" data-parsley-validate>

        <p class="intro">{{trans('contacto.descripcion')}}</p>

        <p class="field">
            <label>{{trans('contacto.correo')}}</label>
            <input type="text" class="parsley" name="email" autocomplete="off" data-parsley-type="email" data-parsley-required="true" data-parsley-ui-enabled='false'>
        </p>

        <p class="field">
            <label>{{trans('contacto.asunto')}}</label>
            <input type="text" class="parsley" name="asunto" autocomplete="off" data-parsley-required="true" data-parsley-ui-enabled='false'>
        </p>

        <p class="field">
            <label>{{trans('contacto.mensaje')}}</label>
            <textarea class="medium parsley" name="mensaje" data-parsley-required="true" data-parsley-ui-enabled='false'></textarea>
        </p>

        <input type="submit" value="Enviar" class="button_landing">
        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">

    </form>

    @foreach($errors->all() as $message)

 <li>{{ $message }}</li>

 @endforeach

 {{Session::get('msg')}}

</article>

</div>
</div><!--/container_landing-->

@include(Config::get('rv.footer'))


</body>
</html>