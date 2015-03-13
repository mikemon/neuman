<?php
class CarrosController extends BaseController {

	public function CarrosController() {
	}

	/**
	 * Muestra la lista con todos los carros
	 */
	public function index() {
		$listaCarro = Carro::orderBy('id', 'asc') -> paginate();
		return View::make('carros.index', array('listaCarro' => $listaCarro));
	}

	/**
	 * Muestra formulario para crear Carro
	 */
	public function create() {
		$tipoCarroList = TipoCarro::all();
		$listaFlotilla = Flotilla::all();
		return View::make('carros.crear', array('tipoCarroList' => $tipoCarroList, 'listaFlotilla' => $listaFlotilla));
	}

	/**
	 * Crear el carro nuevo
	 */
	public function store() {
		Carro::create(Input::all());
		return Redirect::to('carros');
	}

	/**
	 * Ver carro con id
	 */
	public function show($id) {
		$carro = Carro::find($id);
		return View::make('carros.show', array('carro' => $carro));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id) {
		$tipoCarroList = TipoCarro::all();
		$carro = Carro::find($id);
		$tipoCarroInstance = TipoCarro::find($carro -> tipoCarro_id);
		$listaFlotilla = Flotilla::all();
		if (is_null($carro)) {
			return "No existe!";
		} else {
			return View::make('carros/edit', array('carro' => $carro, 'tipoCarroList' => $tipoCarroList, 'tipoCarro_id' => $carro -> tipoCarro_id, 'listaFlotilla' => $listaFlotilla));
		}
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id) {
		$carroInstance = Carro::find($id);
		if (is_null($carroInstance)) {
			return "No existe!";
		} else {
			$data = Input::all();
			$carroInstance -> fill($data);
			$carroInstance -> save();
			return Redirect::action('CarrosController@show', array($carroInstance -> id));
		}
	}

	public function getComprobantesPagos($id) {
		$carro = Carro::find($id);
		echo json_encode($carro -> registroComprobantePagos);
	}

	public function getDatoRendimientoActivo($id = null) {
		$carroInstance = Carro::find($id);
		$datoRendimientoActivo = DatoRendimiento::where('carro_id', '=', $id) -> first();

		if ($datoRendimientoActivo) {
			$datoRendimientoActivo = DatoRendimiento::where('activo', '=', 'true') -> where('carro_id', '=', $id) -> first();
			if ($datoRendimientoActivo) {
				if ($datoRendimientoActivo -> kmFinal == 0)
					$datoRendimientoActivo -> kmFinal = $datoRendimientoActivo -> kmInicial;
				return json_encode(array("exito" => true, "datoRendimientoActivo" => $datoRendimientoActivo, "precioCombustible" => $carroInstance -> tipoCarro -> precioCombustible));
			} else {
				return json_encode(array("exito" => false, "datoRendimientoActivo" => null, "precioCombustible" => $carroInstance -> tipoCarro -> precioCombustible));
			}

		} else {
			return json_encode(array("exito" => false, "datoRendimientoActivo" => null, "precioCombustible" => $carroInstance -> tipoCarro -> precioCombustible));
		}
	}

	public function getPrecioCombustibleForId($id) {
		$carroInstance = Carro::find($id);
		if ($carroInstance -> tipoCarro -> precioCombustible) {
			echo json_encode(array("exito" => true, "precioCombustible" => $carroInstance -> tipoCarro -> precioCombustible));
		} else {
			echo json_encode(array("exito" => false, "msg" => "Revice su configuracion, el tipo de este carro no tiene precio combustible.", "precioCombustible" => null));
		}
	}

	public function findCarro() {
		$text = Input::get('text');
		$flotilla_id = Input::get('flotilla_id');
		$listCarros = Carro::where('flotilla_id', '=', $flotilla_id) -> where(function($query) use ($text, $flotilla_id) {
			$query -> where('noEconomico', 'like', '%' . strtoupper($text) . '%');
			$query -> orWhere('placas', 'like', '%' . strtoupper($text) . '%');
			$query -> orWhere('marca', 'like', '%' . strtoupper($text) . '%');
			$query -> orWhere('modelo', 'like', '%' . strtoupper($text) . '%');
		}) -> orderBy("noEconomico", "asc") -> get();
		echo json_encode($listCarros);
	}
	
	public function getOperadoresActivos($id) {
		$carroInstance = Carro::find($id);
		if ($carroInstance -> tipoCarro -> precioCombustible) {
			echo json_encode(array("exito" => true, "precioCombustible" => $carroInstance -> tipoCarro -> precioCombustible));
		} else {
			echo json_encode(array("exito" => false, "msg" => "Revice su configuracion, el tipo de este carro no tiene precio combustible.", "precioCombustible" => null));
		}
	}

}
?>