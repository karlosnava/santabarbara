@extends('adminlte::page')

@section('content')
	{!! Form::model($post, ['route' => ['admin.posts.update', [$location, $post]], 'files' => true, 'enctype' => 'multipart/form-data', 'method' => 'PUT']) !!}
		<div class="row py-4">
			<div class="col-12 col-md-8">
				@include('admin.posts.form')

				<div class="d-flex align-items-center justify-content-end mt-4">
					<div>
						<a href="{{ route('admin.posts.show', [$location, $post]) }}" class="btn btn-outline-danger">Cancelar</a>
					</div>
					<div class="ml-3">
						<button type="submit" class="btn btn-success">Actualizar post</button>
					</div>
				</div>
			</div>

			<div class="col-12 col-md-4">
				<div class="p-3 bg-blue-100 text-blue-500 rounded-md">
					Las imagenes de las publicaciones aún no pueden ser editadas o eliminadas, estamos trabajando para traer nuevas funcionalidades a la plataforma.
				</div>
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
