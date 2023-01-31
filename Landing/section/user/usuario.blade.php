    <article id="wrapper_main" class="extra">

        <div id="top_page">

            <div class="table min">
                
                <div class="table_sidebar">
                    @if ($usuario->imagen == "")
                    <div style="background-image: url('{{Request::root()}}/img/user/avatar/user.png');" class="table_img img_rounded cover_img prop_equal"></div>
                    @else
                    <div style="background-image: url('{{Request::root()}}/img/user/avatar/{{$usuario->id}}.{{$usuario->imagen}}');" class="table_img img_rounded cover_img prop_equal"></div>
                    @endif
                    <ul class="panel_follow">
                        <li><span>{{$seguidores}}</span>{{trans('usuario.seguidores')}}</li>
                        <li><span>{{$siguiendo}}</span>{{trans('usuario.siguiendo')}}</li>
                    </ul>
                </div>

                <div class="table_content">

                    <h2 id="title_user">{{{$usuario->username}}}</h2>
                    <p class="biografia_user">
                        {{$usuario->perfil}}
                    </p>
                    @if ($modo==0)
                    <div class="button margin-vertical button-follow user-follow follow" data-follow="{{$usuario['id']}}">{{trans('usuario.seguir')}}</div>
                    @elseif ($modo == 2)
                    <a href="{{Request::root()}}/usuario/editar/perfil" data-pjax="#main"><div class="button margin-vertical">{{trans('usuario.editar')}}</div></a>
                    @elseif ($modo == 1)
                    <div class="button margin-vertical button-follow user-follow unfollow" data-follow="{{$usuario['id']}}">{{trans('usuario.seguido')}}</div>
                    @endif

                </div>

            </div><!--table-->

        </div><!--top_page-->

        <div id="user_coleccion">

            <h3>Colección</h3>

            <div id="collect_book">
            <?php
            for($i=0, $count = count($coleccion);$i<$count;$i++) {
            ?>
                <a href="{{Request::root()}}/libro/{{$coleccion[$i]->libro()->first()->id}}" data-pjax="#main">
                    <div class="collect_book" data-page="{{$coleccion[$i]->libro()->first()->paginas}}">
                    <div class="collect_book_author" style="background-image: url('{{Request::root()}}/img/autor/{{$autores_coleccion[$i]['id']}}.jpg"></div>
                    <div class="collect_book_body">
                        <div class="collect_book_title rotate_text">
                            {{$coleccion[$i]->libro()->first()->titulo}}
                        </div>
                    </div>
                    </div>
                </a>
            <?php
            }
            ?>
            </div>

        </div>

    </article>