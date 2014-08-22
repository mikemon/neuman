<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('hello');
});
Route::get('usuarios', array('uses' => 'UsuariosController@mostrarUsuarios'));
 
Route::get('usuarios/nuevo', array('uses' => 'UsuariosController@nuevoUsuario'));
 
Route::post('usuarios/crear', array('uses' => 'UsuariosController@crearUsuario'));
// esta ruta es a la cual apunta el formulario donde se introduce la información del usuario
// como podemos observar es para recibir peticiones POST
 
Route::get('usuarios/{id}', array('uses'=>'UsuariosController@verUsuario'));
// esta ruta contiene un parámetro llamado {id}, que sirve para indicar el id del usuario que deseamos buscar
// este parámetro es pasado al controlador, podemos colocar todos los parámetros que necesitemos
// solo hay que tomar en cuenta que los parámetros van entre llaves {}
// si el parámetro es opcional se colocar un signo de interrogación {parámetro?}


/*|------------------------OPERADORES***-----*/
/*flotilla*/
Route::resource('operador', 'OperadorController');

/*******/
/*-----------------------------------------|*/

/*|------------------------CARROS***--------*/
/*
Route::get('carros/', array('uses' => 'CarrosController@mostrarCarros'));
Route::get('carros/nuevo', array('uses' => 'CarrosController@nuevoCarro'));
Route::post('carros/crear', array('uses' => 'CarrosController@crearCarro'));
Route::get('carros/{id}', array('uses'=>'CarrosController@verCarro'));
*/
Route::resource('carros', 'CarrosController');
Route::get('carros/getComprobantesForIdCarro/{id}', array('uses'=>'CarrosController@getComprobantesPagos'));
/*-----------------------------------------|*/

/*|------------------------TIPOCOMPROBANTE----------*/
Route::get('tipoComprobante', array('uses' => 'tipoComprobanteController@mostrarTipoComprobante'));
Route::get('tipoComprobante/nuevo', array('uses' => 'tipoComprobanteController@nuevoTipoComprobante'));
Route::post('tipoComprobante/crear', array('uses' => 'tipoComprobanteController@crear'));
Route::get('tipoComprobante/show/{id}', array('uses'=>'tipoComprobanteController@verTipoComprobante'));
Route::get('tipoComprobante/edit/{id}', array('uses' => 'tipoComprobanteController@editarTipoComprobante'));
Route::resource('tipoComprobante', 'TipoComprobanteController',array('only' => array('update')));

Route::get('tipoComprobante/delete/{id}', array('uses' => 'tipoComprobanteController@borrarTipoComprobante'));

/*---------------------------------------------------------|*/
/*|------------------------REGISTROCOMPROBANTEPAGO----------*/
Route::get('registroComprobantePago', array('uses' => 'registroComprobantePagoController@mostrarRegistroComprobantePago'));
Route::get('registroComprobantePago/nuevo', array('uses' => 'registroComprobantePagoController@nuevoRegistroComprobantePago'));
//**AUTOMATICOS**/Route::resource('registroComprobantePago', 'RegistroComprobantePagoController',array('only' => array('update','store')));
Route::post('registroComprobantePago/crear', array('uses' => 'registroComprobantePagoController@crear'));
Route::get('registroComprobantePago/show/{id}', array('uses'=>'registroComprobantePagoController@show'));
Route::get('registroComprobantePago/edit/{id}', array('uses' => 'registroComprobantePagoController@editarTipoComprobante'));
Route::get('registroComprobantePago/delete/{id}', array('uses' => 'registroComprobantePagoController@borrarTipoComprobante'));

//Route::resource('registroComprobantePago', 'RegistroComprobantePagoController');
/*---------------------------------------------------------|*/


Route::get('home', array('as' => 'home',function()
{
	return View::make('pages.home');
}));

Route::get('about', function()
{
	return View::make('pages.about');
});

Route::get('projects', function()
{
	return View::make('pages.projects');
});
Route::get('contact', function()
{
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
Route::get('tipoCarro/getEsquemaForId/{id}', array('uses'=>'TipoCarroController@getEsquema'));
Route::resource('tipoCarro', 'TipoCarroController');

/*******/
/*cliente*/
Route::resource('cliente', 'ClienteController');

/*******/

/*flotilla*/
Route::resource('flotilla', 'FlotillaController');

/*******/
