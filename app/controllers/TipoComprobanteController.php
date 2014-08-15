<?php
class TipoComprobanteController extends BaseController {

	/**
	 * Muestra la lista con todos los tipoComprobante
	 */
	public function mostrarTipoComprobante() {
		$tipoComprobante = TipoComprobante::all();
		return View::make('tipoComprobante.lista', array('tipoComprobante' => $tipoComprobante));
	}

	/**
	 * Muestra formulario para crear TipoComprobante
	 */
	public function nuevoTipoComprobante() {
		return View::make('tipoComprobante.crear');
	}

	/**
	 * Crear el tipoComprobante nuevo
	 */
	public function crear() {
		TipoComprobante::create(Input::all());
		return Redirect::to('tipoComprobante');

	}
	/**
	 * Editar tipo comprobante con id
	 */
	public function editarTipoComprobante($id)
	{
		
		$tipoComprobante  = TipoComprobante::find($id);
		//return View::make('tipoComprobante.editar', array('tipoComprobante' => $tipoComprobante));
		if(is_null($tipoComprobante)){
			return "No existe!";
		}else{
			return View::make('tipoComprobante/editar')->with('tipoComprobante',$tipoComprobante);	
		}
		
	}
	public function update($id)
	{
		//echo "paso".$id;
		//exit;
		$tipoComprobante  = TipoComprobante::find($id);
		if(is_null($tipoComprobante)){
			return "No existe!";
		}else{
			$data=Input::all();
			$tipoComprobante->fill($data);
			$tipoComprobante->save();
			return Redirect::action('tipoComprobanteController@verTipoComprobante', array($tipoComprobante->id) );
		}
	}
	/**
	 * Ver tipoComprobante con id
	 */
	public function verTipoComprobante($id) {
		$tipoComprobante  = TipoComprobante::find($id);
		return View::make('tipoComprobante.ver', array('tipoComprobante' => $tipoComprobante));
	}
}
?>