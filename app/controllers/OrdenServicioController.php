<?php

class OrdenServicioController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index() {
		$listaOrdenServicio = OrdenServicio::all();
		return View::make('ordenServicio.index', array('listaOrdenServicio' => $listaOrdenServicio));

	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create() {

		$result = Configuracion::whereVariable('serieOS') -> first();
		if ($result) {
			$serieOS = $result -> valor;
		} else {
			echo "No se ha configurado el 'serieOS' en Ordenes de servivio";
			exit ;
		}

		$operadores = Operador::all();
		$carros = Carro::all();

		$ordenServicioInstance = new OrdenServicio();
		$ordenServicioInstance -> serfol = $serieOS;
		$ordenServicioInstance -> estado = 'iniciada';
		$ordenServicioInstance -> usuarioInsert_id = 1;
		$ordenServicioInstance -> save();

		//return View::make('ordenServicio.edit', array('carros' => $carros, 'operadores' => $operadores, 'ordenServicioInstance' => $ordenServicioInstance));
		return View::make('ordenServicio/edit') -> with(array('ordenServicioInstance' => $ordenServicioInstance, 'carros' => $carros, 'operadores' => $operadores));

	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	/*
	 public function store() {

	 $input = Input::all();
	 echo json_encode($input);
	 //echo $input['aCadenaServicios'];

	 exit;
	 $ordenServicioInstance = new OrdenServicio();
	 $ordenServicioInstance -> carro_id = $input['carro_id'];
	 $ordenServicioInstance -> operador_id = $input['operador_id'];
	 $ordenServicioInstance->activo=true;
	 $ordenServicioInstance -> usuarioInsert_id = 1;
	 $ordenServicioInstance -> save();
	 return Redirect::action('OrdenServicioController@show', array($ordenServicioInstance -> id));
	 }
	 */
	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id) {
		$ordenServicioInstance = OrdenServicio::find($id);
		return View::make('ordenServicio.show', array('ordenServicioInstance' => $ordenServicioInstance));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id) {
		//
		$ordenServicioInstance = OrdenServicio::find($id);

		$operadores = Operador::all();
		$carros = Carro::all();
		$clientes=Cliente::all();

		//return View::make('ordenServicio.create',array('carros' => $carros,'operadores' => $operadores));
		if (is_null($ordenServicioInstance)) {
			return "No existe!";
		} else {
			return View::make('ordenServicio/edit') -> with(array('ordenServicioInstance' => $ordenServicioInstance, 'carros' => $carros, 'operadores' => $operadores,'clientes'=>$clientes));
		}
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id) {

		$ordenServicioInstance = OrdenServicio::find($id);
		if (is_null($ordenServicioInstance)) {
			return "No existe!";
		} else {
			$data = Input::all();
			$ordenServicioInstance -> fill($data);
			$ordenServicioInstance -> save();
			return Redirect::action('OrdenServicioController@show', array($ordenServicioInstance -> id));
		}
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id) {
		if (OrdenServicio::destroy($id)) {
			//return Redirect::route('medidaLlanta.index',array('datos'=> json_encode(array('id' => $id, 'exito' => true, 'msg' => 'Se borro :' . $id))));// -> with;
			return Redirect::route('ordenServicio.index');
		} else {
			echo "No se logro borrar";
		}
	}

