@extends('layouts.master')

@section('sidebar')
@parent
Formulario de Carro
@stop
@section('carros')
<li class="active">
		<a href="{{ action('CarrosController@index', null )}}">Carros</a>
</li>
@stop
@section('content')
<a class="btn btn-default"href="{{ action('CarrosController@index') }}" >Volver a listar</a>
<br>
<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">Crear carro</h3>
	</div>
	<div class="panel-body">
		{{ Form::model(new Carro, ['route' => ['carros.store'],'class'=>'form-horizontal' ]) }}

		@include('carros._form')
		
		{{ Form::close() }}
	</div>
</div>
@stop