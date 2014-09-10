<div class="form-group">
	<label for="clientes" class="col-sm-2 control-label">Carro</label>
	<div class="col-sm-6">
		
<nav class="navbar navbar-inverse" role="navigation" style="padding-top: 6px;">
	<div class="input-group">
		<input type="text" class="form-control" placeholder="Buscar por matricula, modelo o marca">
		<span class="input-group-btn">
			<button class="btn btn-success" type="button">
				<i class="glyphicon glyphicon-search"></i> Buscar
			</button>
		</span>
	</div>
</nav>


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