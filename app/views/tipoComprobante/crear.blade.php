@extends('layouts.master')

@section('sidebar')
@parent
Formulario de tipoComprobante
@stop
@section('tipoComprobante')
<li class="active">
		<a href="{{ action('tipoComprobanteController@mostrarTipoComprobante', null )}}">Tipo comprobante</a>
</li>
@stop
@section('content')
<a class="btn btn-default"href="{{ action('tipoComprobanteController@mostrarTipoComprobante') }}" >Volver a listar</a>
<h1> Crear Tip	o Comprobante </h1>
{{ Form::open(array('url' => 'tipoComprobante/crear')) }}

{{Form::label('descripcion', 'Descripcion')}}
{{Form::text('descripcion', null,array('placeholder'=>'Descripcion','class'=>'form-control'))}}
<br>
{{ Form::button('Guardar', array('type'=>'submit','class'=>'btn btn-primary')) }}

{{ Form::close() }}
@stop