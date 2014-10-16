@extends('layouts.master')

@section('sidebar')
@parent
Formulario de Tipo Carro
@stop
@section('configuracion')
	<li class="dropdown active">
@stop
@section('content')
<a class="btn btn-default"href="{{ action('TipoCarroController@index') }}" >Volver a listar</a>
<h1> Editar Tipo carro </h1>

{{ Form::model($tipoCarro, array('method' => 'PATCH', 'route' =>array('tipoCarro.update', $tipoCarro->id),'class'=>'form-horizontal')) }}
	@include('tipoCarro._form')
{{ Form::close() }}
@stop
