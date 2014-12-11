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

		@include('registroComprobantePago._form')

		{{ Form::close() }}
	</div>
</div>

@stop

