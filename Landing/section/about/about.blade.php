<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8"/>

<title>Boolf - Acerca de</title>

@include(Config::get('rv.header'))

</head>
<body>

<header>

@include(Config::get('rv.nav'))

<h2>Acerca de</h2>

</header><!--/header-->

<div class="container_landing">
<div class="container medium">

<article id="wrap_landing">

  <ul class="horizontal_menu autor_menu">
    <li class="active"><a data-toggle="tab" href="#about">Boolf</a></li>
    <li><a data-toggle="tab" href="#quienes_somos">{{trans('quienes_somos.titulo')}}</a></li>
    <li><a data-toggle="tab" href="#manifiesto">{{trans('manifiesto.titulo')}}</a></li>
    <li><a data-toggle="tab" href="#prensa">{{trans('prensa.titulo')}}</a></li>
  </ul>

  <div class="tab-content">

      <div class="tab-pane active" id="about">
        
        <div id="section_about">      
          <p class="intro">
              {{trans('prensa.te1')}}
          </p>
        </div>

      </div>

      <div class="tab-pane" id="quienes_somos">
        @include(Config::get('rv.quienes_somos'))
      </div>

      <div class="tab-pane" id="manifiesto">
        
        <div id="section_manifiest">
              
          <p class="intro">{{trans('manifiesto.descripcion')}}</p>

          <div class="row row-manifiest">
            
            <div>
              <img src="img/icons/icons/bookshelf.png">
              <p>
                  <span>01</span>
                  {{trans('manifiesto.t1')}}
                  
              </p>
            </div>
            
            <div>
              <img src="img/icons/icons/globe.png">
              <p>
                  <span>02</span>
                  {{trans('manifiesto.t2')}}
              </p>
            </div>

            <div>
              <img src="img/icons/icons/radiotower.png">
              <p>
                  <span>03</span>
                  {{trans('manifiesto.t3')}}
              </p>
            </div>
            
            <div>
              <img src="img/icons/icons/dev.png">
              <p>
                  <span>04</span>
                  {{trans('manifiesto.t4')}}
               </p>
            </div>

            
            <div>
              <img src="img/icons/icons/recycle.png">
              <p>
                  <span>05</span>
                  {{trans('manifiesto.t5')}}
              </p>
            </div>

            <div>
              <img src="img/icons/icons/megaphone.png">
              <p>
                  <span>06</span>
                  {{trans('manifiesto.t6')}}
               </p>
            </div>

          </div>

      </div>

      </div>

      <div class="tab-pane" id="prensa">
        @include(Config::get('rv.prensa'))
      </div>

  </div><!--/tab-content-->
    
</article>

</div>
</div><!--/container_landing-->

@include(Config::get('rv.footer'))

</body>
</html>