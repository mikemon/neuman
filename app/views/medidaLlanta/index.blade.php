@extends('layouts.master')

@section('sidebar')
@parent
Lista de Medida Llanta
@stop

@section('medidaLlanta')
<li class="active">
	<a href="{{ action('MedidaLlantaController@index', null )}}">Medida llanta</a>
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
<h1> Medida Llanta	</h1>
<div class="btn-group">
	<a class="btn btn-default" href="{{ action('MedidaLlantaController@create')}}">Nuevo</a>
	<a class="btn btn-default"href="{{ action('MedidaLlantaController@index') }}" >Actualizar</a>
</div>

<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th style="text-align: center; width:20%;">Opciones</th>
			<th  style="text-align: center;width:10%;">id</th>
			<th style="text-align: center; width:80%;">Descripcion</th>
		</tr>
	</thead>
	@foreach($listaMedidaLlanta as $medidallantaInstance)
	<tr>
		<td style="text-align: center; width:20%;">
			<a href="{{ action('MedidaLlantaController@show', array($medidallantaInstance->id) )}}" class="btn btn-info "  >Ver</a>
			<a href="{{ action('MedidaLlantaController@edit', array($medidallantaInstance->id) )}}" class="btn btn-warning " >Editar</a> 
			{{ Form::model($medidallantaInstance, array('route' => array('medidaLlanta.destroy',$medidallantaInstance->id),'method'=>'DELETE','role'=>'form','class'=>'btn','style'=>'padding:0px')) }}
				{{ Form::button('Borrar', array('type'=>'submit','class'=>'btn btn-danger')) }}
			{{ Form::close() }} 
		</td>
		<td style="text-align: center; width:10%;">{{$medidallantaInstance->id}} </td>
		<td style="text-align: left; width:80%;">{{$medidallantaInstance->descripcion}} </td>
	</tr>
	@endforeach
</table>
@stop