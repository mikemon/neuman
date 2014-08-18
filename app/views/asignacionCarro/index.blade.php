@extends('layouts.master')

@section('sidebar')
@parent
Lista de Medida Llanta
@stop

@section('tipoComprobante')
<li class="active">
	<a href="{{ action('tipoComprobanteController@mostrarTipoComprobante', null )}}">Tipo comprobante</a>
</li>
@stop
@section('content')

<h1> Marca Llanta	</h1>
<div class="btn-group">
	<a class="btn btn-default" href="{{ action('AsignacionCarroController@create')}}">Nuevo</a>
	<a class="btn btn-default"href="{{ action('AsignacionCarroController@index') }}" >Actualizar</a>
</div>

<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th style="text-align: center; width:20%;">Opciones</th>
			<th  style="text-align: center;width:10%;">id</th>
			<th style="text-align: center; width:40%;">Carro</th>
			<th style="text-align: center; width:40%;">Operador</th>
		</tr>
	</thead>
	@foreach($listaAsignacionCarro as $asignacionCarroInstance)
	<tr>
		<td style="text-align: center; width:20%;">
			<a href="{{ action('AsignacionCarroController@show', array($asignacionCarroInstance->id) )}}" class="btn btn-info "  >Ver</a>
			<a href="{{ action('AsignacionCarroController@edit', array($asignacionCarroInstance->id) )}}" class="btn btn-warning " >Editar</a> 
			{{ Form::model($asignacionCarroInstance, array('route' => array('asignacionCarro.destroy',$asignacionCarroInstance->id),'method'=>'DELETE','role'=>'form','class'=>'btn','style'=>'padding:0px')) }}
				{{ Form::button('Borrar', array('type'=>'submit','class'=>'btn btn-danger')) }}
			{{ Form::close() }} 
		</td>
		<td style="text-align: center; width:10%;">{{$asignacionCarroInstance->id}} </td>
		<td style="text-align: left; width:40%;">{{$asignacionCarroInstance->carro->marca." ".$asignacionCarroInstance->carro->modelo}} </td>
		<td style="text-align: left; width:40%;">{{$asignacionCarroInstance->operador->nombre." ".$asignacionCarroInstance->operador->apellidos}} </td>
	</tr>
	@endforeach
</table>
@stop