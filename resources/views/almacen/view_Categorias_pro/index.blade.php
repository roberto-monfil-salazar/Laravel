@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Categorías<a href="view_Categorias_pro/create">
				<button class="btn btn-success">Nuevo</button></a></h3>
		@include('almacen.view_Categorias_pro.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>#</th>
					<th>categoria</th>
					<th>nombre</th>
					<th>opciones</th>
				</thead>
				@foreach ($Categorias_pro as $cat)
				<tr>
					<td>{{$cat->ID_Categorias_Pro}}</td>
					<td>{{$cat->categoria}}</td>
					<th>{{$cat->Nombre}}</th>
					<td>
						<a href="{{URL::action('Categorias_proController@edit',$cat->ID_Categorias_Pro)}}"><button class="btn btn-info">Editar</button></a>
						

						<button type="submit" class="btn btn-danger" form="delete_{{$cat->ID_Categorias_Pro}}" onclick="return confirm('¿Estas seguro que deseas eliminar el item?') ">
							<i > Eliminar </i>
						</button>
						<form action="{{URL::action('Categorias_proController@destroy', $cat->ID_Categorias_Pro)}}" id="delete_{{$cat->ID_Categorias_Pro}}" method="post" enctype="multipart/form-data" hidden>
							@csrf
							@method('DELETE')
						</form>
					</td>
				</tr>
				@endforeach
			</table>
		</div>

		{{$Categorias_pro->render()}}
	</div>

</div>
@endsection