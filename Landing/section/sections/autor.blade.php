    <article id="wrapper_main" class="total">

            <div class="table min">

                <div class="table_sidebar">

                    <div style="background-image:url('{{Request::root()}}/img/autor/{{$autor['id']}}.{{$autor['imagen']}}');" id="img_hero" class="img_rounded prop_equal"></div>
                    <!--<div style="background-image:url('{{Request::root()}}/img/autor/{{$autor['id']}}.{{$autor['imagen']}}');" id="img_blurred"></div>-->
                    
                    @if ($guardado==0)
                    <div class="button margin-vertical middle button-follow autor-follow follow" data-follow="{{$autor['id']}}">{{trans('autor.seguir')}}</div>
                    @else
                    <div class="button margin-vertical middle button-follow autor-follow unfollow" data-follow="{{$autor['id']}}">{{trans('autor.siguiendo')}}</div>
                    @endif

                </div>

                <div class="table_content">
                    
                    <h2 id="top_title">{{$autor['nombre']}} <span>(@if($autor['fecha_nacimiento']<0)a.C.@endif{{abs($autor['fecha_nacimiento'])}}-{{abs($autor['fecha_muerte'])}})</span></h2>

                    <div class="cite_autor">
                        "{{$autor['cita']}}"
                    </div>
                    
                </div>

                <ul class="horizontal_menu autor_menu">
                    <li class="active"><a data-toggle="tab" href="#biografia">{{trans('autor.biografia')}}</a></li>
                    <li><a data-toggle="tab" href="#obras">{{trans('autor.obras')}}</a></li>
                    <!--<li><a data-toggle="tab" href="#autores_relacionados">Autores</a></li>-->
                </ul>

            </div><!--/table_blur-->

            <div class="content_autor">

                <div class="tab-content">

                    <div class="tab-pane active" id="biografia">
                        
                        <div id="biografia_autor">{{$autor['biografia']}}</div>

                    </div><!--/tab-pane-->

                    <div class="tab-pane" id="obras">
                            
                            <?php
                            foreach ($libros as $lib) {
                            ?>
                            <a data-pjax="#main" href="../libro/{{$lib['id']}}">
                            <div class="section_book">
                                <div class="image_book">
                                    <img src="{{Request::root()}}/img/book/{{$lib['id']}}.{{$lib['imagen']}}" class="img_book" alt="{{$lib['titulo']}}"/>
                                </div>
                                <p class="text">
                                    <span class="title">{{$lib['titulo']}}</span>
                                </p>
                            </div>
                            </a>
                            <?php
                            }
                            ?>

                    </div><!--/tab-pane-->

                    <div class="tab-pane" id="autores_relacionados">

                        <!--Aqui irá el algoritmo chupiguay-->

                    </div><!--/tab-pane-->

                </div><!--/tab-content-->

            </div>

            <span class="atribution">
                @foreach ($atribuciones as $at)
                        
                @if ($at->tipo==1)
                <!--Imagen de dominio público (Wikisource)-->
                <a target="_blank" href="{{$at->enlace}}"><i class="icon-external-link i_right"></i>{{trans('autor.atribucion.imagen')}}</a>
                {{trans('autor.atribucion.wikisource')}}

                @elseif ($at->tipo==2)
                <!--Fuente de la imagen (atribución)-->
                <a target="_blank" href="{{$at->enlace}}"><i class="icon-external-link i_right"></i>{{trans('autor.atribucion.imagen')}}</a>
                
                @elseif ($at->tipo==3)
                <!--Texto de libre circulación de la biografía-->
                <a target="_blank" href="{{$at->enlace}}"><i class="icon-external-link i_right"></i>{{trans('autor.atribucion.texto')}}</a>
                       
                @endif

                @endforeach
            </span>

    </article>

<!--
<script type="text/javascript">

$(document).ready(function() {

    setTimeout(function() {
        $('#table_blur').blurjs({
            source: '#img_blurred',
            radius: 40,
            cache: true,
            overlay: 'rgba(0, 0, 0, 0.5)'
        });
    }, 500);//Trick for multilpe blur´s

});

</script>
-->