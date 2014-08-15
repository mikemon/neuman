@extends('layouts.master')

@section('sidebar')
@parent
Formulario de Medida llanta
@stop
@section('medidaLLanta')
<!--
<li class="active">
<a href="{{ action('tipoComprobanteController@mostrarTipoComprobante', null )}}">Tipo comprobante</a>
</li>
-->
@stop
@section('content')
<a class="btn btn-default"href="{{ action('MedidaLlantaController@index') }}" >Volver a listar</a>
<h1> Editar Medida LLanta </h1>
{{ Form::model($medidaLlanta, array('method' => 'PATCH', 'route' =>array('medidaLlanta.update', $medidaLlanta->id))) }}


	{{Form::label('descripcion', 'Descripcion')}}
	{{Form::text('descripcion', null,array('placeholder'=>'Descripcion','class'=>'form-control'))}}
	<br>
	{{ Form::button('Guardar', array('type'=>'submit','class'=>'btn btn-primary')) }}

{{ Form::close() }}
@stop
