<html>
	<head>
		@include('includes.head')
	</head>
	<body>
		<div id="spinner" class="fondo ui-widget-overlay"  ></div>
		<!--
		@section('sidebar')
		Taller-refacciones
		@show
		-->
		<div class="container">
			<header class="row">
				@include('includes.header')
			</header>
			<div id="main" class="row">
				@yield('content')
			</div>
			<footer class="row">
				@include('includes.footer')
			</footer>
			
		</div>

	</body>
</html>

<script>
	$(document).on("click", ".btn-danger", function(evt) {
		if (!confirm('Esta seguro?')) {
			return false;
		}
	}); 
</script>

<script>
	//alert('ready');
	jQuery('.decimal').numeric(".");

	$('.tipoFecha').datetimepicker({
		changeMonth : true,
		changeYear : true,
		showButtonPanel : true,
		dateFormat : 'yy-mm-dd'
	});

	$('.tipoFechaSimple').datepicker({
		changeMonth : true,
		changeYear : true,
		showButtonPanel : true,
		dateFormat : 'yy-mm-dd'
	}); 
	document.getElementById("spinner").style.display = "none";

</script>