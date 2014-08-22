<div class="form-group">
	<label for="clientes" class="col-sm-2 control-label">Nombre</label>
	<div class="col-sm-6">
					{{Form::text('nombre', null,array('placeholder'=>'Nombre','class'=>'form-control input-sm'))}}
	</div>
</div>

<div class="form-group">
	<label for="clientes" class="col-sm-2 control-label">Apellidos</label>
	<div class="col-sm-6">
					{{Form::text('apellidos', null,array('placeholder'=>'Apellidos','class'=>'form-control input-sm'))}}
	</div>
</div>

<div class="form-group">
	<label for="clientes" class="col-sm-2 control-label">Telefono</label>
	<div class="col-sm-6">
					{{Form::text('domicilio', null,array('placeholder'=>'telefono','class'=>'form-control input-sm'))}}
	</div>
</div>
<div class="form-group">
	<label for="clientes" class="col-sm-2 control-label">Fecha de ingreso</label>
	<div class="col-sm-6">
					{{Form::text('fechaIngreso', null,array('placeholder'=>date("d/m/Y"),'class'=>'form-control input-sm'))}}
	</div>
</div>

<div class="form-group">
	<div class="col-sm-offset-2 col-sm-10">

		{{ Form::button('Guardar', array('type'=>'submit','class'=>'btn btn-primary')) }}

	</div>
</div>