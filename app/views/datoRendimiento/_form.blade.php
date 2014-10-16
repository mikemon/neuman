<div class="form-group">
	<label for="clientes" class="col-sm-2 control-label">Kilometro Inicial</label>
	<div class="col-sm-6">
		{{Form::text('kmInicial', null,array('id'=>'kmInicial', 'placeholder'=>'Kilometro inicial','class'=>'form-control input-sm'))}}
	</div>
</div>
<div class="form-group">
	<label for="clientes" class="col-sm-2 control-label">Kilometro FInal</label>
	<div class="col-sm-6">
		{{Form::text('kmFinal', null,array('id'=>'kmFinal','placeholder'=>'Kilometro final','class'=>'form-control input-sm'))}}
	</div>
</div>

<div class="form-group">
	<label for="carro" class="col-sm-2 control-label" id="lb-litros">Litros</label>
	<div class="col-sm-6">
		{{Form::text('litros', null,array('onblur'=>'calculaRendimiento()','id'=>'litros','placeholder'=>'Litros','class'=>'form-control input-sm'))}}
	</div>
</div>


<div class="form-group">
	<label for="carro" class="col-sm-2 control-label">Rendimiento</label>
	<div class="col-sm-6">
		{{Form::text('odometro', null,array('id'=>'odometro','placeholder'=>'Odometro','class'=>'form-control input-sm'))}}
	</div>
</div>

<div class="form-group">
	<label for="carro" class="col-sm-2 control-label">Observacion</label>
	<div class="col-sm-6">
		{{ Form::textarea('observacion', null, array('id'=>'observacion','placeholder'=>'Observacion','size' => '30x2','class'=>'form-control')) }}
	</div>
</div>

<script>
	function calculaRendimiento(){
		var rendimiento=(($('#kmFinal').val())-($('#kmInicial').val()))/($('#litros').val());
		//alert(rendimiento);
		if(($('#litros').val())==0)
			$('#odometro').val(0)
		else
			$('#odometro').val(rendimiento)
			
			
			if(precioCombustible>0){
				
				var total=$('#litros').val()*precioCombustible;
				$('#total').val(total);
			}
	}
</script>