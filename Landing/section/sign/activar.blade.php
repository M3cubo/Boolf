<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8"/>

<title>{{trans('activar.title')}}</title>

@include(Config::get('rv.header'))

</head>
<body>


<div id="main_activar">

<div class="container min">

    <div id="box_active_account">

        <img src="{{Request::root()}}/img/img/icono.png" class="icono_activar" alt="Boolf"/>
        
        <h3>{{trans('activar.titulo')}}</h3>
        <p>
        	{{trans('activar.mensaje', array('nombre' => $nombre, 'email' => $email))}}
        </p>
        <a href="{{Request::root()}}" class="button awesome margin-vertical middle">{{trans('activar.volver')}}</a>

    </div><!--/box_active_account-->

</div>

</div>


</body>
</html>