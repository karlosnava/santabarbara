<div class="row">
	<div class="col-6">
		<div class="mb-1 text-secondary">
			{!! Form::label('name', 'Nombre del archivo') !!}
		</div>
		<div class="w-100">
			{!! Form::text('name', null, ['class' => 'form-control']) !!}
		</div>

		@error('name')
			<small class="text-danger">{{ $message }}</small>
		@enderror
	</div>

	<div class="col-6">
		<div class="mb-1 text-secondary">
			{!! Form::label('slug', 'Slug') !!}
		</div>
		<div class="w-100">
			{!! Form::text('slug', null, ['class' => 'form-control', 'readonly' => true]) !!}
		</div>

		@error('slug')
			<small class="text-danger">{{ $message }}</small>
		@enderror
	</div>
</div>

<div class="mt-3">
	<div class="mb-1 text-secondary">
		{!! Form::label('file', 'Archivo') !!}
	</div>
	<div class="w-100">
		{!! Form::file('file') !!}
	</div>

	@error('file')
		<small class="text-danger">{{ $message }}</small>
	@enderror
</div>
