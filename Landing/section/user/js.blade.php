var SITE = SITE || {};

SITE.fileInputs = function() {
  var $this = $(this),
      $val = $this.val(),
      valArray = $val.split('\\'),
      newVal = valArray[valArray.length-1],
      $button = $this.siblings('.button');

  if(newVal !== '') {
    $button.text(newVal);
  }
};

$(document).ready(function() {
    
    /*File input*/
    $('.file-wrapper input[type=file]').bind('change focus click', SITE.fileInputs);
    $('#photo').val('');
    //Ajax forms´s
    $(function() {

        $('form').submit(function(e) {

            e.preventDefault();

            var form = $(this);
            var btn = $(".submit",form);
            var url = form.attr("action");
            var data = new FormData(this);

            if ( form.parsley('validate') ) {
                $.ajax({
                    url: url,
                    type: 'POST',
                    data: data,
                    async: false,
                    cache: false,
                    contentType: false,
                    processData: false,
                    beforeSend: function() {
                        btn.html('<i class="fa fa-spinner fa-spin"></i><span class="i_left">{{trans('usuario.cargando')}}</i>');
                    },
                    error: function() {
                        btn.html('{{trans("usuario.guardar")}}</i>');
                        alert("{{trans('usuario.error_imagen')}}");
                    },
                    complete: function() {
                    },
                    success: function(data) {
                        if (data == 'png' || data == 'jpg')
                        {
                            $('#imagen_usuario').attr('src', '{{Request::root()}}/img/user/avatar/{{$usuario->id}}.'+data+'?a=1').load();
                            $('#avatar_usuario').attr('src', '{{Request::root()}}/img/user/avatar/{{$usuario->id}}.'+data+'?a=1').load();
                            $('#photo').val('');
                        }

                        if (data == 'png' || data == 'jpg' || data == 1)
                            btn.html('{{trans('usuario.guardar')}}');
                        else
                            btn.html('{{trans('usuario.guardar')}}');
                            //alert(data); //En este caso habra un error, como que la imagen no es compatible que habra que mostrar al usuario
                    }
                });
            }

        });

    });

});