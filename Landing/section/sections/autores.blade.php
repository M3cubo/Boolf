@if (!isset($pag))
    <article id="top_main" class="top">
        
        <h2>{{trans('autor.seccion')}}</h2>

        <form class="search center-line-top" action="{{Request::root()}}/buscar/autor" method="post" id="dinamic_search">
            
            <input type="text" name="busqueda" placeholder="{{trans('autor.value_buscar')}}">
            <i class="fa fa-search" id="icon_search"></i>

        </form>

    </article>

    <article id="wrapper_main">
        
        @if (isset($autores_siguiendo))
        <ul class="horizontal_menu min" id="select_autores">
            <li class="active"><a data-toggle="tab" href="#todos" id="activar_autores_todos">{{trans('autor.todos')}}</a></li>
            <li><a data-toggle="tab" href="#siguiendo" id="activar_autores_siguiendo">{{trans('autor.siguiendo')}}</a></li>
        </ul>
        @endif

    <div class="tab-content">

        <div class="tab-pane active" id="todos">
@endif
            @if (isset($vacio))
                <span class="no-vaccum">{{trans('autor.vacio_buscar')}}</span>
            @else
            <?php
            foreach ($autores as $aut) {
            ?>
            <div class="section_autor">
                <a href="{{Request::root()}}/autor/{{$aut['id']}}" data-pjax="#main">
                    <div class="image_autor prop_equal">
                        <img src="{{Request::root()}}/img/autor/{{$aut['id']}}.{{$aut['imagen']}}" class="img_autor" alt="{{$aut['nombre']}}"/>
                    </div>
                    <span class="name_autor">{{$aut['nombre']}}</span>
                </a>
            </div>
            <?php
            }
            ?>
            @endif
        
        @if (!isset($pag))
        </div><!--/tab-pane-->
        @endif
        
        @if (isset($autores_siguiendo))
            @if (!isset($pag))
            <div class="tab-pane" id="siguiendo">
            @endif
                <?php
                $c=count($autores_siguiendo);
                for ($i=0;$i<$c;$i++) {
                    ?>
                    <div class="section_autor">
                        <a href="{{Request::root()}}/autor/{{$autores_siguiendo[$i]['id']}}" data-pjax="#main">
                            <div class="image_autor prop_equal">
                                <img src="{{Request::root()}}/img/autor/{{$autores_siguiendo[$i]['id']}}.{{$autores_siguiendo[$i]['imagen']}}" class="img_autor" alt="{{$autores_siguiendo[$i]['nombre']}}"/>
                            </div>
                            <span class="name_autor">{{$autores_siguiendo[$i]['nombre']}}</span>
                        </a>
                    </div>
                    <?php
                }
                ?>
            @if (!isset($pag))
            </div><!--/tab-pane-->
            @endif
        @endif
        

@if (!isset($pag))
    </div><!--/tab-content-->
      
    </article>

<script type="text/javascript">
if(!window.jQuery){document.onreadystatechange = function(){if(document.readyState=='complete'){
    section = 'autores';
    url_section = "{{Request::root()}}/" + section + "/";    

    activar_menu('menu_autores');
    buscador('#dinamic_search', '#main', section);
}}}else{
    section = 'autores';
    url_section = "{{Request::root()}}/" + section + "/";    

    activar_menu('menu_autores');
    buscador('#dinamic_search', '#main', section);
}

</script>
@endif