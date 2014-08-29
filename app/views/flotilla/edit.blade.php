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
		<h3 class="panel-title"><label> Editar flotilla: {{$flotillaInstance->id}}</label></h3>
	</div>
	<div class="panel-body">
		{{ Form::model($flotillaInstance, array('method' => 'PATCH', 'route' =>array('flotilla.update', $flotillaInstance->id),'class'=>'form-horizontal')) }}
		@include('flotilla._form')
		{{ Form::close() }}
	</div>
</div>
@stop