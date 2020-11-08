@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Categoría: {{ $Categorias_pro->Nombre}}</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif
			{!!Form::model($Categorias_pro,['url'=> ['almacen/view_Categorias_pro',$Categorias_pro->ID_Categorias_Pro],'method'=>'PATCH'])!!}
			
			{{Form::token()}}
            <div class="form-group">
            	<label for="categoria">categoria</label>
            	<input type="text" name="categoria" class="form-control" value="{{$Categorias_pro->categoria}}" placeholder="Nombre...">
            </div>
            <div class="form-group">
            	<label for="Nombre">Nombre</label>
            	<input type="text" name="Nombre" class="form-control" value="{{$Categorias_pro->Nombre}}" placeholder="Nombre...">
            </div>
            <div class="form-group">
            	<button class="btn btn-primary" type="submit">Guardar</button>
            	<a href=""><button class="btn btn-danger" href="{{url('almacen/view_Categorias_pro')}}">Cancelar</button></a>
            </div>

			{!!Form::close()!!}		
            
		</div>
	</div>
@endsection