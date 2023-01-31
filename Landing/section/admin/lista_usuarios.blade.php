<article id="top_main" class="top">
        
    <h2>Usuarios</h2>

</article>

<article id="wrapper_main" class="extra">

<table class="table table-hover">

<tbody>
@foreach ($usuarios as $us)
	<tr>
	<td><img src="{{Request::root()}}/img/user/avatar/{{$us->id}}.{{$us->imagen}}" class="icon_square_edit prop_equal" /></td>
	<td>
		<span class="name_edit">{{$us->username}}</span>
	</td>
	<td>
		<a href="">
		<div class="button min">Editar</div>
		</a>
		<a href="{{Request::root()}}/admin/usuarios/eliminar/{{$us->id}}">
		<div class="button min">Eliminar</div>
		</a>
	</td>
	<td><input type="checkbox" /></td>
	</tr>
@endforeach
	
</tbody>
</table>

</article>

<script type="text/javascript">
window.addEventListener('popstate', function(e) { 
    eval(document.getElementById("script_lista_usuarios").innerHTML);
});
</script>

<script type="text/javascript" id="script_lista_usuarios">
    activar_menu('lista_usuarios');
</script>