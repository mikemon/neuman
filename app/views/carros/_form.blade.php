<div class="form-group">
			<label for="carro" class="col-sm-2 control-label">No. Serie</label>
			<div class="col-sm-6">
				{{Form::text('noSerie', null,array('placeholder'=>'No. Serie','class'=>'form-control input-sm'))}}
			</div>
		</div>
		<div class="form-group">
			<label for="carro" class="col-sm-2 control-label">Placas</label>
			<div class="col-sm-6">
				{{Form::text('placas', null,array('placeholder'=>'Placas','class'=>'form-control input-sm'))}}
			</div>
		</div>
		<div class="form-group">
			<label for="carro" class="col-sm-2 control-label">noEconomico</label>
			<div class="col-sm-6">
				{{Form::text('noEconomico', null,array('placeholder'=>'noEconomico','class'=>'form-control input-sm'))}}
			</div>
		</div>
		<div class="form-group">
			<label for="carro" class="col-sm-2 control-label">Marca</label>
			<div class="col-sm-6">

				{{Form::text('marca', null,array('placeholder'=>'Marca','class'=>'form-control input-sm'))}}
			</div>
		</div>
		<div class="form-group">
			<label for="carro" class="col-sm-2 control-label">Modelo</label>
			<div class="col-sm-6">
				{{Form::text('modelo', null,array('placeholder'=>'Modelo','class'=>'form-control input-sm'))}}
			</div>
		</div>

		<div class="form-group">
			<label for="carro" class="col-sm-2 control-label">tipoCarro_id</label>
			<div class="col-sm-6">
				tipoCarro_id
			</div>
		</div>

		<div class="form-group">
			<label for="carro" class="col-sm-2 control-label">Capacidad/Ton</label>
			<div class="col-sm-6">
				{{Form::text('capacidadTon', null,array('placeholder'=>'capacidadTon','class'=>'form-control input-sm'))}}
			</div>
		</div>

		<div class="form-group">
			<label for="carro" class="col-sm-2 control-label">No. Motor</label>
			<div class="col-sm-6">
				{{Form::text('noMotor', null,array('placeholder'=>'No. Motor','class'=>'form-control input-sm'))}}
			</div>
		</div>
		<div class="form-group">
			<label for="carro" class="col-sm-2 control-label">Tipo de motor</label>
			<div class="col-sm-6">
				{{Form::text('tipoMotor', null,array('placeholder'=>'Tipo de motor','class'=>'form-control input-sm'))}}
			</div>
		</div>
		<div class="form-group">
			<label for="carro" class="col-sm-2 control-label">Poliza seguro</label>
			<div class="col-sm-6">
				{{Form::text('polizaSeguros', null,array('placeholder'=>'polizaSeguros','class'=>'form-control input-sm'))}}
			</div>
		</div>

		<div class="form-group">
			<label for="carro" class="col-sm-2 control-label">Inciso</label>
			<div class="col-sm-6">
				{{Form::text('inciso', null,array('placeholder'=>'Inciso','class'=>'form-control input-sm'))}}
			</div>
		</div>

		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">

				{{ Form::button('Guardar', array('type'=>'submit','class'=>'btn btn-primary')) }}

			</div>
		</div>