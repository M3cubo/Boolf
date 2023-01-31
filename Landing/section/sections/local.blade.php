@if (!isset($pag))
    <article id="top_main" class="top">
        
        <h2>Subir libros</h2>

         <div id="wrap-center-line-top">
            <div class="center-line-top">
                <div class="progress tooltip-extra" data-toggle="tooltip" data-placement="bottom" title="4/10 libros subidos">
                    <div class="progress-bar" role="progressbar" style="width: 40%"></div>
                </div>
            </div>
        </div>

    </article>

    <article id="wrap_upload_book">
@endif  
        @if($limite == 0)
        <!--Upload book-->
        <section class="box_steps plane-styled box_steps_no_padding ui_box">

            <div class="group_box_header ui_section_box">
                <p class="span_box"></p>
                <span class="error_box"></span>
            </div>

             <div class="group_box_body box_section box_section_active type_form check-form" data-section="1" data-url="/local/info" data-message="Indica el título y el autor del libro.">
                <form class="form_box form" id="form1">
                    <p class="field"><label>Título de la obra</label><input type="text" name="titulo" autocomplete="off"></p>
                    <p class="field"><label>Autor de la obra</label><input type="text" name="autor" autocomplete="off"></p>
                </form>
            </div>

            <div class="group_box_body box_section type_pdf" data-section="2" data-url="/local/pdf" data-message="Sube el documento PDF que contenga tu libro.">
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

            <div class="group_box_body box_section type_other no-check-status" data-section="3"  data-url="/local/portada" data-message="¡Ya estamos terminando! Escoge una portada para tu libro.">
                Ya está todo listo para subir el libro.
            </div>

             <div class="group_box_body box_section " data-section="4"  data-message="¡Felicidades! Ya puedes leer tu libro con Boolf. Dirígete a tu Colección, en el apartado Local.">
                <span id="show_book_upload"></span>
            </div>

            <div class="group_box_footer ui_section_box margin_box_footer">
                <div class="button awesome" data-step="next">Continuar</div>
                <div class="button back" data-step="back"><i class="fa fa-angle-left i_right"></i>Anterior</div>
            </div>

        </section>
        @else
         <span class="no-vaccum">Has llegado al límite de libros permitidos por usuario.</span>
        @endif
    </article>


@if (!isset($pag))
<script type="text/javascript">
//Cargar recargando
if(!window.jQuery){document.onreadystatechange = function(){if(document.readyState=='complete'){

section = 'subir';
url_section = "{{Request::root()}}/"+section+"/";
activar_menu('menu_local');

$(document).ready(function() {
    stepsForm('local',4);
    $(document).on('pjax:complete', function() {
        stepsForm('local',4);
    });
});

//Cargar vía PJAX
}}}else{

section = 'subir';
url_section = "{{Request::root()}}/"+section+"/";
activar_menu('menu_local');

$(document).ready(function() {
    stepsForm('local',4);
    $(document).on('pjax:complete', function() {
        stepsForm('local',4);
    });
});
}
</script>
@endif