	public function addProductoInOrder() {

		$data = Input::all();
		$ordenServicioId = $data['idO'];
		$aProducto = json_decode($data['jSonProducto']);
		$numart = $aProducto[0];
		$descripcion = $aProducto[1];
		$precio = $aProducto[2];
		$cantidad = $aProducto[4];

		$maealmInstance = new Maealm();
		$aExistencia = $maealmInstance -> getExistencia($numart);
		if (($aExistencia -> DISPONIBLE) >= $cantidad) {

			if ($maealmInstance -> apartadoAutomatico) {
				$resApartado = $maealmInstance -> setApartado($numart, "apaalm +" . $cantidad);
				if (!$resApartado) {
					return json_encode(array("exito" => false, "msg" => "No se realizo apartado este producto"));
				}
			}

			$ordenServicioProductoInstance = new OrdenServicioProducto();
			$ordenServicioProductoInstance -> ordenServicio_id = $ordenServicioId;
			$ordenServicioProductoInstance -> numart = $numart;
			$ordenServicioProductoInstance -> descripcion = $descripcion;
			$ordenServicioProductoInstance -> precio = $precio;
			$ordenServicioProductoInstance -> cantidad = $cantidad;
			$ordenServicioProductoInstance -> subtotal = $cantidad * $precio;
			$ordenServicioProductoInstance -> usuarioInsert_id = 1;
			$ordenServicioProductoInstance -> save();
			if ($ordenServicioProductoInstance) {
				//return json_encode(array("exito" => true, "productoSaved" => $ordenServicioProductoInstance));
				return json_encode(array("exito" => true, "msg" => "Producto guardado en la Orden"));
			} else {
				//return json_encode(array("exito" => false, "productoSaved" => null));
				return json_encode(array("exito" => false, "msg" => "No se logro agregar el producto " . $numart . " " . $descripcion));
			}
		} else {
			return json_encode(array("exito" => false, "msg" => "No se logro agregar, Cantidad no disponible para este producto"));

		}

	}

	public function addServicioInOrder() {
		$input = Input::all();

		$ordenServicioInstance = OrdenServicio::find($input['idO']);

		$servicio_id = $input['servicio_id'];
		$cantidad = 1;
		$precio = $input['precio'];
		$subtotal = ($input['precio']) * $cantidad;

		$ordenServicioInstance -> servicios() -> attach($servicio_id, array('precio' => $precio, 'cantidad' => $cantidad, 'subtotal' => $subtotal, 'observacion' => ''));
		$servicios = $ordenServicioInstance -> servicios;

		if ($ordenServicioInstance) {
			return json_encode(array("exito" => true));
		} else {
			return json_encode(array("exito" => false));
		}
	}

	public function getServiciosAndProductosOrden() {
		$input = Input::all();
		$ordenServicio = OrdenServicio::find($input['id']);
		if ($ordenServicio) {
			$txt = '';
			$cnt = 0;
			//echo "<table>";
			foreach ($ordenServicio->servicios as $servicioInstance) {
				//echo $servicioInstance -> id . "<br>";
				$cnt++;
				$txt .= '<tr class="trServicio" name="' . $servicioInstance -> pivot -> id . '"  id="s_' . $servicioInstance -> pivot -> id . '" rel="' . $servicioInstance -> id . '" ><td>';
				$txt .= '<span class="glyphicon glyphicon-trash borraTrServicio" aria-hidden="true"id="' . $servicioInstance -> pivot -> id . '"></span></td>';
				$txt .= '<td style="text-align:center;" id="s_' . $servicioInstance -> pivot -> id . '_cons">' . $cnt . '</td>';
				$txt .= '<td style="text-align:center;" id="s_' . $servicioInstance -> pivot -> id . '_codigo">' . $servicioInstance -> codigo . '</td>';
				$txt .= '<td style="text-align:left;" id="s_' . $servicioInstance -> pivot -> id . '_descripcion">' . $servicioInstance -> descripcion . '</td>';
				$txt .= '<td style="text-align:right;" id="s_' . $servicioInstance -> pivot -> id . '_cantidad">' . $servicioInstance -> pivot -> cantidad . '</td>';
				$txt .= '<td style="text-align:right;" id="s_' . $servicioInstance -> pivot -> id . '_precio">' . $servicioInstance -> pivot -> precio . '</td>';
				$txt .= '<td style="text-align:right;" id="s_' . $servicioInstance -> pivot -> id . '_subtotal">' . $servicioInstance -> pivot -> subtotal . '</td></tr>';
			}

			foreach ($ordenServicio->productos as $ordenServicioProductoInstance) {
				//echo $servicioInstance -> id . "<br>";
				$cnt++;
				$txt .= '<tr class="trProducto" name="' . $ordenServicioProductoInstance -> id . '"  id="p_' . $ordenServicioProductoInstance -> id . '" rel="' . $ordenServicioProductoInstance -> id . '" ><td>';
				$txt .= '<span class="glyphicon glyphicon-trash borraTrProducto" aria-hidden="true" id="' . $ordenServicioProductoInstance -> id . '"></span></td>';
				$txt .= '<td style="text-align:center;" id="p_' . $ordenServicioProductoInstance -> id . '_cons">' . $cnt . '</td>';
				$txt .= '<td style="text-align:center;" id="p_' . $ordenServicioProductoInstance -> id . '_codigo">' . $ordenServicioProductoInstance -> numart . '</td>';
				$txt .= '<td style="text-align:left;" id="p_' . $ordenServicioProductoInstance -> id . '_descripcion">' . $ordenServicioProductoInstance -> descripcion . '</td>';
				$txt .= '<td style="text-align:right;" id="p_' . $ordenServicioProductoInstance -> id . '_cantidad">' . $ordenServicioProductoInstance -> cantidad . '</td>';
				$txt .= '<td style="text-align:right;" id="p_' . $ordenServicioProductoInstance -> id . '_precio">' . $ordenServicioProductoInstance -> precio . '</td>';
				$txt .= '<td style="text-align:right;" id="p_' . $ordenServicioProductoInstance -> id . '_subtotal">' . $ordenServicioProductoInstance -> subtotal . '</td></tr>';

			}
			echo $txt;
			//

			//echo "</table>";
		} else {
			echo 'No existe la Orden de servicio';
		}
	}

