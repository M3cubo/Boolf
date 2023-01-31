<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8"/>

<title>Boolf - Configuración de cuenta</title>

@include(Config::get('rv.header'))
<!--Drag and drop avatar-->
{{ Html::script('js/ui/box.js', array('defer' => 'defer')) }}
{{ Html::script('js/drop/resample.js', array('defer' => 'defer')) }}
{{ Html::script('js/drop/avatar.js', array('defer' => 'defer')) }}
<style type="text/css">
.icheckbox_polaris
{
    display:none;
}
</style>
</head>
<body>


<div id="main_activado">

<div class="container min">

    <section class="box_steps box_activated_account ui_box">

        <div class="group_box_header dark ui_section_box">
            <div class="profile-avatar-wrap">
                <img src="{{Request::root()}}/img/icons/feature/profile.png" class="icon_box" id="profile-avatar" alt="Avatar"/>
                <div class="progress progress_box">
                    <div class="progress-bar" role="progressbar" style="width: 0%;"></div>
                </div>
            </div>
        </div>
    
        <div class="group_box_body ui_section_box box_section box_section_active type_image" data-section="1" data-url="/activado/imagen" data-message="Sube una imagen de avatar">

            <form action="/file/post" enctype="multipart/form-data" class="drag_and_drop" id="form1">
                <div class="text_drag_and_drop">
                    <i class="fa fa-cloud-upload"></i>
                    <p>
                        Arrastra y suelta una imagen o
                        <span class="file-wrapper no_margin">
                            <input type="file" id="uploader" name="imagen" accept="image/*" autocomplete='off'/>
                            <span>súbela manualmente</span>
                        </span>
                    </p>
                </div>
            </form>

        </div>

        <div class="group_box_body ui_section_box box_section type_form check-textarea" data-section="2" data-url="/activado/descripcion" data-message="Escribe algo sobre ti">
            
            <form class="form_box" id="form2">
                <textarea placeholder="Escribe algo sobre ti..." id="biografia" name="biografia" autocomplete='off'></textarea>
            </form>

        </div>

        <div class="group_box_body ui_section_box box_section type_ccb" data-section="3" data-url="/activado/autores" data-message="Sigue al menos 3 autores">
            
            <form class="group_content_box" id="form3" data-min="3" data-max="none">
                @foreach($autores as $aut)
                <div class="content_box prop_equal">
                    <img src="{{Request::root()}}/img/autor/{{$aut->id}}.{{$aut->imagen}}" alt="{{$aut->nombre}}" data-toggle="tooltip" data-placement="bottom" title="{{$aut->nombre}}"/>
                    <span class="fa-stack fa-lg ccb_show">
                      <i class="fa fa-circle fa-stack-2x"></i>
                      <i class="fa fa-check fa-stack-1x fa-inverse"></i>
                    </span>
                    <input type="checkbox" name="autores[]" value='{{$aut->id}}'>
                </div>
                @endforeach

            </form>

        </div>

        <div class="group_box_body ui_section_box box_section type_ccb" data-section="4" data-url="/activado/libros" data-message="Guarda al menos 3 libros">
            
            <form class="group_content_box" id="form4" data-min="3" data-max="none">
                
                @foreach($libros as $lib)
                <div class="content_box prop_book">
                    <img src="{{Request::root()}}/img/book/{{$lib->id}}.{{$lib->imagen}}" alt="{{$lib->titulo}}" data-toggle="tooltip" data-placement="bottom" title="{{$lib->titulo}}"/>
                    <span class="fa-stack fa-lg ccb_show">
                      <i class="fa fa-circle fa-stack-2x"></i>
                      <i class="fa fa-check fa-stack-1x fa-inverse"></i>
                    </span>
                    <input type="checkbox" name="libros[]" value="{{$lib->id}}">
                </div>
                @endforeach
            </form>

        </div>

        <div class="group_box_body box_section type_ccb" data-section="5" data-message="POYAAAAAAAAAA">
            </div>


        <div class="group_box_footer ui_section_box">
            <span class="span_box"></span>
            <div class="button awesome" data-step="next">Continuar</div>
            <div class="button skip" data-step="skip">Omitir</div>
        </div>

    </section><!--/box_activated_account-->

</div>

</div><!--/main_activado-->



<script>
document.onreadystatechange = function(){if(document.readyState=='complete'){
$(document).ready(function() {

    /*Scroll*/
    $(".group_content_box").mCustomScrollbar({
        theme:"minimal-dark",
        scrollInertia: 200,
    });

    /*Steps form*/
    stepsForm('activar',4);

});
}}
</script>


</body>
</html>