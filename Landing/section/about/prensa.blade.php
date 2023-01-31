    <div id="section_press">
        
        <p class="intro">
            {{trans('prensa.te2')}}
        </p>

        <ul>
            <li>
            <a target="_blank" href="img/img/icono.png">
                <div class="thumbnail prop_equal" style="background-image: url('img/img/icono.png');"></div>
                <span>{{trans('prensa.icono')}}</span>
            </a>
            </li>

            <li>
            <a target="_blank" href="img/img/logotipo.png">
                <div class="thumbnail thumbnail_horizontal prop_equal" style="background-image: url('img/img/logotipo.png');"></div>
                <span>{{trans('prensa.logo')}}</span>
            </a>
            </li>

            <li>
            <a target="_blank" href="img/img/app/app_icon.png">
                <div class="thumbnail prop_equal" style="background-image: url('img/img/app/app_icon.png');"></div>
                <span>{{trans('prensa.app')}}</span>
            </a>
            </li>

            <li>
            <a target="_blank" href="img/img/tablet.png">
                <div class="thumbnail prop_equal" style="background-image: url('img/img/tablet.png');"></div>
                <span>{{trans('prensa.tablet')}}</span>
            </a>
            </li>

            <li>
            <a target="_blank" href="img/img/computer.png">
                <div class="thumbnail thumbnail_horizontal prop_equal" style="background-image: url('img/img/computer.png');"></div>
                <span>{{trans('prensa.ordenador')}}</span>
            </a>
            </li>

            <li>
            <a target="_blank" href="img/img/mobile.png">
                <div class="thumbnail prop_equal" style="background-image: url('img/img/mobile.png');"></div>
                <span>{{trans('prensa.movil')}}</span>
            </a>
            </li>

        </ul>

        <p class="p_download">
            <a href="{{Request::root()}}/descargar/prensa" class="boton_download">
                <i class="fa fa-cloud-download i_right"></i>{{trans('prensa.descargar')}}
            </a>
        </p>

    </div>