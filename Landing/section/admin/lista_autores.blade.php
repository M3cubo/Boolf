<article id="top_main" class="top">
        
    <h2>Editar autores</h2>

</article>

<article id="wrapper_main" class="extra">

<div id="page_edit">

<a href="{{Request::root()}}/admin/autores/crear" data-pjax="#main"><div class="button awesome top">Nuevo autor</div></a>

<table class="table table-hover">

<tbody>
<?php
foreach($autor as $aut) {
?>
	<tr>
	<!--<td>{{$aut['id']}}</td>-->
	<td><img src="{{Request::root()}}/img/autor/{{$aut['id']}}.{{$aut['imagen']}}" class="icon_square_edit prop_equal" /></td>
	<td><span class="name_edit">{{$aut['nombre']}}</span></td>
	<td>
		<a href="{{Request::root()}}/admin/autores/editar/{{$aut['id']}}" data-pjax="#main">
		<div class="button min">Editar</div>
		</a>
	</td>
	</tr>
<?php
}
?>
</tbody>
</table>

</div>

</article>

<script type="text/javascript">
window.addEventListener('popstate', function(e) { 
    eval(document.getElementById("script_lista_autores").innerHTML);
});
</script>

<script type="text/javascript" id="script_lista_autores">
    activar_menu('lista_autores');
</script>