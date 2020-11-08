@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<h3>Nuevo Telefono</h3>
		@if (count($errors)>0)
		<div class="alert alert-danger">
			<ul>
				@foreach ($errors->all() as $error)
				<li>{{$error}}</li>
				@endforeach
			</ul>
		</div>
		@endif

		{!!Form::open(array('url'=>'Administrador/View_Telefonos_usuarios','method'=>'POST','autocomplete'=>'off'))!!}
		{{Form::token()}}
		<div class="form-group">
			<label for="tipoDe_Telefono">tipoDe_Telefono</label>
			<input type="text" name="tipoDe_Telefono" class="form-control" placeholder="tipoDe_Telefono..">
		</div>
		<div class="form-group">
			<label for="Numero_Telefono">Numero_Telefono</label>
			<input type="text" name="Numero_Telefono" class="form-control" placeholder="Numero_Telefono...">
		</div>









		<div class="form-group">
                                <label for="ID_Usuarios">NOMBRE DE USUARIO:</label>
                                
                                <select name="ID_Usuarios"  class="form-control">
                                   @foreach ($Usuarios as $cat)
                                  	 <option value="{{$cat->ID_Usuarios}}">{{$cat->Nombre_Usuario}}</option>
                                  	@endforeach
                                </select>

                            </div>
                            








		
		<div class="form-group">
			<button class="btn btn-primary" type="submit">Guardar</button>
			<button class="btn btn-danger" type="reset">Cancelar</button>
		</div>

		{!!Form::close()!!}

	</div>
</div>
@endsection