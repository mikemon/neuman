<!--
<div role="toolbar" class="btn-toolbar">
<div class="btn-group">
<button data-toggle="dropdown" type="button" class="btn btn-default btn-xs dropdown-toggle">
Carros <span class="caret"></span>
</button>
<ul role="menu" class="dropdown-menu">
<li><a href="{{ action('CarrosController@nuevoCarro', null )}}">Registrar nuevo</a></li>
<li><a href="{{ action('CarrosController@mostrarCarros', null )}}">Listar carros</a></li>
</ul>
</div>

<div class="btn-group">
<button data-toggle="dropdown" type="button" class="btn btn-default btn-xs dropdown-toggle">
Operadores <span class="caret"></span>
</button>
<ul role="menu" class="dropdown-menu">
<li><a href="{{ action('OperadoresController@nuevoOperador', null )}}">Registrar operador</a></li>
<li><a href="{{ action('OperadoresController@mostrarOperadores', null )}}">Listar operadores</a></li>
</ul>
</div>
<div class="btn-group">
<button data-toggle="dropdown" type="button" class="btn btn-default btn-xs dropdown-toggle">
Tipos de comprobante <span class="caret"></span>
</button>
<ul role="menu" class="dropdown-menu">
<li><a href="{{ action('tipoComprobanteController@nuevoTipoComprobante', null )}}">Registrar tipo comprobante</a></li>
<li><a href="{{ action('tipoComprobanteController@mostrarTipoComprobante', null )}}">Listar tipos comprobante</a></li>
</ul>
</div>

<div class="btn-group">
<button data-toggle="dropdown" type="button" class="btn btn-default btn-xs dropdown-toggle">
Comprobantes <span class="caret"></span>
</button>
<ul role="menu" class="dropdown-menu">
<li><a href="{{ action('registroComprobantePagoController@nuevoRegistroComprobantePago', null )}}">Registrar comprobante</a></li>
<li><a href="{{ action('registroComprobantePagoController@mostrarRegistroComprobantePago', null )}}">Listar comprobantes</a></li>
</ul>
</div>
</div>
-->
<!--
<header role="banner" id="top" class="navbar navbar-static-top bs-docs-nav">
<div class="container">
<div class="navbar-header">
<button data-target=".bs-navbar-collapse" data-toggle="collapse" type="button" class="navbar-toggle">
<span class="sr-only">Toggle navigation</span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
</button>
<a class="navbar-brand" href="{{URL::route('home');}}">Inicio</a>
</div>
<nav role="navigation" class="collapse navbar-collapse bs-navbar-collapse">
<ul class="nav navbar-nav">
<li>
<a href="carros">Carros</a>
</li>
<li>
<a href="../css">CSS</a>
</li>
<li>
<a href="../components">Components</a>
</li>
<li>
<a href="../javascript">JavaScript</a>
</li>
<li>
<a href="../customize">Customize</a>
</li>
</ul>
<ul class="nav navbar-nav navbar-right">
<li>
<a onclick="ga('send', 'event', 'Navbar', 'Community links', 'Expo');" href="http://expo.getbootstrap.com">Expo</a>
</li>
<li>
<a onclick="ga('send', 'event', 'Navbar', 'Community links', 'Blog');" href="http://blog.getbootstrap.com">Blog</a>
</li>
</ul>
</nav>
</div>
</header>
-->
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
				<a href="{{ action('CarrosController@mostrarCarros', null )}}">Carros</a>
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
