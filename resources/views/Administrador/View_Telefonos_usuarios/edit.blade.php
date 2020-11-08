@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Telefono: {{ $Telefonos_usuarios->Nombre}}</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif
			{!!Form::model($Telefonos_usuarios,['url'=> ['Administrador/View_Telefonos_usuarios',$Telefonos_usuarios->ID_Telefonos_usuarios],'method'=>'PATCH'])!!}
			
			{{Form::token()}}
           
 				<div class="form-group">
            	<label for="Nombre">Nombre</label>
            	<select name="ID_Usuarios"  class="form-control">
                    <@foreach ($Usuarios as $cat)
                    @if ($cat->ID_Usuarios==$Usuarios->ID_Usuarios)
                	<option value="{{$cat->ID_Usuarios}}" selected>{{$cat->Nombre_Usuario}}</option>
                	@else
                	<option value="{{$cat->ID_Usuarios}}">{{$cat->Nombre_Usuario}}</option>
                	@endif
                   	@endforeach
                </select>
            </div>



            <div class="form-group">
            	<label for="tipoDe_Telefono">tipoDe_Telefono</label>
            	<input type="text" name="tipoDe_Telefono" class="form-control" value="{{$Telefonos_usuarios->tipoDe_Telefono}}" placeholder="Nombre...">
            </div>
            <div class="form-group">
            	<label for="Numero_Telefono">Numero_Telefono</label>
            	<input type="text" name="Numero_Telefono" class="form-control" value="{{$Telefonos_usuarios->Numero_Telefono}}" placeholder="Numero_Telefono...">
            </div>

            <div class="form-group">
            	<button class="btn btn-primary" type="submit">Guardar</button>
            	<button class="btn btn-danger" href="{{url('Administrador/View_Telefonos_usuarios')}}">Cancelar</button>
            </div>

			{!!Form::close()!!}		
            
		</div>
	</div>
@endsection