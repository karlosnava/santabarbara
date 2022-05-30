<div class="row">
	<div class="col-12 col-md-6">
		<div class="text-secondary">
			{!! Form::label('title', 'Titulo del banner') !!}
		</div>
		<div class="w-100">
			{!! Form::text('title', null, ['class' => 'form-control']) !!}
		</div>

		@error('title')
			<small class="text-danger">{{ $message }}</small>
		@enderror
	</div>

	<div class="col-12 col-md-6">
		<div class="text-secondary">
			{!! Form::label('priority', '¿El banner será destacado?') !!}
		</div>
		<div class="w-100">
			{!! Form::select('priority', ['normal' => 'Establecer como prioridad normal', 'highlight' => 'Destacar este banner'], null, ['class' => 'form-control']) !!}
		</div>

		@error('priority')
			<small class="text-danger">{{ $message }}</small>
		@enderror
	</div>
</div>

<div class="mt-4">
	<div class="text-secondary">
		{!! Form::label('description', 'Descripción') !!}
	</div>
	<div class="w-full">
		{!! Form::textarea('description', null, ['class' => 'form-control', 'rows' => 3]) !!}
	</div>

	@error('description')
		<small class="text-danger">{{ $message }}</small>
	@enderror
</div>

<div class="row mt-4">
	<div class="col-12 col-md-6">
		<div class="text-secondary">
			{!! Form::label('text_url', 'Texto del enlace (opcional)') !!}
		</div>
		<div class="w-full">
			{!! Form::text('text_url', null, ['class' => 'form-control']) !!}
		</div>

		@error('text_url')
			<small class="text-danger">{{ $message }}</small>
		@enderror
	</div>

	<div class="col-12 col-md-6">
		<div class="text-secondary">
			{!! Form::label('url', 'Enlace (opcional)') !!}
		</div>
		<div class="w-full">
			{!! Form::text('url', null, ['class' => 'form-control']) !!}
		</div>

		@error('url')
			<small class="text-danger">{{ $message }}</small>
		@enderror
	</div>
</div>

<div class="mt-4">
	<div class="text-secondary">
		{!! Form::label('media', 'Portada del banner') !!}
	</div>

	<div class="text-secondary">
		<input type="file" name="media" id="image" accept="image/*">
	</div>

	@error('media')
		<small class="text-danger">{{ $message }}</small>
	@enderror
</div>
