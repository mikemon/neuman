<!doctype html>
<html>
<head>
	@include('includes.head')
</head>
<body>
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
{{HTML::script('assets/js/jquery.js')}}
		{{HTML::script('assets/js/bootstrap.js')}}
</body>
</html>