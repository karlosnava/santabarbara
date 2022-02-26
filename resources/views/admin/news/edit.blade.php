@extends('admin.layouts.app')
@section('title', 'Editar noticia')

@section('content')
	<h1 class="text-3xl font-bold">Editar noticia</h1>
	<hr class="my-8">

	{!! Form::model($newspaper, ['route' => ['admin.newspapers.update', $newspaper], 'files' => true, 'autocomplete' => 'off', 'method' => 'PUT']) !!}
		@include('admin.news.form')
		
		<hr class="my-8">
		<div class="flex items-center justify-between" x-data="{ submited : false }">
			<form action="{{ route('admin.newspapers.destroy', $newspaper) }}" method="POST">
				@csrf
				@method('DELETE')

				<button type="submit" class="text-sm text-red-500">Eliminar noticia</button>
			</form>

			<div class="flex items-center">
				<a href="{{ route('admin.newspapers.show', $newspaper) }}" class="text-sm text-red-500 mr-5">Cancelar</a>
				<x-form.button x-bind:disabled="submited" x-on:click="submited = true" type="submit" bg="bg-orange-500" text="Actualizar noticia" />
			</div>
		</div>
	{!! Form::close() !!}
@endsection

@section('js')
	<script src="https://cdn.tiny.cloud/1/jru4vjp9yw10vntvdle56456p7bwn2gonzuny893g98hvdt7/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
	<script src="{{ asset('js/libs/jquery.stringToSlug.js') }}"></script>

	<script>
		$(document).ready( function() {
		  $("#title").stringToSlug({
		    setEvents: 'keyup keydown blur',
		    getPut: '#slug',
		    space: '-'
		  });
		});
		
    tinymce.init({
      selector: '#description',
      menubar: 'edit view insert format',
      toolbar: 'styleselect | bold italic | bullist numlist forecolor backcolor | table link image | alignleft aligncenter alignright alignjustify | preview',
      plugins: 'advlist autolink link code preview image lists wordcount hr table'
    });
	</script>
@endsection
