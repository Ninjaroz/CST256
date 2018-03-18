<!-- 
Project Name: Networking Site v1
Developer: Gary Sundquist
3/18/18
Default page layout
 -->

<!doctype html>

<html>

	<head>
		<!-- CSS -->
		<link href="{{ asset('css/Main.css') }}" rel="stylesheet">
	</head>
	
	<Body>
		
		<div class="container">
			
			<!--  Page Header -->
			<header>
				@include('includes.header')
			</header>
			
			<!--  Content -->
			<div id="main">
				@yield('content')
			</div>
			
			<!--  footer -->
			<footer>
		
			</footer>
			
		</div>
		
	</Body>
	
</html>
