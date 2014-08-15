<?php
class OperadoresController extends BaseController {
 
    /**
     * Mustra la lista con todos los operadores
     */
    public function mostrarOperadores()
    {
	//echo "Ok";
	
        $operadores = Operador::all();
       
        
       return View::make('operadores.lista', array('operadores' => $operadores));
	}
	
	/**
     * Muestra formulario para crear Operador
     */
    public function nuevoOperador()
    {
        return View::make('operadores.crear');
    }
 
 
    /**
     * Crear el operador nuevo
     */
    public function crearOperador()
    {
    	echo json_encode($_POST);
    		
    	
        Operador::create(Input::all());
    // el método create nos permite crear un nuevo operador en la base de datos, este método es proporcionado por Laravel
    // create recibe como parámetro un arreglo con datos de un modelo y los inserta automáticamente en la base de datos
    // en este caso el arreglo es la información que viene desde un formulario y la obtenemos con el metido Input::all()
 
        return Redirect::to('operadores');
    // el método redirect nos devuelve a la ruta de mostrar la lista de los operadors
 
    }
 
     /**
     * Ver operador con id
     */
    public function verOperador($id)
    {
    // en este método podemos observar como se recibe un parámetro llamado id
    // este es el id del operador que se desea buscar y se debe declarar en la ruta como un parámetro
    
        $operador = Operador::find($id);
        // para buscar al operador utilizamos el metido find que nos proporciona Laravel
        // este método devuelve un objete con toda la información que contiene un operador
    
    return View::make('operadores.ver', array('operador' => $operador));
    }
 
}
?>