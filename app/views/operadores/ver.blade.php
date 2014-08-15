@extends('layouts.master')
 
@section('sidebar')
     @parent
     Información deL operador
@stop
 
@section('content')
        {{ HTML::link('operadores', 'Volver'); }}
        <h1>
  Operador {{$operador->id}}
      
</h1>
        
     <label>Nombre: </label>   {{ $operador->nombre .' '.$operador->apellidos }}
        
<br />
 <label>Ingreso :</label>       {{ $operador->created_at}}
@stop