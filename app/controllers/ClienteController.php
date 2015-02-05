<?php

class ClienteController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index() {

		$listaCliente = Cliente::all();
		return View::make('cliente.index', array('listaCliente' => $listaCliente));

	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create() {

		return View::make('cliente.create');

	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store() {

		$input = Input::all();
		//echo json_encode($input);
		//exit;
		$clienteInstance = new Cliente();
		$clienteInstance -> numcte = $input['numcte'];
		$clienteInstance -> nomcte = $input['nomcte'];
		$clienteInstance -> rfccte = $input['rfccte'];
		$clienteInstance -> dircte = $input['dircte'];
		$clienteInstance -> nlecte = $input['nlecte'];
		$clienteInstance -> nlicte = $input['nlicte'];
		$clienteInstance -> colcte = $input['colcte'];
		$clienteInstance -> pobcte = $input['pobcte'];
		$clienteInstance -> estado = $input['estado'];
		$clienteInstance -> pais = $input['pais'];
		$clienteInstance -> telcte = $input['telcte'];
		$clienteInstance -> mailcte = $input['mailcte'];
		$clienteInstance -> usuarioInsert_id = 1;
		$clienteInstance -> save();
		return Redirect::action('ClienteController@show', array($clienteInstance -> id));

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id) {
		echo json_encode($id);
		$clienteInstance = Cliente::find($id);

		//echo json_encode($clienteInstance);
		return View::make('cliente.show', array('clienteInstance' => $clienteInstance));

	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id) {
		//
		$clienteInstance = Cliente::find($id);

		if (is_null($clienteInstance)) {
			return "No existe!";
		} else {
			return View::make('cliente/edit') -> with('clienteInstance', $clienteInstance);
		}
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id) {

		$clienteInstance = Cliente::find($id);
		if (is_null($clienteInstance)) {
			return "No existe!";
		} else {
			$data = Input::all();
			$clienteInstance -> fill($data);
			$clienteInstance -> save();
			return Redirect::action('ClienteController@show', array($clienteInstance -> id));
		}
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id) {
		if (Cliente::destroy($id)) {
			//return Redirect::route('medidaLlanta.index',array('datos'=> json_encode(array('id' => $id, 'exito' => true, 'msg' => 'Se borro :' . $id))));// -> with;
			return Redirect::route('cliente.index');
		} else {
			echo "No se logro borrar";
		}

	}
	public function getFlotillas($id) {
		
		$clienteInstance = Cliente::find($id);
		if (is_null($clienteInstance)) {
			return "No existe!";
		} else {
			$flotillas=$clienteInstance->flotillas;
			//return Redirect::action('ClienteController@show', array($clienteInstance -> id));
		}
	}

}
