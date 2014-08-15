@extends('layouts.master')
 
@section('sidebar')
     @parent
     Información deL carro
@stop
 @section('carros')
<li class="active">
		<a href="{{ action('CarrosController@mostrarCarros', null )}}">Carros</a>
</li>
@stop
@section('content')
        {{ HTML::link('carros', 'Volver'); }}
        <h1>
  Operador {{$carro->id}}
      
</h1>
        
     <label>Carro: </label>   {{ $carro->marca .' '.$carro->modelo }}
        
<br />
 <label>Ingreso :</label>       {{ $carro->created_at}}
@stop