//////////////////////////////////////////////////////////////////////////////////
///////////////////////////  UI JAVASCRIPT  //////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////


/*
function poya(ruta_libro)
    {
          var url = ruta_libro;
          PDFJS.disableWorker = true;

          var pdfDoc = null;
          PDFJS.pdfBug = true;

          console.log("b");
          PDFJS.getDocument(url).then(function (pdfDoc_) {
            pdfDoc = pdfDoc_;
            var totalPage = pdfDoc.numPages;
            console.log("a");
            });
    }*/

//alert(poya("http://localhost/bookstore/public/users_pdf/1/19.pdf"));

var buttonNext = $("*[data-step='next']");

function activeButton(){
    buttonNext.removeClass("disabled");
}
function disableButton(){
    buttonNext.addClass("disabled");
}

function stepsForm(page,steps){

    /* CHECK */

    //Check if fields are empty
    function checkInfo(step){

        var allFilled = true;

        var name_form = '#form' + step;
        var form = $(name_form);

        $(form).find("input").each(function(index, element) {
            if (element.value === '') {
                allFilled = false;
            }
        });

        if(allFilled == true){
            activeButton();
        }else{
            disableButton();
        }
    }

    ////////////////////////////////////////////////

    var page = page;

    //Show only the active box
    $(".box_section").hide();
    $(".box_section_active").show();

    //Set the order of the boxes
    for (var i = 1;i<=steps;i++)
    $(".box_section[data-section='"+i+"']").data("section_box", ""+i+"");

    //Span information
    var span_box = $(".span_box");
    var error_box = $(".error_box");

    //Buttons action
    var buttonNext = $("*[data-step='next']");
    var buttonSkip = $("*[data-step='skip']");
    var buttonBack = $("*[data-step='back']");

    var valid;
    disableButton();

    //If exist Progress Bar
    var progressBar = $(".progress_box .progress-bar");
    var number_steps = steps;
    var width_progress = parseInt(100/number_steps);

    function setProgressBar(step_bar){
        var progressBarWidth = (step_bar * width_progress) + '%';
        $(progressBar).animate({width: progressBarWidth}, 500, function() {
            // Animation complete.
        });
    }

    //Send the data*
    function ajaxForm(step){
        
        var url_ajax;
        var part_ajax;
        var valid = false;
        var formData;
        var next_step = step;
        var step = step - 1;


        function ajax(url, formData)
        {
                $.ajax({
                type: "POST",
                url: url,
                data: formData,
                cache: false,
                processData: false,
                contentType: false,
                dataType: 'html',
                success: function (data) {
                    
                    console.log(data);
                        if (step==3) {
                        $("#show_book_upload").append(data);
                        $("#show_book_upload").ready(function(){
                             Jamon(); /*DEBUG*/ //No encuentro a qué función hacía referencia
                        });

                       
                        //$('#temp').remove();
                        }

                    /*var ruta_libro = data[0];
                    var ruta_controlador = data[1];*/
                    animation_step(next_step);
                    //alert(poya("http://localhost/bookstore/public/users_pdf/1/19.pdf"));
                    
                },
                complete: function() {
                    //$(document).ready(function(){pene();});
                },
                error: function (data) {
                    console.log("ERROR");
                    console.log(data);
                    console.log(url);
                    error_box.text("Ha ocurrido un fallo. Vuelve a intentarlo."); //Show the error
                    error_box.show();
                }
            });
        }

        
        if($(".box_section_active").hasClass("type_image")){
            
            part_ajax = $(".box_section_active").data('url');
            url_ajax = root + part_ajax;
            var formData = new FormData();
            formData.append('file', fileGlobal);
            valid = true;

        }else if($(".box_section_active").hasClass("type_pdf")){

            part_ajax = $(".box_section_active").data('url');
            url_ajax = root + part_ajax;
            var name_form = 'form' + step;
            var form =document.getElementById(name_form);
            var formData = new FormData(form);
            valid = true;
            

        }else if($(".box_section_active").hasClass("type_form")){
            part_ajax = $(".box_section_active").data('url');
            url_ajax = root + part_ajax;
            var name_form = 'form' + step;
            var form =document.getElementById(name_form);
            var formData = new FormData(form);
            valid = true;

        }else if($(".box_section_active").hasClass("type_ccb")){
            part_ajax = $(".box_section_active").data('url');
            url_ajax = root + part_ajax;
            var name_form = 'form' + step;
            var form =document.getElementById(name_form);
            var formData = new FormData(form);
            valid = true;

        }else if($(".box_section_active").hasClass("type_other")){
            part_ajax = $(".box_section_active").data('url');
            url_ajax = root + part_ajax;
            

            var formData = false;
            valid = true;

        }else if(step > number_steps){ //Final
            //Finish the steps
        }

        if (valid == true)
        {
            ajax(url_ajax,formData);
        }

    }


    //Check if the step is valid
    function checkStatus(step){
        
        span_box.hide(); //Hide information
        error_box.hide(); //Hide the errors

        valid = false;

        if(step <= number_steps){

            //Show the message
            var active_message = $(".box_section_active").data('message');
            span_box.text(active_message);
            span_box.show();

            //
            //En caso de que tengan que realizarse comprobaciones
            //
            if($(".box_section_active").hasClass("type_ccb")){ //Revisa si se han marcado opciones dentro de los mínimos y máximos
                var form_ccb = $(".box_section_active").find("form");
                var min = form_ccb.data('min');
                var max = form_ccb.data('max');
                ccb(step, min, max);
            }
            else if($(".box_section_active").hasClass("check-form")){ //Revisa que el formulario no esté vacío
                var name_form = '#form' + step;
                var form = $(name_form);
                form.find("input").keyup(function() { //Realizar la comprobación cuando se produzca en los input determinados
                    checkInfo(step);
                });
            }
            else if($(".box_section_active").hasClass("check-textarea")){ //Revisa que el textarea no esté vacío
                var name_form = '#form' + step;
                var form = $(name_form);
                $(form).find("textarea").keyup(function() {
                    if ($(this).val() == '') {
                        disableButton();
                    }else{
                        activeButton();
                    }
                });
            }
            else if($(".box_section_active").hasClass("no-check-status")){ //Clase especial. Este Step no requiere comprobación
                activeButton();
            }else{
                //valid = true;
            }
            
        }

    }
    
    function animation_step(step){
        
        disableButton(); //Disable by defect before Check the Step

        //Transition
        $(".box_section_active").hide();
        $(".box_section_active").removeClass("box_section_active");
        $("[data-section='"+ step +"']").addClass("box_section_active");
        $(".box_section_active").show();

        //Ad step progress bar
        setProgressBar(step);
        //Check the new step
        checkStatus(step);
    }

    function nextStep(step, skip){
        
        if(step > number_steps){
            step = number_steps; //No se puede avanzar más
        }else if (step == 0){
            step = 1; //No se puede retroceder más
        }else{
            if(skip == true){
                animation_step(step);
            }else{
                if(buttonNext.hasClass("disabled")){
                    //Not valid the step
                }else if(buttonNext.not('.disabled')){
                    ajaxForm(step);
                }
            }
        }

    }

    //Click on buttons (next, skip, back)
    $(".group_box_footer .button").on('click', function () {  

        var active_step = $(this).data('active');
        var type_step = $(this).data('step');

        //Define the active section box
        var active_section = parseInt($(".box_section_active").data("section_box"));
        var next_section = active_section + 1;        
        var previous_section = active_section - 1;   

        if(type_step == 'next'){
            nextStep(next_section, false);
        }else if(type_step == 'skip'){
            nextStep(next_section, true);
        }else if(type_step == 'back'){
            nextStep(previous_section, true);
        }

    });

    
    function init(){ //Active the first step
        nextStep(1, true);
    }

    init(); //Init the function


    //////////////////////////////////////////////////////////////////////////////////

    /* Count Content Box (CCB) */

    function ccb(step, min, max){

        $(".type_ccb .content_box input[type='checkbox']").css("opacity", "0"); //Hide the input check
        $(".type_ccb .content_box input[type='checkbox']").prop('checked', false); //Not checked
        $(".type_ccb .content_box span").hide(); //Hide the icon´s to check every element
        resize(); //Resize the images

        var count = 0;

        $(".box_section_active.type_ccb .content_box").on('click', function () {
        
            var $this = $(this);

            if($this.hasClass("ccb_active")){

                $this.children(".ccb_show").hide();
                $this.removeClass("ccb_active");
                $this.children("input[type='checkbox']").prop('checked', false); //Not checked

                count -= 1;
                check_count(count, min, max);
            
            }else{

                if(min == 1 && max == 1){ //If only one can be select
                    $(".type_ccb .content_box ccb_show").hide();
                    $(".type_ccb .content_box").removeClass("ccb_active");
                    $(".type_ccb .content_box input[type='checkbox']").prop('checked', false); //Not checked
                    $(".type_ccb .content_box span").hide(); //Hide the icon´s to check every element
                    count = 0;
                }
                
                $this.children(".ccb_show").show();
                $this.addClass("ccb_active");
                $this.children("input[type='checkbox']").prop('checked', true); //Checked
                
                count += 1;
                check_count(count, min, max);
                
            }

            function check_count(count, min, max){

                if(count >= min){
                    valid = true;
                }else{
                    valid = false;
                }
                
                if(valid == true){
                    activeButton();
                }else if(valid == false){
                    disableButton();
                }

            }

        });

    }

}//stepsForm