<section id="sidebar_left">

    <article id="logo" class="top">
        <div id="capa_logo">
            <span id="b_sidebar">B</span>
            <span id="loader"><i class="fa fa-spinner fa-spin"></i></span>
        </div>
    </article>

    <ul id="user_sidebar">
        <li id="account">
        <a href="{{Request::root()}}/usuario/{{Auth::user()->username}}" data-pjax="#main"><span>
            @if ($usuario->imagen == "")
            <img src="{{Request::root()}}/img/user/avatar/user.png" id="avatar_usuario" class="img_user hide_mobile" alt="{{Auth::user()->username}}"/>
            @else
            <img src="{{Request::root()}}/img/user/avatar/{{$usuario->id}}.{{$usuario->imagen}}" id="avatar_usuario" class="img_user hide_mobile" alt="{{Auth::user()->username}}"/>
            @endif
            <i class="fa fa-user i_left i_right display_mobile"></i>{{{$usuario->username}}}</span>
        </a>
        </li>
    </ul>

    <ul class="menu nav menu_ui">
        <li class="menu_leyendo"><a href="{{Request::root()}}/leyendo" data-pjax="#main">{{trans('general.leyendo')}}</a></li>
        <li class="menu_biblioteca"><a href="{{Request::root()}}/biblioteca" data-pjax="#main">{{trans('general.biblioteca')}}</a></li>
        <li class="menu_autores"><a href="{{Request::root()}}/autores" data-pjax="#main">{{trans('general.autores')}}</a></li>
        <li class="menu_coleccion"><a href="{{Request::root()}}/coleccion" data-pjax="#main">{{trans('general.coleccion')}}</a></li>
        <li class="menu_local"><a href="{{Request::root()}}/local" data-pjax="#main">{{trans('general.local')}}</a></li>
    </ul>

    <a href="{{Request::root()}}/logout"><div id="logout"><i class="fa fa-long-arrow-left i_right"></i>{{trans('general.cerrar_sesion')}}</div></a>

</section>