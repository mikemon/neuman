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
		$flotillaInstance = Flotilla::find($id);
		
		$clientes = Cliente::all();
		if (is_null($flotillaInstance)) {
			return "No existe!";
		} else {
		return View::make('flotilla.edit',array('flotillaInstance' => $flotillaInstance,'clientes'=>$clientes));
		}


		
		
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id) {

		$flotillaInstance = Flotilla::find($id);
		if (is_null($flotillaInstance)) {
			return "No existe!";
		} else {
			$data = Input::all();
			$flotillaInstance -> fill($data);
			$flotillaInstance -> save();
			return Redirect::action('FlotillaController@show', array($flotillaInstance -> id));
		}
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id) {
		if (Flotilla::destroy($id)) {
			//return Redirect::route('medidaLlanta.index',array('datos'=> json_encode(array('id' => $id, 'exito' => true, 'msg' => 'Se borro :' . $id))));// -> with;
			return Redirect::route('flotilla.index');
		} else {
			echo "No se logro borrar";
		}

	}

}
