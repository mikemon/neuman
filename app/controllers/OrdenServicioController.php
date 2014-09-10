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
		$operadores = Operador::all();
		$carros = Carro::all();
		
		return View::make('ordenServicio.create',array('carros' => $carros,'operadores' => $operadores));
		

	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store() {
			
		$input = Input::all();
		$ordenServicioInstance = new OrdenServicio();
		$ordenServicioInstance -> carro_id = $input['carro_id'];
		$ordenServicioInstance -> operador_id = $input['operador_id'];
		$ordenServicioInstance->activo=true;
		$ordenServicioInstance -> usuarioInsert_id = 1;
		$ordenServicioInstance -> save();
		return Redirect::action('OrdenServicioController@show', array($ordenServicioInstance -> id));

	}

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
		
		//return View::make('ordenServicio.create',array('carros' => $carros,'operadores' => $operadores));
		if (is_null($ordenServicioInstance)) {
			return "No existe!";
		} else {
			return View::make('ordenServicio/edit') -> with(array('ordenServicioInstance'=>$ordenServicioInstance,'carros' => $carros,'operadores' => $operadores));
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

}
