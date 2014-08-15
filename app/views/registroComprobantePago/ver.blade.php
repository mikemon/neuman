@extends('layouts.master')
 
@section('sidebar')
     @parent
     Información del comprobante.
@stop
 @section('registroComprobantepago')
<li class="active">
@stop
@section('content')
        {{ HTML::link('tipoComprobante', 'Volver'); }}
        <h1>
  Operador {{$registroComprobantePago->id}}
      
</h1>
      
     <label>Descripcion: </label>   {{ $registroComprobantePago->descripcion }}
        
<br />

@stop