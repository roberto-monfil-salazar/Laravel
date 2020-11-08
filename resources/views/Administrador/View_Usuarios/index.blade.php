@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Usuarios<a href="View_Usuarios/create">
				<button class="btn btn-success">Nuevo</button></a></h3>
		@include('Administrador.View_Usuarios.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>#</th>
					<th>Nombre_Usuario</th>
					<th>Apellido_Pa_Usuario</th>
					<th>Apellido_Ma_Usuario</th>
					<th>Edad</th>
					<th>Sexo</th>
					<th>UserNme</th>
					<th>Psswr</th>
					<th>opciones</th>
				</thead>
				@foreach ($Usuarios as $cat)
				<tr>
					<td>{{$cat->ID_Usuarios}}</td>
					<td>{{$cat->Nombre_Usuario}}</td>
					<th>{{$cat->Apellido_Pa_Usuario}}</th>
					<th>{{$cat->Apellido_Ma_Usuario}}</th>
					<th>{{$cat->Edad}}</th>
					<th>{{$cat->Sexo}}</th>
					<th>{{$cat->UserNme}}</th>
					<th>{{$cat->Psswr}}</th>
					<td>
				
						<a href="{{URL::action('UsuariosController@edit',$cat->ID_Usuarios)}}"><button class="btn btn-info">Editar</button></a>
						

						<button type="submit" class="btn btn-danger" form="delete_{{$cat->ID_Usuarios}}" onclick="return confirm('¿Estas seguro que deseas eliminar el item?') ">
							<i > Eliminar </i>
						</button>
						<form action="{{URL::action('UsuariosController@destroy', $cat->ID_Usuarios)}}" id="delete_{{$cat->ID_Usuarios}}" method="post" enctype="multipart/form-data" hidden>
							@csrf
							@method('DELETE')
						</form>
					</td>
				</tr>
				@endforeach
			</table>
		</div>

		{{$Usuarios->render()}}
	</div>

</div>
@endsection