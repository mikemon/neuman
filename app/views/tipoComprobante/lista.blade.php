@extends('layouts.master')
 
@section('sidebar')
     @parent
     Lista de tipoComprobante
@stop
 
 @section('tipoComprobante')
<li class="active">
		<a href="{{ action('tipoComprobanteController@mostrarTipoComprobante', null )}}">Tipo comprobante</a>
</li>
@stop
@section('content')
        <h1>
  Tipo Comprobante
      
    
  
</h1>
<div class="btn-group">
  <a class="btn btn-default" href="{{ action('tipoComprobanteController@nuevoTipoComprobante')}}">Nuevo</a>
  <a class="btn btn-default"href="{{ action('tipoComprobanteController@mostrarTipoComprobante') }}" >Actualizar</a>
</div>
        
<table class="table table-striped table-bordered">
	<thead>
              <tr>
              	<th style="text-align: center; width:20%;   ">Opciones</th>
                <th  style="text-align: center;width:10%;   ">id</th>
                <th style="text-align: center; width:7	0%;">Descripcion</th>
              </tr>
     </thead>
  @foreach($tipoComprobante as $tipo)
    <!--{{ HTML::link( 'tipoComprobante/'.$tipo->id , $tipo->descripcion) }}-->
    		<tr>
    			<td style="text-align: left; width:20%;">
    				<a href="{{ action('tipoComprobanteController@verTipoComprobante', array($tipo->id) )}}" class="btn btn-info " >Ver</a>
    				<a href="{{ action('tipoComprobanteController@editarTipoComprobante', array($tipo->id) )}}" class="btn btn-warning " >Editar</a>
    				<a href="{{ action('tipoComprobanteController@borrarTipoComprobante', array($tipo->id) )}}" class="btn btn-danger" >Borrar</a>
                <td style="text-align: center; width:10%;">{{$tipo->id}} </td>
                <td style="text-align: left; width:70%;">{{$tipo->descripcion}} </td>
              </tr>
      
          @endforeach
</table>
@stop