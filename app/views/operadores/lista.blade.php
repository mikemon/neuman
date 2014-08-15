@extends('layouts.master')
 
@section('sidebar')
     @parent
     Lista de operadores
@stop
 
@section('content')
        <h1>
  Operadores
      
    
  
</h1>
        {{ HTML::link('operadores/nuevo', 'Crear Operador'); }}
 
<ul>
  @foreach($operadores as $operador)
           <li>
    {{ HTML::link( 'operadores/'.$operador->id , $operador->nombre.' '.$operador->apellidos ) }}
      
  </li>
          @endforeach
  </ul>
@stop