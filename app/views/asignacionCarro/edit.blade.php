@extends('layouts.master')

@section('sidebar')
@parent
Formulario de Marca llanta
@stop
@section('marcaLLanta')
<!--
<li class="active">
<a href="{{ action('tipoComprobanteController@mostrarTipoComprobante', null )}}">Tipo comprobante</a>
</li>
-->
@stop
@section('content')
<a class="btn btn-default"href="{{ action('AsignacionCarroController@index') }}" >Volver a listar</a>
<h1> Editar Asignacion carro </h1>
{{ Form::model($asignacionCarroInstance, array('method' => 'PATCH', 'route' =>array('asignacionCarro.update', $asignacionCarroInstance->id),'class'=>'form-horizontal')) }}

	@include('asignacionCarro._form')

{{ Form::close() }}
@stop
