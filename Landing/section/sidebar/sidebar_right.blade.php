<section id="sidebar_right" class="hide_tablet">

    @if ($leyendo)
    <a href="{{Request::root()}}/leer/{{$leyendo->id}}">
         @if (!$local_leyendo)
        <article id="top_sidebar" style="background-image: url('{{Request::root()}}/img/book/{{$leyendo->id}}.{{$leyendo->imagen}}');">
        @else
        <article id="top_sidebar"  style="background-image: url('{{Request::root()}}/img/users_books/{{$leyendo->id}}.png');">
        @endif
        
        @else
        <a>
        <article id="top_sidebar" style="">
        @endif
        <div id="capa_sidebar">
            
            <div id="info_title">
                @if ($leyendo)
                <span>{{trans('sidebar_right.leyendo')}}<i class="fa fa-angle-double-right i_left"></i></span>
                <h3>{{$leyendo->titulo}}</h3>
                @if (!$local_leyendo)
                <p>{{$autor_leyendo->nombre}}</p>
                @else
                <p>{{$leyendo->autor}}</p>
                @endif
                @else
               <h3>{{trans('sidebar_right.no_leyendo')}}</h3>
                @endif
            </div>

        </div>
        </article>
    </a>

    <div id="content_sidebar_right">

        <h4>Notificaciones<i class="icon-bell-alt right"></i></h4>

        <div id="scroll_sidebar_right">

            @include(Config::get('rv.notificaciones'))

        </div>

    </div>


</section>