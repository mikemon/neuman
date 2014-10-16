<?php
class PrecioCombustibleController extends BaseController {
 
    /**
     * Mustra la lista con todos los precioCombustible
     */
    public function index()
    {
	//echo "Ok";
	
        $listaPrecioCombustible  = PrecioCombustible::all();
       return View::make('precioCombustible.index', array('listaPrecioCombustible' => $listaPrecioCombustible ));
	}
	
	/**
     * Muestra formulario para crear PrecioCombustible
     */
    public function create()
    {
        return View::make('precioCombustible.create');
    }
 
 
    /**
     * Crear el precioCombustible nuevo
     */
    public function store() {
			
		$input = Input::all();
		$precioCombustibleInstance = new PrecioCombustible();
		$precioCombustibleInstance ->descripcion=$input['descripcion'];
		$precioCombustibleInstance ->precio=$input['precio'];
		$precioCombustibleInstance -> usuarioInsert_id = 1;
		$precioCombustibleInstance -> save();
		return Redirect::action('PrecioCombustibleController@show', array($precioCombustibleInstance  -> id));

	}
	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id) {
		//
		$precioCombustibleInstance = PrecioCombustible::find($id);

		if (is_null($precioCombustibleInstance)) {
			return "No existe!";
		} else {
			return View::make('precioCombustible/edit') -> with('precioCombustibleInstance', $precioCombustibleInstance);
		}
	}
	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id) {

		$precioCombustibleInstance = PrecioCombustible::find($id);
		if (is_null($precioCombustibleInstance)) {
			return "No existe!";
		} else {
			$data = Input::all();
			$precioCombustibleInstance -> fill($data);
			$precioCombustibleInstance -> save();
			return Redirect::action('PrecioCombustibleController@show', array($precioCombustibleInstance -> id));
		}
	}
 
     /**
     * Ver precioCombustible con id
     */
    public function show($id)
    {
    // en este método podemos observar como se recibe un parámetro llamado id
    // este es el id del precioCombustible que se desea buscar y se debe declarar en la ruta como un parámetro
    
        $precioCombustibleInstance = PrecioCombustible::find($id);
		//echo json_encode($precioCombustibleInstance);
    	return View::make('precioCombustible.show', array('precioCombustibleInstance' => $precioCombustibleInstance));
    }
	
	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id) {
		if (PrecioCombustible::destroy($id)) {
			//return Redirect::route('medidaLlanta.index',array('datos'=> json_encode(array('id' => $id, 'exito' => true, 'msg' => 'Se borro :' . $id))));// -> with;
			return Redirect::route('precioCombustible.index');
		} else {
			echo "No se logro borrar";
		}

	}
 
}
?>