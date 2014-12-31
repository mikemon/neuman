@extends('layouts.master')

@section('sidebar')
@parent
Formulario de OrdenServicio
@stop
@section('ordenServicio')
<li class="active">
	@stop
	@section('content')
	<a class="btn btn-default"href="{{ action('OrdenServicioController@index') }}" >Volver a listar</a>
	<br>
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">Crear Orden de servicio</h3>
		</div>
		<div class="panel-body">
			{{ Form::model(new ordenServicio, ['route' => ['ordenServicio.store'],'class'=>'form-horizontal','onsubmit'=>'return enviar();' ]) }}
			@include('ordenServicio._form')
			{{ Form::close() }}
		</div>
	</div>

	@stop
