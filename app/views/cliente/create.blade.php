@extends('layouts.master')

@section('sidebar')
@parent
Formulario de Cliente
@stop
@section('cliente')
<li class="active">
	<a href="{{ action('ClienteController@index', null )}}">Cliente</a>
</li>
@stop
@section('content')
<a class="btn btn-default"href="{{ action('ClienteController@index') }}" >Volver a listar</a>
<br>
<div class="panel panel-default">
	<div class="panel-heading">
		<h1 class="panel-title"><label> Crear cliente</label></h1>
	</div>
	<div class="panel-body">
		{{ Form::model(new Carro, ['route' => ['cliente.store'],'class'=>'form-horizontal' ]) }}
			@include('cliente._form')
		{{ Form::close() }}
	</div>
</div>
@stop