<script>
	var precioCombustible=null;
</script>
<div class="form-group">

	<input type="hidden" id="datoRendimiento_id" name="datoRendimiento_id"  />

	<label for="clientes" class="col-sm-2 control-label">Kilometro Inicial</label>
	<div class="col-sm-6">
		<input type="hidden" id="kmInicialPost" name="kmInicialPost"  />

		{{Form::text('kmInicial', null,array('id'=>'kmInicial', 'placeholder'=>'Kilometro inicial','class'=>'form-control input-sm'))}}

	</div>
</div>
<div class="form-group">
	<label for="clientes" class="col-sm-2 control-label">Kilometro Final</label>
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
	function getDatoRendimientoActivo(carro_id) {
		$.ajax({
			type : "GET",
			dataType : "json",
			async:false,
			url : "{{asset('getDatoRendimientoActivo/')}}/" + carro_id,
			success : function(data) {
				if (data.exito) {
					//alert('entro'+data.datoRendimientoActivo.kmFinal);
					$('#kmInicial').val(data.datoRendimientoActivo.kmFinal);
					$('#kmInicialPost').val(data.datoRendimientoActivo.kmFinal);
					//$('#kmInicial').prop('disabled', true);
				} else {
					$('#kmInicial').val('');
					$('#kmInicialPost').val('');
					$('#kmInicial').prop('disabled', false);
				}
				$('#lb-litros').html('LITROS ' + data.precioCombustible.descripcion);
				//precioCombustible = data.precioCombustible.precio;
			}
		});
	}
	function getPrecioCombustible(carro_id) {
		$.ajax({
			type : "GET",
			dataType : "json",
			async:false,
			url : "{{asset('getPrecioCombustible/')}}/" + carro_id,
			success : function(data) {
				if (data.exito) {
					$('#lb-litros').html('LITROS ' + data.precioCombustible.descripcion);
					$('#lb-litros').html('LITROS ' + data.precioCombustible.descripcion);
					precioCombustible = data.precioCombustible.precio;
				} else {
					$('#kmInicial, #kmFinal, #litros, #odometro, #observacion, #total').prop('disabled', true);
					$('#kmInicial').val(0);
					$('#kmInicialPost').val(0);
					$('#kmInicial').prop('disabled', false);
					$('#kmInicial').val(0);
					precioCombustible =0;
					alert(data.msg);
				}
				
			}
		});
	}
	
	$("#{{$componenteFecha}}").datetimepicker({
					maxDate : 0,
					minDate : '+0D +2M +0Y',
					yearRange : '+0:c+1',
					changeMonth : true,
					changeYear : true,
					showButtonPanel : false,
					dateFormat : 'yy-mm-dd',
					onSelect: function(dateText) {
						analizaFecha(this.value);
					}
	});

	function bloquearInput(Ids, valor) {
		$(Ids).prop('disabled', valor);
		if (valor) {
			getDatoRendimientoActivo({{@$carroInstance->id}});
		} else {
			$('#kmInicialPost').val('');
		}
	}

	function analizaFecha(fecha) {
		$.get('{{URL::route("getDifFecha");}}?fecha=' + fecha, null, function(data) {
			if (data.diaActual) {
				getDatoRendimientoActivo(jQuery('#carro_id').val());
			} else {
				if (data.diferencia.datos.d > 0) {
					jQuery("#kmInicial").prop('disabled', false);
				} else {
					if ((data.diferencia.datos.d == 0) && ((data.diferencia.datos.h > 0) || (data.diferencia.datos.i > 0) || (data.diferencia.datos.s > 0) )) {
						jQuery("#kmInicial").prop('disabled', false);
					}
				}
			}
		}, "json");
	}

@if(@$datoRendimientoInstance)
	getPrecioCombustible({{$datoRendimientoInstance->carro_id}});
	jQuery('#kmInicialPost').val({{$datoRendimientoInstance->kmInicial}});
		
	jQuery('#kmInicial').val({{$datoRendimientoInstance->kmInicial}});
		
	jQuery('#kmFinal').val({{$datoRendimientoInstance->kmFinal}});
	jQuery('#litros').val({{$datoRendimientoInstance->litros}});
	jQuery('#odometro').val({{$datoRendimientoInstance->odometro}});
		
		jQuery('#observacion').val('{{$datoRendimientoInstance->observacion}}');
@else
		jQuery('#kmInicialPost').val('');
		
		jQuery('#kmInicial').val('');
		
		jQuery('#kmFinal').val('');
		jQuery('#litros').val('');
		jQuery('#odometro').val('');
		
		jQuery('#observacion').val('');
@endif
	
</script>
