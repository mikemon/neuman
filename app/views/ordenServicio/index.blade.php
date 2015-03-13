@extends('layouts.master')

@section('sidebar')
@parent
Lista de Medida Llanta
@stop

@section('ordenServicio')
<li class="active">
@stop
@section('content')

<h3> Ordenes de Servicio </h3>
<div class="btn-group">
	<a class="btn btn-default" href="{{ action('OrdenServicioController@create')}}">Nuevo</a>
	<a class="btn btn-default" href="{{ action('OrdenServicioController@index') }}" >Actualizar</a>
</div>

<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th style="text-align: center; width:8%;">Opciones</th>
			<th  style="text-align: center;width:5%;">Id</th>
			<th  style="text-align: center;width:5%;">Folio</th>
			<th style="text-align: center; width:20%;">Carro</th>
			<th  style="text-align: center;width:20%;">Cliente</th>
		</tr>
	</thead>
	@foreach($listaOrdenServicio as $ordenServicioInstance)
	<tr style="font-size: 12px;">
		<td style="text-align: center; width:8%;">
			<a href="{{ action('OrdenServicioController@show', array($ordenServicioInstance->id) )}}" class="btn btn-info "  ><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a>
			<a href="{{ action('OrdenServicioController@edit', array($ordenServicioInstance->id) )}}" class="btn btn-warning " ><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a> 
			{{ Form::model($ordenServicioInstance, array('route' => array('ordenServicio.destroy',$ordenServicioInstance->id),'method'=>'DELETE','role'=>'form','class'=>'btn','style'=>'padding:0px')) }}
				{{ Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>', array('type'=>'submit','class'=>'btn btn-danger')) }}
			{{ Form::close() }} 
		</td>
		<td style="text-align: center; width:5%; font-size: 12px;">{{$ordenServicioInstance->id}} </td>
		<td style="text-align: center; width:5%; font-size: 12px;">{{@$ordenServicioInstance->numfol}} </td>
		<td style="text-align: left; width:20%;font-size: 12px;">@if(@$ordenServicioInstance->carro) Num.Eco: <b>{{@$ordenServicioInstance->carro->noEconomico}}</b>, Tipo: <b>{{@$ordenServicioInstance->carro->tipoCarro->descripcion}}</b>, Marca: <b>{{@$ordenServicioInstance->carro->marca}}</b>, Modelo: <b>{{@$ordenServicioInstance->carro->modelo}}</b> @else <span style="color: red;font-size: 14px;"> Sin carro en orden </span> @endif </td>
		<td style="text-align: center; width:20%; font-size: 12px;">@if(@$ordenServicioInstance->carro->flotilla->cliente) {{$ordenServicioInstance->carro->flotilla->cliente->nomcte}} @endif </td>
		
	</tr>
	@endforeach
</table>
{{$listaOrdenServicio->links()}}

@stop