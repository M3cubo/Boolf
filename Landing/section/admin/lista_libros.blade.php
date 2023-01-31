<article id="top_main" class="top">
        
    <h2>Editar libros</h2>

</article>

<article id="wrapper_main" class="extra">

<a href="{{Request::root()}}/admin/libros/crear" data-pjax="#main"><div class="button awesome top">Nuevo libro</div></a>

<table class="table table-hover">

<tbody>
<?php
$c=count($libro);

for($i=0;$i<$c;$i++) {
?>
	<tr>
	<!--<td>{{$libro[$i]['id']}}</td>-->
	<td><img src="{{Request::root()}}/img/book/{{$libro[$i]['id']}}.{{$libro[$i]['imagen']}}" class="icon_book_edit prop_book" /></td>
	<td>
		<span class="name_edit">{{$libro[$i]['titulo']}}</span>
		<span class="name_edit min">{{$autor_libro[$i]['nombre']}}</span>
	</td>
	<td>
		<a href="{{Request::root()}}/admin/libros/editar/{{$libro[$i]['id']}}" data-pjax="#main">
		<div class="button min">Editar</div>
		</a>
		<a href="{{Request::root()}}/admin/libros/eliminar/{{$libro[$i]['id']}}">
		<div class="button min">Eliminar</div>
		</a>
	</td>
	</tr>
<?php
}
?>
	
</tbody>
</table>

</article>

<script type="text/javascript">
window.addEventListener('popstate', function(e) { 
    eval(document.getElementById("script_lista_libros").innerHTML);
});
</script>

<script type="text/javascript" id="script_lista_libros">
    activar_menu('lista_libros');
</script>
