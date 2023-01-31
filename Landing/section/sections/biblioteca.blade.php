@if (!isset($pag))
    <article id="top_main" class="top">
        
        <h2>{{trans('biblioteca.seccion')}}</h2>
        <form class="search center-line-top" action="{{Request::root()}}/buscar/libro" method="post" id="dinamic_search">
            
            <input type="text" name="busqueda" placeholder="{{trans('biblioteca.value_buscar')}}">
            <i class="fa fa-search" id="icon_search"></i>
            
        </form>

    </article>

    <article id="wrapper_main">
@endif  
        @if (isset($vacio))
            <span class="no-vaccum">{{trans('biblioteca.vacio_buscar')}}</span>
        @else
        <?php
        $c=count($libros);
        for($i=0;$i<$c;$i++) {
        ?>
        <div class="section_book">
            <div class="image_book">
                <a href="{{Request::root()}}/libro/{{$libros[$i]['id']}}" data-pjax="#main"><img src="{{Request::root()}}/img/book/{{$libros[$i]['id']}}.{{$libros[$i]['imagen']}}" class="img_book prop_book" alt="{{$libros[$i]['titulo']}}"/></a>
                <img src="{{Request::root()}}/img/autor/{{$autores_libro[$i]['id']}}.{{$autores_libro[$i]['imagen']}}" class="img_person prop_equal" alt="$autores_libro[$i]['nombre']"/>
            </div>
            <p class="text">
                <a href="{{Request::root()}}/libro/{{$libros[$i]['id']}}" data-pjax="#main"><span class="title">{{$libros[$i]['titulo']}}</span></a>
                <span class="autor">{{$autores_libro[$i]['nombre']}}</span>
            </p>
        </div>
        <?php
        }
        ?>
        @endif
        
@if (!isset($pag))
    </article>

<script type="text/javascript">
if(!window.jQuery){document.onreadystatechange = function(){if(document.readyState=='complete'){
section = 'biblioteca';
url_section = "{{Request::root()}}/"+section+"/";

activar_menu('menu_biblioteca');
buscador('#dinamic_search', '#main', section);
}}}else{
section = 'biblioteca';
url_section = "{{Request::root()}}/"+section+"/";

activar_menu('menu_biblioteca');
buscador('#dinamic_search', '#main', section);
}

</script>
@endif