<div id="side-a" style="float: left; width:65%; ">
	<div class="form-group">
		<label for="carro" class="col-sm-2 control-label">Clave cliente</label>
		<div class="col-sm-6">
			{{Form::text('numcte', null,array('placeholder'=>'Clave cliente','class'=>'form-control input-sm'))}}
		</div>
	</div>
	<div class="form-group">
		<label for="carro" class="col-sm-2 control-label">Nombre</label>
		<div class="col-sm-6">
			{{Form::text('nomcte', null,array('placeholder'=>'Nombre','class'=>'form-control input-sm'))}}
		</div>
	</div>
	<div class="form-group">
		<label for="carro" class="col-sm-2 control-label">Razon social</label>
		<div class="col-sm-6">
			{{Form::text('razcte', null,array('placeholder'=>'Razon social','class'=>'form-control input-sm'))}}
		</div>
	</div>
	<div class="form-group">
		<label for="carro" class="col-sm-2 control-label">rfc</label>
		<div class="col-sm-6">
			{{Form::text('rfccte', null,array('placeholder'=>'rfc','class'=>'form-control input-sm'))}}
		</div>
	</div>
	<div class="form-group">
		<label for="carro" class="col-sm-2 control-label">Calle</label>
		<div class="col-sm-6">

			{{Form::text('dircte', null,array('placeholder'=>'Calle','class'=>'form-control input-sm'))}}
		</div>
	</div>
	
	<div class="form-group">
		<label for="carro" class="col-sm-2 control-label">No. Interior</label>
		<div class="col-sm-6">

			{{Form::text('nlecte', null,array('placeholder'=>'No. Interior','class'=>'form-control input-sm'))}}
		</div>
	</div>
	<div class="form-group">
		<label for="carro" class="col-sm-2 control-label">No. Exterior</label>
		<div class="col-sm-6">

			{{Form::text('nlicte', null,array('placeholder'=>'No. Exterior','class'=>'form-control input-sm'))}}
		</div>
	</div>
	
	
	<div class="form-group">
		<label for="carro" class="col-sm-2 control-label">Colonia</label>
		<div class="col-sm-6">
			{{Form::text('colcte', null,array('placeholder'=>'Colonia','class'=>'form-control input-sm'))}}
		</div>
	</div>
	<div class="form-group">
		<label for="carro" class="col-sm-2 control-label">Poblacion</label>
		<div class="col-sm-6">
			{{Form::text('pobcte', null,array('placeholder'=>'Población','class'=>'form-control input-sm'))}}
		</div>
	</div>

	<div class="form-group">
		<label for="carro" class="col-sm-2 control-label">Estado</label>
		<div class="col-sm-6">
			{{Form::text('estado', null,array('placeholder'=>'Estado','class'=>'form-control input-sm'))}}
		</div>
	</div>
	<div class="form-group">
		<label for="carro" class="col-sm-2 control-label">Pais</label>
		<div class="col-sm-6">
			{{Form::text('pais', null,array('placeholder'=>'Pais','class'=>'form-control input-sm'))}}
		</div>
	</div>
	<div class="form-group">
		<label for="carro" class="col-sm-2 control-label">Telefonos</label>
		<div class="col-sm-6">
			{{Form::text('telcte', null,array('placeholder'=>'telefonos','class'=>'form-control input-sm'))}}
		</div>
	</div>

	
	
	<div class="form-group">
		<label for="carro" class="col-sm-2 control-label">e-mail</label>
		<div class="col-sm-6">
			{{Form::text('mailcte', null,array('placeholder'=>'email','class'=>'form-control input-sm'))}}
		</div>
	</div>

	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">

			{{ Form::button('Guardar', array('type'=>'submit','class'=>'btn btn-primary')) }}

		</div>
	</div>

</div>


