@extends('layouts.master')
 
@section('sidebar')
     @parent
     Formulario de carro
@stop
 
 @section('carros')
<li class="active">
		<a href="{{ action('CarrosController@mostrarCarros', null )}}">Carros</a>
</li>
@stop
@section('content')
        {{ HTML::link('carros', 'volver'); }}
        <h1>
  Crear Carro
      
    
  
</h1>
        {{ Form::open(array('url' => 'carros/crear')) }}
            {{Form::label('marca', 'Marca')}}
            {{Form::text('marca', '')}}
            <br>
            <br />
            {{Form::label('modelo', 'Modelo')}}
            {{Form::text('modelo', '')}}
            <br />
            
            <br>
            {{Form::label('placas', 'Placas')}}
            {{Form::text('placas', '')}}
            <br />
            
            <br>
            {{Form::label('numllantas', 'Num. Llantas')}}
            {{Form::text('numllantas', '')}}
            <br />
            <br />
            {{Form::submit('Guardar')}}
        {{ Form::close() }}
@stop