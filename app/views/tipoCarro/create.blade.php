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

	{{Form::label('descripcion', 'Descripcion')}}
	{{Form::text('descripcion', null,array('placeholder'=>'Descripcion','class'=>'form-control'))}}
	<br>
	{{Form::label('esquema', 'Esquema chasis')}}
	{{Form::text('layoutChasis', null,array('placeholder'=>'Esquema chasis','class'=>'form-control'))}}
	<br>
	{{ Form::button('Guardar', array('type'=>'submit','class'=>'btn btn-primary')) }}

{{ Form::close() }}
@stop
