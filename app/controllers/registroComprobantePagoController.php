<?php
class RegistroComprobantePagoController extends BaseController {

	/**
	 * Muestra la lista con todos los registroComprobantePago
	 */
	public function mostrarRegistroComprobantePago() {
		//$listaRegistroComprobantePago = RegistroComprobantePago::orderBy('id', 'asc') -> get();
		$listaRegistroComprobantePago = RegistroComprobantePago::orderBy('id', 'desc') -> paginate();

		return View::make('registroComprobantePago.lista', array('listaRegistroComprobantePago' => $listaRegistroComprobantePago));
	}

	/**
	 * Muestra formulario para crear RegistroComprobantePago
	 */
	public function nuevoRegistroComprobantePago() {
		$tipoComprobante = TipoComprobante::all();
		$operadores = Operador::orderBy('nombre', 'asc') -> orderBy('apellidos', 'asc') -> get();
		//all();
		$carros = Carro::all();
		//return View::make('carros.lista', array('carros' => $carros));
		return View::make('registroComprobantePago.crear', array('carros' => $carros, 'operadores' => $operadores, 'tipoComprobante' => $tipoComprobante, 'componenteFecha' => "fechaComprobante"));
	}

	/**
	 * Crear el registroComprobantePago nuevo
	 */
	public function crear() {

		$input = Input::all();
		//echo json_encode($input);
		//exit;
		/*
		 $datoRendimientoActivo = DatoRendimiento::where('activo', '=', 'true') -> where('carro_id', '=', $input['carro_id'])
		 -> first();
		 if ($datoRendimientoActivo) {
		 $input['kmInicial'] = ($datoRendimientoActivo -> kmFinal == 0) ? $datoRendimientoActivo -> kmInicial : $datoRendimientoActivo -> kmFinal;
		 }
		 */
		if (!(isset($input['kmInicial']))) {

			$datoRendimientoActivo = DatoRendimiento::where('activo', '=', 'true') -> where('carro_id', '=', $input['carro_id']) -> first();
			if ($datoRendimientoActivo) {
				$input['kmInicial'] = ($datoRendimientoActivo -> kmFinal == 0) ? $datoRendimientoActivo -> kmInicial : $datoRendimientoActivo -> kmFinal;
				$datoRendimientoActivo -> activo = false;
				$datoRendimientoActivo -> save();
			} else {
				$input['kmInicial'] = $input['kmInicialPost'];

			}
		} else {
			$datoRendimientoActivo = DatoRendimiento::where('activo', '=', 'true') -> where('carro_id', '=', $input['carro_id']) -> first();
			if ($datoRendimientoActivo) {
				$datoRendimientoActivo -> activo = false;
				$datoRendimientoActivo -> save();
			}
		}

		$datoRendimientoInstance = new DatoRendimiento();
		$datoRendimientoInstance -> kmInicial = $input['kmInicial'];
		$datoRendimientoInstance -> kmFinal = $input['kmFinal'];
		$datoRendimientoInstance -> litros = $input['litros'];
		$datoRendimientoInstance -> odometro = $input['odometro'];
		$datoRendimientoInstance -> observacion = $input['observacion'];
		$datoRendimientoInstance -> usuarioInsert_id = 1;
		$datoRendimientoInstance -> carro_id = $input['carro_id'];
		$datoRendimientoInstance -> activo = Helpers::isToday($input['fechaComprobante']);
		//true;
		$datoRendimientoInstance -> save();

		$registroComprobanteInstance = new RegistroComprobantePago();
		$registroComprobanteInstance -> carro_id = $input['carro_id'];
		$registroComprobanteInstance -> operador_id = $input['operador_id'];
		$registroComprobanteInstance -> total = $input['total'];
		$registroComprobanteInstance -> descripcion = $input['descripcion'];
		$registroComprobanteInstance -> tipoComprobante_id = $input['tipoComprobante_id'];
		$registroComprobanteInstance -> fechaComprobante = $input['fechaComprobante'];
		$registroComprobanteInstance -> usuarioInsert_id = 1;
		$registroComprobanteInstance -> datoRendimiento_id = $datoRendimientoInstance -> id;

		$registroComprobanteInstance -> save();
		/*
		 if ($datoRendimientoActivo) {
		 //echo "entro";
		 $datoRendimientoActivo -> activo = false;
		 $datoRendimientoActivo -> save();
		 }
		 */
		return Redirect::to('registroComprobantePago');

	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function editarRegistroComprobantePago($id) {
		//
		$registroComprobantePagoInstance = RegistroComprobantePago::find($id);

		$tipoComprobante = TipoComprobante::all();
		$operadores = Operador::orderBy('nombre', 'asc') -> orderBy('apellidos', 'asc') -> get();
		//all();
		$carros = Carro::all();

		if (is_null($registroComprobantePagoInstance)) {
			return "No existe!";
		} else {
			//return View::make('registroComprobantePago.edit', array('registroComprobantePagoInstance' => $registroComprobantePagoInstance, 'clientes' => $clientes));
			return View::make('registroComprobantePago.edit', array('registroComprobantePagoInstance' => $registroComprobantePagoInstance, 'carros' => $carros, 'operadores' => $operadores, 'tipoComprobante' => $tipoComprobante, 'componenteFecha' => "fechaComprobante", 'datoRendimientoInstance' => $registroComprobantePagoInstance -> datoRendimiento));
		}

	}

	public function update($id) {

		$registroComprobantePagoInstance = RegistroComprobantePago::find($id);

		if (is_null($registroComprobantePagoInstance)) {
			return "No existe!";
		} else {

			$input = Input::all();
			/*Guardar cambios en datoRendimiento*/
			$datoRendimientoInstance = DatoRendimiento::find($registroComprobantePagoInstance -> datoRendimiento -> id);
			$datoRendimientoInstance -> kmInicial = $input['kmInicialPost'];
			$datoRendimientoInstance -> kmFinal = $input['kmFinal'];
			$datoRendimientoInstance -> litros = $input['litros'];
			$datoRendimientoInstance -> odometro = $input['odometro'];
			$datoRendimientoInstance -> observacion = $input['observacion'];
			$datoRendimientoInstance -> activo = Helpers::isToday($input['fechaComprobante']);
			$datoRendimientoInstance -> save();
			////*****************////
			/*GUARDAR CAMBIOS EN RegistroComprobantePago*/
			$registroComprobantePagoInstance -> total = $input['total'];
			$registroComprobantePagoInstance -> descripcion = $input['descripcion'];
			$registroComprobantePagoInstance -> fechaComprobante = $input['fechaComprobante'];
			$registroComprobantePagoInstance -> save();
			/**////////////////*/
			return Redirect::action('registroComprobantePagoController@show', array($registroComprobantePagoInstance -> id));
		}

	}

	/**
	 * Ver registroComprobantePago con id
	 */
	public function show($id) {
		$registroComprobantePago = RegistroComprobantePago::find($id);
		return View::make('registroComprobantePago.ver', array('registroComprobantePago' => $registroComprobantePago));
	}

	public function mostrarComprobantes() {
		$comprobantes = RegistroComprobantePago::all();
		return View::make('registroComprobantePago.lista', array('comprobantes' => $comprobantes));
	}

}
?>