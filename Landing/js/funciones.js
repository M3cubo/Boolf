// JavaScript Document

if (document.domain == 'boolf.com') {
    var root = "http://boolf.com";
}
else {
    var root = "http://localhost/bookstore/public";
}



//////////////////////////////////////////////////////////////////////////////////
/////////////////////////////  FUNCIONES  ////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////


function ready_functions(){

    resize();
    follow();
    scroll_sidebar_right();
    full_screen();
    ready_tooltip();
    responsiveMenu();
}

function popstate_functions(){ //Al volver atrás

    follow();
    
    if(section == 'autores'){
        if(active_autores_siguiendo == true){
            section = 'autores_siguiendo';
        }
    }
    if(section == 'coleccion'){
        if(active_local == true){
            section = 'local';
        }
    }

}

function general_functions(){ //Funciones básicas, se ejecutan siempre
    
    $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
        resize();
    });

    active_menu();
    activar_autores_siguiendo();
    activar_local();
    ready_upload_book();
    bookshelf();

}

function pjax_functions(){ //Al cargar pjax

    resize();
    follow();
    reset_paginar();
}

function window_resize_functions(){ //Al cambiar dimensiones del navegador

    resize();
    scroll_sidebar_right();

}

//////////////////////////////////////////////////////////////////////////////////
///Funciones que han de ejecutarse según: al recargar, en pjax, al volver atrás///
///El objetivo es seguir la lógica de arriba y no tocar las siguientes funciones//
//////////////////////////////////////////////////////////////////////////////////


$(document).ready(function() {

    $("#group_box_body").mCustomScrollbar({
        theme:"minimal-dark",
        scrollInertia: 200
    });

    ready_functions();
    general_functions();

    window.addEventListener('popstate', function(e) { 
        popstate_functions();
        general_functions();
    });

    $(document).on('pjax:complete', function() {
        pjax_functions();
        general_functions();
    });

    $(window).bind("resize", function() {
        window_resize_functions();
    });

    /*Check Section*/
    /*
    function checkSection(){
        $("#logout").html(section + ":<br/>" + pagina);
    }

    setInterval(checkSection, 500);
    */

});

$(document).on('pjax:complete', function() {
    
    $('#container_main').css({"opacity": 1});

    window.addEventListener('popstate', function(e) { 
        popstate_functions();
        $('#container_main').css({"opacity": 1});
    });

});

$(document).on('pjax:start', function() {

    $('#container_main').css({"opacity": 0});

    $('#container_main').mCustomScrollbar('scrollTo','top');
    section = 'other';

});

window.addEventListener('popstate', function(e) { 
    $(".menu li").removeClass("active");
});


/*TIPS FOR RENDERING*/

//300ms Tap Delay
window.addEventListener('load', function() {
    FastClick.attach(document.body);
}, false);

//Disable Double Tap
(function($) {
  var IS_IOS = /iphone|ipad/i.test(navigator.userAgent);
  $.fn.nodoubletapzoom = function() {
    if (IS_IOS)
      $(this).bind('touchstart', function preventZoom(e) {
        var t2 = e.timeStamp
          , t1 = $(this).data('lastTouch') || t2
          , dt = t2 - t1
          , fingers = e.originalEvent.touches.length;
        $(this).data('lastTouch', t2);
        if (!dt || dt > 500 || fingers > 1) return; // not double-tap

        e.preventDefault(); // double tap - prevent the zoom
        // also synthesize click events we just swallowed up
        $(this).trigger('click').trigger('click');
      });
  };
})(jQuery);


//////////////////////////////////////////////////////////////////////////////////
//Estas funciones se encargan de la paginación, el reseteo y los comportamientos//
//////////////////////////////////////////////////////////////////////////////////

/*
---------------------------------------------------------------------
Leyendo[0]  | Biblioteca[1]  |  Autores[2]  |  Coleccion[3]
---------------------------------------------------------------------
Biblioteca Buscar[4]  |  Autores Buscar[5]  |  Autores Siguiendo[6]
---------------------------------------------------------------------
*/

var pagina = [0, 0, 0, 0, 0, 0, 0, 0];
var limitePagina = [0, 0, 0, 0, 0, 0, 0, 0];
var cargadaPagina = [0, 0, 0, 0, 0, 0, 0, 0];
var section = 'other';
var url_section;
var active_busqueda = false;

