@extends('layouts.master')

@section('sidebar')
@parent
Lista de carros
@stop

@section('carros')
<li class="active">
		<a href="{{ action('CarrosController@mostrarCarros', null )}}">Carros</a>
</li>
@stop

@section('content')
<h1> Carros </h1>
{{ HTML::link('carros/nuevo', 'Crear Operador'); }}

<ul>
	@foreach($carros as $carro)
	<li>
		{{ HTML::link( 'carros/'.$carro->id , $carro->marca.' '.$carro->modelo ) }}

	</li>
	@endforeach
</ul>
@stop