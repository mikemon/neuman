<?php
class OperadorController extends BaseController {
 
    /**
     * Mustra la lista con todos los operadores
     */
    public function index()
    {
	//echo "Ok";
	
        $listaOperador  = Operador::all();
       
        
       return View::make('operadores.index', array('listaOperador' => $listaOperador ));
	}
	
	/**
     * Muestra formulario para crear Operador
     */
    public function create()
    {
        return View::make('operadores.create');
    }
 
 
    /**
     * Crear el operador nuevo
     */
    public function store()
    {
    	echo json_encode($_POST);
    		
    	
        Operador::create(Input::all());
    // el método create nos permite crear un nuevo operador en la base de datos, este método es proporcionado por Laravel
    // create recibe como parámetro un arreglo con datos de un modelo y los inserta automáticamente en la base de datos
    // en este caso el arreglo es la información que viene desde un formulario y la obtenemos con el metido Input::all()
 
        return Redirect::to('operador');
    // el método redirect nos devuelve a la ruta de mostrar la lista de los operadors
 
    }
	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id) {
		//
		$operadorInstance = Operador::find($id);

		if (is_null($operadorInstance)) {
			return "No existe!";
		} else {
			return View::make('operadores/edit') -> with('operadorInstance', $operadorInstance);
		}
	}
	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id) {

		$operadorInstance = Operador::find($id);
		if (is_null($operadorInstance)) {
			return "No existe!";
		} else {
			$data = Input::all();
			$operadorInstance -> fill($data);
			$operadorInstance -> save();
			return Redirect::action('OperadorController@show', array($operadorInstance -> id));
		}
	}
 
     /**
     * Ver operador con id
     */
    public function show($id)
    {
    // en este método podemos observar como se recibe un parámetro llamado id
    // este es el id del operador que se desea buscar y se debe declarar en la ruta como un parámetro
    
        $operadorInstance = Operador::find($id);
        // para buscar al operador utilizamos el metido find que nos proporciona Laravel
        // este método devuelve un objete con toda la información que contiene un operador
    return View::make('operadores.show', array('operadorInstance' => $operadorInstance));
    }
	
	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id) {
		if (Operador::destroy($id)) {
			//return Redirect::route('medidaLlanta.index',array('datos'=> json_encode(array('id' => $id, 'exito' => true, 'msg' => 'Se borro :' . $id))));// -> with;
			return Redirect::route('opedador.index');
		} else {
			echo "No se logro borrar";
		}

	}
 
}
?>