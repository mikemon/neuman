@extends('layouts.master')

@section('sidebar')
@parent
Formulario de Tipo Carro
@stop
@section('marcaLLanta')
<!--
<li class="active">
<a href="{{ action('tipoComprobanteController@mostrarTipoComprobante', null )}}">Tipo comprobante</a>
</li>
-->
@stop
@section('content')
<a class="btn btn-default"href="{{ action('TipoCarroController@index') }}" >Volver a listar</a>
<h1> Editar Marca LLanta </h1>
{{ Form::model($tipoCarro, array('method' => 'PATCH', 'route' =>array('tipoCarro.update', $tipoCarro->id))) }}


	{{Form::label('descripcion', 'Descripcion')}}
	{{Form::text('descripcion', null,array('placeholder'=>'Descripcion','class'=>'form-control'))}}
	<br>
	{{Form::label('esquema', 'Esquema chasis')}}
	{{Form::text('layoutChasis', null,array('placeholder'=>'Esquema chasis','class'=>'form-control'))}}
	<br>
	{{ Form::button('Guardar', array('type'=>'submit','class'=>'btn btn-primary')) }}

{{ Form::close() }}
@stop