function reset_paginar(){
pagina = [0, 0, 0, 0, 0, 0, 0, 0];
limitePagina = [0, 0, 0, 0, 0, 0, 0, 0];
cargadaPagina = [0, 0, 0, 0, 0, 0, 0, 0];

    //$('#container_main').mCustomScrollbar('scrollTo','top');
    active_busqueda = false;

}

//////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////  PAGINACIÓN  //////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////

/*Scrollbar*/
$(document).on("ready", function(){

    $("#container_main").mCustomScrollbar({
    theme:"minimal-dark",
    scrollInertia: 200,
    mouseWheel:{ scrollAmount: 150 },
    autoHideScrollbar: true,
    callbacks:{
    /*onTotalScroll:function () {
    },*/
    onTotalScrollOffset: 50,
    onScroll: function ()
    {
        var n;
        var altura = $('#wrapper_main').height()-221;
        var z1 = false;
        var z2 = false;
        var scroll = this;

        if (parseInt(-this.mcs.top) > altura-1000 && parseInt(-this.mcs.top) < altura+1) z1 = true;
        if (parseInt(-this.mcs.top) > altura-400 && parseInt(-this.mcs.top) < altura+1) z2 = true;
        //221 (creo) por defecto
        if (section == 'leyendo') n = 0;
        else if (section == 'biblioteca' && active_busqueda == false) n = 1; 
        else if (section == 'autores' && active_busqueda == false)  n = 2;
        else if (section == 'coleccion')  n = 3;
        else if (section == 'biblioteca'  && active_busqueda == true) n = 4;
        else if (section == 'autores'  && active_busqueda == true) n = 5;
        else if (section == 'autores_siguiendo')n = 6;
        else if (section == 'local')n = 7;

        function paginarAjax(section,n,active_busqueda,scroll)
        {
            console.log(limitePagina[7]);
            var leyendo = 0;
            var div = '#wrapper_main';
            if (section == 'leyendo') leyendo = 1;
            if (section == 'autores') div = '#todos';
            if (section == 'autores_siguiendo') url_section=root + '/autores/siguiendo/';
            if (section == 'local')
            {
                div = '#local';
                url_section=root + '/coleccion/local/';
                leyendo = 1;
            }
            if (section == 'coleccion')
            {
                div = '#coleccion';
                url_section=root + '/coleccion/';
            }
            
            if(limitePagina[n] == 0){ //Si quedan mas paginas por cargar

                if (cargadaPagina[n] == 1) //Si se ha terminado la peticion ajax
                {
                    
                    if (z2) //Si estamos en el final
                    {

                        cargadaPagina[n]=0;
                        mostrarLibrosCargados(div,n,leyendo);
                    }
                }
                else if (cargadaPagina[n] == 0) //Si no se ha cargado la pagina
                {
                    
                    cargadaPagina[n]=2;

                    if (active_busqueda == true)
                    {
                        pagina[n] += 1;
                        if (section == 'libros')
                            var posting = $.post( root + '/buscar/autor/' + pagina[n], { busqueda: true } );
                        else if (section == 'libros')
                            var posting = $.post( root + '/buscar/libro/' + pagina[n], { busqueda: true } );

                        posting.done(function( data ) {
                            ajaxSuccess(div,n,data);
                        });
                    }
                    else
                    {
                        
                        pagina[n] += 1;
                        $.ajax({
                            url: url_section + pagina[n],
                            type: 'GET',
                            beforeSend: before(),
                            complete: complete(),
                            cache: false,
                            success: function(data) {
                                ajaxSuccess(div,n,data);
                                cargadaPagina[n]=1;
                                
                                if (parseInt(scroll.mcs.top) > altura-400 && parseInt(scroll.mcs.top) < altura+1) z2 = true;

                                if (z2) //Si estamos al final lo mostramos
                                {
                                    cargadaPagina[n]=0;
                                    mostrarLibrosCargados(div,n,leyendo);
                                }
                               
                            },
                            error: function(data) {
                                cargadaPagina[n]=0;
                                console.log(data.responseText);
                            }
                        });
                    }
                }
            }
        }

        if (z1) paginarAjax(section,n,active_busqueda,scroll);
    }
    }
    });

    $("#scroll_sidebar_right").mCustomScrollbar({
    theme:"minimal-dark",
    scrollInertia: 200,
    mouseWheel:{ enable: true }
    });

});

