@extends('adminlte::page')

@section('content')
	<div class="py-3">
		<a href="{{ route('admin.directories.index') }}"><i class="fas fa-arrow-left"></i> Regresar</a>
		<h1 class="text-secondary">Crear directorio</h1>
	</div>

	<div>
		{!! Form::open(['route' => 'admin.directories.store']) !!}
		
			@include('admin.directories.form')

			<hr class="my-4">
			<div class="d-flex align-items-center justify-content-end" x-data="{ submited : false }">
				<button x-bind:disabled="submited" x-on:click="submited = true" type="submit" class="btn btn-success"><i class="fas fa-plus"></i> Crear directorio</button>
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