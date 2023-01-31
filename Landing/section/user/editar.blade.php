    <article id="top_main" class="top">
        
        <h2>{{trans('usuario.editar')}}</h2>

    </article>

    <article id="wrapper_main" class="extra">

        <ul class="horizontal_menu">
            <li class="active"><a data-toggle="tab" href="#perfil">{{trans('usuario.perfil')}}</a></li>
            <li><a data-toggle="tab" href="#cuenta">{{trans('usuario.cuenta')}}</a></li>
        </ul>

        <div class="tab-content">

            <div class="tab-pane active" id="perfil">
                                            
                <form action="{{Request::root()}}/usuario/editar/perfil" method="post" class="form form-light form-two-column" enctype="multipart/form-data" data-parsley-validate>

                    <div class="table min">

                        <div class="table_sidebar">
                            @if ($usuario->imagen == "")
                            <img src="{{Request::root()}}/img/user/avatar/user.png" class="table_img" id="imagen_usuario" alt="{{$usuario->username}}"/>
                            @else
                            <img src="{{Request::root()}}/img/user/avatar/{{$usuario->id}}.{{$usuario->imagen}}" id="imagen_usuario" class="table_img" alt="{{$usuario->username}}"/>
                            @endif
                            <span class="file-wrapper">
                                <input type="file" name="imagen" id="photo" accept="image/*"/>
                                <span class="button center">{{trans('usuario.cambiar_imagen')}}</span>
                            </span>
                        </div>

                        <div class="table_content">
                            <span class="label">{{trans('usuario.biografia')}}</span>
                            <textarea class="textarea medium parsley" name="biografia" data-parsley-length="[0, 200]" data-parsley-error-message="{{trans('usuario.error_biografia')}}" data-parsley-ui-enabled='false'>{{{$usuario->perfil}}}</textarea>
                        </div>

                    </div>
                        
                    <div class="submit_bottom">
                        <button type="submit" class="button awesome submit">{{trans('usuario.guardar')}}</button>
                        <a href="{{Request::root()}}/usuario/{{Auth::user()->username}}" data-pjax="#main" class="button">{{trans('usuario.volver')}}</a>
                    </div>

                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">

                </form>
            
            </div><!--/tab-pane-perfil-->  
                
            <div class="tab-pane" id="cuenta">
                
                <div class="table min">
                    
                <ul class="vertical_menu table_sidebar">
                    <li class="active"><a data-toggle="tab" href="#correo">{{trans('usuario.cambiar_correo')}}</a></li>
                    <li><a data-toggle="tab" href="#contraseña">{{trans('usuario.cambiar_pass')}}</a></li>
                    <li><a data-toggle="tab" href="#preferencias">{{trans('usuario.preferencias')}}</a></li>
                </ul>
                
                <div class="table_content">
                
                    <div class="tab-content">
                    
                    <div class="tab-pane active" id="correo">
                        
                        <p class="info_form"><i class="fa fa-envelope i_right"></i>{{trans('usuario.texto_correo')}}</p>
                        <form action="{{Request::root()}}/usuario/editar/email" method="post" class="form form-light form-two-column" data-parsley-validate>
                            <p class="field"><label>{{trans('usuario.nuevo_correo')}}</label><input type="text" class="parsley" name="email" autocomplete="off" data-parsley-required="true" data-parsley-type="email" id="edit_email" data-parsley-ui-enabled='false' data-parsley-parent='correo'></p>
                            <p class="field"><label>{{trans('usuario.repetir_correo')}}</label><input type="text" class="parsley" name="repeat_email" autocomplete="off" data-parsley-required="true" data-parsley-type="email" data-parsley-equalto="#edit_email" data-parsley-ui-enabled='false' data-parsley-parent='correo'></p>
                            <p class="info_form min">{{trans('usuario.pedir_pass')}}</p>
                            <p class="field"><label>{{trans('usuario.pass')}}</label><input type="password" name="password" autocomplete="off" data-parsley-required="true" data-parsley-ui-enabled='false' data-parsley-parent='correo'></p>
                        <div class="submit_bottom">
                            <button type="submit" class="button awesome submit">{{trans('usuario.guardar')}}</button>
                        </div>

                        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                        </form>
                        
                    </div>
                    
                    <div class="tab-pane" id="contraseña">
                        
                        <p class="info_form"><i class="fa fa-lock i_right"></i>{{trans('usuario.texto_pass')}}</p>
                        <form action="{{Request::root()}}/usuario/editar/password" method="post" class="form form-light form-two-column" data-parsley-validate>
                            <p class="field"><label>{{trans('usuario.nuevo_pass')}}</label><input type="password" class="parsley" name="password_nueva" autocomplete="off" data-parsley-required="true" data-parsley-length="[6, 40]" id="edit_password" data-parsley-ui-enabled='false' data-parsley-parent='contraseña'></p>
                            <p class="field"><label>{{trans('usuario.repetir_pass')}}</label><input type="password" class="parsley" name="repeat_password" autocomplete="off" data-parsley-required="true" data-parsley-length="[6, 40]" data-parsley-equalto="#edit_password" data-parsley-ui-enabled='false' data-parsley-parent='contraseña'>
                            <p class="info_form min">{{trans('usuario.pedir_pass')}}</p>
                            <p class="field"><label>{{trans('usuario.pass')}}</label><input type="password" name="password" autocomplete="off" data-parsley-required="true" data-parsley-ui-enabled='false' data-parsley-parent='contraseña'></p>
                         <div class="submit_bottom">
                            <button type="submit" class="button awesome submit">{{trans('usuario.guardar')}}</button>
                        </div>

                        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                        </form>
                        
                    </div>
                    
                    <div class="tab-pane" id="preferencias">
                        
                        <p class="info_form"><i class="fa fa-cog i_right"></i>{{trans('usuario.texto_preferencias')}}</p>
                        <form action="{{Request::root()}}/usuario/newsletter" method="post" class="form form-light form-two-column" data-parsley-validate>
                            <label class="label_checkbox">
                                <input type="checkbox" name="recibir1">{{trans('usuario.texto_newsletter')}}
                            </label>
                            <p class="info_form min">{{trans('usuario.pedir_pass')}}</p>
                            <p class="field"><label>{{trans('usuario.pass')}}</label><input type="password" name="actual_password" autocomplete="off" data-parsley-required="true" data-parsley-ui-enabled='false' data-parsley-parent='preferencias'></p>
                         <div class="submit_bottom">
                            <button type="submit" class="button awesome submit">{{trans('usuario.guardar')}}</button>
                        </div>

                        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                        </form>
                    </div>
                    
                    </div><!--/tab-content-->
                
                </div><!--/table_content-->
                    
                </div><!--/table-->
            
            </div><!--/tab-pane-cuenta-->
                
        </div><!--/tab-content-->

    </article>

<script type="text/javascript">
if(!window.jQuery){document.onreadystatechange = function(){if(document.readyState=='complete'){
@include('user.js')
}}}else{
@include('user.js')
}


/*function removeElementsByClass(){
    var elements = document.getElementsByClassName('popover');
    while(elements.length > 0){
        elements[0].parentNode.removeChild(elements[0]);
    }
}*/
</script>