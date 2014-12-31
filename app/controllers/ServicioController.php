<?php

class ServicioController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index() {

		//echo "estoy en index";
		$listaServicio = servicio::all();
		return View::make('servicio.index', array('listaServicio' => $listaServicio));

	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create() {
		$clientes = Cliente::all();

		return View::make('servicio.create', array('clientes' => $clientes));

	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store() {

		$input = Input::all();
		$servicioInstance = new Servicio();
		$servicioInstance -> cliente_id = $input['cliente_id'];
		$servicioInstance -> nombre = $input['nombre'];
		$servicioInstance -> usuarioInsert_id = 1;
		$servicioInstance -> save();
		return Redirect::action('ServicioController@show', array($servicioInstance -> id));

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id) {
		$servicioInstance = Servicio::find($id);

		//echo json_encode($servicioInstance);
		return View::make('servicio.show', array('servicioInstance' => $servicioInstance));

	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id) {
		//
		$servicioInstance = Servicio::find($id);

		$clientes = Cliente::all();
		if (is_null($servicioInstance)) {
			return "No existe!";
		} else {
			return View::make('servicio.edit', array('servicioInstance' => $servicioInstance, 'clientes' => $clientes));
		}
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id) {

		$servicioInstance = Servicio::find($id);
		if (is_null($servicioInstance)) {
			return "No existe!";
		} else {
			$data = Input::all();
			$servicioInstance -> fill($data);
			$servicioInstance -> save();
			return Redirect::action('ServicioController@show', array($servicioInstance -> id));
		}
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id) {
		if (Servicio::destroy($id)) {
			return Redirect::route('servicio.index');
		} else {
			echo "No se logro borrar";
		}

	}

	public function findDepartamento($text=null)
	{
		$text= $text;
		$resultado = DB::select('SELECT id,descripcion,"departamentoDepende_id" 
		FROM departamento 
		WHERE descripcion like ?', array("%".strtoupper ($text)."%"));
		echo json_encode($resultado);
		 		 
	}
	
	public function findSubDepartamento($departamento_id,$text=null)
	{
		$text= $text;
		$resultado = DB::select('SELECT id,descripcion,"departamentoDepende_id" 
		FROM departamento 
		WHERE descripcion like ? and "departamentoDepende_id"= ?', array("%".strtoupper($text)."%",$departamento_id));
		
		echo json_encode($resultado);		 		 
	}
	
	public function findServicio($text=null)
	{
		$text= $text;
		$resultado = DB::select('SELECT * FROM servicio 
		WHERE codigo like ? or  descripcion like ?', array("%".strtoupper($text)."%","%".strtoupper($text)."%"));
		echo json_encode($resultado);		 		 
	}

	public function importServiciosXls() {

		$path = 'CODIGO_SERVICIOS.xlsx';
		$datos = null;
		$datos = Excel::load($path, function($reader) {
			$results = $reader -> get();
			$results = $reader -> all();
			return $results;
		});

		echo $datos->parsed;
		exit;
		$cntInport = 0;
		$cntNoImport = 0;
		//{"codigo":"SERAC0001","concepto":"ACOMPLETAR","descripcion":"AIRE DE LLANTAS EN GENERAL","tipo_servicio":"INTERNO",
		//"departamento":"NEUMATICOS","sub_departamento":"CALIBRAR AIRE A LLANTAS","proveedor_del_servicio":"TALLER","8":null}
		foreach ($datos->parsed as $key => $row) {
			//echo $row->proveedor_del_servicio;
			$proveedorInstance = Proveedor::whereNombre(trim($row -> proveedor_del_servicio)) -> first();
			if (!($proveedorInstance)) {
				$proveedorInstance = new Proveedor;
				$proveedorInstance -> nombre = trim($row -> proveedor_del_servicio);
				$proveedorInstance -> save();
			} else {
				$proveedorInstance = $proveedorInstance;
			}

			$departamentoInstance = Departamento::whereDescripcion(trim($row -> departamento)) -> first();
			if (!($departamentoInstance)) {
				$departamentoInstance = new Departamento;
				$departamentoInstance -> descripcion = trim($row -> departamento);
				$departamentoInstance -> save();
			} else {
				$departamentoInstance = $departamentoInstance;
			}

			$subDepartamentoInstance = Departamento::where('descripcion', '=', trim($row -> sub_departamento)) 
			-> where('departamentoDepende_id', '=', (trim($departamentoInstance -> id))) -> first();
			
			if (!($subDepartamentoInstance)) {
				$subDepartamentoInstance = new Departamento;
				$subDepartamentoInstance -> descripcion = trim($row -> sub_departamento);
				$subDepartamentoInstance -> departamentoDepende_id = $departamentoInstance -> id;
				$subDepartamentoInstance -> save();
			} else {
				$subDepartamentoInstance = $subDepartamentoInstance;
			}

			$tipoServicioInstance = TipoServicio::whereDescripcion(trim($row -> tipo_servicio)) -> first();
			if (!($tipoServicioInstance)) {
				$tipoServicioInstance = new TipoServicio;
				$tipoServicioInstance -> descripcion = trim($row -> tipo_servicio);
				$tipoServicioInstance -> save();
			} else {
				$tipoServicioInstance = $tipoServicioInstance;
			}

			$servicioIntance = Servicio::where('codigo', '=', trim($row -> codigo)) 
			-> where('descripcion', '=', $row -> descripcion) 
			-> where('departamento_id', '=', $departamentoInstance -> id) 
			-> where('tipoServicio_id', '=', $tipoServicioInstance -> id) 
			-> where('proveedor_id', '=', $proveedorInstance -> id) -> first();

			if (!($servicioIntance)) {
				$servicioIntance = new Servicio;
				$servicioIntance -> descripcion = trim($row -> descripcion);
				$servicioIntance -> departamento_id = $subDepartamentoInstance -> id;
				$servicioIntance -> tipoServicio_id = $tipoServicioInstance -> id;
				$servicioIntance -> proveedor_id = $proveedorInstance -> id;
				$servicioIntance -> codigo = $row -> codigo;
				$servicioIntance -> save();
				$cntInport++;
			} else {
				$cntNoImport++;
			}
			echo "<br>";
		}
		echo "Insertados:" . $cntInport;
		echo "<br>";
		echo "iNo Insertados:" . $cntNoImport;
		return "ok";
	}

}
