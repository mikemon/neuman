@extends('layouts.master')
 
@section('sidebar')
     @parent
     Información del comprobante.
@stop
 @section('registroComprobantepago')
<li class="active">
@stop
@section('content')
<a class="btn btn-default"href="{{ action('registroComprobantePagoController@mostrarRegistroComprobantePago') }}" >Volver a listar</a>
        <h1>
  Registro comprobante {{$registroComprobantePago->id}}
      
</h1>
 <label>Carro: </label> {{$registroComprobantePago->carro->id}}  <b>No Economico:</b> {{ $registroComprobantePago->carro->noEconomico }}  <b>Marca:</b> {{ $registroComprobantePago->carro->marca }}  <b>Modelo: </b>{{ $registroComprobantePago->carro->modelo }}


<br />
      
     <label>Operador: </label>   {{ $registroComprobantePago->operador->nombre }} {{ $registroComprobantePago->operador->apellidos }}
           
<br />

<label>Fecha y Hora: </label>  {{$registroComprobantePago->fechaComprobante}}      
<br/>
     <label>Descripcion: </label>   {{ $registroComprobantePago->descripcion }}
 <h3>Datos rendimiento</h3>
 
<label>kmInicial: </label>   {{ $registroComprobantePago->datoRendimiento->kmInicial }}
<br />      
     <label>kmFinal: </label>   {{ $registroComprobantePago->datoRendimiento->kmFinal }}
<br />      
     <label>litros: </label>   {{ $registroComprobantePago->datoRendimiento->litros }}
<br />      
     <label>Rendimiento: </label>   {{ $registroComprobantePago->datoRendimiento->odometro }}
    	        
<br />      
     <label>Observacion: </label>   {{ $registroComprobantePago->datoRendimiento->observacion }}
    	                	                    	            	          
<br />

<div class="form-group">
				<div class="col-sm-2">
					<a href="{{ action('registroComprobantePagoController@editarRegistroComprobantePago', array($registroComprobantePago->id) )}}" class="btn btn-warning " >Editar</a>
				</div>
	</div>


@stop