//////////////////////////////////////////////////////////////////////////////////
/////////// A partir de aquí, el resto de funciones son independientes ///////////
//////////////////////////////////////////////////////////////////////////////////


/*Mantener proporción*/

function resize(){
    proporcion('.prop_equal', 1);
    proporcion('.prop_book', 1.5);
}

/*Funciones activar menu*/

function activar_menu(elemento){

    var elemento = "." + elemento;
    elemento = $(elemento);
    $(".menu li").removeClass("active");
    elemento.addClass("active");

}

var active_autores_siguiendo;
var active_local;

function activar_autores_siguiendo(){

    $("#activar_autores_siguiendo").click(function() {
        section = 'autores_siguiendo';
        active_autores_siguiendo = true;
    });

    $("#activar_autores_todos").click(function() {
        section = 'autores';
        active_autores_siguiendo = false;
    });

    /*Fix autores*/
    $(document).on('pjax:complete', function() {
        if(section == 'autores'){
            pagina[6] = 0;
        }
    });

}

function activar_local(){

    $("#activar_coleccion").click(function() {
        section = 'coleccion';
        active_local = false;
    });

    $("#activar_local").click(function() {
        section = 'local';
        active_local = true;
    });

    /*Fix autores*/
    $(document).on('pjax:complete', function() {
        if(section == 'autores'){
            pagina[7] = 0;
        }
    });

}

function active_menu(){

    $("a[data-pjax]").click(function(){
        $(".menu li").removeClass("active");
    });

    $(".menu li").click(function(){
        $(".menu li").removeClass("active");
        $(this).addClass("active");
    });

}

/* Loader */

function before() {
    start = new Date().getTime();
    showLoader();
}

function complete(){
    end = new Date().getTime();
    time = 1200-(end-start);
    if (time < 0) time = 0;
    setTimeout(hideLoader, time);
}

function showLoader(){

    //$("#container_main").mCustomScrollbar("disable");
    $("#b_sidebar").hide();
    $("#loader").show();

}

function hideLoader(){
    
    //$("#container_main").mCustomScrollbar("update");
    $("#loader").hide();
    $("#b_sidebar").show();

}

function ajaxSuccess(div,limite,data) {
    if(data == 0){ //Si no quedan libros
        limitePagina[limite] = 1;
    }else{
        $(div).append("<span class='ocultacion' style='display:none;'>"+data+"</span>");
    }
}

function mostrarLibrosCargados(div,limite,leyendo)
{
    leyendo  = typeof leyendo !== 'undefined' ? leyendo : 0;
    //$(div).waitForImages(function(){ //Lo hace mas lento pero te asegura que estan cargadas
        $('.ocultacion').contents().unwrap();
        resize();
        complete();
        if (leyendo == 1)
        {
            $(".cover_leyendo").hide();
            cover_leyendo();
        }

    //});
}



function buscador(form, content, seccion){

    var form_search = $(form);

    $(form).submit(function( event ) {
        
        event.preventDefault();

        term = form_search.find( "input[name='busqueda']" ).val(),
        url = form_search.attr( "action" );

        var posting = $.post( url, { busqueda: term } );

        posting.done(function( data ) {
           $(content).html(data);
           resize();
        });

        active_busqueda = term;

        if(section == 'biblioteca'){
            pagina[4] = 0;
        }else if(section == 'autores'){
            pagina[5] = 0;
        }

    });

    $("#icon_search").click(function( event ) {
        
        event.preventDefault();

        term = form_search.find( "input[name='busqueda']" ).val(),
        url = form_search.attr( "action" );

        var posting = $.post( url, { busqueda: term } );

        posting.done(function( data ) {
           $(content).html(data);
           resize();
        });

        active_busqueda = term;

        if(section == 'biblioteca'){
            pagina[4] = 0;
        }else if(section == 'autores'){
            pagina[5] = 0;
        }

    });

}

