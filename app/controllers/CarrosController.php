<?php
class CarrosController extends BaseController {

	public function CarrosController()
	{
		echo "init";
	}
    /**
     * Muestra la lista con todos los carros
     */
    public function mostrarCarros()
    {
        $carros = Carro::all();
        return View::make('carros.lista', array('carros' => $carros));
    }
 
 
    /**
     * Muestra formulario para crear Carro
     */
    public function nuevoCarro()
    {
        return View::make('carros.crear');
    }
 
    /**
     * Crear el carro nuevo
     */
    public function crearCarro()
    {
        Carro::create(Input::all());
    // el método create nos permite crear un nuevo carro en la base de datos, este método es proporcionado por Laravel
    // create recibe como parámetro un arreglo con datos de un modelo y los inserta automáticamente en la base de datos
    // en este caso el arreglo es la información que viene desde un formulario y la obtenemos con el metido Input::all()
 
        return Redirect::to('carros');
    // el método redirect nos devuelve a la ruta de mostrar la lista de los carros
 
    }
 
     /**
     * Ver carro con id
     */
    public function verCarro($id)
    {
    // en este método podemos observar como se recibe un parámetro llamado id
    // este es el id del carro que se desea buscar y se debe declarar en la ruta como un parámetro
    
        $carro = Carro::find($id);
        // para buscar al carro utilizamos el metido find que nos proporciona Laravel
        // este método devuelve un objete con toda la información que contiene un carro
    
    return View::make('carros.ver', array('carro' => $carro));
    }
	
	public function getComprobantesPagos($id)
	{
			$carro = Carro::find($id);
			echo json_encode($carro->registroComprobantePagos);
	}
 
}
?>