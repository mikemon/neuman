@extends('layouts.master')

@section('sidebar')
@parent
Lista de Precio Combustible
@stop

@section('precioCombustible')
<li class="active">
@stop
@section('content')

<h1> PrecioCombustible </h1>
<div class="btn-group">
	<a class="btn btn-default" href="{{ action('PrecioCombustibleController@create')}}">Nuevo</a>
	<a class="btn btn-default" href="{{ action('PrecioCombustibleController@index') }}" >Actualizar</a>
</div>

<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th style="text-align: center; width:20%;">Opciones</th>
			<th  style="text-align: center;width:10%;">Descripcion</th>
			<th style="text-align: center; width:40%;">Precio</th>
		</tr>
	</thead>
	@foreach($listaPrecioCombustible as $precioCombustibleInstance)
	<tr>
		<td style="text-align: center; width:20%;">
			<a href="{{ action('PrecioCombustibleController@show', array($precioCombustibleInstance->id) )}}" class="btn btn-info "  >Ver</a>
			<a href="{{ action('PrecioCombustibleController@edit', array($precioCombustibleInstance->id) )}}" class="btn btn-warning " >Editar</a> 
			{{ Form::model($precioCombustibleInstance, array('route' => array('precioCombustible.destroy',$precioCombustibleInstance->id),'method'=>'DELETE','role'=>'form','class'=>'btn','style'=>'padding:0px')) }}
				{{ Form::button('Borrar', array('type'=>'submit','class'=>'btn btn-danger')) }}
			{{ Form::close() }} 
		</td>
		<td style="text-align: center; width:10%;">{{$precioCombustibleInstance->id}} </td>
		<td style="text-align: left; width:40%;">{{$precioCombustibleInstance->descripcion." ".$precioCombustibleInstance->precio}} </td>
	</tr>
	@endforeach
</table>
@stop