@extends('layouts.master')

@section('sidebar')
@parent
Formulario de Operador
@stop
@section('operador')
<li class="active">
@stop
@section('content')
<a class="btn btn-default"href="{{ action('OperadorController@index') }}" >Volver a listar</a>
<br>
<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">Crear Registro de Operador</h3>
	</div>
	<div class="panel-body">
	{{ Form::model($operadorInstance, array('method' => 'PATCH', 'route' =>array('operador.update', $operadorInstance->id),'class'=>'form-horizontal')) }}
			@include('operadores._form')
		{{ Form::close() }}
	</div>
</div>
@stop