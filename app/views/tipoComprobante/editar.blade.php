@extends('layouts.master')
@section('sidebar')
@parent
Editar de tipoComprobante
@stop

@section('tipoComprobante')
<li class="active">
		<a href="{{ action('tipoComprobanteController@mostrarTipoComprobante', null )}}">Tipo comprobante</a>
</li>
@stop

@section('content')

<div class="btn-group">
	<a class="btn btn-default"href="{{ action('tipoComprobanteController@mostrarTipoComprobante') }}" >Volver a listar</a>
</div>
<h2>Crear Tipo Comprobante</h2>
<!--{{ Form::model($tipoComprobante, array('url' => 'tipoComprobante/update/'.$tipoComprobante->id,'method' => 'patch' )) }}-->
{{ Form::model($tipoComprobante, array('method' => 'PATCH', 'route' =>array('tipoComprobante.update', $tipoComprobante->id))) }}

<div class="row">
	<div class="form-group col-nd-4">
		{{Form::label('descripcion', 'Descripcion: ')}}
		{{Form::text('descripcion', null,array('placeholder'=>'descripcion','class'=>'form-control'))}}
	</div>
</div>
<!--{{ Form::hidden('id', $tipoComprobante->id) }}-->
{{ Form::button('Guardar cambios', array('type'=>'submit','class'=>'btn btn-primary')) }}
{{ Form::close() }}
@stop