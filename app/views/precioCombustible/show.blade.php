@extends('layouts.master')

@section('sidebar')
@parent
Información del precioCombustible
@stop

@section('precioCombustible')
<li class="active">
@stop

@section('content')
<div class="btn-group">
	<a class="btn btn-default"href="{{ action('PrecioCombustibleController@index') }}" >Volver a listar</a>
</div>

<h1> PrecioCombustible {{$precioCombustibleInstance->id}} </h1>

<div class="row">
	<label for="clientes" class="col-sm-1 campo  label label-default">Descripcion</label>
	<div class="col-sm-6">
		{{Form::label('', $precioCombustibleInstance->descripcion)}}
	</div>
</div>

<div class="row">
	<label for="clientes" class="col-sm-1 campo  label label-default">Precio</label>
	<div class="col-sm-6">
		{{Form::label('', $precioCombustibleInstance->precio)}}
	</div>
</div>

<a href="{{ action('PrecioCombustibleController@edit', array($precioCombustibleInstance->id) )}}" class="btn btn-warning " >Editar</a>
@stop