
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
