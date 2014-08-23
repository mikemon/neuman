@extends('layouts.master')

@section('sidebar')
@parent
Lista de Medida Llanta
@stop

@section('flotilla')
<li class="active">
	<a href="{{ action('FlotillaController@index', null )}}">Flotillas</a>
</li>
@stop
@section('content')

<h1> Flotilla </h1>
<div class="btn-group">
	<a class="btn btn-default" href="{{ action('FlotillaController@create')}}">Nuevo</a>
	<a class="btn btn-default" href="{{ action('FlotillaController@index') }}" >Actualizar</a>
</div>

<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th style="text-align: center; width:20%;">Opciones</th>
			<th  style="text-align: center;width:10%;">id</th>
			<th style="text-align: center; width:40%;">Cliente</th>
	
		</tr>
	</thead>
	@foreach($listaFlotilla as $flotillaInstance)
	<tr>
		<td style="text-align: center; width:20%;">
			<a href="{{ action('FlotillaController@show', array($flotillaInstance->id) )}}" class="btn btn-info "  >Ver</a>
			<a href="{{ action('FlotillaController@edit', array($flotillaInstance->id) )}}" class="btn btn-warning " >Editar</a> 
			{{ Form::model($flotillaInstance, array('route' => array('flotilla.destroy',$flotillaInstance->id),'method'=>'DELETE','role'=>'form','class'=>'btn','style'=>'padding:0px')) }}
				{{ Form::button('Borrar', array('type'=>'submit','class'=>'btn btn-danger')) }}
			{{ Form::close() }} 
		</td>
		<td style="text-align: center; width:10%;">{{$flotillaInstance->id}} </td>
	
		<td style="text-align: left; width:40%;">{{$flotillaInstance->cliente->numcte." ".$flotillaInstance->cliente->nomcte}} </td>
	</tr>
	@endforeach
</table>
@stop