<article id="top_main" class="top">
            
    <h2>Nuevo autor</h2>

</article>

<article id="wrapper_main" class="extra">

<form action="" method="post" class="form" enctype="multipart/form-data">
    
    
    <p class="field"><label>Nombre autor</label><input type="text" name="nombre" required></p>
    <p class="field"><label>Fecha nacimiento</label><input type="text" name="fecha_nacimiento" required></p>
    <p class="field"><label>Fecha muerte</label><input type="text" name="fecha_muerte" required></p>
    <p class="field"><label>Biografía</label><textarea class="textarea" name="biografia" required></textarea></p>
    <p class="field"><label>Cita</label><textarea class="textarea min" name="cita" required></textarea></p>
    <p class="field"><label>Imagen</label><input type="file" name="imagen"/></p>

    <h3 class="title_form_admin">Atribuciones</h3>

    <div class="input_fields_wrap">
        <a class="button add_field_button"><i class="fa fa-plus i_right"></i>Añadir atribución</a>
    </div>

    <div class="submit_bottom">
        <button type="submit" class="button awesome">Nuevo autor</button>
    </div>

</form>

</article>

<script>

$(document).ready(function() {

    var max_fields      = 5; //maximum input boxes allowed
    var wrapper         = $(".input_fields_wrap"); //Fields wrapper
    var add_button      = $(".add_field_button"); //Add button ID
   
    var x = 0;  //Aqui debe introducirse con PHP el valor de la variable

    $(add_button).click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields){ //max input box allowed
            $(wrapper).append('<div class="wrapper_add_input"><select class="atribucion1" name="tipo_atribucion[]"><option value="1">Imagen de dominio público</option><option value="2">Imagen del autor</option><option value="3">Fuente de la biografía</option></select><input type="text" class="atribucion2" name="enlace_atribucion[]" placeholder="Enlace" required/><input type="text" class="atribucion3" placeholder="Opcional" name="texto_atribucion[]"/><a href="#" class="remove_field"><i class="fa fa-remove"></i></a></div>');
        }

        reasignar_indice();
    });
   
    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault();
        $(this).parent('.wrapper_add_input').remove();

        reasignar_indice();
    });

    function reasignar_indice(){

        x = $(".wrapper_add_input").length;

        $(".wrapper_add_input").each(function (index) {
            $(this).children(".atribucion1").attr('name', 'tipo_atribucion['+index+']');
            $(this).children(".atribucion2").attr('name', 'enlace_atribucion['+index+']');
            $(this).children(".atribucion3").attr('name', 'texto_atribucion['+index+']');
        });

    }

});

</script>