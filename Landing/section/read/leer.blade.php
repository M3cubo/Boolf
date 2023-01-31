<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8"/>

<title>Boolf - {{$libro['titulo']}}</title>

@include(Config::get('rv.header1'))

<style type="text/css" rel="stylesheet">

body {
  overflow-x: hidden;
  overflow-y: hidden;
}

</style>

</head>
<body>


<!--Facebook-->
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/es_ES/sdk.js#xfbml=1&appId=1234567891234567&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>


<div id="wrapper">

<div id="show_sidebar"><i class="fa fa-bars"></i></div>

<section id="book_sidebar">

  <div id="autor_sidebar" class="prop_equal"
  @if(!$local)style="background-image: url('{{Request::root()}}/img/autor/{{$autor->id}}.{{$autor->imagen}}')" @endif>
    <div id="capa_autor_sidebar"></div>
  </div>
    
  <div class="span_sidebar">
    <span class="title">{{$libro->titulo}}</span>
    <span class="autor">@if(!$local){{$autor->nombre}}@else{{$autor}}@endif</span>
  </div>

  <div class="span_sidebar">
    <span class="page">
      <form id="form_page_num"><input type="text" id="page_num" class="page_num"><input type="hidden"></form> / <span id="page_count" class="page_count"></span>
    </span>
  </div>

  <div class="span_sidebar span_sidebar_book">
    <div class="icon_sidebar_book prev"><i class="fa fa-angle-left"></i></div>
    <div class="icon_sidebar_book next"><i class="fa fa-angle-right"></i></div>
  </div>
  
  <!--Terminar libro-->
  <div id="button_end_book" class="span_sidebar min" data-toggle="popover" data-content="
    ¿Has terminado ya este libro?
    <div class='submit_bottom_popover'>
        <div class='button awesome minimal submit' id='end_book' data-id='{{$libro->id}}'>Sí, ya lo he leído</div>
        <div class='button minimal margin-vertical submit' id='close_popover'>Todavía no</div>
    </div>
  ">
      Terminar libro
  </div>

  <div class="span_sidebar span_sidebar_book">
    <div class="icon_sidebar_book min full_screen" data-toggle="tooltip" data-placement="right" title="Pantalla completa"><i class="fa fa-expand"></i></div>
    @if(!$local)<div class="icon_sidebar_book min" data-toggle="modal" data-target="#modal_report_error" data-toggle="tooltip" data-placement="right" title="Reportar un error"><i class="fa fa-asterisk"></i></div>@endif
  </div>

  <!--Reportar error-->@if(!$local)
  <div class="modal fade" id="modal_report_error" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Notificar un error</h4>
      </div>

      <div class="modal-body" id="modal">

          <p class="p_modal">
            Si detectas algún fallo en una página del libro, háznoslo saber. Basta con indicar 
            la página y el error encontrado.
          </p>

          <form id="form_error" role="form" class="form" action="{{Request::root()}}/reportar/libro/{{$libro->id}}" method="post" data-parsley-validate>

          <div class="form-group">
          <p class="field">
              <label>Página</label>
              <input type="text" class="min" name="pagina" id="page_num_report" data-parsley-required="true" data-parsley-ui-enabled='false' data-parsley-type="number" min='1' max="{{$libro->paginas}}" data-parsley-parent="modal">
          </p>
          </div>
          
          <div class="form-group">
          <p class="field">
              <label>Reporte de error</label>
              <textarea class="min" name="descripcion" data-parsley-required="true" data-parsley-ui-enabled='false' min='10' data-parsley-parent="modal"></textarea>
          </p>
          </div>

          <div class="modal-footer">
            <input type="submit" class='button awesome mini submit' id='close_popover' value="Enviar error">
            <div class='button mini margin-horizontal btn btn-default' data-dismiss="modal" onclick="$(this).closest('form').find('textarea').val('');">Cerrar</div>
          </div>

          </form>

      </div>


    </div>
  </div>
  </div>
  @endif
  <!--Volver atrás-->
  <a id="back" href="{{Request::root()}}/leyendo"><i class="fa fa-angle-double-left i_right"></i>Volver atrás</a>

</section>

<section id="book_main">

  <div id="mybook">
      <canvas id="canvasbook"></canvas>
  </div>

  <div class="section_move_page prev"></div>
  <div class="section_move_page next"></div>

</section>

<section id="main_end_book">