	public function deleteServiciosInOrden() {
		$input = Input::all();
		//$user->roles()->wherePivot('system_id', '=', 15)->detach(5);
		//$user->roles()->attach(5, ['system_id' => 10]);
		$input = Input::all();
		$ordenServicioInstance = OrdenServicio::find($input['idO']);

		//$result= $ordenServicioInstance->servicios()->wherePivot('id', '=', $input['idServPiv'])->detach($input['idServ']);
		//$user->roles()->detach(5, ['system_id' => 15]);
		$idServ = $input['idServ'];
		$pivotId = $input['idServPiv'];
		//$result= $ordenServicioInstance->servicios()->detach( $idServ,array('consecutivo' => $pivotId));
		//$user->roles()->newPivotStatementForId($role->id)->where('system_id', 15)->delete();
		$result = $ordenServicioInstance -> servicios() -> newPivotStatementForId($idServ) -> where('id', $pivotId) -> delete();

		//$result=$ordenServicioInstance->servicios()->wherePivot('consecutivo', '=', $pivotId)->detach($idServ);
		echo json_encode(array("exito" => (($result == 1) ? true : false), "id" => "s_" . $input['idServPiv']));

		//$ordenServicio = OrdenServicio::find($input['id']);
	}

	public function deleteProductoInOrden() {
		$input = Input::all();
		$ordenServicioProducto = OrdenServicioProducto::find($input['idOrdPro']);

		$maealmInstance = new Maealm();
		if ($maealmInstance -> apartadoAutomatico) {
			$resApartado = $maealmInstance -> setApartado($ordenServicioProducto->numart, "apaalm -" . $ordenServicioProducto->cantidad);
			if (!$resApartado) {
				return json_encode(array("exito" => false, "msg" => "No se realizo Desapartado este producto"));
			}
		}

		$resp = $ordenServicioProducto -> delete();
		echo json_encode(array("exito" => (($resp == 1) ? true : false), "id" => ("p_" . $input['idOrdPro']),"msg" => "Eliminado correctamente de la Orden" ));
	}
	
	public function aplicarOrden(){
		$movimientoInstance=new Movimiento();
		$movimientoInstance->crearMovimiento();
	}

}
