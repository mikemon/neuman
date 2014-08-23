<?php

class AsignacionCarroController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index() {
		$listaAsignacionCarro = AsignacionCarro::all();
		return View::make('asignacionCarro.index', array('listaAsignacionCarro' => $listaAsignacionCarro));

	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create() {
		$operadores = Operador::all();
		$carros = Carro::all();
		
		return View::make('asignacionCarro.create',array('carros' => $carros,'operadores' => $operadores));
		

	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store() {
			
		$input = Input::all();
		$asignacionCarroInstance = new AsignacionCarro();
		$asignacionCarroInstance -> carro_id = $input['carro_id'];
		$asignacionCarroInstance -> operador_id = $input['operador_id'];
		$asignacionCarroInstance->activo=true;
		$asignacionCarroInstance -> usuarioInsert_id = 1;
		$asignacionCarroInstance -> save();
		return Redirect::action('AsignacionCarroController@show', array($asignacionCarroInstance -> id));

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id) {
		$asignacionCarroInstance = AsignacionCarro::find($id);
		return View::make('asignacionCarro.show', array('asignacionCarroInstance' => $asignacionCarroInstance));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id) {
		//
		$asignacionCarroInstance = AsignacionCarro::find($id);
		
		
		$operadores = Operador::all();
		$carros = Carro::all();
		
		//return View::make('asignacionCarro.create',array('carros' => $carros,'operadores' => $operadores));
		
		
	
		if (is_null($asignacionCarroInstance)) {
			return "No existe!";
		} else {
			return View::make('asignacionCarro/edit') -> with(array('asignacionCarroInstance'=>$asignacionCarroInstance,'carros' => $carros,'operadores' => $operadores));
		}
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id) {

		$asignacionCarroInstance = AsignacionCarro::find($id);
		if (is_null($asignacionCarroInstance)) {
			return "No existe!";
		} else {
			$data = Input::all();
			$asignacionCarroInstance -> fill($data);
			$asignacionCarroInstance -> save();
			return Redirect::action('AsignacionCarroController@show', array($asignacionCarroInstance -> id));
		}
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id) {
		if (AsignacionCarro::destroy($id)) {
			//return Redirect::route('medidaLlanta.index',array('datos'=> json_encode(array('id' => $id, 'exito' => true, 'msg' => 'Se borro :' . $id))));// -> with;
			return Redirect::route('asignacionCarro.index');
		} else {
			echo "No se logro borrar";
		}

	}

}
