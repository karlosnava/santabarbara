@extends('admin.layouts.app')

@section('content')
	<div class="flex items-center justify-between mb-10">
		<h1 class="text-2xl font-bold f-montserrat text-gray-700">Editar directorio</h1>
	</div>

	<div>
		{!! Form::model($newsletter, ['route' => ['admin.newsletters.update', ['directory' => $directory, 'newsletter' => $newsletter]], 'files' => true, 'method' => 'PUT']) !!}
		
			@include('admin.newsletters.form')

			<hr class="my-8">
			<div class="flex items-center justify-end" x-data="{ submited : false }">
				<x-form.button x-bind:disabled="submited" x-on:click="submited = true" type="submit" bg="bg-sky-500" text="Actualizar archivo" />
			</div>

		{!! Form::close() !!}
	</div>
@endsection

@section('js')
	<script src="{{ asset('js/libs/jquery.stringToSlug.js') }}"></script>

	<script>
		$(document).ready( function() {
		  $("#name").stringToSlug({
		    setEvents: 'keyup keydown blur',
		    getPut: '#slug',
		    space: '-'
		  });
		});
	</script>
@endsection
