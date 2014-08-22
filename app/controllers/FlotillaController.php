<?php

class FlotillaController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index() {
		
		//echo "estoy en index";
		$listaFlotilla = flotilla::all();
		return View::make('flotilla.index', array('listaFlotilla' => $listaFlotilla ));

	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create() {
		$clientes = Cliente::all();
		
		return View::make('flotilla.create',array('clientes' => $clientes ));
		

	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store() {
			
		$input = Input::all();
		$flotillaInstance = new Flotilla();
		$flotillaInstance -> cliente_id = $input['cliente_id'];
		$flotillaInstance ->nombre=$input['nombre'];
		$flotillaInstance -> usuarioInsert_id = 1;
		$flotillaInstance -> save();
		return Redirect::action('FlotillaController@show', array($flotillaInstance  -> id));

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id) {
		echo json_encode($id);
		$flotillaInstance = Flotilla::find($id);

		//echo json_encode($flotillaInstance);
		return View::make('flotilla.show', array('flotillaInstance' => $flotillaInstance));

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
