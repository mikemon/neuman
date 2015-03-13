@extends('layouts.master')

@section('sidebar')
@parent
Información del ordenServicio
@stop

@section('ordenServicio')
<li class="active">
	@stop

	@section('content')
	<div class="btn-group">
		<a class="btn btn-default"href="{{ action('OrdenServicioController@index') }}" >Volver a listar</a>
	</div>

	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">OrdenServicio {{$ordenServicioInstance->id}}</h3>
		</div>
		<div class="panel-body">

			<div class="form-group">
				<label for="clientes" class="col-sm-6 campo  label label-default">Folio</label>
				<div class="col-sm-10">
					{{Form::label('', $ordenServicioInstance->numfol)}}
				</div>
			</div>

			<br/>
			<br/>
			<br/>
			<h4>Carro</h4>
			<div class="form-group">
				<label for="clientes" class="col-sm-5 campo  label label-default">No. Economico</label>
				<div class="col-sm-2">
					{{$ordenServicioInstance->carro->noEconomico}}
				</div>
				<label for="clientes" class="col-sm-5 campo  label label-default">Placas</label>
				<div class="col-sm-2">
					{{$ordenServicioInstance->carro->placas}}
				</div>
				<label for="clientes" class="col-sm-6 campo  label label-default">Marca</label>
				<div class="col-sm-2">
					{{$ordenServicioInstance->carro->marca}}
				</div>
			</div>
			<br />
			<h4>Descripcion orden</h4>
			<div class="form-group">
				<label for="clientes" class="col-sm-6 campo  label label-default">Falla reportada</label>
				<div class="col-sm-10">
					{{Form::label('', $ordenServicioInstance->fallaReportada)}}
				</div>
			</div>

			<div class="form-group">
				<label for="clientes" class="col-sm-6 campo  label label-default">Observaciones</label>
				<div class="col-sm-10">
					{{Form::label('', $ordenServicioInstance->observaciones)}}
				</div>
			</div>
			
			

		</div>

	</div>
	<div class="form-group">
				<div class="col-sm-2">
					<a href="{{ action('OrdenServicioController@edit', array($ordenServicioInstance->id) )}}" class="btn btn-warning " >Editar</a>
				</div>
	</div>

	@stop
