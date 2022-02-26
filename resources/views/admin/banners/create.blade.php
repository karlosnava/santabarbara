@extends('admin.layouts.app')

@section('content')
	<div class="mb-3">
		<a href="{{ route('admin.banners.index') }}" class="text-sky-500"><i class="fas fa-arrow-left"></i> Regresar</a>
	</div>
	<div class="flex items-center justify-between mb-10">
		<h1 class="text-2xl font-bold f-montserrat text-gray-700">Crear banner</h1>
	</div>

	<div>
		{!! Form::open(['route' => 'admin.banners.store', 'files' => true]) !!}
		
			@include('admin.banners.form')

			<hr class="my-8">
			<div class="flex items-center justify-end" x-data="{ submited : false }">
				<x-form.button x-bind:disabled="submited" x-on:click="submited = true" type="submit" bg="bg-sky-500" text="Crear banner" />
			</div>

		{!! Form::close() !!}
	</div>
@endsection
