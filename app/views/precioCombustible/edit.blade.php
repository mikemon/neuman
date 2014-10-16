@extends('layouts.master')

@section('sidebar')
@parent
Formulario de PrecioCombustible
@stop
@section('precioCombustible')
<li class="active">
@stop
@section('content')
<a class="btn btn-default"href="{{ action('PrecioCombustibleController@index') }}" >Volver a listar</a>
<br>
<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title"><label> Editar precioCombustible: {{$precioCombustibleInstance->id}}</label></h3>
	</div>
	<div class="panel-body">
		{{ Form::model($precioCombustibleInstance, array('method' => 'PATCH', 'route' =>array('precioCombustible.update', $precioCombustibleInstance->id),'class'=>'form-horizontal')) }}
		@include('precioCombustible._form')
		{{ Form::close() }}
	</div>
</div>
@stop