<?php

class MedidaLlantaController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index() {
		
		//echo "estoy en index";
		$listaMedidaLlanta = MedidaLlanta::all();
		return View::make('medidaLlanta.index', array('listaMedidaLlanta' => $listaMedidaLlanta));

	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create() {
		return View::make('medidaLlanta.create');

	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store() {
		echo "holaa";
		$input = Input::all();
		$medidaLlantaInstance = new MedidaLlanta();
		$medidaLlantaInstance -> descripcion = $input['descripcion'];
		$medidaLlantaInstance -> usuarioInsert_id = 1;
		$medidaLlantaInstance -> save();
		return Redirect::action('MedidaLlantaController@show', array($medidaLlantaInstance -> id));

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id) {
		echo json_encode($id);
		$medidaLlantaInstance = MedidaLlanta::find($id);

		//echo json_encode($medidaLlantaInstance);
		return View::make('medidaLlanta.show', array('medidaLlantaInstance' => $medidaLlantaInstance));

	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id) {
		//
		$medidaLlanta = MedidaLlanta::find($id);
		//return View::make('tipoComprobante.editar', array('tipoComprobante' => $tipoComprobante));
		if (is_null($medidaLlanta)) {
			return "No existe!";
		} else {
			return View::make('medidaLlanta/edit') -> with('medidaLlanta', $medidaLlanta);
		}
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id) {

		$medidaLlantaInstance = MedidaLlanta::find($id);
		if (is_null($medidaLlantaInstance)) {
			return "No existe!";
		} else {
			$data = Input::all();
			$medidaLlantaInstance -> fill($data);
			$medidaLlantaInstance -> save();
			return Redirect::action('MedidaLlantaController@show', array($medidaLlantaInstance -> id));
		}
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id) {
		if (MedidaLlanta::destroy($id)) {
			//return Redirect::route('medidaLlanta.index',array('datos'=> json_encode(array('id' => $id, 'exito' => true, 'msg' => 'Se borro :' . $id))));// -> with;
			return Redirect::route('medidaLlanta.index');
		} else {
			echo "No se logro borrar";
		}

	}

}
