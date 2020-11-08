@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Proveedores<a href="View_Proveedores/create">
				<button class="btn btn-success">Nuevo</button></a></h3>
		@include('Administrador.View_Proveedores.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>#</th>
					<th>Nombre_proveedor</th>
					<th>CorreoElectronico_proveedor</th>
					<th>RazonSocual_Proveedor</th>
					<th>opciones</th>

				</thead>
				@foreach ($Proveedores as $cat)
				<tr>
					<td>{{$cat->ID_Proveedores}}</td>
					<td>{{$cat->Nombre_proveedor}}</td>
					<td>{{$cat->CorreoElectronico_proveedor}}</td>
					<th>{{$cat->RazonSocual_Proveedor}}</th>
					<td>
						<a href="{{URL::action('ProveedoresController@edit',$cat->ID_Proveedores)}}"><button class="btn btn-info">Editar</button></a>
						

						<button type="submit" class="btn btn-danger" form="delete_{{$cat->ID_Proveedores}}" onclick="return confirm('¿Estas seguro que deseas eliminar el item?') ">
							<i > Eliminar </i>
						</button>
						<form action="{{URL::action('ProveedoresController@destroy', $cat->ID_Proveedores)}}" id="delete_{{$cat->ID_Proveedores}}" method="post" enctype="multipart/form-data" hidden>
							@csrf
							@method('DELETE')
						</form>
					</td>
				</tr>
				@endforeach
			</table>
		</div>

		{{$Proveedores->render()}}
	</div>

</div>
@endsection