function cover_leyendo(){

    $(document).click(function() {
        $(".cover_leyendo").hide();
    });

    $(".position_leyendo").click(function(e){
        
        e.stopPropagation();
        var element = $(this).children(".cover_leyendo");

        $(".cover_leyendo").hide();
        element.show();

    });

    //Dejar de leer
    var tmp = $.fn.popover.Constructor.prototype.show;
    $.fn.popover.Constructor.prototype.show = function () {
      tmp.call(this);
      if (this.options.callback) {
        this.options.callback();
      }
    }

    this.$('[data-toggle="popover"]').popover({ 
      html : true,
      placement: 'bottom',
      callback: function() { 
       
        $('.leave_book').on('click', function (e) {    
            
            e.preventDefault();
            var data_id = $(this).attr('data-id');
            var parent_fade = $(this).closest('.section_book_leyendo');

            $.ajax({
                url: root + '/leer/dejar/' + data_id,
                type: 'GET',
                beforeSend: function() {
                    showLoader();
                },
                complete: function() {
                    hideLoader();
                },
                success: function(data) {
                    parent_fade.fadeOut();
                }
            });

        });

        $('.close_popover').on('click', function (e) {    
          $('[data-toggle="popover"]').popover('hide');
        });

      } 
    });

    //Cerrar popover al hacer click en body o en otro libro

    $('body').on('click', function (e) {  
        if ($(e.target).data('toggle') !== 'popover'
            && $(e.target).parents('.popover.in').length === 0) { 
            $('[data-toggle="popover"]').popover('hide');
        }
    });

    $('.position_leyendo').on('click', function (e) {
        if ($(e.target).data('toggle') !== 'popover'
            && $(e.target).parents('.popover.in').length === 0) { 
            $('[data-toggle="popover"]').popover('hide');
        }
    });

}


//Active Full Screen

function full_screen(){

var screen_active = 0;

$('.full_screen').on('click', function () {  

  var divScreen = $(this);
  var iconScreen = divScreen.children("i");
  var elem = document.body;

  if (screen_active == 0)
  {
    if (elem.requestFullscreen) {
      elem.requestFullscreen();
    } else if (elem.msRequestFullscreen) {
      elem.msRequestFullscreen();
    } else if (elem.mozRequestFullScreen) {
      elem.mozRequestFullScreen();
    } else if (elem.webkitRequestFullscreen) {
      elem.webkitRequestFullscreen();
    }
    screen_active = 1;
    //iconScreen.removeClass("fa-expand");
    //iconScreen.addClass("fa-compress");
  }
  else
  {
    if (document.exitFullscreen) {
      document.exitFullscreen();
    } else if (document.msExitFullscreen) {
      document.msExitFullscreen();
    } else if (document.mozCancelFullScreen) {
      document.mozCancelFullScreen();
    } else if (document.webkitExitFullscreen) {
      document.webkitExitFullscreen();
    }
    screen_active = 0;
    //iconScreen.removeClass("fa-compress");
    //iconScreen.addClass("fa-expand");
  }

});

}

//Tooltip

function ready_tooltip(){

    $(function () {
        $('[data-toggle="tooltip"]').tooltip();
    });

    //Estilo de tooltip
    $(".tooltip-extra").tooltip({
      template: '<div class="tooltip tooltip-extra"><div class="tooltip-arrow"></div><div class="tooltip-inner"></div></div>'
    });

}

//Fix scroll sidebar right

function scroll_sidebar_right(){
    
    var sidebar_height = $("#sidebar_right").outerHeight();
    var element_height = $("#top_sidebar").outerHeight();
    var rest_height = $("#content_sidebar_right h4").innerHeight();

    var content_height = (sidebar_height - element_height) - rest_height;

    $("#scroll_sidebar_right").innerHeight(content_height); 

}


//Buttons follow and unfollow

