@extends('layouts.master')

@section('sidebar')
@parent
Formulario de Flotilla
@stop
@section('flotilla')
<li class="active">
@stop
@section('content')
<a class="btn btn-default"href="{{ action('FlotillaController@index') }}" >Volver a listar</a>
<br>
<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">Crear Registro de Flotilla</h3>
	</div>
	<div class="panel-body">
		{{ Form::model(new flotilla, ['route' => ['flotilla.store'],'class'=>'form-horizontal' ]) }}
			@include('flotilla._form')
		{{ Form::close() }}
	</div>
</div>
@stop