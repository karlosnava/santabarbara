@extends('admin.layouts.app')

@section('content')
	{!! Form::model($post, ['route' => ['admin.posts.update', $post], 'files' => true, 'enctype' => 'multipart/form-data', 'method' => 'PUT']) !!}
		<div class="grid grid-cols-5 gap-5">
			<div class="col-span-3">
				@include('admin.posts.form')
			</div>

			<div class="col-span-2">
				<div class="p-3 bg-blue-100 text-blue-500 rounded-md">
					Las imagenes de las publicaciones aún no pueden ser editadas o eliminadas, estamos trabajando para traer nuevas funcionalidades a la plataforma.
				</div>
			</div>
		</div>

		<div class="grid grid-cols-2 gap-5 mt-5">
			<div><x-form.link href="{{ route('admin.posts.show', $post) }}" bg="bg-red-200" textcolor="text-red-500" padding="py-5" text="Cancelar" /></div>
			<div><x-form.button type="submit" text="Actualizar" bg="bg-blue-200" textcolor="text-blue-500" padding="py-5" /></div>
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
      selector: '#extract',
      menubar: 'edit view insert format',
      toolbar: 'styleselect | bold italic | bullist numlist forecolor backcolor | alignleft aligncenter alignright alignjustify | preview',
      plugins: 'advlist autolink link code preview image lists wordcount hr insertdatatime table'
    });

    tinymce.init({
      selector: '#description',
      menubar: 'edit view insert format',
      toolbar: 'styleselect | bold italic | bullist numlist forecolor backcolor | table link image | alignleft aligncenter alignright alignjustify | preview',
      plugins: 'advlist autolink link code preview image lists wordcount hr insertdatatime table'
    });
	</script>
@endsection
