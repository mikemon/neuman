@extends('layouts.master')

@section('sidebar')
@parent
Lista de Comprobantes de Pago.
@stop
@section('registroComprobantepago')
<li class="active">
@stop


@section('content')
<h3> Comprobantes </h3>

<div class="btn-group">
	<a class="btn btn-default" href="{{ action('registroComprobantePagoController@nuevoRegistroComprobantePago')}}">Nuevo</a>
	<a class="btn btn-default"href="{{ action('registroComprobantePagoController@mostrarRegistroComprobantePago') }}" >Actualizar</a>
</div>
<table class="table table-striped table-bordered">
	<thead>
              <tr>
              	<th style="text-align: center; width:20%;   ">Opciones</th>
                <th  style="text-align: center;width:5%;   ">id</th>
                <th  style="text-align: center;width:10%;   ">Fecha hora</th>
                <th style="text-align: center; width:70%;">Descripcion</th>
              </tr>
     </thead>
	@foreach($listaRegistroComprobantePago as $registroComprobanteInstance)
			<tr style="font-size: 12px;">
    			<td style="text-align: center; width:20%;">
    				<a href="{{ action('registroComprobantePagoController@show', array($registroComprobanteInstance->id) )}}" class="btn btn-info " >Ver</a>
    				<a href="{{ action('registroComprobantePagoController@editarRegistroComprobantePago', array($registroComprobanteInstance->id) )}}" class="btn btn-warning " >Editar</a>
    				<a href="{{ action('registroComprobantePagoController@borrarTipoComprobante', array($registroComprobanteInstance->id) )}}" class="btn btn-danger" >Borrar</a>
                <td style="text-align: center; width:5%;">{{$registroComprobanteInstance->id}} </td>
                <td style="text-align: center; width:10%;">{{$registroComprobanteInstance->fechaComprobante}} </td>
                <td style="text-align: left; width:70%;">{{$registroComprobanteInstance->descripcion}} </td>
              </tr>
	@endforeach
	</table>
	{{$listaRegistroComprobantePago->links()}}
@stop