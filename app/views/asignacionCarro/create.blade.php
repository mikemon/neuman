@extends('layouts.master')

@section('sidebar')
@parent
Formulario de Marca llanta
@stop
@section('asignacionCarro')
<!--
<li class="active">
<a href="{{ action('tipoComprobanteController@mostrarTipoComprobante', null )}}">Tipo comprobante</a>
</li>
-->
@stop
@section('content')
<a class="btn btn-default"href="{{ action('AsignacionCarroController@index') }}" >Volver a listar</a>
<br>
<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">Crear RegistroComprobantePago</h3>
	</div>
	<div class="panel-body">
		{{ Form::model(new AsignacionCarro, ['route' => ['asignacionCarro.store'],'class'=>'form-horizontal' ]) }}

		<div class="form-group">
			<label for="carro" class="col-sm-2 control-label">Carro</label>
			<div class="col-sm-6">
				<select name="carro_id" id="carro_id" class="form-control input-lg">
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
			<div class="col-sm-offset-2 col-sm-10">

				{{ Form::button('Guardar', array('type'=>'submit','class'=>'btn btn-primary')) }}

			</div>
		</div>
		{{ Form::close() }}
	</div>
</div>
@stop