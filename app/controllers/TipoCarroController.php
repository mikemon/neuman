<?php

class TipoCarroController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index() {
		
		//echo "estoy en index";
		$listaTipoCarro = TipoCarro::all();
		return View::make('tipoCarro.index', array('listaTipoCarro' => $listaTipoCarro));

	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create() {
		
		return View::make('tipoCarro.create');
		

	}
	
	public function getEsquema($id) {
		//echo "entro";
		//exit;
		$tipoCarroInstance=TipoCarro::find($id);
		if($tipoCarroInstance)
		return View::make('carros.esquemachasis.'.$tipoCarroInstance->layoutChasis);
		else {
			return null;
		}
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store() {
		echo "holaa";
		$input = Input::all();
		$tipoCarroInstance = new TipoCarro();
		$tipoCarroInstance -> descripcion = $input['descripcion'];
		$tipoCarroInstance -> layoutChasis = $input['layoutChasis'];
		$tipoCarroInstance -> usuarioInsert_id = 1;
		$tipoCarroInstance -> save();
		return Redirect::action('TipoCarroController@show', array($tipoCarroInstance -> id));

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id) {
		echo json_encode($id);
		$tipoCarroInstance = TipoCarro::find($id);

		//echo json_encode($tipoCarroInstance);
		return View::make('tipoCarro.show', array('tipoCarroInstance' => $tipoCarroInstance));

	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id) {
		//
		$tipoCarro = TipoCarro::find($id);
	
		if (is_null($tipoCarro)) {
			return "No existe!";
		} else {
			
			$listaPrecioCombustible=PrecioCombustible::all();
			
			//return View::make('tipoCarro/edit') -> with('tipoCarro', $tipoCarro);
			
			return View::make('tipoCarro/edit', array('tipoCarro' => $tipoCarro,'listaPrecioCombustible'=>$listaPrecioCombustible));// -> with('carro', $carro);
			
		}
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id) {

		$tipoCarroInstance = TipoCarro::find($id);
		if (is_null($tipoCarroInstance)) {
			return "No existe!";
		} else {
			$data = Input::all();
			$tipoCarroInstance -> fill($data);
			$tipoCarroInstance -> save();
			return Redirect::action('TipoCarroController@show', array($tipoCarroInstance -> id));
		}
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id) {
		if (TipoCarro::destroy($id)) {
			//return Redirect::route('medidaLlanta.index',array('datos'=> json_encode(array('id' => $id, 'exito' => true, 'msg' => 'Se borro :' . $id))));// -> with;
			return Redirect::route('tipoCarro.index');
		} else {
			echo "No se logro borrar";
		}

	}

}
