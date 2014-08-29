@extends('layouts.master')

@section('sidebar')
@parent
Información del flotilla
@stop

@section('flotilla')
<li class="active">
@stop

@section('content')
<div class="btn-group">
	<a class="btn btn-default"href="{{ action('FlotillaController@index') }}" >Volver a listar</a>
</div>

<h1> Flotilla {{$flotillaInstance->id}} </h1>

<div class="row">
	<label for="clientes" class="col-sm-1 campo  label label-default">Nombre</label>
	<div class="col-sm-6">
		{{Form::label('', $flotillaInstance->nombre)}}
	</div>
</div>

<div class="row">
	<label for="clientes" class="col-sm-1 campo  label label-default">Cliente</label>
	<div class="col-sm-6">
		{{Form::label('', $flotillaInstance->cliente->nomcte)}}
	</div>
</div>

<a href="{{ action('FlotillaController@edit', array($flotillaInstance->id) )}}" class="btn btn-warning " >Editar</a>
@stop