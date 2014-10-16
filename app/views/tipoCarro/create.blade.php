@extends('layouts.master')

@section('sidebar')
@parent
Formulario de Tipo carro
@stop
@section('tipoCarro')
<!--
<li class="active">
<a href="{{ action('tipoComprobanteController@mostrarTipoComprobante', null )}}">Tipo comprobante</a>
</li>
-->
@stop
@section('content')
<a class="btn btn-default"href="{{ action('TipoCarroController@index') }}" >Volver a listar</a>
<h1> Crear Tipo carro	  </h1>

{{ Form::model(new TipoCarro, ['route' => ['tipoCarro.store']]) }}
	@include('tipoCarro._form')
{{ Form::close() }}
@stop
