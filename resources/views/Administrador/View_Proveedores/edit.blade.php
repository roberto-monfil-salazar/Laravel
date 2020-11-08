@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar proveedor: {{ $Proveedores->Nombre_proveedor}}</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif
			{!!Form::model($Proveedores,['url'=> ['Administrador/View_Proveedores',$Proveedores->ID_Proveedores],'method'=>'PATCH'])!!}
			
			{{Form::token()}}
            <div class="form-group">
            	<label for="Nombre_proveedor">Nombre_proveedor</label>
            	<input type="text" name="Nombre_proveedor" class="form-control" value="{{$Proveedores->Nombre_proveedor}}" placeholder="Nombre_proveedor...">
            </div>
            <div class="form-group">
            	<label for="CorreoElectronico_proveedor">CorreoElectronico_proveedor</label>
            	<input type="text" name="CorreoElectronico_proveedor" class="form-control" value="{{$Proveedores->CorreoElectronico_proveedor}}" placeholder="CorreoElectronico_proveedor...">
            </div>
            <div class="form-group">
            	<label for="RazonSocual_Proveedor">RazonSocual_Proveedor</label>
            	<input type="text" name="RazonSocual_Proveedor" class="form-control" value="{{$Proveedores->RazonSocual_Proveedor}}" placeholder="RazonSocual_Proveedor...">
            </div>
            <div class="form-group">
            	<button class="btn btn-primary" type="submit">Guardar</button>
            	<button class="btn btn-danger" href="{{url('Administrador/View_Proveedores')}}">Cancelar</button></a>
            </div>

			{!!Form::close()!!}		
            
		</div>
	</div>
@endsection