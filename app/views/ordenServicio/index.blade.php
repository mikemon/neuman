@extends('layouts.master')

@section('sidebar')
@parent
Lista de Medida Llanta
@stop

@section('ordenServicio')
<li class="active">
@stop
@section('content')

<h1> Ordenes de Servicio </h1>
<div class="btn-group">
	<a class="btn btn-default" href="{{ action('OrdenServicioController@create')}}">Nuevo</a>
	<a class="btn btn-default" href="{{ action('OrdenServicioController@index') }}" >Actualizar</a>
</div>

<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th style="text-align: center; width:20%;">Opciones</th>
			<th  style="text-align: center;width:10%;">id</th>
			<th style="text-align: center; width:40%;">Descripcion</th>
	
		</tr>
	</thead>
	@foreach($listaOrdenServicio as $ordenServicioInstance)
	<tr>
		<td style="text-align: center; width:20%;">
			<a href="{{ action('OrdenServicioController@show', array($ordenServicioInstance->id) )}}" class="btn btn-info "  >Ver</a>
			<a href="{{ action('OrdenServicioController@edit', array($ordenServicioInstance->id) )}}" class="btn btn-warning " >Editar</a> 
			{{ Form::model($ordenServicioInstance, array('route' => array('ordenServicio.destroy',$ordenServicioInstance->id),'method'=>'DELETE','role'=>'form','class'=>'btn','style'=>'padding:0px')) }}
				{{ Form::button('Borrar', array('type'=>'submit','class'=>'btn btn-danger')) }}
			{{ Form::close() }} 
		</td>
		<td style="text-align: center; width:10%;">{{$ordenServicioInstance->id}} </td>
	
		<td style="text-align: left; width:40%;">{{$ordenServicioInstance->cliente->numcte." ".$ordenServicioInstance->cliente->nomcte}} </td>
	</tr>
	@endforeach
</table>
@stop