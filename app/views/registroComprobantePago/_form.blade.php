<div class="btn-group">
<a id="showComprobantes" class="btn btn-info " href="#">Ver comprobantes anteriores</a>
</div>

<div class="form-group">

	<label for="tipoComprobante" class="col-sm-2 control-label">Tipo Comprobante</label>
	<div class="col-sm-6">

		@if(@$registroComprobantePagoInstance)
		{{$registroComprobantePagoInstance->tipoComprobante->descripcion}}
		@else
		<select name="tipoComprobante_id" id="tipoComprobante_id" class="form-control input-lg">
			<option value="-1" selected>Seleccionar tipo...</option>
			@foreach($tipoComprobante as $tipo)
			<option value="{{$tipo->id}}">{{$tipo->descripcion}} </option>
			@endforeach
		</select>

		@endif

	</div>
</div>
<div class="form-group">
	<label for="carro" class="col-sm-2 control-label">Carro</label>
	<div class="col-sm-6">
		{{ Form::hidden('carro_id', null, array('id' => 'carro_id')) }}
		@if(@$registroComprobantePagoInstance)
			{{$registroComprobantePagoInstance->carro->noEconomico}} Marca {{$registroComprobantePagoInstance->carro->marca}} Modelo: {{$registroComprobantePagoInstance->carro->modelo}}
		@else
			<select name="cbxCarro" id="cbxCarro" class="form-control input-lg" onchange="changeCarroId()">
				<option value="-1" selected>Seleccionar carro...</option>
				@foreach($carros as $carro)
				<option value="{{$carro->id}}">{{$carro->noEconomico}} Marca {{$carro->marca}} Modelo: {{$carro->modelo}}</option>
				@endforeach
			</select>
		@endif
	</div>
</div>
<div class="form-group">
	<label for="operador" class="col-sm-2 control-label">Operador</label>
	<div class="col-sm-6">
		@if(@$registroComprobantePagoInstance)
		{{ $registroComprobantePagoInstance->operador->nombre}}
		@else
		<select name="operador_id" id="operador_id" class="form-control input-lg">
			<option value="-1" selected>Seleccionar operador...</option>
			@foreach($operadores as $operador)
			<option value="{{$operador->id}}">{{$operador->nombre}} {{$operador->apellidos}} </option>
			@endforeach
		</select>
		@endif
	</div>
</div>
<div class="form-group">
	<label for="descripcion" class="col-sm-2 control-label">Descripcion</label>
	<div class="col-sm-6">
		{{ Form::textarea('descripcion', null, array('placeholder'=>'Descripcion de comprobante','size' => '30x3','class'=>'form-control')) }}
	</div>
</div>

<div class="form-group">
	<label for="clientes" class="col-sm-2 control-label">Fecha Comprobante</label>
	<div class="col-sm-6">
		{{Form::text('fechaComprobante', null,array('id'=>'fechaComprobante','placeholder'=>'Selecionar fecha','class'=>'form-control input-sm'))}}
	</div>
</div>
<fieldset>
	<legend>
		Datos rendimiento
	</legend>
	@include('datoRendimiento._form')
</fieldset>
<div class="form-group">
	<label for="total" class="col-sm-2 control-label">Total</label>
	<div class="col-sm-6">
		@if(@$registroComprobantePagoInstance)
			<span id="spanTotal">{{round($registroComprobantePagoInstance->total,2)}}</span>
			<input type="hidden" id="total" name="total" value="{{$registroComprobantePagoInstance->total}}" />
		@else
			{{Form::text('total', null,array('placeholder'=>'00.00','class'=>'form-control decimal input-sm','id'=>'total'))}}
		@endif
	</div>
</div>
<div class="form-group">
	<div class="col-sm-offset-2 col-sm-10">
		{{ Form::button('Guardar', array('type'=>'submit','class'=>'btn btn-primary')) }}
	</div>
</div>
<script>
	function changeCarroId(){
		var myselect = document.getElementById("cbxCarro");
		var carro_id=myselect.options[myselect.selectedIndex].value;
		jQuery("#carro_id").val(carro_id);
		//getDatoRendimientoActivo(carro_id);
		getPrecioCombustible(carro_id);
	}
	
	$(document).on("click", "#showComprobantes", function(evt) {
		if(jQuery('#carro_id').val()!=''){
		invocaAjax('{{URL::route("getHistorialRendimiento");}}', 'id='+jQuery('#carro_id').val(), 'divComprobantes', null, null, null, false);
		
		tableMac('#tableProductos');
		modal('#divComprobantes', 1200);
		jQuery('#divComprobantes').dialog('open');
		}else{
			alert('Seleccionar carro');
		}
	});
	
</script>

<div id="divComprobantes"></div>
