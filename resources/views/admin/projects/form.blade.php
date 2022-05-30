<div class="row">
	<div class="col-12 col-md-6">
		<div class="text-secondary">
			{!! Form::label('title', 'Titulo del proyecto') !!}
		</div>
		<div class="w-100">
			{!! Form::text('title', null, ['class' => 'form-control']) !!}
		</div>

		@error('title')
			<small class="text-danger">{{ $message }}</small>
		@enderror
	</div>

	<div class="col-6">
		<div class="text-secondary">
			{!! Form::label('slug', 'Slug') !!}
		</div>
		<div class="w-100">
			{!! Form::text('slug', null, ['class' => 'form-control', 'readonly' => true]) !!}
		</div>

		@error('slug')
			<small class="text-danger">{{ $message }}</small>
		@enderror
	</div>

	<div class="col-12 my-3">
		<div class="text-secondary">
			{!! Form::label('description', 'Descripción') !!}
		</div>
		<div class="w-100">
			{!! Form::textarea('description', null, ['class' => 'form-control']) !!}
		</div>

		@error('description')
			<small class="text-danger">{{ $message }}</small>
		@enderror
	</div>

	<div class="col-6">
		<div class="text-secondary">
			{!! Form::label('reach', 'Alcance') !!}
		</div>
		<div class="w-100">
			{!! Form::textarea('reach', null, ['class' => 'form-control']) !!}
		</div>

		@error('reach')
			<small class="text-danger">{{ $message }}</small>
		@enderror
	</div>
	<div class="col-6">
		<div class="text-secondary">
			{!! Form::label('objectives', 'Objetivos') !!}
		</div>
		<div class="w-100">
			{!! Form::textarea('objectives', null, ['class' => 'form-control']) !!}
		</div>

		@error('objectives')
			<small class="text-danger">{{ $message }}</small>
		@enderror
	</div>

	<div class="col-6 mt-3">
		<div class="text-secondary">
			{!! Form::label('cover', 'Portada del proyecto') !!}
		</div>
		<input type="file" id="cover" name="cover" class="form-control" accept="image/*">

		@error('cover')
			<small class="text-danger">{{ $message }}</small>
		@enderror
	</div>

	<div class="col-6 mt-3">
		<div class="text-secondary">
			{!! Form::label('status', 'Estado') !!}
		</div>
		{!! Form::select('status', ['active' => "Activo", 'draft' => "Borrador"], null, ['class' => 'form-control']) !!}

		@error('status')
			<small class="text-danger">{{ $message }}</small>
		@enderror
	</div>
</div>
<hr>

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
      toolbar: 'styleselect | bold italic | bullist numlist forecolor backcolor | table link | alignleft aligncenter alignright alignjustify | preview',
      plugins: 'advlist autolink link code preview image lists wordcount hr insertdatatime table'
    });

		tinymce.init({
      selector: '#reach',
      menubar: 'edit view insert format',
      toolbar: 'styleselect | bold italic | bullist numlist forecolor backcolor',
      plugins: 'advlist autolink link code wordcount lists hr insertdatatime table'
    });

    tinymce.init({
      selector: '#objectives',
      menubar: 'edit view insert format',
      toolbar: 'styleselect | bold italic | bullist numlist forecolor backcolor',
      plugins: 'advlist autolink link code  wordcount lists hr insertdatatime table'
    });
	</script>
@append
