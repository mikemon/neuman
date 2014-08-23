
<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
	<div class="container">
		<ul class="nav navbar-nav">
			@section('home')
			<li>
			@show
				<a href="{{URL::route('home');}}">Inicio</a>
			</li>
			
			@section('flotilla')
			<li>
			@show
				<a href="{{ action('FlotillaController@index', null )}}">Flotillas</a>
			</li>
			
			@section('carros')
			<li>
			@show
				<a href="{{ action('CarrosController@index', null )}}">Carros</a>
			</li>
			
			@section('operadores')
			<li>
			@show
				<a href="{{ action('OperadorController@index', null )}}">Operadores</a>
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
