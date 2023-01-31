<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8"/>

<title>Boolf</title>

@include(Config::get('rv.header1'))

<style type="text/css" rel="stylesheet">

body {
  overflow-x: hidden;
  overflow-y: hidden;
}

</style>

<script type="text/javascript">

$(document).ready(function() {

    $('#top_sidebar').blurjs({
        source: '#top_sidebar',
        radius: 10,
        cache: true
    });

});

//PJAX
$(document).pjax('a[data-pjax]');

</script>

</head>
<body>

<div id="wrapper">

@include('admin.sectionAdmin.sidebar_left')

<div id="container_main">
<section id="main">

{{$view}}

</section>

</div>

@include('admin.sectionAdmin.sidebar_right')

</div><!--/wrapper-->

</body>
</html>
