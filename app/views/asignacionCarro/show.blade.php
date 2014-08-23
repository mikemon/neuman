@extends('layouts.master')

@section('sidebar')
@parent
Formulario de Asignacion carro
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
	<div class="panel panel-default">
  <div class="panel-heading"><h4>Mostrar asignacion carro</h4></div>
    <ul class="list-group">
    <li class="list-group-item">{{Form::label('id', 'id:')}}{{$asignacionCarroInstance->id}}</li>
    <li class="list-group-item">{{Form::label('operador', 'Operador:')}}{{$asignacionCarroInstance->operador->nombre." ".$asignacionCarroInstance->operador->apellidos}}</li>
    <li class="list-group-item">{{Form::label('carro', 'Carro:')}}{{$asignacionCarroInstance->carro->marca." ".$asignacionCarroInstance->carro->modelo}}</li>
    </ul>
</div>
@stop
