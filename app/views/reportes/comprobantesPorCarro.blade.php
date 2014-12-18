<table  border="1">
	<thead>
		<tr>
			<th style="text-align: center; ">FECHA</th>
			<th style="text-align: center; ">CARRO</th>
			<th style="text-align: center; ">OPERADOR</th>
			<th style="text-align: center; ">NOTA</th>
			<th style="text-align: center; ">PRECIO</th>
			<th style="text-align: center; ">LITROS</th>
			<th style="text-align: center; ">KM.INIC</th>
			<th style="text-align: center; ">KM.FINAL</th>
			<th style="text-align: center; ">KM.RECOR.</th>
			<th style="text-align: center; ">RTDO</th>
			<th style="text-align: center; ">COMPRA TOTAL</th>
			<th style="text-align: center; ">RUTA </th>
		</tr>
	</thead>
	<?php
	$actual = null;
	$totLitros = 0;
	$totKmRecorridos = 0;
	$totCompra = 0;
	?>
	@foreach($listaComprobantes as $registroComprobanteInstance)

	@if($actual==null)
	<?php
	$actual = $registroComprobanteInstance -> carro -> id;
	?>
	<tr>
		<td style="background:#0B0B61;color: #FFFFFF; ">{{ $registroComprobanteInstance->operador->nombre }} {{$registroComprobanteInstance->operador->apellidos}}</td>
		<td style="background:#0B0B61;color: #FFFFFF; "></td>
		<td style="background:#0B0B61;color: #FFFFFF; "></td>
		<td style="background:#0B0B61;color: #FFFFFF; "></td>
		<td style="background:#F3F781;color: #000000; ">{{$registroComprobanteInstance->carro->noEconomico}}</td>
		<td style="background:#F3F781;color: #000000; "> {{$registroComprobanteInstance->carro->tipoCarro->descripcion}}</td>
		<td style="background:#F3F781;color: #000000; "> {{$registroComprobanteInstance->carro->marca}}</td>
		<td style="background:#F3F781;color: #000000; "> {{$registroComprobanteInstance->carro->modelo}}</td>
		<td style="background:#0B0B61;color: #FFFFFF; "></td>
		<td style="background:#0B0B61;color: #FFFFFF; "></td>
		<td style="background:#0B0B61;color: #FFFFFF; "></td>
		<td style="background:#0B0B61;color: #FFFFFF; "></td>
	</tr>
	@else
	@if($actual!=$registroComprobanteInstance->carro->id)
	<tr>
		<td style="background:#04B404;color: #000000; "></td>
		<td style="background:#04B404;color: #000000; "></td>
		<td style="background:#04B404;color: #000000; "></td>
		<td style="background:#04B404;color: #000000; "></td>
		<td style="background:#04B404;color: #000000; "></td>
		<td style="background:#04B404;color: #000000; text-align: right;">{{$totLitros}} </td>
		<td style="background:#04B404;color: #000000; "></td>
		<td style="background:#04B404;color: #000000; "></td>
		<td style="background:#04B404;color: #000000; text-align: right;">{{$totKmRecorridos}}</td>
		<td style="background:#04B404;color: #000000; text-align: right;">{{round(($totKmRecorridos/$totLitros),2)}}</td>
		<td style="background:#04B404;color: #000000; "></td>
		<td style="background:#04B404;color: #000000; "></td>
	</tr>
	<tr>
		<td style="background:#FFFFFF;color: #000000; "></td>
		<td style="background:#FFFFFF;color: #000000; "></td>
		<td style="background:#FFFFFF;color: #000000; "></td>
		<td style="background:#FFFFFF;color: #000000; "></td>
		<td style="background:#FFFFFF;color: #000000; "></td>
		<td style="background:#FFFFFF;color: #000000; text-align: right;"></td>
		<td style="background:#FFFFFF;color: #000000; "></td>
		<td style="background:#FFFFFF;color: #000000; "></td>
		<td style="background:#FFFFFF;color: #000000; "></td>
		<td style="background:#04B404;color: #000000; text-align: right;">TOTAL</td>
		<td style="background:#04B404;color: #8A0808; text-align: right;">{{$totCompra}}</td>
		<td style="background:#FFFFFF;color: #000000; "></td>
	</tr>

	<tr>
		<td style="background:#0B0B61;color: #FFFFFF; ">{{ $registroComprobanteInstance->operador->nombre }} {{$registroComprobanteInstance->operador->apellidos}}</td>
		<td style="background:#0B0B61;color: #FFFFFF; "></td>
		<td style="background:#0B0B61;color: #FFFFFF; "></td>
		<td style="background:#0B0B61;color: #FFFFFF; "></td>
		<td style="background:#F3F781;color: #000000; ">{{$registroComprobanteInstance->carro->noEconomico}}</td>
		<td style="background:#F3F781;color: #000000; "> {{$registroComprobanteInstance->carro->tipoCarro->descripcion}}</td>
		<td style="background:#F3F781;color: #000000; "> {{$registroComprobanteInstance->carro->marca}}</td>
		<td style="background:#F3F781;color: #000000; "> {{$registroComprobanteInstance->carro->modelo}}</td>
		<td style="background:#0B0B61;color: #FFFFFF; "></td>
		<td style="background:#0B0B61;color: #FFFFFF; "></td>
		<td style="background:#0B0B61;color: #FFFFFF; "></td>
		<td style="background:#0B0B61;color: #FFFFFF; "></td>
	</tr>
	<?php
	$actual = $registroComprobanteInstance -> carro -> id;
	$totLitros = 0;
	$totKmRecorridos = 0;
	$totCompra = 0;
	?>
	@endif
	@endif
	
	<?php 
	$date = new DateTime($registroComprobanteInstance->fechaComprobante);
	$fecha= $date->format('d/m/Y');
	?>

	<tr>
		<td style="text-align: center;">{{$fecha}} </td>
		<td style="text-align: left;">{{ $registroComprobanteInstance->carro->noEconomico }} </td>
		<td style="text-align: left;">{{ $registroComprobanteInstance->operador->nombre }} {{$registroComprobanteInstance->operador->apellidos}} </td>
		<td style="text-align: left;">{{$registroComprobanteInstance->descripcion}} </td>
		<td style="text-align: right;">{{ round (($registroComprobanteInstance->total/$registroComprobanteInstance->datoRendimiento->litros),2) }} </td>
		<td style="text-align: right;">{{$registroComprobanteInstance->datoRendimiento->litros}} </td>
		<td style="text-align: right ;">{{$registroComprobanteInstance->datoRendimiento->kmInicial}} </td>
		<td style="text-align: right;">{{$registroComprobanteInstance->datoRendimiento->kmFinal}} </td>
		<td style="text-align: right;">{{$registroComprobanteInstance->datoRendimiento->kmFinal - $registroComprobanteInstance->datoRendimiento->kmInicial}} </td>
		<td style="text-align: right;">{{ round(($registroComprobanteInstance->datoRendimiento->odometro), 2)}} </td>
		<td style="text-align: right;">{{round($registroComprobanteInstance->total,2)}} </td>
		<td style="text-align: left;">{{$registroComprobanteInstance->datoRendimiento->observacion}} </td>
	</tr>
	<?php
	$totLitros += $registroComprobanteInstance -> datoRendimiento -> litros;
	$totKmRecorridos += $registroComprobanteInstance -> datoRendimiento -> kmFinal - $registroComprobanteInstance -> datoRendimiento -> kmInicial;
	$totCompra += $registroComprobanteInstance -> total;
	?>
	@endforeach

	<tr>
		<td style="background:#04B404;color: #000000; "></td>
		<td style="background:#04B404;color: #000000; "></td>
		<td style="background:#04B404;color: #000000; "></td>
		<td style="background:#04B404;color: #000000; "></td>
		<td style="background:#04B404;color: #000000; "></td>
		<td style="background:#04B404;color: #000000; text-align: right;">{{$totLitros}} </td>
		<td style="background:#04B404;color: #000000; "></td>
		<td style="background:#04B404;color: #000000; "></td>
		<td style="background:#04B404;color: #000000; text-align: right;">{{$totKmRecorridos}}</td>
		<td style="background:#04B404;color: #000000; text-align: right;">{{round(($totKmRecorridos/$totLitros),2)}}</td>
		<td style="background:#04B404;color: #000000; "></td>
		<td style="background:#04B404;color: #000000; "></td>
	</tr>
	<tr>
		<td style="background:#FFFFFF;color: #000000; "></td>
		<td style="background:#FFFFFF;color: #000000; "></td>
		<td style="background:#FFFFFF;color: #000000; "></td>
		<td style="background:#FFFFFF;color: #000000; "></td>
		<td style="background:#FFFFFF;color: #000000; "></td>
		<td style="background:#FFFFFF;color: #000000; text-align: right;"></td>
		<td style="background:#FFFFFF;color: #000000; "></td>
		<td style="background:#FFFFFF;color: #000000; "></td>
		<td style="background:#FFFFFF;color: #000000; "></td>
		<td style="background:#04B404;color: #000000; text-align: right;">TOTAL</td>
		<td style="background:#04B404;color: #8A0808; text-align: right;">{{$totCompra}}</td>
		<td style="background:#FFFFFF;color: #000000; "></td>
		
	</tr>
		
</table>