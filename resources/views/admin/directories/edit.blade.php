@extends('adminlte::page')

@section('content')
	<h3 class="font-weight-bold py-3">Editar directorio</h3>

	<div>
		{!! Form::model($directory, ['route' => ['admin.directories.update', $directory], 'method' => 'PUT']) !!}
		
			@include('admin.directories.form')

			<hr class="my-8">
			<div class="d-flex align-items-center justify-content-end" x-data="{ submited : false }">
				<div class="d-flex align-items-center">
					<a href="{{ route('admin.directories.index') }}" class="btn btn-sm btn-link"><i class="fas fa-arrow-left"></i> Regresar</a>
					<button x-bind:disabled="submited" x-on:click="submited = true" class="btn btn-success ml-3" type="submit">Actualizar directorio</button>
				</div>
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
