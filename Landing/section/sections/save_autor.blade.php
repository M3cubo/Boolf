    <article id="wrapper_main" class="extra">

            <div id="top_page">

            <div class="table min">
                
                <div class="table_sidebar">
                    <img src="{{Request::root()}}/img/autor/{{$autor['id']}}.{{$autor['imagen']}}" class="table_img img_rounded prop_equal" alt="{{$autor['nombre']}}"/>
                </div>

                <div class="table_content">
                    <h2 id="top_title">{{$autor['nombre']}}</h2>
                    @if ($guardado==0)
                    <div class="button margin-vertical button-follow autor-follow follow" data-follow="{{$autor['id']}}">{{trans('autor.seguir')}}</div>
                    @else
                    <div class="button margin-vertical button-follow autor-follow unfollow" data-follow="{{$autor['id']}}">{{trans('autor.siguiendo')}}</div>
                    @endif
                </div>

            </div>

            </div>

            <ul class="horizontal_menu no_bottom">
                <li class="active"><a data-toggle="tab" href="#biografia">{{trans('autor.biografia')}}</a></li>
                <li><a data-toggle="tab" href="#obras">{{trans('autor.obras')}}</a></li>
                <!--<li><a data-toggle="tab" href="#autores_relacionados">Autores</a></li>-->
            </ul>

            <div class="content_autor">

            <div class="tab-content">

                <div class="tab-pane active" id="biografia">
                
                    <div class="biografia_autor">{{$autor['biografia']}}</div>

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
                <a target="_blank" href="{{$at->enlace}}"><i class="icon-external-link i_right"></i>{{trans('autor.atribucion.texto')}}<a target="_blank" href="https://creativecommons.org/licenses/by-sa/3.0/deed.es">CC BY-SA</a>
               
                @endif

            @endforeach
             </span>

            </div>

    </article>