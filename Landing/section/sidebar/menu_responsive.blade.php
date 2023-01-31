<section id="menu_responsive">

    <article id="show_menu_responsive">
        
        <i class="fa fa-navicon i_right"></i>
        <span id="value_section">Boolf</span>

    </article>
    
    <a href="{{Request::root()}}/logout" id="logout_responsive">
        <div id="icon_logout_responsive"><i class="fa fa-power-off"></i></div>
    </a>

    <!--Reportar error-->
    <div class="modal mini dark fade" id="modal_logout" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-body">
        {{trans('menu_responsive.pregunta')}}
      </div>

      <div class="modal-footer">
        <div class='button' data-dismiss="modal">{{trans('menu_responsive.cancelar')}}</div>
        <a href="{{Request::root()}}/logout"><div class='button awesome' id='close_popover' href="{{Request::root()}}/logout">{{trans('menu_responsive.cerrar')}}</div></a>
      </div>

    </div>
    </div>
    </div><!--/Modal cerrar sesión-->

    <ul class="menu sidebar_responsive">

        <li class="menu_leyendo"><a href="{{Request::root()}}/leyendo" data-pjax="#main">Leyendo</a></li>
        <li class="menu_biblioteca"><a href="{{Request::root()}}/biblioteca" data-pjax="#main">Biblioteca</a></li>
        <li class="menu_autores"><a href="{{Request::root()}}/autores" data-pjax="#main">Autores</a></li>
        <li class="menu_coleccion"><a href="{{Request::root()}}/coleccion" data-pjax="#main">Colección</a></li>

        <a href="{{Request::root()}}/usuario/{{Auth::user()->username}}" data-pjax="#main" id="user_menu_responsive">
            <span>
            @if ($usuario->imagen == "")
            <img src="{{Request::root()}}/img/user/avatar/user.png" id="avatar_usuario" class="img_user" alt="{{Auth::user()->username}}"/>
            @else
            <img src="{{Request::root()}}/img/user/avatar/{{$usuario->id}}.{{$usuario->imagen}}" id="avatar_usuario" class="img_user" alt="{{Auth::user()->username}}"/>
            @endif
            {{{$usuario->username}}}
            </span>
        </a>

    </ul>

</section>