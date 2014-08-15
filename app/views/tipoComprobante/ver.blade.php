@extends('layouts.master')
 
@section('sidebar')
     @parent
     Información de tipoComprobante
@stop
 @section('tipoComprobante')
<li class="active">
		<a href="{{ action('tipoComprobanteController@mostrarTipoComprobante', null )}}">Tipo comprobante</a>
</li>
@stop
@section('content')
<a class="btn btn-default"href="{{ action('tipoComprobanteController@mostrarTipoComprobante') }}" >Volver a listar</a>
        <h1>
  Tipo Comprobante {{$tipoComprobante->id}}
      
</h1>
        
     <label>Descripcion: </label>   {{ $tipoComprobante->descripcion }}
     
     <p>
     <a href="{{ action('tipoComprobanteController@editarTipoComprobante', array($tipoComprobante->id) )}}" class="btn btn-warning " >Editar</a>
	</p>
        
<br />

@stop