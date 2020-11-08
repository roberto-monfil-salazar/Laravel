@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Telefonos<a href="View_Telefonos_usuarios/create">
				<button class="btn btn-success">Nuevo</button></a></h3>
		@include('Administrador.View_Telefonos_usuarios.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>#</th>
					<th>Nombre_Usuario</th>
					<th>tipoDe_Telefono</th>
					<th>Numero_Telefono</th>
					
					<th>opciones</th>
				</thead>
				@foreach ($Telefonos_usuarios as $cat) 
			
				<tr>
					
					<td>{{$cat->ID_Telefonos_Usuarios}}</td>
					<th>{{$cat->Nombre_Usuario}}</th>
					<td>{{$cat->tipoDe_Telefono}}</td>
					<th>{{$cat->Numero_Telefono}}</th>
					
					<td>
						<a href="{{URL::action('Telefonos_usuariosController@edit',$cat->ID_Telefonos_Usuarios )}}"><button class="btn btn-info">Editar</button></a>
						

						<button type="submit" class="btn btn-danger" form="delete_{{$cat->ID_Telefonos_Usuarios }}" onclick="return confirm('¿Estas seguro que deseas eliminar el item?') ">
							<i > Eliminar </i>
						</button>
						<form action="{{URL::action('Telefonos_usuariosController@destroy', $cat->ID_Telefonos_Usuarios )}}" id="delete_{{$cat->ID_Telefonos_Usuarios }}" method="post" enctype="multipart/form-data" hidden>
							@csrf
							@method('DELETE')
						</form>
					</td>
				</tr>
			
				@endforeach
			</table>
		</div>

		{{$Telefonos_usuarios->render()}}
	</div>

</div>
@endsection