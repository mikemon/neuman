@extends('layouts.master')

@section('sidebar')
@parent
Lista de Operadores
@stop

@section('operador')
<li class="active">
	<a href="{{ action('OperadorController@index', null )}}">Asignar operador</a>
</li>
@stop
@section('content')

<h1> Operador </h1>
<div class="btn-group">
	<a class="btn btn-default" href="{{ action('OperadorController@create')}}">Nuevo</a>
	<a class="btn btn-default" href="{{ action('OperadorController@index') }}" >Actualizar</a>
</div>

<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th style="text-align: center; width:20%;">Opciones</th>
			<th  style="text-align: center;width:10%;">id</th>
			<th style="text-align: center; width:40%;">Operador</th>
	
		</tr>
	</thead>
	@foreach($listaOperador as $operadorInstance)
	<tr>
		<td style="text-align: center; width:20%;">
			<a href="{{ action('OperadorController@show', array($operadorInstance->id) )}}" class="btn btn-info "  >Ver</a>
			<a href="{{ action('OperadorController@edit', array($operadorInstance->id) )}}" class="btn btn-warning " >Editar</a> 
			{{ Form::model($operadorInstance, array('route' => array('operador.destroy',$operadorInstance->id),'method'=>'DELETE','role'=>'form','class'=>'btn','style'=>'padding:0px')) }}
				{{ Form::button('Borrar', array('type'=>'submit','class'=>'btn btn-danger')) }}
			{{ Form::close() }} 
		</td>
		<td style="text-align: center; width:10%;">{{$operadorInstance->id}} </td>
	
		<td style="text-align: left; width:40%;">{{$operadorInstance->nombre. " ".$operadorInstance->apellidos}} </td>
	</tr>
	@endforeach
</table>
@stop