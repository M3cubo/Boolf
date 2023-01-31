<article id="top_main" class="top">
        
    <h4 class="h4_back"><a data-pjax="#main" href="<?php echo URL::previous();?>">
        <span class="fa-stack fa-lg">
          <i class="fa fa-circle fa-stack-2x"></i>
          <i class="fa fa-angle-left fa-stack-1x fa-inverse"></i>
        </span>
        {{trans('general.atras')}}
    </a></h4>

</article>

<article id="wrapper_main" class="extra">
            
    <div class="table min">

        <div class="table_sidebar">
            
            <img src="{{Request::root()}}/img/book/{{$libro['id']}}.{{$libro['imagen']}}" class="table_img prop_book" alt="{{$libro['titulo']}}"/>
            <div class="table_responsive">
            @if ($guardado==0)
            <div class="button center margin-vertical button-follow book-follow follow" data-follow="{{$libro['id']}}">{{trans('biblioteca.guardar')}}</div>
            @else
            <div class="button center margin-vertical button-follow book-follow unfollow" data-follow="{{$libro['id']}}">{{trans('biblioteca.guardado')}}</div>
            @endif
            <a href="../leer/{{$libro['id']}}"><div class="button center margin-vertical awesome">{{trans('biblioteca.leer')}}</div></a>
            </div>

        </div>

        <div class="table_content">
            
            <span class="autor_page_book"><a data-pjax="#main" href="../autor/{{$autor['id']}}">{{$autor['nombre']}}</a></span>
            <h2 class="title_page_book">{{$libro['titulo']}}</h2>
            <div class="sinopsis">{{$libro['descripcion']}}</div>

        </div>
    
    </div>

    <span class="atribution">
        @foreach ($atribuciones as $at)
            
            @if ($at->tipo==1)
            <!--Atribución de la imagen de portada-->
            <a target="_blank" href="{{$at->enlace}}">
                <i class="icon-external-link i_right"></i>{{trans('biblioteca.portada')}}
            </a>
            @elseif ($at->tipo==2)
            <!--Licencia CC BY-SA 3.0, como Wikisource-->
            <a target="_blank" href="{{$at->enlace}}"><i class="icon-external-link i_right"></i>{{trans('biblioteca.atribucion.texto')}}</a> <!--bajo licencia <a target="_blank" href="https://creativecommons.org/licenses/by-sa/3.0/deed.es">CC BY-SA--></a>
            
            @elseif ($at->tipo==3)
            <!--Texto de libre circulación, extraído de otra página-->
            <a target="_blank" href="{{$at->enlace}}">
                <i class="icon-external-link i_right"></i>{{trans('biblioteca.atribucion.fuente')}}
            </a>
            @endif

        @endforeach
    </span>

</article>