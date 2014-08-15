@extends('layouts.master')
 
@section('sidebar')
     @parent
     Formulario de operador
@stop
 
@section('content')
        {{ HTML::link('operadores', 'volver'); }}
        <h1>
  Crear Operador
      
    
  
</h1>
        {{ Form::open(array('url' => 'operadores/crear')) }}
            {{Form::label('nombre', 'Nombre')}}
            {{Form::text('nombre', '')}}
            <br>
            {{Form::label('apellidos', 'Apellidos')}}
            {{Form::text('apellidos', '')}}
            <br />
            {{Form::submit('Guardar')}}
        {{ Form::close() }}
@stop