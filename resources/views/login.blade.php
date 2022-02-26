@extends('layouts.blank')

@section('title', 'Iniciar sesión')

@section('css')
	<link rel="stylesheet" href="{{ asset('css/styles.css') }}">
@endsection

@section('content')
	<div class="relative w-screen h-screen">
		<div class="absolute top-80 -translate-y-1/2 w-full">
			<div class="mx-auto w-11/12 bg-white shadow-md rounded-md px-5 py-8 md:w-3/6 lg:w-2/6">
				<div class="flex items-center justify-center">
					<img src="{{ asset('img/logo.png') }}" class="w-12" alt="{{ config('app.name') }}">
					<div class="font-semibold text-xl text-gray-600 ml-2"> | Sistemas</div>
				</div>
					
				<form class="mt-10" method="POST">
					@csrf

					<x-form.input name="email" type="email" label="Correo" autofocus="true" />
					<x-form.input name="password" type="password" label="Contraseña" />
					<label>
						<input type="checkbox" name="remember">
						Recordarme
					</label>

					<x-form.button type="submit" text="Iniciar sesión" margin="mt-5" />
				</form>
			</div>
		</div>
	</div>
@endsection
