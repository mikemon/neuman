@extends('layouts.master')

@section('sidebar')
@parent
Lista de cliente
@stop

@section('cliente')
<li class="active">
	<a href="{{ action('ClienteController@index', null )}}">Cliente</a>
</li>
@stop
@section('content')

<h1> Clientes </h1>
<div class="btn-group">
	<a class="btn btn-default" href="{{ action('ClienteController@create')}}">Nuevo</a>
	<a class="btn btn-default"href="{{ action('ClienteController@index') }}" >Actualizar</a>
</div>

<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th style="text-align: center; width:20%;">Opciones</th>
			<th  style="text-align: center;width:10%;">id</th>
			<th  style="text-align: center;width:10%;">Clave</th>
			<th style="text-align: center; width:40%;">Nombre</th>
		</tr>
	</thead>
	@foreach($listaCliente as $clienteInstance)
	<tr>
		<td style="text-align: center; width:20%;"><a href="{{ action('ClienteController@show', array($clienteInstance->id) )}}" class="btn btn-info "  >Ver datos</a><a href="{{ action('ClienteController@edit', array($clienteInstance->id) )}}" class="btn btn-warning " >Editar</a> {{ Form::model($clienteInstance, array('route' => array('cliente.destroy',$clienteInstance->id),'method'=>'DELETE','role'=>'form','class'=>'btn','style'=>'padding:0px')) }}
		{{ Form::button('Borrar', array('type'=>'submit','class'=>'btn btn-danger')) }}
		{{ Form::close() }} </td>
		<td style="text-align: center; width:10%;">{{$clienteInstance->id}} </td>
		<td style="text-align: center; width:10%;">{{$clienteInstance->numcte}} </td>
		<td style="text-align: left; width:40%;">{{$clienteInstance->nomcte}} </td>
	</tr>
	@endforeach
</table>
@stop