@extends('layouts.master')

@section('sidebar')
@parent
Lista de carros
@stop
@section('carros')
<li class="active">
	@stop
	@section('content')

	<h1> Carros </h1>
	<div class="btn-group">
		<a class="btn btn-default" href="{{ action('CarrosController@create')}}">Nuevo</a>
		<a class="btn btn-default"href="{{ action('CarrosController@index') }}" >Actualizar</a>
	</div>
	<br />
<!--
<nav class="navbar navbar-inverse" role="navigation" style="padding-top: 6px;">
	<div class="input-group">
		<input type="text" class="form-control" placeholder="Buscar...">
		<span class="input-group-btn">
			<button class="btn btn-success" type="button">
				<i class="glyphicon glyphicon-search"></i> Buscar
			</button>
		</span>
	</div>
</nav>
-->
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th style="text-align: center; width:20%;">Opciones</th>
				<th  style="text-align: center;width:10%;">id</th>
				<th  style="text-align: center;width:10%;">No. Serie</th>
				<th style="text-align: center; width:40%;">Datos</th>
				<th style="text-align: center; width:20%;">Flotilla</th>
			</tr>
		</thead>
		@foreach($listaCarro as $carroInstance)
		<tr>
			<td style="text-align: center; width:20%;"><a href="{{ action('CarrosController@show', array($carroInstance->id) )}}" class="btn btn-info "  >Ver</a><a href="{{ action('CarrosController@edit', array($carroInstance->id) )}}" class="btn btn-warning " >Editar</a> {{ Form::model($carroInstance, array('route' => array('carros.destroy',$carroInstance->id),'method'=>'DELETE','role'=>'form','class'=>'btn','style'=>'padding:0px')) }}
			{{ Form::button('Borrar', array('type'=>'submit','class'=>'btn btn-danger')) }}
			{{ Form::close() }} </td>
			<td style="text-align: center; width:10%;">{{$carroInstance->id}} </td>
			<td style="text-align: center; width:10%;">{{$carroInstance->noSerie}} </td>
			<td style="text-align: left; width:40%;">{{' <label>Marca:</label>'.$carroInstance->marca.' <label> Modelo:</label>'.$carroInstance->modelo}} </td>
			<td style="text-align: center; width:20%;">{{@$carroInstance->flotilla->nombre}} </td>

		</tr>
		@endforeach
	</table>
	{{ $listaCarro->links() }}
	@stop
