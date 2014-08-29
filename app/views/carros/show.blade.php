@extends('layouts.master')
 
@section('sidebar')
     @parent
     Información deL carro
@stop
 @section('carros')
<li class="active">
		<a href="{{ action('CarrosController@index', null )}}">Carros</a>
</li>
@stop
@section('content')
  <a class="btn btn-default"href="{{ action('CarrosController@index') }}" >Volver a listar</a>
        <h1>
  Carro {{$carro->id}}
      
</h1>
        
     <label>Carro: </label>   {{ $carro->marca .' '.$carro->modelo }}
        
<br />
 <label>Ingreso :</label>       {{ $carro->created_at}}
@stop