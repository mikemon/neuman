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

	<div class="panel panel-default">
  <div class="panel-heading"><h4>Mostrar Medida LLanta</h4></div>
    <ul class="list-group">
    <li class="list-group-item">{{Form::label('id', 'id:')}}{{$medidaLlantaInstance->id}}</li>
    <li class="list-group-item">{{Form::label('descripcion', 'Descripcion:')}}{{$medidaLlantaInstance->descripcion}}</li>
    </ul>
  
</div>

 
@stop
