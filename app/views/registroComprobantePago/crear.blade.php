@extends('layouts.master')
@section('sidebar')
@parent
Formulario de Registro Comprobante de Pago
@stop
@section('registroComprobantepago')
<li class="active">
@stop
@section('content')
<a class="btn btn-default"href="{{ action('registroComprobantePagoController@mostrarRegistroComprobantePago') }}" >Volver a listar</a>
<br>
<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">Crear RegistroComprobantePago</h3>
	</div>
	<div class="panel-body">
		{{ Form::open(array('url' => 'registroComprobantePago/crear','method'=>'POST','role'=>'form' ,'class'=>'form-horizontal')) }}

		<div class="form-group">
			<label for="tipoComprobante" class="col-sm-2 control-label">Tipo Comprobante</label>
			<div class="col-sm-6">
				<select name="tipoComprobante_id" id="tipoComprobante_id" class="form-control input-lg">
					<option value="-1" selected>Seleccionar tipo...</option>
					@foreach($tipoComprobante as $tipo)
					<option value="{{$tipo->id}}">{{$tipo->descripcion}} </option>
					@endforeach
				</select>
			</div>
		</div>
		<div class="form-group">
			<label for="carro" class="col-sm-2 control-label">Carro</label>
			<div class="col-sm-6">
				<select name="carro_id" id="carro_id" class="form-control input-lg" onchange="getDatoRendimientoActivo()">
					<option value="-1" selected>Seleccionar carro...</option>
					@foreach($carros as $carro)
					<option value="{{$carro->id}}">{{$carro->id}} Marca {{$carro->marca}} Modelo: {{$carro->modelo}}</option>
					@endforeach
				</select>
			</div>
		</div>
		<div class="form-group">
			<label for="operador" class="col-sm-2 control-label">Operador</label>
			<div class="col-sm-6">
				<select name="operador_id" id="operador_id" class="form-control input-lg">
					<option value="-1" selected>Seleccionar operador...</option>
					@foreach($operadores as $operador)
					<option value="{{$operador->id}}">{{$operador->nombre}} </option>
					@endforeach
				</select>
			</div>
		</div>
		<div class="form-group">
			<label for="descripcion" class="col-sm-2 control-label">Descripcion</label>
			<div class="col-sm-6">
				{{ Form::textarea('descripcion', null, array('placeholder'=>'Descripcion de comprobante','size' => '30x3','class'=>'form-control')) }}
			</div>
		</div>

		
		<fieldset>
			<legend>Datos rendimiento</legend>
			
			@include('datoRendimiento._form')
		</fieldset>
		
		<div class="form-group">
			<label for="total" class="col-sm-2 control-label">Total</label>
			<div class="col-sm-6">
				{{Form::text('total', '',array('placeholder'=>'00.00','class'=>'form-control decimal input-sm'))}}
			</div>
		</div>
		
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">

				{{ Form::button('Guardar', array('type'=>'submit','class'=>'btn btn-primary')) }}

			</div>
		</div>
		

		{{ Form::close() }}
	</div>
</div>

<script>
	//alert('ready');
	jQuery('.decimal').numeric("."); 
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
			}
		});
	}
</script>


@stop

