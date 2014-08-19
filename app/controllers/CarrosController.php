<?php
class CarrosController extends BaseController {

	public function CarrosController()
	{
		echo "init";
	}
    /**
     * Muestra la lista con todos los carros
     */
    public function index()
    {
        $listaCarro = Carro::all();
        return View::make('carros.index', array('listaCarro' => $listaCarro));
    }
 
 
    /**
     * Muestra formulario para crear Carro
     */
    public function create()
    {
    	$tipoCarroList=TipoCarro::all();
        return View::make('carros.crear',array('tipoCarroList'=>$tipoCarroList));
    }
 
    /**
     * Crear el carro nuevo
     */
    public function store()
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
    public function show($id)
    {
    // en este método podemos observar como se recibe un parámetro llamado id
    // este es el id del carro que se desea buscar y se debe declarar en la ruta como un parámetro
    
        $carro = Carro::find($id);
        // para buscar al carro utilizamos el metido find que nos proporciona Laravel
        // este método devuelve un objete con toda la información que contiene un carro
    
    return View::make('carros.show', array('carro' => $carro));
    }
	
		/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id) {
		//
		$tipoCarroList=TipoCarro::all();       
		$carro = Carro::find($id);
		$tipoCarroInstance=TipoCarro::find($carro->tipoCarro_id);
		if (is_null($carro)) {
			return "No existe!";
		} else {
			return View::make('carros/edit', array('carro' => $carro,'tipoCarroList'=>$tipoCarroList,'tipoCarro_id'=>$carro->tipoCarro_id));// -> with('carro', $carro);
		}
	}
	
	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id) {

		$carroInstance = Carro::find($id);
		if (is_null($carroInstance)) {
			return "No existe!";
		} else {
			$data = Input::all();
			$carroInstance -> fill($data);
			$carroInstance -> save();
			return Redirect::action('CarrosController@show', array($carroInstance -> id));
		}
	}
	
	
	public function getComprobantesPagos($id)
	{
			$carro = Carro::find($id);
			echo json_encode($carro->registroComprobantePagos);
	}
 
}
?>