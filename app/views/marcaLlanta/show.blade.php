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

	<div class="panel panel-default">
  <div class="panel-heading"><h4>Mostrar Marca LLanta</h4></div>
    <ul class="list-group">
    <li class="list-group-item">{{Form::label('id', 'id:')}}{{$marcaLlantaInstance->id}}</li>
    <li class="list-group-item">{{Form::label('descripcion', 'Descripcion:')}}{{$marcaLlantaInstance->descripcion}}</li>
    </ul>
  
</div>

 
@stop
