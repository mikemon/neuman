@extends('layouts.master')
 
@section('sidebar')
     @parent
     Información deL carro
@stop
 @section('cliente')
<li class="active">
		<a href="{{ action('ClienteController@index', null )}}">Cliente</a>
</li>
@stop
@section('content')
        {{ HTML::link('cliente', 'Volver'); }}
        <h1>
  Operador {{$carro->id}}
      
</h1>
        
     <label>Carro: </label>   {{ $carro->marca .' '.$carro->modelo }}
        
<br />
 <label>Ingreso :</label>       {{ $carro->created_at}}
@stop