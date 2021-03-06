<?php

Route::get('/', function() {
	return Redirect::to('home');
});
Route::get('usuarios', array('uses' => 'UsuariosController@mostrarUsuarios'));

Route::get('usuarios/nuevo', array('uses' => 'UsuariosController@nuevoUsuario'));

Route::post('usuarios/crear', array('uses' => 'UsuariosController@crearUsuario'));
// esta ruta es a la cual apunta el formulario donde se introduce la información del usuario
// como podemos observar es para recibir peticiones POST

Route::get('usuarios/{id}', array('uses' => 'UsuariosController@verUsuario'));
// esta ruta contiene un parámetro llamado {id}, que sirve para indicar el id del usuario que deseamos buscar
// este parámetro es pasado al controlador, podemos colocar todos los parámetros que necesitemos
// solo hay que tomar en cuenta que los parámetros van entre llaves {}
// si el parámetro es opcional se colocar un signo de interrogación {parámetro?}

/*|------------------------OPERADORES***-----*/
/*flotilla*/
Route::resource('operador', 'OperadorController');
/*-----------------------------------------|*/

/*|------------------------CARROS***--------*/
Route::resource('carros', 'CarrosController');
Route::get('carros/getComprobantesForIdCarro/{id}', array('uses' => 'CarrosController@getComprobantesPagos'));
Route::get('getDatoRendimientoActivo/{id}', array('uses' => 'CarrosController@getDatoRendimientoActivo'));
Route::post('findCarroByText', array('uses' => 'CarrosController@findCarro'));
Route::get('getPrecioCombustible/{id}', array('uses' => 'CarrosController@getPrecioCombustibleForId'));

/*-----------------------------------------|*/

/*|------------------------TIPOCOMPROBANTE----------*/
Route::get('tipoComprobante', array('uses' => 'tipoComprobanteController@mostrarTipoComprobante'));
Route::get('tipoComprobante/nuevo', array('uses' => 'tipoComprobanteController@nuevoTipoComprobante'));
Route::post('tipoComprobante/crear', array('uses' => 'tipoComprobanteController@crear'));
Route::get('tipoComprobante/show/{id}', array('uses' => 'tipoComprobanteController@verTipoComprobante'));
Route::get('tipoComprobante/edit/{id}', array('uses' => 'tipoComprobanteController@editarTipoComprobante'));
Route::resource('tipoComprobante', 'TipoComprobanteController', array('only' => array('update')));
Route::get('tipoComprobante/delete/{id}', array('uses' => 'tipoComprobanteController@borrarTipoComprobante'));

/*---------------------------------------------------------|*/

/*------------------------REGISTROCOMPROBANTEPAGO----------*/
Route::get('registroComprobantePago', array('uses' => 'registroComprobantePagoController@mostrarRegistroComprobantePago'));
Route::get('registroComprobantePago/nuevo', array('uses' => 'registroComprobantePagoController@nuevoRegistroComprobantePago'));
//**AUTOMATICOS**/Route::resource('registroComprobantePago', 'RegistroComprobantePagoController',array('only' => array('update','store')));
Route::post('registroComprobantePago/crear', array('uses' => 'registroComprobantePagoController@crear'));
Route::get('registroComprobantePago/show/{id}', array('uses' => 'registroComprobantePagoController@show'));
Route::get('registroComprobantePago/edit/{id}', array('uses' => 'registroComprobantePagoController@editarRegistroComprobantePago'));
Route::resource('registroComprobantePago', 'registroComprobantePagoController', array('only' => array('update')));
Route::get('registroComprobantePago/delete/{id}', array('uses' => 'registroComprobantePagoController@borrarTipoComprobante'));
/*---------------------------------------------------------|*/

Route::get('home', array('as' => 'home', function() {
	return View::make('pages.home');
}));

Route::get('about', function() {
	return View::make('pages.about');
});

Route::get('projects', function() {
	return View::make('pages.projects');
});
Route::get('contact', function() {
	return View::make('pages.contact');
});

