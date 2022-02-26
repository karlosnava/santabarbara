@extends('admin.layouts.app')
@section('title', 'Crear noticia')

@section('content')
	<h1 class="text-3xl font-bold">Crear noticia</h1>
	<hr class="my-8">

	{!! Form::open(['route' => 'admin.newspapers.store', 'files' => true, 'method' => 'POST', 'autocomplete' => 'off']) !!}
		@include('admin.news.form')
		
		<hr class="my-8">
		<div class="flex items-center justify-end" x-data="{ submited : false }">
			<x-form.button x-bind:disabled="submited" x-on:click="submited = true" type="submit" bg="bg-orange-500" text="Publicar noticia" />
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
