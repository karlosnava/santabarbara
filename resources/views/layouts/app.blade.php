<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="theme" content="{{ config('settings.theme') }}">
	<meta name="description" content="{{ config('settings.site_description') }}">
	<title>@if(View::hasSection('title')) @yield('title') | {{ config('settings.app_name') }} @else {{ config('settings.app_name') }} @endif</title>

	{{-- ICONS --}}
	<link rel="shorcut icon" href="{{ asset(config('settings.page_icon')) }}">

	{{-- FONTS --}}
	<link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Roboto:wght@400;500&display=swap" rel="stylesheet"> 

	{{-- CSS --}}
	<link rel="stylesheet" href="{{ asset('css/app.css') }}">
	<link rel="stylesheet" href="{{ asset('css/styles.css') }}">
	<link rel="stylesheet" href="{{ asset('css/libs/animate.css') }}">
	<link rel="stylesheet" href="{{ asset('css/libs/swiper.min.css') }}">
	<link rel="stylesheet" href="{{ asset('css/libs/tippy.css') }}">
	@yield('css')

	{{-- JS --}}
	<script src="{{ asset('js/libs/alpine.min.js') }}" defer></script>
	<script src="{{ asset('js/libs/swiper.min.js') }}"></script>
	<script src="{{ asset('js/libs/fontawesome.js') }}"></script>
</head>
<body class="bg-gray-100">
	@include('partials.nav')

	<div class="container">
		@if(request()->is('/'))
			@include('partials.banner')
		@endif

		<div class="my-5">
			@yield('content')
		</div>
	</div>

	@include('partials.footer')

	<script src="{{ asset('js/libs/tippy.js') }}"></script>
	@yield('js')
</body>
</html>