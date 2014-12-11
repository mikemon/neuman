<script>
@if(@$registroComprobantePagoInstance)
	var precioCombustible={{$registroComprobantePagoInstance->carro->tipoCarro->precioCombustible->precio}};
@else
	var precioCombustible=0;
@endif
	
</script>

<div class="form-group">
	<label for="clientes" class="col-sm-2 control-label">Kilometro Inicial</label>
	<div class="col-sm-6">

		@if(@$registroComprobantePagoInstance)
		{{$registroComprobantePagoInstance->datoRendimiento->kmInicial}}
		
		<input type="hidden" id="kmInicial" name="kmInicial" value="{{$registroComprobantePagoInstance->datoRendimiento->kmInicial}}" />
		@else
		{{Form::text('kmInicial', null,array('id'=>'kmInicial', 'placeholder'=>'Kilometro inicial','class'=>'form-control input-sm'))}}
		@endif

	</div>
</div>
<div class="form-group">
	<label for="clientes" class="col-sm-2 control-label">Kilometro FInal</label>
	<div class="col-sm-6">
		@if(@$registroComprobantePagoInstance)
		{{$registroComprobantePagoInstance->datoRendimiento->kmFinal}}
			<input type="hidden" id="kmFinal" name="kmFinal" value="{{$registroComprobantePagoInstance->datoRendimiento->kmFinal}}" />

		@else
		{{Form::text('kmFinal', null,array('id'=>'kmFinal','placeholder'=>'Kilometro final','class'=>'form-control input-sm'))}}

		@endif
	</div>
</div>

<div class="form-group">
	<label for="carro" class="col-sm-2 control-label" id="lb-litros">Litros</label>
	<div class="col-sm-6">
		@if(@$registroComprobantePagoInstance)
		{{Form::text('litros', $registroComprobantePagoInstance->datoRendimiento->litros,array('onblur'=>'calculaRendimiento()','id'=>'litros','placeholder'=>'Litros','class'=>'form-control input-sm'))}}
		@else
		{{Form::text('litros', null,array('onblur'=>'calculaRendimiento()','id'=>'litros','placeholder'=>'Litros','class'=>'form-control input-sm'))}}
		@endif
	</div>
</div>

<div class="form-group">
	<label for="carro" class="col-sm-2 control-label">Rendimiento</label>
	<div class="col-sm-6">
		@if(@$registroComprobantePagoInstance)
			{{Form::text('odometro', $registroComprobantePagoInstance->datoRendimiento->odometro,array('id'=>'odometro','placeholder'=>'Odometro','class'=>'form-control input-sm'))}}		
		@else
			{{Form::text('odometro', null,array('id'=>'odometro','placeholder'=>'Odometro','class'=>'form-control input-sm'))}}
		@endif
		
	</div>
</div>

<div class="form-group">
	<label for="carro" class="col-sm-2 control-label">Observacion</label>
	<div class="col-sm-6">
		
		@if(@$registroComprobantePagoInstance)
			{{ Form::textarea('observacion', $registroComprobantePagoInstance->datoRendimiento->observacion, array('id'=>'observacion','placeholder'=>'Observacion','size' => '30x2','class'=>'form-control')) }}
		@else
			{{ Form::textarea('observacion', null, array('id'=>'observacion','placeholder'=>'Observacion','size' => '30x2','class'=>'form-control')) }}
		@endif
		
	</div>
</div>

<script>
	function calculaRendimiento() {

		var rendimiento = (($('#kmFinal').val()) - ($('#kmInicial').val())) / ($('#litros').val());
		//alert(rendimiento);
		if (($('#litros').val()) == 0)
			$('#odometro').val(0)
		else
			$('#odometro').val(rendimiento.toFixed(2))

		if (precioCombustible > 0) {
			

			var total = $('#litros').val() * precioCombustible;
			$('#total').val(total.toFixed(2));
			
			@if(@$registroComprobantePagoInstance)				
				$('#spanTotal').html(total.toFixed(2));
			@endif
		}
	}
</script>

<script>
	function getDatoRendimientoActivo() {
		var myselect = document.getElementById("carro_id")
		myselect.options[myselect.selectedIndex].value
		$.ajax({
			type : "GET",
			dataType:"json",
			url : "{{asset('getDatoRendimientoActivo/')}}/" + myselect.options[myselect.selectedIndex].value, //tipoCarro/getEsquemaForId/
			success : function(data) {
				//$('#side-b').html(data);
				//alert(data.exito);
				if (data.exito){
					//alert('entro'+data.datoRendimientoActivo.kmFinal);
					$('#kmInicial').val(data.datoRendimientoActivo.kmFinal);
					$('#kmInicial').prop('disabled',true) ;
				}else{
					$('#kmInicial').val(0);
					$('#kmInicial').prop('disabled',false) ;
				}
				$('#lb-litros').html('LITROS '+data.precioCombustible.descripcion);
				precioCombustible=data.precioCombustible.precio;
			}
		});
	}
</script>
