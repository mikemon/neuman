<div class="form-group">
	<label for="clientes" class="col-sm-2 control-label">Descripción</label>
	<div class="col-sm-6">
					{{Form::text('descripcion', null,array('placeholder'=>'Descripcion','class'=>'form-control input-sm'))}}

	</div>
</div>

<div class="form-group">
		<label for="carro" class="col-sm-2 control-label">Precio</label>
		<div class="col-sm-6">
			{{Form::text('precio', null,array('placeholder'=>'0.00','class'=>'form-control input-sm decimal'))}}
		</div>
	</div>

<div class="form-group">
	<div class="col-sm-offset-2 col-sm-10">

		{{ Form::button('Guardar', array('type'=>'submit','class'=>'btn btn-primary')) }}

	</div>
</div>