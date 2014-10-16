<div class="form-group">
	{{Form::label('descripcion', 'Descripcion',array('class'=>'col-sm-2 control-label')	)}}
	<div class="col-sm-6">
		{{Form::text('descripcion', null,array('placeholder'=>'Descripcion','class'=>'form-control'))}}
	</div>
</div>
<div class="form-group">
	{{Form::label('esquema', 'Esquema chasis',array('class'=>'col-sm-2 control-label'))}}
	<div class="col-sm-6">
		{{Form::text('layoutChasis', null,array('placeholder'=>'Esquema chasis','class'=>'form-control'))}}
	</div>
</div>
<div class="form-group">
	<label for="carro" class="col-sm-2 control-label">Combustible</label>
	<div class="col-sm-6">
		<select name="precioCombustible_id" id="precioCombustible_id" class="form-control input-lg">
			<option value="-1" >Seleccionar combustible...</option>
			@foreach($listaPrecioCombustible as $precioCombustibleInstance)
			<option  @if(@$carro->precioCombustible_id == $precioCombustibleInstance->id ) {{'selected'}}  @endif   value="{{$precioCombustibleInstance->id}}">{{$precioCombustibleInstance->descripcion}} </option>
			@endforeach
		</select>
	</div>
</div>
{{ Form::button('Guardar', array('type'=>'submit','class'=>'btn btn-primary')) }}
