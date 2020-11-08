@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<h3>Nueva Categoría</h3>
		@if (count($errors)>0)
		<div class="alert alert-danger">
			<ul>
				@foreach ($errors->all() as $error)
				<li>{{$error}}</li>
				@endforeach
			</ul>
		</div>
		@endif

		{!!Form::open(array('url'=>'Administrador/View_Usuarios','method'=>'POST','autocomplete'=>'off'))!!}
		{{Form::token()}}
		<div class="form-group">
			<label for="Nombre_Usuario">Nombre_Usuario</label>
			<input type="text" name="Nombre_Usuario" class="form-control" placeholder="Nombre_Usuario..">
		</div>
		<div class="form-group">
			<label for="Apellido_Pa_Usuario">Apellido_Pa_Usuario</label>
			<input type="text" name="Apellido_Pa_Usuario" class="form-control" placeholder="Apellido_Pa_Usuario...">
		</div>
		<div class="form-group">
			<label for="Apellido_Ma_Usuario">Apellido_Ma_Usuario</label>
			<input type="text" name="Apellido_Ma_Usuario" class="form-control" placeholder="Apellido_Ma_Usuario...">
		</div>
		<div class="form-group">
			<label for="Edad">Edad</label>
			<input type="text" name="Edad" class="form-control" placeholder="Edad...">
		</div>
		<div class="form-group">
			<label for="Sexo">Sexo</label>
			<input type="text" name="Sexo" class="form-control" placeholder="Sexo...">
		</div>
		<div class="form-group">
			<label for="UserNme">UserNme</label>
			<input type="text" name="UserNme" class="form-control" placeholder="UserNme...">
		</div>
		<div class="form-group">
			<label for="Psswr">Psswr</label>
			<input type="text" name="Psswr" class="form-control" placeholder="Psswr...">
		</div>
	<div class="form-group">
			<button class="btn btn-primary" type="submit">Guardar</button>
			<button class="btn btn-danger" type="reset">Cancelar</button>
		</div>

		{!!Form::close()!!}

	</div>
</div>
@endsection