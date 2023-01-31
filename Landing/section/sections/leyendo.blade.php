@if (!isset($pag))
    <article id="top_main" class="top">
        
        <h2>{{trans('leyendo.seccion')}}</h2>
        
    </article>

    <article id="wrapper_main">
@endif
        @if(isset($vacio))
            <span class="no-vaccum">{{trans('leyendo.vacio')}}</span>
        @else
        <?php
        $c=count($libros);
        for($i=0;$i<$c;$i++) {
        $porcentaje=$pagina[$i]/$paginas_totales[$i]*100;
        ?>

        <div class="section_book_leyendo">

            <div class="position_leyendo">

                <img class="image_book_leyendo prop_book" src="{{Request::root()}}/img/book/{{$libros[$i]['id']}}.{{$libros[$i]['imagen']}}" alt="$libros[$i]['titulo']}}"/>
                    
                <div class="cover_leyendo">
                    
                    <div class="info_leyendo">
                        <div class="center_middle">
                            <a href="leer/{{$libros[$i]['id']}}"><div class="button awesome min">Continuar</div></a>
                            <a class="remove_leyendo" data-toggle="popover" data-content="
                            Aún no has terminado este libro.
                            <div class='submit_bottom_popover'>
                                <div class='button awesome minimal submit leave_book' data-id='{{$libros[$i]['id']}}'>Dejar de leer</div>
                                <div class='button minimal margin-vertical submit close_popover'>Todavía no</div>
                            </div>
                            ">Dejar de leer</a>
                        </div>
                        <div class="progress_leyendo">
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" style="width: {{$porcentaje}}%;"></div>
                        </div>
                        </div>
                    </div>

                </div>

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
section = 'leyendo';
url_section = "{{Request::root()}}/"+section+"/";

activar_menu('menu_leyendo');
cover_leyendo();
}}}else{
    section = 'leyendo';
    url_section = "{{Request::root()}}/"+section+"/";

    activar_menu('menu_leyendo');
    cover_leyendo();
}

</script>
@endif