<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
	<div class="container">
		<ul class="nav navbar-nav">
			@section('home')
			<li>
			@show
				<a href="{{URL::route('home');}}">Inicio</a>
			</li>

			@section('catalogos')
			<li class="dropdown">
			@show
				<a class="dropdown-toggle" data-toggle="dropdown" href="#"> Catalogos <span class="caret"></span> </a>
				<ul class="dropdown-menu" role="menu">
					<li>
						<a href="{{ action('CarrosController@index', null )}}">Carros</a>
					</li>
					<li>
						<a href="{{ action('OperadorController@index', null )}}">Operadores</a>
					</li>
					<li class="divider"></li>
					<li>
						<a href="{{ action('FlotillaController@index', null )}}">Flotillas</a>
					</li>
				</ul>
			</li>
			@section('llantas')
			<li class="dropdown">
			@show
				<a class="dropdown-toggle" data-toggle="dropdown" href="#"> Llantas <span class="caret"></span> </a>
				<ul class="dropdown-menu" role="menu">
					<li>
						<a href="{{ action('MarcaLlantaController@index', null )}}">Marca llantas</a>
					</li>

					<li>
						<a href="{{ action('MedidaLlantaController@index', null )}}">Medida llantas</a>
					</li>
				</ul>
			</li>
			<li>
				<a href="{{ action('registroComprobantePagoController@mostrarRegistroComprobantePago', null )}}">Registro de Comprobantes</a>
			</li>
			
			
			<li>
				<a href="{{ action('OrdenServicioController@index', null )}}">Ordenes de servicio</a>
			</li>
			
			
			
			@section('reportes')
			<li class="dropdown">
			@show
				<a class="dropdown-toggle" data-toggle="dropdown" href="#"> Reportes <span class="caret"></span> </a>
				<ul class="dropdown-menu" role="menu">
					
					<li>
						<a href="{{ action('ReportesController@comprobantes', null )}}">Comprobantes de pago</a>
					</li>

					<li class="divider"></li>
					
					
				
				</ul>
			</li>
			
			
			@section('configuracion')
			<li class="dropdown">
			@show
				<a class="dropdown-toggle" data-toggle="dropdown" href="#"> Configuracion <span class="caret"></span> </a>
				<ul class="dropdown-menu" role="menu">
					
					<li>
						<a href="{{ action('TipoCarroController@index', null )}}">Tipo carro</a>
					</li>

					<li class="divider"></li>
					
					
					<li>
						<a href="{{ action('AsignacionCarroController@index', null )}}">Asignar carro</a>
					</li>

					<li class="divider"></li>

					<li>
						<a href="{{ action('PrecioCombustibleController@index', null )}}" >Precio combustible </a>
					</li>
					<li>
						<a href="{{ action('tipoComprobanteController@mostrarTipoComprobante', null )}}">Tipo comprobante</a>
					</li>

					<!--
					<li class="divider"></li>
					-->
				</ul>
			</li>

		</ul>
	</div>
</nav>
