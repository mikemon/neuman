<div class="form-group">
	<label for="clientes" class="col-sm-2 control-label">Kilometro Inicial</label>
	<div class="col-sm-6">
		{{Form::text('kmInicial', null,array('placeholder'=>'Kilometro inicial','class'=>'form-control input-sm'))}}
	</div>
</div>
<div class="form-group">
	<label for="clientes" class="col-sm-2 control-label">Kilometro FInal</label>
	<div class="col-sm-6">
		{{Form::text('kmFinal', null,array('placeholder'=>'Kilometro final','class'=>'form-control input-sm'))}}
	</div>
</div>

<div class="form-group">
	<label for="carro" class="col-sm-2 control-label">Litros</label>
	<div class="col-sm-6">
		{{Form::text('litros', null,array('placeholder'=>'Litros','class'=>'form-control input-sm'))}}
	</div>
</div>


<div class="form-group">
	<label for="carro" class="col-sm-2 control-label">Odometro</label>
	<div class="col-sm-6">
		{{Form::text('odometro', null,array('placeholder'=>'Odometro','class'=>'form-control input-sm'))}}
	</div>
</div>

<div class="form-group">
	<label for="carro" class="col-sm-2 control-label">Observacion</label>
	<div class="col-sm-6">
		{{ Form::textarea('observacion', null, array('placeholder'=>'Observacion','size' => '30x2','class'=>'form-control')) }}
	</div>
</div>