/*medidaLLanta*/
Route::resource('medidaLlanta', 'MedidaLlantaController');
/*******/
/*marcaLLanta*/
Route::resource('marcaLlanta', 'MarcaLlantaController');

/*******/
/*asiganacionCarro*/
Route::resource('asignacionCarro', 'AsignacionCarroController');
/*******/
/*tipoCarro*/
Route::get('tipoCarro/getEsquemaForId/{id}', array('uses' => 'TipoCarroController@getEsquema'));
Route::resource('tipoCarro', 'TipoCarroController');

/*******/
/*cliente*/
Route::resource('cliente', 'ClienteController');
Route::get('findClienteByText/{text}', array('uses' => 'ClienteController@findCliente'));

Route::get('cliente/getFlotillas/{id}', array('uses' => 'ClienteController@getFlotillas'));

/*******/

/*flotilla*/
Route::resource('flotilla', 'FlotillaController');

/*******/

/*ordenServicio*/
Route::resource('ordenServicio', 'OrdenServicioController', array('only' => array('index', 'edit', 'create', 'update', 'store', 'destroy')));
Route::get('ordenServicio/show/{id}', array('uses' => 'OrdenServicioController@show'));
//Route::get('ordenServicio/delete/{id}', array('uses' => 'OrdenServicioController@destroy'));
Route::post('ordenServicio/addProducto', array('uses' => 'OrdenServicioController@addProductoInOrder'));
Route::post('ordenServicio/addServicio', array('uses' => 'OrdenServicioController@addServicioInOrder'));
Route::post('ordenServicio/getServiciosAndProductos', array('uses' => 'OrdenServicioController@getServiciosAndProductosOrden'));
Route::post('ordenServicio/deleteServiciosInOrden', array('uses' => 'OrdenServicioController@deleteServiciosInOrden'));
Route::post('ordenServicio/deleteProductoInOrden', array('uses' => 'OrdenServicioController@deleteProductoInOrden'));
Route::get('ordenServicio/aplicarOrden', array('uses' => 'OrdenServicioController@aplicarOrden'));

/*Servicio*/
Route::get('findDepartamentoByText/{text}', array('uses' => 'ServicioController@findDepartamento'));
Route::get('findSubDepartamentoByText/{departamento_id}/{text}', array('uses' => 'ServicioController@findSubDepartamento'));
Route::get('findServicioByText/{departamento_id}/{text}', array('uses' => 'ServicioController@findServicio'));
/*******/

/*flotilla*/
Route::resource('precioCombustible', 'PrecioCombustibleController');

/*******/

/*Importar de xls*/
Route::get('import/servicios', array('uses' => 'ServicioController@importServiciosXls'));

/*****************/
/*Reportes*/
Route::get('reportes/comprobantes', array('uses' => 'ReportesController@comprobantes'));
Route::post('reportes/consultaComprobantes', array('uses' => 'ReportesController@reporteComprobantes'));
/***/

Route::get("firebird", function() {
	$clientes = DB::connection('firebird') -> select("select * from maecte");
	//var_dump($users);
	foreach ($clientes as $value) {
		echo $value -> NUMCTE . " " . $value -> NOMCTE . "<br>";
	}
});

