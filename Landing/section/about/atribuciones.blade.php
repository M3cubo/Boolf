<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8"/>

<title>{{trans('atribuciones.title')}}</title>

@include(Config::get('rv.header'))

</head>
<body>

<header>

@include(Config::get('rv.nav'))

<h2>{{trans('atribuciones.titulo')}}</h2>

</header><!--/header-->

<div class="container_landing">
<div class="container medium">

<article id="wrap_landing">

    <div id="section_atribution">
        
    <h3>{{trans('atribuciones.titulo')}}</h3>
    <p>
        {{trans('atribuciones.descripcion')}}
    </p>

    <p>
        <a target="_blank" href="https://www.flickr.com/photos/jbozanowski/4068267985/in/set-72157600198970593/">"Waiting"</a>
        by
        <a target="_blank" href="https://www.flickr.com/photos/jbozanowski/">Kuba Bożanowski</a> 
        {{trans('atribuciones.bajo_licencia')}}
        <a target="_blank" href="https://creativecommons.org/licenses/by/2.0/">CC BY 2.0</a>
    </p>

    <p>
        <a target="_blank" href="https://www.flickr.com/photos/126610523@N04/15047096765">"so many books to read ..."</a>
        by
        <a target="_blank" href="https://www.flickr.com/photos/126610523@N04/">Denny Wu</a> 
        {{trans('atribuciones.bajo_licencia')}}
        <a target="_blank" href="https://creativecommons.org/licenses/by-nc-sa/2.0/">Attribution-NonCommercial-ShareAlike 2.0 Generic</a>
    </p>

    <p>
        <a target="_blank" href="https://www.flickr.com/photos/kkleinrn/14698869794">"Bookstore Visit"</a>
        by
        <a target="_blank" href="https://www.flickr.com/photos/kkleinrn/">kristin klein</a> 
        {{trans('atribuciones.bajo_licencia')}}
        <a target="_blank" href="https://creativecommons.org/licenses/by/2.0/">CC BY 2.0</a>
        (aplicado efecto de desenfoque)
    </p>

    <p>
        <a target="_blank" href="https://download.unsplash.com/45/tkLOe7nnQ7mnMsiuijBy_hm.jpg">Book image</a>
        by
        <a target="_blank" href="https://unsplash.com/p">Patrik Göthe</a>
        bajo licencia
        <a target="_blank" href="http://creativecommons.org/publicdomain/zero/1.0/">CC0 1.0</a>
    </p>

    <p>
        <a target="_blank" href="https://download.unsplash.com/30/foggy-read.jpg">Foggy Read</a>
        by
        <a target="_blank" href="https://unsplash.com/taylorleopold">Taylor Leopold</a>
        bajo licencia
        <a target="_blank" href="http://creativecommons.org/publicdomain/zero/1.0/">CC0 1.0</a>
    </p>

    </div>
    
</article>

</div>
</div><!--/container_landing-->

@include(Config::get('rv.footer'))

</body>
</html>