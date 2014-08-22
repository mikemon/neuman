@extends('layouts.master')

@section('sidebar')
@parent

@stop
@section('cliente')
<li class="active">
	<a href="{{ action('ClienteController@index', null )}}">Cliente</a>
</li>
@stop
@section('content')
<div class="btn-group">
	<a class="btn btn-default"href="{{ action('ClienteController@index') }}" >Volver a listar</a>
</div>

<h1> Cliente {{$clienteInstance->id}} </h1>

<label>Carro: </label>   {{ $clienteInstance->numcte .' '.$clienteInstance->nomcte }}

<br />
<label>Ingreso :</label> {{ $clienteInstance->created_at}}
@stop