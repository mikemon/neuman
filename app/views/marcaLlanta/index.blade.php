@extends('layouts.master')

@section('sidebar')
@parent
Lista de Medida Llanta
@stop

@section('marcaLlanta')
<li class="active">
	<a href="{{ action('MarcaLlantaController@index', null )}}">Marca llanta</a>
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
	<a class="btn btn-default" href="{{ action('MarcaLlantaController@create')}}">Nuevo</a>
	<a class="btn btn-default"href="{{ action('MarcaLlantaController@index') }}" >Actualizar</a>
</div>

<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th style="text-align: center; width:20%;">Opciones</th>
			<th  style="text-align: center;width:10%;">id</th>
			<th style="text-align: center; width:80%;">Descripcion</th>
		</tr>
	</thead>
	@foreach($listaMarcaLlanta as $marcallantaInstance)
	<tr>
		<td style="text-align: center; width:20%;">
			<a href="{{ action('MarcaLlantaController@show', array($marcallantaInstance->id) )}}" class="btn btn-info "  >Ver</a>
			<a href="{{ action('MarcaLlantaController@edit', array($marcallantaInstance->id) )}}" class="btn btn-warning " >Editar</a> 
			{{ Form::model($marcallantaInstance, array('route' => array('marcaLlanta.destroy',$marcallantaInstance->id),'method'=>'DELETE','role'=>'form','class'=>'btn','style'=>'padding:0px')) }}
				{{ Form::button('Borrar', array('type'=>'submit','class'=>'btn btn-danger')) }}
			{{ Form::close() }} 
		</td>
		<td style="text-align: center; width:10%;">{{$marcallantaInstance->id}} </td>
		<td style="text-align: left; width:80%;">{{$marcallantaInstance->descripcion}} </td>
	</tr>
	@endforeach
</table>
@stop