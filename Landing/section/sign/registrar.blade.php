<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8"/>

<title>{{trans('registrar.title')}}</title>

@include(Config::get('rv.header'))
{{ Html::script('js/icheck.js', array('defer' => 'defer')) }}
</head>
<body>

<div id="main_register">

<img src="{{Request::root()}}/img/bg/books.jpg" id="bg" alt="fondo">

@include(Config::get('rv.nav'))

<div class="container">

<div id="content_form_landing">

    <div class="form_center">
        
        <h3 class="title_form_landing">{{trans('registrar.titulo')}}</h3>

            @foreach($errors->all() as $message)

            <li>{{ $message }}</li>

            @endforeach
            {{Session::get('msg')}}

        <div id="form_landing">

        <form class="form form-shadow" method="post" action="{{Request::root()}}/registrar" data-parsley-validate>
            
            <input type="text" class="parsley" name="nombre" placeholder="{{trans('registrar.campo.nombre')}}" autocomplete="off" data-parsley-required="true" data-parsley-length="[3, 20]" data-parsley-remote="{{Request::root()}}/ajax/nombre" data-parsley-ui-enabled='false'tabindex="1">
                        
            <input autocomplete="off" type="text" class="parsley" name="email" placeholder="{{trans('registrar.campo.email')}}"  data-parsley-required="true" data-parsley-type="email" data-parsley-remote="{{Request::root()}}/ajax/email" data-parsley-ui-enabled='false'tabindex="2">

            <input type="password" class="parsley" name="password" data-parsley-type="alphanum" id="password_equal" autocomplete="off" placeholder="{{trans('registrar.campo.pass')}}" data-parsley-required="true" data-parsley-length="[6, 40]" data-parsley-ui-enabled='false'tabindex="3">
            
            <input type="password" class="parsley" name="password2" data-parsley-type="alphanum" placeholder="{{trans('registrar.campo.pass2')}}" autocomplete="off" data-parsley-required="true" data-parsley-length="[6, 40]" data-parsley-equalto="#password_equal" data-parsley-ui-enabled='false'tabindex="4">
            
            <label class="label_checkbox">
                <input type="checkbox" class="parsley icheck" name="terminos" data-parsley-required="true" data-parsley-error-message="Debes aceptar los Términos" data-parsley-ui-enabled='false' data-parsley-px='233' tabindex="5">{{trans('registrar.campo.terminos')}}
            </label>

            <input type="submit" value="{{trans('registrar.submit')}}" class="button_landing" tabindex="6">

            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">

        </form>

        </div>

    </div><!--/form_center-->

</div><!--/content_form_landing-->

</div><!--/container-->

</div><!--/main_register-->


</body>

</html>