Route::get("tester", function() {
	//echo "ok";
	$maealmInstance = Maealm::where('NUMALM', '=', "'01'") -> where('NUMART', '=', "'PHM70802'") -> select('*') -> get();
	print_r($maealmInstance);
	exit ;
	foreach ($maealmInstance as $key => $value) {
		echo $value -> NUMART . " -- " . $value -> NUMALM . " -- " . $value -> EXUALM . "<br>";
	}
});
Route::post('visor/getProductos', array('as' => 'getListProductos', function() {
	$result = Configuracion::whereVariable('numPrecioEnOrden') -> first();
	if ($result) {
		$numprecio = $result -> valor;
	} else {
		echo "No se ha configurado el numero de precio en Ordenes de servicio";
		exit ;
	}

	$result = Configuracion::whereVariable('almacenProductos') -> first();
	if ($result) {
		$almacenProductos = $result -> valor;
	} else {
		echo "No se ha configurado el numero de Almacen
		 en Ordenes de servicio";
		exit ;
	}

	$sql = "SELECT MAEART.NUMART, MAEART.NOMART, PRECIOS.PRECIO, MAEALM.exualm,maealm.apaalm
	FROM ARTPRECIO
	JOIN PRECIOS ON ARTPRECIO.NUMPRECIO = PRECIOS.NUMPRECIO
	LEFT JOIN MAEART ON ARTPRECIO.NUMART = MAEART.NUMART
	INNER JOIN maealm ON (MAEALM.numart=MAEART.NUMART AND maealm.numalm='" . $almacenProductos . "')
	WHERE ARTPRECIO.NOPRECIO =" . $numprecio . " ORDER BY  MAEART.NUMART asc";

	$productos = DB::connection('firebird') -> select($sql);
	//print_r($productos);
	//var_dump($users);
	echo '<table  class="display" id="tableProductos">';
	echo '<thead>';
	echo '<tr>';
	echo '<th>CODIGO</th><th>NOMBRE</th><td>EXISTENCIA</th><td>APARTADO</th><td>DISPONIBLE</th><td>PRECIO</th><td>Opcion</th>';
	echo "</tr>";
	echo '</thead>';
	$cnt = 0;
	foreach ($productos as $value) {
		$disponible = round(($value -> EXUALM - $value -> APAALM), 2);
		echo '<tr class="rowArt" id="' . $value -> NUMART . '">';
		echo '<td>' . $value -> NUMART . '</td><td>' . $value -> NOMART . '</td><td>' . round($value -> EXUALM, 2) . '</td><td>' . round($value -> APAALM, 2) . '</td><td>' . $disponible . '</td><td>' . round($value -> PRECIO, 2) . '</td>';
		echo '<td>' . (($disponible > 0) ? '<a id="pro_' . ($cnt++) . '" class="addProducto" rel="' . $value -> NUMART . '|-|' . $value -> NOMART . '|-|' . round($value -> PRECIO, 2) . '|-|' . $disponible . '"><span class="glyphicon glyphicon-plus-sign" aria-hidden="true" ></span></a>' : '') . '</td>';
		echo "</tr>";
	}
	echo "</table>";
	echo "<script>";
	echo "$('.ui-state-default').hover(function() {";
	echo "$(this).addClass('ui-state-hover');";
	echo "}, function() {";
	echo "$(this).removeClass('ui-state-hover');";
	echo "});";
	echo "tableMac('#tableProductos');";
	echo "</script>";
}));

Route::get("getExistencia", function() {

	/*$maealmInstance=Maealm::all();
	 foreach ($maealmInstance as $key => $value) {
	 echo $value -> NUMART . " -- " . $value -> NUMALM . "<br>";
	 }
	 */
	$input = Input::all();
	$numart = $input['NUMART'];
	$maealmInstance = new Maealm();
	$aExixtencia = $maealmInstance -> getExistencia($numart);
	if ($aExixtencia) {
		return json_encode($aExixtencia);
	} else {
		return null;
	}

});

//Route::get("getDifFecha", function() {
Route::get('service/getDifFecha', array('as' => 'getDifFecha', function() {

	$input = Input::all();

	$fechaIn = $input['fecha'];
	$fechaActual = date('Y-m-d H:i:s');

	$datetime1 = new DateTime($fechaActual);
	//DateTime('2009-10-11');
	$datetime2 = new DateTime($fechaIn);
	//DateTime('2009-10-13');
	$interval = $datetime1 -> diff($datetime2);

	echo json_encode(array("diaActual" => (($datetime1 -> format('Y-m-d') == $datetime2 -> format('Y-m-d')) ? true : false), "fechaActual" => $fechaActual, "diferencia" => array("valor" => $interval -> format('%R%'), "datos" => $interval)));
}));

