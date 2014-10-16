<?php
class RegistroComprobantePagoController extends BaseController {
	
	/**
	 * Muestra la lista con todos los registroComprobantePago
	 */
	public function mostrarRegistroComprobantePago() {
		$registroComprobantePago = RegistroComprobantePago::all();
		return View::make('registroComprobantePago.lista', array('registroComprobantePago' => $registroComprobantePago));
	}

	/**
	 * Muestra formulario para crear RegistroComprobantePago
	 */
	public function nuevoRegistroComprobantePago() {
		$tipoComprobante = TipoComprobante::all();
		$operadores = Operador::all();
		$carros = Carro::all();
        //return View::make('carros.lista', array('carros' => $carros));
		return View::make('registroComprobantePago.crear',array('carros' => $carros,'operadores' => $operadores,'tipoComprobante'=>$tipoComprobante));
	}

	/**
	 * Crear el registroComprobantePago nuevo
	 */
	public function crear() {//store() {//crear() {
		//RegistroComprobantePago::create(Input::all());
		//return Redirect::to('registroComprobantePago');
		$input = Input::all();
		//echo json_encode($input);
		
		$datoRendimientoActivo=DatoRendimiento::where('activo','=','true')
											  ->where('carro_id','=',$input['carro_id'])//whereActivo('true')->first();
											  ->first();		
		if($datoRendimientoActivo){
			$input['kmInicial']=($datoRendimientoActivo->kmFinal==0)?$datoRendimientoActivo->kmInicial:$datoRendimientoActivo->kmFinal;
		}
		
		//echo "<br>";
		//echo json_encode($input);		
		//exit;
		
		$datoRendimientoInstance=new DatoRendimiento();
		$datoRendimientoInstance->kmInicial= $input['kmInicial'];
		$datoRendimientoInstance->kmFinal= $input['kmFinal'];
		$datoRendimientoInstance->litros= $input['litros'];
		$datoRendimientoInstance->odometro= $input['odometro'];
		$datoRendimientoInstance->observacion= $input['observacion'];
		$datoRendimientoInstance->usuarioInsert_id= 1;
		$datoRendimientoInstance->carro_id=$input['carro_id'];
		$datoRendimientoInstance->activo= true;
		$datoRendimientoInstance->save();
		
		$registroComprobanteInstance = new RegistroComprobantePago();
		$registroComprobanteInstance->carro_id= $input['carro_id'];
		$registroComprobanteInstance->operador_id= $input['operador_id'];
		$registroComprobanteInstance->total= $input['total'];
		$registroComprobanteInstance->descripcion= $input['descripcion'];
		$registroComprobanteInstance->tipoComprobante_id= $input['tipoComprobante_id'];
		$registroComprobanteInstance->usuarioInsert_id= 1;
		$registroComprobanteInstance->datoRendimiento_id=$datoRendimientoInstance->id;
		
		$registroComprobanteInstance->save();
		
		
		if($datoRendimientoActivo){
			//echo "entro";
			$datoRendimientoActivo->activo=false;
			$datoRendimientoActivo->save();
		}
		
		return Redirect::to('registroComprobantePago');
		
	}
	
	public function update($id)
	{
		
	}
	/**
	 * Ver registroComprobantePago con id
	*/
	public function show($id) {
		$registroComprobantePago  = RegistroComprobantePago::find($id);
		return View::make('registroComprobantePago.ver', array('registroComprobantePago' => $registroComprobantePago));
	}
	public function mostrarComprobantes()
    {
        $comprobantes = RegistroComprobantePago::all();
        return View::make('registroComprobantePago.lista', array('comprobantes' => $comprobantes));
    }
}

?>