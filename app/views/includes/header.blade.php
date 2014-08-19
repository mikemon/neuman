
<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
	<div class="container">
		<ul class="nav navbar-nav">
			@section('home')
			<li>
				<a href="{{URL::route('home');}}">Inicio</a>
			</li>
			@show
			@section('carros')
			<li>
				<a href="{{ action('CarrosController@index', null )}}">Carros</a>
			</li>
			@show
			@section('operadores')
			<li>
			@show
				<a href="{{ action('OperadoresController@mostrarOperadores', null )}}">Operadores</a>
			</li>
			
			@section('asignacionCarro')
			<li>
			@show
				<a href="{{ action('AsignacionCarroController@index', null )}}">Asignar carro</a>
			</li>
			
			
			@section('marcaLlanta')
			<li>
			@show
				<a href="{{ action('MarcaLlantaController@index', null )}}">Marca llantas</a>
			</li>
			
			@section('medidaLlanta')
			<li>
			@show
				<a href="{{ action('MedidaLlantaController@index', null )}}">Medida llantas</a>
			</li>
			
			
			
			
			@section('tipoComprobante')
			<li>
				<a href="{{ action('tipoComprobanteController@mostrarTipoComprobante', null )}}">Tipo comprobante</a>
			</li>
			@show
			@section('registroComprobantepago')
			<li>
			@show
				<a href="{{ action('registroComprobantePagoController@mostrarRegistroComprobantePago', null )}}">Comprobantes</a>
			</li>
			
		</ul>
	</div>
</nav>
