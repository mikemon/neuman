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
		<h3 class="panel-title">Crear Registro de PrecioCombustible</h3>
	</div>
	<div class="panel-body">
		{{ Form::model(new precioCombustible, ['route' => ['precioCombustible.store'],'class'=>'form-horizontal' ]) }}
			@include('precioCombustible._form')
		{{ Form::close() }}
	</div>
</div>
@stop