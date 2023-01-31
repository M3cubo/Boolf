<?php
foreach ($noti as $n)
{
?>
	@if ($n['tipo'] == 'nuevo_libro') <!--Un autor que sigues ha subido un nuevo libro-->
	
	<div class="notification">
        <div style="background-image: url('{{Request::root()}}/img/book/{{$n['id']}}.{{$n['imagen']}}');" class="notification_book prop_equal"></div>
        <span>{{trans('notificaciones.nuevo_libro')}}<br/> <a href="{{Request::root()}}/libro/{{$n['id']}}" data-pjax="#main">{{$n['titulo']}}</a></span>
    </div>

	@elseif ($n['tipo'] == 'seguir_autor') <!--Has seguido a un autor-->

	<div class="notification">
        <img src="{{Request::root()}}/img/autor/{{$n->id}}.{{$n->imagen}}" class="notification_autor prop_equal" alt="{{$n->nombre}}" />
        <span>{{trans('notificaciones.sigues')}}<a href="{{Request::root()}}/autor/{{$n->id}}" data-pjax="#main">{{$n->nombre}}</a></span>
    </div>

	@elseif ($n['tipo'] == 'seguir_usuario') <!--Te han seguido-->

	<div class="notification">
        @if ($n->imagen == "")
        <img src="{{Request::root()}}/img/user/avatar/user.png" class="notification_autor prop_equal" alt="{{$n->username}}" />
        @else
        <img src="{{Request::root()}}/img/user/avatar/{{$n->id}}.{{$n->imagen}}" class="notification_autor prop_equal" alt="{{$n->username}}" />
        @endif
        <span><a href="{{Request::root()}}/usuario/{{$n->username}}" data-pjax="#main">{{$n->username}}</a>{{trans('notificaciones.seguido')}}</span>
    </div>

	@endif
<?php
}
?>