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
		RegistroComprobantePago::create(Input::all());
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