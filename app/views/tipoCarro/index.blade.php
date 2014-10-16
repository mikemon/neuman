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
<?php

if(isset($datos)){

?>

<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
  <strong>{{$datos->msg}}</strong>
</div>
<?php
}

?>
<h1> Marca Llanta	</h1>
<div class="btn-group">
	<a class="btn btn-default" href="{{ action('TipoCarroController@create')}}">Nuevo</a>
	<a class="btn btn-default"href="{{ action('TipoCarroController@index') }}" >Actualizar</a>
</div>

<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th style="text-align: center; width:20%;">Opciones</th>
			<th  style="text-align: center;width:10%;">id</th>
			<th style="text-align: center; width:30%;">Descripcion</th>
			<th style="text-align: center; width:20%;">Combustible</th>
			<th style="text-align: center; width:20%;">Esquema</th>
		</tr>
	</thead>
	@foreach($listaTipoCarro as $tipoCarroInstance)
	<tr>
		<td style="text-align: center; width:20%;">
			<a href="{{ action('TipoCarroController@show', array($tipoCarroInstance->id) )}}" class="btn btn-info "  >Ver</a>
			<a href="{{ action('TipoCarroController@edit', array($tipoCarroInstance->id) )}}" class="btn btn-warning " >Editar</a> 
			{{ Form::model($tipoCarroInstance, array('route' => array('tipoCarro.destroy',$tipoCarroInstance->id),'method'=>'DELETE','role'=>'form','class'=>'btn','style'=>'padding:0px')) }}
				{{ Form::button('Borrar', array('type'=>'submit','class'=>'btn btn-danger')) }}
			{{ Form::close() }} 
		</td>
		<td style="text-align: center; width:10%;">{{$tipoCarroInstance->id}} </td>
		<td style="text-align: left; width:40%;">{{$tipoCarroInstance->descripcion}} </td>
		<td style="text-align: left; width:40%;">{{@$tipoCarroInstance->precioCombustible->descripcion}} </td>
		<td style="text-align: left; width:40%;">{{$tipoCarroInstance->layoutChasis}} </td>

	</tr>
	@endforeach
</table>
@stop