<div id="container_end_book">
<div class="container medium">

  <h2>The end.</h2>

  <p>Has terminado de leer una de las grandes obras de todos los tiempos: {{$libro->titulo}}, de @if(!$local){{$autor->nombre}}@else{{$autor}}@endif.<br/>
    Ahora, si quieres, puedes decírselo a tus amigos (y también cuánto te encanta esta aplicación):</p>

  <div id="buttons_social">
    
    <!--Facebook-->
    <div class="fb-share-button button max social facebook" data-href="http://boolf.com/" data-layout="button">
      <i class="fa fa-facebook i_right"></i>Compartir
    </div>

    <!--Twitter-->
    <a href="https://twitter.com/intent/tweet?text=Reci%C3%A9n%20terminado%20de%20leer%20{{$libro->titulo}}%20gracias%20a%20la%20aplicaci%C3%B3n%20de%20libros%20%40Boolf_app%20http://boolf.com/" target='_blank'><div class="button max social twitter"><i class="fa fa-twitter i_right"></i>Tweet</div></a>
    <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>

  </div>

  <div id="buttons_bottom">
    <div id="regret_book" class="button max transparent"><i class="fa fa-angle-left i_right"></i>Volver</div>
    <a href="../leyendo"><div class="button max awesome right">Continuar<i class="fa fa-angle-right i_left"></i></div></a>
  </div>

</div>
</div>

</section>


</div><!--/wrapper-->
@if(!$local)
  <script type="text/javascript">
  $("#form_error").submit(function() {
    if ( $(this).parsley().isValid() ) {
    var url = "{{Request::root()}}/reportar/libro/{{$libro->id}}"; // the script where you handle the form input.

    $.ajax({
           type: "POST",
           url: url,
           data: $("#form_error").serialize(), // serializes the form's elements.
           success: function(data)
           {
               alert(data); // show response from the php script.
           },
           error: function(data)
           {

           }
         });

    return false; // avoid to execute the actual submit of the form.
    }
  });
  </script>
@endif
    <!-- Use latest PDF.js build from Github -->
    <script src="http://mozilla.github.io/pdf.js/build/pdf.js"></script>
        
    <script>
      //
      // NOTE: 
      // Modifying the URL below to another server will likely *NOT* work. Because of browser
      // security restrictions, we have to use a file server with special headers
      // (CORS) - most servers don't support cross-origin browser requests.
      //

      @if(!$local) var url = '{{Request::root()}}/pdf/{{$libro['id']}}.pdf';
      @else var url = '{{Request::root()}}/users_pdf/{{Auth::user()->id}}/{{$libro['id']}}.pdf';
      @endif
      //
      // Disable workers to avoid yet another cross-origin issue (workers need the URL of
      // the script to be loaded, and currently do not allow cross-origin scripts)
      //
      PDFJS.disableWorker = true;

      var pdfDoc = null,
          pageNum = {{$pagina}},
          pageRendering = false,
          pageNumPending = null,
          scale = 1.5,
          canvas = document.getElementById('canvasbook'),
          ctx = canvas.getContext('2d');

      /**
       * Get page info from document, resize canvas accordingly, and render page.
       * @param num Page number.
       */
      function renderPage(num) {
        pageRendering = true;
        // Using promise to fetch the page
        pdfDoc.getPage(num).then(function(page) {
          var viewport = page.getViewport(scale);
          canvas.height = viewport.height;
          canvas.width = viewport.width;

          // Render PDF page into canvas context
          var renderContext = {
            canvasContext: ctx,
            viewport: viewport
          };
          var renderTask = page.render(renderContext);
          
          // Wait for rendering to finish
          renderTask.promise.then(function () {
            pageRendering = false;
            if (pageNumPending !== null) {
              // New page rendering is pending
              renderPage(pageNumPending);
              pageNumPending = null;
            }
          });
        });

        // Update page counters
        document.getElementById('page_num').value = pageNum;
        @if(!$local)document.getElementById('page_num_report').value = pageNum;@endif


      }
      
      /**
       * If another page rendering in progress, waits until the rendering is
       * finised. Otherwise, executes rendering immediately.
       */
      function queueRenderPage(num) {
        if (typeof timer != 'undefined') {
          clearTimeout(timer);
        }
        if (pageRendering) {
          pageNumPending = num;
        } else {
          renderPage(num);
        }
        timer = setTimeout(function(){
          moverPagina(pageNum);
        }, 5000);

      }

      /**
       * Displays previous page.
       */
      function onPrevPage() {
        if (pageNum <= 1) {
          return;
        }
        pageNum--;
        queueRenderPage(pageNum);
        $('#book_main').mCustomScrollbar('scrollTo','top');
      }
      $(".prev").click(function(){onPrevPage();});

      /**
       * Displays next page.
       */
      function onNextPage() {
        if (pageNum >= pdfDoc.numPages) {
          return;
        }
        pageNum++;
        queueRenderPage(pageNum);
        $('#book_main').mCustomScrollbar('scrollTo','top');
      }

      function moverPagina(pagina)
      {
        url='{{Request::root()}}/leer/pagina';
        var posting = $.post( url, { pag: pagina, id: {{$id}} } );
      }

      $(".next").click(function(){onNextPage();});

      /**
       * Displays input page.
      **/
      $("#form_page_num").submit(function(e){

        e.preventDefault();
        cambiar_pagina = $("#page_num").val();
        cambiar_pagina = parseInt(cambiar_pagina);

        if (cambiar_pagina > pdfDoc.numPages) {
          return; //Si sobrepasa el total de páginas
        }else if (cambiar_pagina <= 0) {
          return; //Si es un número negativo
        }else if(isNaN(cambiar_pagina)){
          return; //Si no es un número entero
        }else if(cambiar_pagina == pageNum){
          return; //Si la página es la misma
        }else{
          pageNum = cambiar_pagina;
          renderPage(pageNum);
        }

      });

      /**
       * Asynchronously downloads PDF.
       */
      PDFJS.getDocument(url).then(function (pdfDoc_) {
        pdfDoc = pdfDoc_;
        document.getElementById('page_count').textContent = pdfDoc.numPages;
        @if($local)
        /*$.post("http://localhost/bookstore/public/actualizar_pagaainas/local/{{$libro['id']}}/"+pdfDoc.numPages+"/", function(data) {
          alert("a");
        });*/
      xmlhttp=new XMLHttpRequest()
      xmlhttp.open("POST","http://localhost/bookstore/public/actualizar_paginas/local/{{$libro['id']}}/"+pdfDoc.numPages,true);
      xmlhttp.send();
        @endif
        // Initial/first page rendering
        renderPage(pageNum);


      /**
       * Resize input text
       */
      var totalPage = pdfDoc.numPages;

      if(totalPage >= 1000){
        sizeInput = 50;
      }else if(totalPage >= 100){
        sizeInput = 45;
      }else if(totalPage >= 10){
        sizeInput = 40;
      }else{
        sizeInput = 35;
      }

      $("#page_num").width(sizeInput);
      $("#page_num").show();

      });

      /**
       * Display Page: Keydown
       */
      $(document).keydown(function(tecla){

        if($("#page_num").is(':focus')){
          event.preventDefault();
        }else{
          if (tecla.keyCode == 37) {
              onPrevPage();
          }else if(tecla.keyCode == 39) {
              onNextPage();
          }
        }

      });

    </script>

