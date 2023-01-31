@if (!isset($pag))
    <article id="top_main" class="top">
        
        <h2>{{trans('coleccion.seccion')}}</h2>

        <div id="wrap-center-line-top">
            <div class="center-line-top">
                <div class="button awesome" id="button_upload_book"><i class="fa fa-cloud-upload i_right"></i>Subir libro</div>
            </div>
        </div>

    </article>

    <article id="wrapper_main">
     @if (isset($local))
        <ul class="horizontal_menu min" id="select_autores">
            <li class="active"><a data-toggle="tab" href="#coleccion" id="activar_coleccion">Boolf</a></li>
            <li><a data-toggle="tab" href="#local" id="activar_local">Local</a></li>
        </ul>
    @endif

    <div class="tab-content">

        <div class="tab-pane active" id="coleccion">

        @if(isset($vacio))
            <span class="no-vaccum">{{trans('coleccion.vacio')}}</span>
        @endif
@endif
        <?php
        if (isset($libros))
            $c=count($libros);
        else
            $c=0;
        
        for($i=0;$i<$c;$i++) {
        ?>
        <div class="section_book">
            <div class="image_book">
                <a href="{{Request::root()}}/libro/{{$libros[$i]['id']}}" data-pjax="#main"><img src="{{Request::root()}}/img/book/{{$libros[$i]['id']}}.{{$libros[$i]['imagen']}}" class="img_book prop_book" alt="{{$libros[$i]['titulo']}}"/></a>
                <img src="{{Request::root()}}/img/autor/{{$autores_libro[$i]['id']}}.{{$autores_libro[$i]['imagen']}}" class="img_person prop_equal" alt="{{$autores_libro[$i]['nombre']}}"/>
            </div>
            <p class="text">
                <a href="{{Request::root()}}/libro/{{$libros[$i]['id']}}" data-pjax="#main"><span class="title">{{$libros[$i]['titulo']}}</span></a>
                <span class="autor">{{$autores_libro[$i]['nombre']}}</span>
            </p>
        </div>
        <?php
        }
        ?>


@if (!isset($pag))
    </div>
@endif

    @if (isset($local))
         @if (!isset($pag))
        <div class="tab-pane" id="local">
        @endif
        <?php
        $c=count($local);

        for($i=0;$i<$c;$i++) {
        ?>
        <div class="section_book_leyendo">

            <div class="position_leyendo">

                <img class="image_book_leyendo prop_book"  src="{{Request::root()}}/img/users_books/{{$local[$i]['id']}}.png" alt="{{$local[$i]['titulo']}}"/>
                    
                <div class="cover_leyendo">
                    
                    <div class="info_leyendo">

                        <div class="center_middle">
                            <a href="leer/{{$local[$i]['id']}}/1"><div class="button awesome min">Continuar</div></a>
                            <a class="remove_leyendo" data-toggle="popover" data-content="
                            ¿Estás seguro de que deseas eliminar este libro?
                            <div class='submit_bottom_popover'>
                                <div class='button awesome minimal submit leave_book' data-id='{{$libros[$i]['id']}}'>Eliminar libro</div>
                                <div class='button minimal margin-vertical submit close_popover'>Cancelar</div>
                            </div>
                            ">Descartar libro</a>
                        </div>
                        <div class="progress_leyendo">
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" style="width: 0%;"></div>
                        </div>
                        </div>

                    </div>

                </div>

            </div>

            <p class="text">
                <a href="{{Request::root()}}/libro/local/{{$local[$i]['id']}}" data-pjax="#main"><span class="title">{{$local[$i]['titulo']}}</span></a>
                <span class="autor">{{$local[$i]['autor']}}</span>
            </p>

        </div>

        <!--<div class="section_book">
            <div class="image_book">
                <a href="{{Request::root()}}/libro/local/{{$local[$i]['id']}}" data-pjax="#main"><img src="{{Request::root()}}/img/users_books/{{$local[$i]['id']}}.png" class="img_book prop_book" alt="{{$local[$i]['titulo']}}"/></a>
            </div>
           
        </div>-->
        <?php
        }
        ?>
        @if (!isset($pag))
            </div><!--/tab-pane-->
    </article>
    @endif
    @endif

 @if (!isset($pag))
    <!--Upload book-->
    <article id="wrap_upload_book">
        @if($limite == 0)
        <section class="box_steps plane ui_box">

            <div class="group_box_header ui_section_box">
                <p class="span_box"></p>
                <span class="error_box"></span>
            </div>

             <div class="group_box_body box_section type_form" data-section="1" data-url="/local/info" data-message="Indica el título y el autor del libro">
                <form class="form_box form" id="form1">
                    <p class="field"><label>Título de la obra</label><input type="text" name="titulo" autocomplete="off" onkeyup="checkInfo(1);"></p>
                    <p class="field"><label>Autor de la obra</label><input type="text" name="autor" autocomplete="off" onkeyup="checkInfo(1);"></p>
                </form>
            </div>

            <div class="group_box_body box_section box_section_active type_pdf" data-section="2" data-url="/local/pdf" data-message="Sube el documento PDF que contenga tu libro">

                <form action="/file/post" enctype="multipart/form-data" class="drag_and_drop" id="form2">
                    <div class="text_drag_and_drop">
                        <i class="fa fa-file-pdf-o"></i>
                        <p>
                            Arrastra y suelta un documento PDF
                            <span class="file-wrapper no_margin">
                                <input type="file" id="uploader" name="pdf" accept=".pdf" autocomplete='off'/>
                                <span>o súbelo manualmente</span>
                            </span>
                        </p>
                    </div>
                </form>

            </div>


            <div class="group_box_body box_section type_otro" data-section="3"  data-url="/local/portada" data-message="¡Ya estamos terminando! Escoge una portada para tu libro">
                
                Ya esta todo listo para poder subir el libro.
            </div>

             <div class="group_box_body box_section " data-section="4"  data-message="Se acabo">
                <span id="pene"></span>
                
            </div>

            <div class="group_box_footer ui_section_box">
                <div class="button awesome" data-step="next">Continuar</div>
                <!--<div class="button back" data-step="back"><i class="fa fa-angle-left i_right"></i>Anterior</div>-->
            </div>

        </section>
        @else
         No puedes subir mas libros
        @endif
    </article>


{{ HTML::script('js/local.js', array('defer' => 'defer')) }}
<script type="text/javascript">
if(!window.jQuery){document.onreadystatechange = function(){if(document.readyState=='complete'){
section = 'coleccion';
url_section = "{{Request::root()}}/coleccion/";
activar_menu('menu_coleccion');
cover_leyendo();
$(document).ready(function() {
    stepsForm('local',4);
    $(document).on('pjax:complete', function() {
        stepsForm('local',4);
    });
});

}}}else{
section = 'coleccion';
url_section = "{{Request::root()}}/coleccion/";
activar_menu('menu_coleccion');
cover_leyendo();
$(document).ready(function() {
    stepsForm('local',4);
    $(document).on('pjax:complete', function() {
        stepsForm('local',4);
    });
});
}

</script>
@endif