Route::post('service/getHistorialRendimiento', array('as' => 'getHistorialRendimiento', function() {

	//echo $id;//json_encode($input);
	//exit;
	$input = Input::all();
	$id = $input['id'];
	$carroInstance = Carro::find($id);
	//echo json_encode($carroInstance);
	//Carro::orderBy('id', 'asc')
	$registros = $carroInstance -> registroComprobantePagos('fechaComprobante', 'asc') -> get();
	//print_r($registros);
	//exit;
	echo '<table  class="display" id="tableProductos">';

	echo '<thead>';
	echo '<tr>';
	echo '<th>id</th><th>Descripcion</th><td>fecha hora</th><td>kmInicial</th><td>kmFinal</th><td>Rendimiento</th><td>Observacion</th>';
	echo "</tr>";
	echo '</thead>';

	foreach ($registros as $registroComprobante) {
		echo "<tr>";

		$fecha = new DateTime($registroComprobante -> fechaComprobante);

		echo "<td>" . $registroComprobante -> id . "</td>" . "<td>" . $registroComprobante -> descripcion . "</td>" . "<td>" . $fecha -> format('d-m-Y H:i:s') . "</td>" . "<td>" . $registroComprobante -> datoRendimiento -> kmInicial . "</td>" . "<td>" . $registroComprobante -> datoRendimiento -> kmFinal . "</td>" . "<td>" . $registroComprobante -> datoRendimiento -> odometro . "</td>" . "<td>" . $registroComprobante -> datoRendimiento -> observacion . "</td>";
		//fechaComprobante", d."",d."",d.,d.activo,d.,r.descripcion

		echo "</tr>";
	}
	echo "</table>";
	echo "<script>";
	echo "$('.ui-state-default').hover(function() {";
	echo "$(this).addClass('ui-state-hover');";
	echo "}, function() {";
	echo "$(this).removeClass('ui-state-hover');";
	echo "});";
	echo "";
	echo "</script>";
}));

Route::get('reportes/ordenServicio', array('as' => 'getOrdenServicio', function() {
	$listOrdenes = OrdenServicio::all();
	echo "<table border ='1'>";
	echo "<tr>";
	echo "<th>fecha</th>";
	echo "<th>folio</th>";
	echo "<th>kilometraje</th>";
	echo "<th>carro(numEmo)</th>";
	echo "<th>Operador</th>";
	echo "<th>descripcion de servicio</th>";

	echo "</tr>";
	foreach ($listOrdenes as $ordenServicioInstance) {
		echo "<tr>";

		echo "<td>" . $ordenServicioInstance -> fingreso . "</td>";
		echo "<td>" . $ordenServicioInstance -> folio . "</td>";
		echo "<td>" . $ordenServicioInstance -> kmFinal . "</td>";
		echo "<td>" . @$ordenServicioInstance -> carro -> noEconomico . "</td>";
		echo "<td>" . @$ordenServicioInstance -> carro -> id . "</td>";
		echo "<td>" . $ordenServicioInstance -> fallaReportada . "</td>";
		echo "</tr>";
	}

	echo "</table>";
}));

Route::post('getOperadoresByCarro', array('as' => 'getOperadoresByCarro', function() {
	$input = Input::all();
	$id = $input['id'];
	$carroInstance = Carro::find($id);
	$listAsignacionCarro= $carroInstance -> asignacionesCarro;
	
	echo '<option selected="" value="-1">Seleccionar operador...</option>';
	foreach ($listAsignacionCarro as $asignacionCarroInstance) {
		//echo $operadorInstance;
		echo '<option value="'.$asignacionCarroInstance->operador->id.'">'.$asignacionCarroInstance->operador->nombre.' '.$asignacionCarroInstance->operador->apellidos.'</option>';	
	}
	
}));