function follow(){

$(".button-follow").hover(function(e) {

//Declare variables
var element = $(this);
var id = $(this).attr('data-follow');
var url;

if(e.type == 'mouseenter') {
    
    if($(this).hasClass('follow')){
        if(element.hasClass('autor-follow')){
            element.html("Seguir");
        }else if(element.hasClass('book-follow')){
            element.html("Guardar");
        }else if(element.hasClass('user-follow')){
            element.html("Seguir");
        }
    }
    else if($(this).hasClass('unfollow')){
        if(element.hasClass('autor-follow')){        
            element.html("No seguir");
        }else if(element.hasClass('book-follow')){
            element.html("No guardar");
        }else if(element.hasClass('user-follow')){
            element.html("No seguir");
        }
    }

}

else if (e.type == 'mouseleave') {
    
    if($(this).hasClass('follow')){
        if(element.hasClass('autor-follow')){
            element.html("Seguir");
        }else if(element.hasClass('book-follow')){
            element.html("Guardar");
        }else if(element.hasClass('user-follow')){
            element.html("Seguir");
        }
    }
    else if($(this).hasClass('unfollow')){
        if(element.hasClass('autor-follow')){        
            element.html("Siguiendo");
        }else if(element.hasClass('book-follow')){
            element.html("Guardado");
        }else if(element.hasClass('user-follow')){
            element.html("Siguiendo");
        }
    }

}

//On click, send get petition
$(".button-follow").click(function(){

    if(element.hasClass('follow')){

        if(element.hasClass('autor-follow')){
            element.html("Siguiendo");
            url = root + "/autor/seguir/" + id;
        }else if(element.hasClass('book-follow')){
            element.html("Guardado");
            url = root + "/guardar/" + id;
        }else if(element.hasClass('user-follow')){
            element.html("Siguiendo");
            url = root + "/usuario/seguir/" + id;
        }

        element.removeClass("follow");
        element.addClass("unfollow");

    }else if(element.hasClass('unfollow')){

        if(element.hasClass('autor-follow')){        
            element.html("Seguir");
            url = root + "/autor/dejar/" + id;
        }else if(element.hasClass('book-follow')){
            element.html("Guardar");
            url = root + "/dejar_guardar/" + id;
        }else if(element.hasClass('user-follow')){
            element.html("Seguir");
            url = root + "/usuario/dejar/" + id;
        }

        element.removeClass("unfollow");
        element.addClass("follow");

    }

    $.get(url, function() {
    
    }).done(function() {
        
    });

});

});

}


function posicionar(elemento, wrap){

    var elemento = $(elemento);
    var wrap = $(wrap);

    var ancho_elemento = $(elemento).width();
    var ancho_wrap = $(wrap).width();

    var alto_elemento = $(elemento).height();
    var alto_wrap = $(wrap).height();

    var ancho_posicionar = (ancho_wrap/2)-(ancho_elemento/2);
    var alto_posicionar = -(alto_wrap/2)-(alto_elemento/2);

    elemento.css({
    "marginLeft": ancho_posicionar + "px",
    "marginTop": alto_posicionar + "px",
    "max-width": ancho_wrap + "px"
    });

}


function bookshelf(){

    var elementBookshelf = $(".collect_book");

    elementBookshelf.each(function() {

        var pages = $(this).attr('data-page');
        
        //Set the width
        var widthBook = pages/3;
        if(pages > 400){
            widthBook = 100;
            fontBook = 24;
        }else if(pages < 100){
            widthBook = 30;
            fontBook = 16;
        }else{
            fontBook = 18;
        }
        //Fix height
        var heightBook = 340;
        var bodyHeightBook = heightBook - widthBook;

        /*Give the class*/
        $(this).css({
        "width": widthBook + "px",
        "height": heightBook + "px"
        });

        //Author image
        var imgAuthor = $(this).children(".collect_book_author");
        /*Give the class*/
        $(imgAuthor).css({"width": widthBook + "px","height": widthBook + "px"});

        //Body
        var bookBody = $(this).children(".collect_book_body");
        $(bookBody).css({"height": widthBook + "px"});

        //Title
        var bookTitle = $(this).children(".collect_book_body").children(".collect_book_title");

        var marginWidth = widthBook/2;
        var marginHeight = bodyHeightBook/2;
        var marginBook = marginHeight - marginWidth;

        $(bookTitle).css({
        "width": bodyHeightBook + "px",
        "height": widthBook + "px",
        "lineHeight": widthBook + "px",
        "marginTop": marginBook + "px",
        "marginLeft": -marginBook + "px",
        "fontSize": fontBook
        });
        

    });

}

//Modificar el alto de un elemento en proporción a su ancho
//.innerWidth no detecta los pixeles, detecta el porcentaje
function proporcion(elemento, numero){
    
    var elemento = $(elemento);

    elemento.each(function() {

        var ancho = $(this).outerWidth();
        var alto = ancho * numero;

        $(this).css({"height": alto + "px"});

    });

}

