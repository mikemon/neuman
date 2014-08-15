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
<a class="btn btn-default"href="{{ action('MarcaLlantaController@index') }}" >Volver a listar</a>
<h1> Crear Marca LLanta </h1>

{{ Form::model(new MarcaLlanta, ['route' => ['marcaLlanta.store']]) }}

	{{Form::label('descripcion', 'Descripcion')}}
	{{Form::text('descripcion', null,array('placeholder'=>'Descripcion','class'=>'form-control'))}}
	<br>
	{{ Form::button('Guardar', array('type'=>'submit','class'=>'btn btn-primary')) }}

{{ Form::close() }}
@stop
