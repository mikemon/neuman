@extends('layouts.master')

@section('sidebar')
@parent
Información del operador
@stop
@section('content')


<div class="btn-group">
	<a class="btn btn-default"href="{{ action('OperadorController@index') }}" >Volver a listar</a>
</div>

<h1>
  Operador {{$operadorInstance->id}}
      
</h1>

<div class="row">
	<label for="clientes" class="col-sm-1 campo  label label-default">Nombre</label>
	<div class="col-sm-6">
		{{Form::label('', $operadorInstance->nombre)}}
	</div>
</div>

<div class="row">
	<label for="clientes" class="col-sm-1 campo  label label-default">Apellidos</label>
	<div class="col-sm-6">
		{{Form::label('', $operadorInstance->apellidos)}}
	</div>
</div>

<div class="row">
	<label for="clientes" class="col-sm-1 campo  label label-default">Domicilio</label>
	<div class="col-sm-6">
		{{Form::label('', $operadorInstance->domicilio)}}
	</div>
</div>
<div class="row">
	<label for="clientes" class="col-sm-1 campo  label label-default">Telefono</label>
	<div class="col-sm-6">
		{{Form::label('', $operadorInstance->telefono)}}
	</div>
</div>
<div class="row">
	<label for="clientes" class="col-sm-1 campo  label label-default">Fecha de ingreso</label>
	<div class="col-sm-6">
		{{Form::label('', $operadorInstance->fechaIngreso)}}
	</div>
</div>

			<a href="{{ action('OperadorController@edit', array($operadorInstance->id) )}}" class="btn btn-warning " >Editar</a> 


@stop