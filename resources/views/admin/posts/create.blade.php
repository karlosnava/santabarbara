@extends('adminlte::page')

@section('content')
	<form action="{{ route('admin.posts.store', $location) }}" enctype="multipart/form-data" method="POST">
		@csrf

		<div class="row py-4">
			<div class="col-12 col-md-8">
				@include('admin.posts.form')

				<div class="d-flex align-items-center justify-content-end mt-4">
					<button type="submit" class="btn btn-success"><i class="fas fa-plus"></i> Crear publicación</button>
				</div>
			</div>

			<div class="col-12 col-md-4">
				<input type="file" name="images[]" id="images" accept="image/*" multiple>
				@error('images')
					<small class="text-danger">{{ $message }}</small>
				@enderror
			</div>
		</div>
	</form>
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
