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
			@include('asignacionCarro._form')
		{{ Form::close() }}
	</div>
</div>
@stop