/*Scroll*/
$(document).ready(function(){

    //clic en un enlace de la lista
    $('.scroll_page').on('click',function(e){
        //prevenir en comportamiento predeterminado del enlace
        e.preventDefault();
        //obtenemos el id del elemento en el que debemos posicionarnos
        var strAncla=$(this).attr('href');
         
        //utilizamos body y html, ya que dependiendo del navegador uno u otro no funciona
        $('body,html').stop(true,true).animate({
            //realizamos la animacion hacia el ancla
            scrollTop: $(strAncla).offset().top
        },1000);
    });
});


/*Limpiar cadena de texto*/
function string_to_slug(str) {
  str = str.replace(/^\s+|\s+$/g, ''); // trim
  str = str.toLowerCase();
  
  // remove accents, swap ñ for n, etc
  var from = "àáäâèéëêìíïîòóöôùúüûñç·/_,:;";
  var to   = "aaaaeeeeiiiioooouuuunc______";
  for (var i=0, l=from.length ; i<l ; i++) {
    str = str.replace(new RegExp(from.charAt(i), 'g'), to.charAt(i));
  }

  str = str.replace(/[^a-z0-9 -]/g, '') // remove invalid chars
    .replace(/\s+/g, '_') // collapse whitespace and replace by _
    .replace(/-+/g, '_'); // collapse dashes

  return str;
}


/*Ajustar imagen de fondo*/
function updateBackground() {

    screenWidth = $(window).width();
    screenHeight = $(window).height();
    var bg = jQuery("#bg");

    // Proporcion horizontal/vertical. En este caso la imagen es cuadrada
    ratio = 1.5;

    if (screenWidth/screenHeight > ratio) {
        $(bg).height("auto");
        $(bg).width("100%");
    } else {
        $(bg).width("auto");
        $(bg).height("100%");
    }

    // Si a la imagen le sobra anchura, la centramos a mano
    if ($(bg).width() > 0) {
        $(bg).css('left', (screenWidth - $(bg).width()) / 2);
    }

}

$(document).ready(function() {

    // Actualizamos el fondo al cargar la pagina
    updateBackground();
    $(window).bind("resize", function() {
        // Y tambien cada vez que se redimensione el navegador
        updateBackground();
    });

});

/*setInterval(paginar, 500);*/



/*UI to upload a book*/


function ready_upload_book(){
/*
    var wrap = $('#wrap_upload_book');
    var content = $('#wrapper_main');
    var button = $('#button_upload_book');
    wrap.hide();

    button.click(function(){
        
        var $this = $(this);

        if($this.hasClass('active')){

            //Hide
            $this.parent().parent().removeClass('active');
            wrap.hide();
            content.show();
            resize();

            $this.html('<i class="fa fa-cloud-upload i_right"></i>Subir libro');
            $this.removeClass('active');

        }else{

            //Show
            $this.parent().parent().addClass('active');
            wrap.show();
            content.hide();

            $this.html('<i class="fa fa-remove i_right"></i>Cancelar');
            $this.addClass('active');

        }

    });
*/
}



/* RESPONSIVE */

function responsiveMenu(){

    /*VARIABLES*/
    var menuResponsive = $('#menu_responsive');
    var wrap = $('.sidebar_responsive');
    var button = $('#show_menu_responsive');
    var valueSection = $("#value_section");
    var height_window = ($(window).height() - $("#menuResponsive").height()) + "px";
    
    //Funciones generales
    menu_responsive();

    //Ocultar menú al cambiar de sección
    $(document).on('pjax:complete', function() {

        if(button.hasClass('active')){
            wrap.hide();
            button.removeClass('active');
        }else{
            //Si el menu no está activo, no hacer nada
        }

    });

    //Mostrar mensaje para confirmar el cierre de sesión
    $("#logout_responsive").click(function(e){
        e.preventDefault();
        $('#modal_logout').modal('show');
    });

    function menu_responsive(){
        
        function setHeightMenu(){
            wrap.css("height", height_window);
            wrap.hide();
        }
        setHeightMenu();

        function show_wrap(){
            wrap.show();
            button.addClass('active');
        }


        function hide_wrap(){
            wrap.hide();
            button.removeClass('active');
        }

        //Al pulsar sobre el navicon
        button.click(function(e){
            e.stopPropagation();
            if(button.hasClass('active')){
                hide_wrap();
            }else{
                show_wrap();
            }
        });

    }

}