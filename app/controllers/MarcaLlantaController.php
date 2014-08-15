<?php

class MarcaLlantaController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index() {
		
		//echo "estoy en index";
		$listaMarcaLlanta = MarcaLlanta::all();
		return View::make('marcaLlanta.index', array('listaMarcaLlanta' => $listaMarcaLlanta));

	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create() {
		
		return View::make('marcaLlanta.create');
		

	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store() {
		echo "holaa";
		$input = Input::all();
		$marcaLlantaInstance = new MarcaLlanta();
		$marcaLlantaInstance -> descripcion = $input['descripcion'];
		$marcaLlantaInstance -> usuarioInsert_id = 1;
		$marcaLlantaInstance -> save();
		return Redirect::action('MarcaLlantaController@show', array($marcaLlantaInstance -> id));

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id) {
		echo json_encode($id);
		$marcaLlantaInstance = MarcaLlanta::find($id);

		//echo json_encode($marcaLlantaInstance);
		return View::make('marcaLlanta.show', array('marcaLlantaInstance' => $marcaLlantaInstance));

	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id) {
		//
		$marcaLlanta = MarcaLlanta::find($id);
	
		if (is_null($marcaLlanta)) {
			return "No existe!";
		} else {
			return View::make('marcaLlanta/edit') -> with('marcaLlanta', $marcaLlanta);
		}
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id) {

		$marcaLlantaInstance = MarcaLlanta::find($id);
		if (is_null($marcaLlantaInstance)) {
			return "No existe!";
		} else {
			$data = Input::all();
			$marcaLlantaInstance -> fill($data);
			$marcaLlantaInstance -> save();
			return Redirect::action('MarcaLlantaController@show', array($marcaLlantaInstance -> id));
		}
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id) {
		if (MarcaLlanta::destroy($id)) {
			//return Redirect::route('medidaLlanta.index',array('datos'=> json_encode(array('id' => $id, 'exito' => true, 'msg' => 'Se borro :' . $id))));// -> with;
			return Redirect::route('marcaLlanta.index');
		} else {
			echo "No se logro borrar";
		}

	}

}
