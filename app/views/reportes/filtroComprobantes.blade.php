@extends('layouts.master')

@section('sidebar')
@parent
Información del flotilla
@stop

@section('flotilla')
<li class="active">
	@stop

	@section('content')

	<form name="formFiltro" action="{{ action('ReportesController@reporteComprobantes', null )}}" method="post">

		<div class="panel panel-default">			
			<label >Comprende de :</label>
			<input type="text" id="fechaComprobanteIni" name="fechaComprobanteIni" value="{{date("Y-m-d")}}" class="tipoFechaSimple" />
			<label > A: </label>
			<input type="text" id="fechaComprobanteFin" name="fechaComprobanteFin" value="{{date("Y-m-d")}}" class="tipoFechaSimple" />
			<br />
			<legend>TOTALIZADO</legend>
			<fieldset>
			<INPUT TYPE=RADIO NAME="opcion" VALUE="porCarro" CHECKED> Por carro
			<br/>
			<INPUT TYPE=RADIO NAME="opcion" VALUE="porMes"  > Por Mes
			<br/>
			</fieldset>
			<input type="submit" value="Generar consulta" class="btn btn-warning "/>
		</div>
	</form>

	@stop
