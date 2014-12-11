@extends('layouts.master')

@section('sidebar')
@parent
Formulario de RegistroComprobantePago
@stop
@section('registroComprobantePago')
<li class="active">
@stop
@section('content')
<a class="btn btn-default"href="{{ action('registroComprobantePagoController@mostrarRegistroComprobantePago') }}" >Volver a listar</a>
<br>
<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title"><label> Editar registroComprobantePago: {{$registroComprobantePagoInstance->id}}</label></h3>
	</div>
	<div class="panel-body">
		{{ Form::model($registroComprobantePagoInstance, array('method' => 'PATCH', 'route' =>array('registroComprobantePago.update', $registroComprobantePagoInstance->id),'class'=>'form-horizontal')) }}
		@include('registroComprobantePago._form')
		{{ Form::close() }}
	</div>
</div>
@stop