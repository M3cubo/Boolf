<section id="sidebar_left">

    <article id="logo" class="top">
        <div id="capa_logo">B</div>
    </article>

    <ul class="menu nav menu_ui" id="menu">
        <span>Contenido</span>
        <li class="lista_libros"><a href="{{Request::root()}}/admin/libros" data-pjax="#main">Editar libro</a></li>
        <li class="lista_autores"><a href="{{Request::root()}}/admin/autores" data-pjax="#main">Editar autor</a></li>
        <span>Usuarios</span>
        <li class="lista_usuarios"><a href="{{Request::root()}}/admin/usuarios" data-pjax="#main">Usuarios</a></li>
    </ul>

    <a id="back" href="{{Request::root()}}"><i class="fa fa-angle-double-left i_right"></i>Volver atrás</a>

</section>