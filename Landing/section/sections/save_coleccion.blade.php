    <article id="top_main" class="top">
        
        <h2>Subir libros</h2>

        <div id="wrap_button_upload">
            <div class="center-line-top">
                <div class="button awesome" id="button_upload_book"><i class="fa fa-cloud-upload i_right"></i>Subir libro</div>
            </div>
        </div>

    </article>

    <article id="wrapper_main" class="extra">

        <div id="wrap_upload_book">

            <form action="/file/post" enctype="multipart/form-data" class="drag_and_drop">
                <div class="text_drag_and_drop">
                    <i class="fa fa-file-pdf-o"></i>
                    <p>
                        Arrastra y suelta un documento PDF
                        <span class="file-wrapper no_margin">
                            <input type="file" id="uploader"/>
                            <span>o súbelo manualmente</span>
                        </span>
                    </p>
                </div>
            </form>

            <div class="button awesome margin-vertical right" id="button_next">Continuar</div>

        </div>

    </article>


<script type="text/javascript">

window.addEventListener('popstate', function(e) { 
    eval(document.getElementById("script_coleccion").innerHTML);
});

//Scripts on back/forward-
    
section = 'coleccion';
url_section = "{{Request::root()}}/"+section+"/";

activar_menu('#menu_coleccion');

</script>