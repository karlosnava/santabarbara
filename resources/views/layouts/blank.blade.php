<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>@if(View::hasSection('title')) @yield('title') | {{ config('app.name') }} @else {{ config('app.name') }} @endif</title>

	{{-- ICONS --}}
	<link rel="shorcut icon" href="{{ asset('img/logo.png') }}">

	{{-- FONTS --}}
	<link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Roboto:wght@400;500&display=swap" rel="stylesheet"> 

	{{-- CSS --}}
	<link rel="stylesheet" href="{{ asset('css/app.css') }}">
	@yield('css')

	{{-- JS --}}
	<script src="{{ asset('js/libs/alpine.min.js') }}" defer></script>
	<script src="{{ asset('js/libs/fontawesome.js') }}"></script>
</head>
<body class="bg-gray-100">

	@yield('content')
	
	@yield('js')
</body>
</html>