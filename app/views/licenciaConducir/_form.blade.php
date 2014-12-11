<div class="form-group">
	<label for="clientes" class="col-sm-2 control-label">No. Licencia</label>
	<div class="col-sm-6">
		{{Form::text('numLicencia', null,array('id'=>'numLicencia', 'placeholder'=>'Número de licencia','class'=>'form-control input-sm'))}}
	</div>
</div>

<div class="form-group">
	<label for="clientes" class="col-sm-2 control-label">Tipo</label>
	<div class="col-sm-6">
		{{Form::text('tipo', null,array('id'=>'tipo', 'placeholder'=>'Tipo','class'=>'form-control input-sm'))}}
	</div>
</div>



<div class="form-group">
	<label for="clientes" class="col-sm-2 control-label">Vigencia</label>
	<div class="col-sm-6">
		{{Form::text('vigencia', null,array('id'=>'vigencia', 'placeholder'=>'Tipo','class'=>'form-control input-sm'))}}
	</div>
</div>

<div class="form-group">
	<label for="clientes" class="col-sm-2 control-label">Clasificacion</label>
	<div class="col-sm-6">
		{{Form::text('clasificacion', null,array('id'=>'Clasificacion', 'placeholder'=>'Tipo','class'=>'form-control input-sm'))}}
	</div>
</div>

<div class="form-group">
	<label for="clientes" class="col-sm-2 control-label">Expediente Medico</label>
	<div class="col-sm-6">
		{{Form::text('expedienteMedico', null,array('id'=>'Expediente Medico', 'placeholder'=>'Tipo','class'=>'form-control input-sm'))}}
	</div>
</div>
<input type="radio" id="opLicFed" name="opcionLicencia" value="uno" />
<input type="radio" id="opLicEstatal" name="opcionLicencia" value="dos" />

<fieldset id="licFederal">
	
</fieldset>
<fieldset id="licEstatal">
	
</fieldset>
