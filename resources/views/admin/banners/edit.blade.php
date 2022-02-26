@extends('admin.layouts.app')

@section('content')
	<div class="flex items-center justify-between mb-10">
		<h1 class="text-2xl font-bold f-montserrat text-gray-700">Editar banner</h1>
	</div>

	<div>
		{!! Form::model($banner, ['route' => ['admin.banners.update', $banner], 'files' => true, 'method' => 'PUT']) !!}
		
			@include('admin.banners.form')

			<hr class="my-8">
			<div class="flex items-center justify-end" x-data="{ submited : false }">
				<x-form.button x-bind:disabled="submited" x-on:click="submited = true" type="submit" bg="bg-sky-500" text="Actualizar banner" />
			</div>

		{!! Form::close() !!}
	</div>
@endsection
