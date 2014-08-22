<div class="form-group">
	<label for="clientes" class="col-sm-2 control-label">Cliente</label>
	<div class="col-sm-6">
		<select name="cliente_id" id="cliente_id" class="form-control input-lg">

			<option value="-1" selected>Seleccionar cliente...</option>
			@foreach($clientes as $clienteInstance)
			<option @if(@$clienteInstance->cliente->id==$clienteInstance->id)selected @endif value="{{$clienteInstance->id}}">{{$clienteInstance->nomcte}} </option>
			@endforeach
		</select>
	</div>
</div>

<div class="form-group">
		<label for="carro" class="col-sm-2 control-label">Nombre de flotilla</label>
		<div class="col-sm-6">
			{{Form::text('nombre', null,array('placeholder'=>'Nombre de flotilla','class'=>'form-control input-sm'))}}
		</div>
	</div>

<div class="form-group">
	<div class="col-sm-offset-2 col-sm-10">

		{{ Form::button('Guardar', array('type'=>'submit','class'=>'btn btn-primary')) }}

	</div>
</div>