<script>

(function($){
    
  $(window).load(function(){
              
    $("#book_main").mCustomScrollbar({
        theme:"minimal",
        scrollInertia: 200,
        mouseWheel:{ 
          enable: true,
          scrollAmount: 100 
        },
        keyboard:{
            enable:true,
            scrollType:"stepless",
            scrollAmount:"auto"
        }
    });
              
  });

})(jQuery);

//Popover
var active_book;

var tmp = $.fn.popover.Constructor.prototype.show;
$.fn.popover.Constructor.prototype.show = function () {
  tmp.call(this);
  if (this.options.callback) {
    this.options.callback();
  }
}

this.$('[data-toggle="popover"]').popover({ 
  html : true,
  callback: function() { 
    $('#end_book').on('click', function (e) {    
      end_book();
    });
    $('#close_popover').on('click', function (e) {    
      $('[data-toggle="popover"]').popover('hide');
    });
  } 
});

$('body').on('click', function (e) {
    
    if ($(e.target).data('toggle') !== 'popover'
        && $(e.target).parents('.popover.in').length === 0) { 
        $('[data-toggle="popover"]').popover('hide');
    }

});

$('#regret_book').on('click', function (e) {    
  regret_book();
});

function regret_book(){

  $("#main_end_book").hide();
  $("#book_main").show();
  $('#show_sidebar').css({'color': '#15150f'});

  active_book = true;

}

function end_book(){

  $('[data-toggle="popover"]').popover('hide');
  $("#book_main").hide();
  $("#main_end_book").show();

  $('#show_sidebar').css({'color': '#ffffff'});
  active_book = false;

  //Responsive
  if($(window).width() < 992){
    $("#book_sidebar").hide();
  }

  //Base de datos
  var data_id = $("#end_book").attr('data-id');
  var url_end_book = root + '/leer/dejar/' + data_id;

  $.get(url_end_book, function() {

  });

}

//Init
regret_book();
active_book = true;


//Slide sidebar
$(document).ready(function() {

  $(window).resize(function() {
    if($(window).width() > 992){    
      $("#book_sidebar").show();
    }
  });

  $("#show_sidebar").click(function(){
    
    $("#book_sidebar").toggle();

    if ($('#book_sidebar').css('display') == 'none') {
      //Al ocultar
      if(active_book == true){
        $('#show_sidebar').css({'color': '#15150f'});
      }else{
        $('#show_sidebar').css({'color': '#ffffff'});
      }
     }
     else {
      //Al mostrar
      if(active_book == true){
        $('#show_sidebar').css({'color': '#ffffff'});
      }else{
        $('#show_sidebar').css({'color': '#ffffff'});
      }
     }

  });

});

@include(Config::get('rv.analytics'))

</script>

</body>
</html>