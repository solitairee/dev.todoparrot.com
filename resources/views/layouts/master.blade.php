<!doctype html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Welcome to TODOParrot</title>

		<link rel="stylesheet" 
			href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
		<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
		<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
	</head>
	<body>
		<div class="content">
			@if(Session::has('message'))
				<div class="alert alert-info">
					{{ Session::get('message') }}
				</div>
			@endif
			
			@yield('content')
		</div>
	</body>
</html>