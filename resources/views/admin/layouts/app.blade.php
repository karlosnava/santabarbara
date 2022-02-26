<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>@if(View::hasSection('title')) @yield('title') | Administración {{ config('settings.app_name') }} @else Administración {{ config('settings.app_name') }} @endif</title>

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
	<script src="{{ asset('js/libs/jquery-3.6.0.min.js') }}"></script>
	<script src="{{ asset('js/libs/alpine.min.js') }}" defer></script>
	<script src="{{ asset('js/libs/swiper.min.js') }}"></script>
	<script src="{{ asset('js/libs/swal.min.js') }}"></script>
	<script src="{{ asset('js/libs/fontawesome.js') }}"></script>
</head>
<body class="bg-gray-200">
	<div class="grid grid-cols-10 h-screen w-full">
		<div class="col-span-2 bg-zinc-800">
			<div class="p-8">
				<div class="flex items-center justify-center text-white">
					<img src="{{ asset(config('settings.page_icon')) }}" class="w-12" alt="{{ config('settings.app_name') }}">
					<div class="font-semibold text-lg f-montserrat ml-3"> | Admin</div>
				</div>

				<hr class="bg-red-500 my-5">
				@include('admin.partials.links')
			</div>
		</div>

		<div class="col-span-8 bg-white m-12 p-10 border shadow-md rounded-md">
			@if(session('info'))
				<div class="px-4 py-3 leading-normal text-white bg-indigo-700 rounded-lg mb-10" role="alert">
					<p>{{ session('info') }}</p>
				</div>
			@endif

			@yield('content')
		</div>
	</div>

	<script src="{{ asset('js/libs/popper.min.js') }}"></script>
	<script src="{{ asset('js/libs/tippy.js') }}"></script>
	<script>
		tippy('[data-tippy-content]');
	</script>
	@yield('js')
</body>
</html>