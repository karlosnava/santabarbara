@extends('adminlte::page')

@section('content')
	<div class="py-3">
		<a href="{{ route('admin.directories.show', $directory) }}"><i class="fas fa-arrow-left"></i> Regresar</a>
	</div>
	<h3 class="font-weight-bold pb-3">Editar archivo <small class="text-secondary mx-1"><i class="fas fa-arrow-right"></i></small> {{ $directory->name }} <small class="text-secondary mx-1"><i class="fas fa-arrow-right"></i></small> {{ $newsletter->name }}</h3>

	<div>
		{!! Form::model($newsletter, ['route' => ['admin.newsletters.update', ['directory' => $directory, 'newsletter' => $newsletter]], 'files' => true, 'method' => 'PUT']) !!}
		
			@include('admin.newsletters.form')

			<hr class="my-3">
			<div class="d-flex align-items-center justify-content-end" x-data="{ submited : false }">
				<button x-bind:disabled="submited" x-on:click="submited = true" type="submit" class="btn btn-success">Actualizar archivo</button>
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
