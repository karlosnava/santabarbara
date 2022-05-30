<div class="mb-4">
	<div class="row">
		<div class="col-6">
			<div class="text-secondary">
				{!! Form::label('title', 'Titulo del post') !!}
			</div>
			<div class="w-100">
				{!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => '']) !!}
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
	</div>
</div>

<div class="mb-4">
	<div class="text-secondary">
		{!! Form::label('extract', 'Extracto') !!}
	</div>
	<div class="w-100">
		{!! Form::textarea('extract', null, ['rows' => 4]) !!}
	</div>

	@error('extract')
		<small class="text-danger">{{ $message }}</small>
	@enderror
</div>

<div class="mb-4">
	<div class="text-secondary">
		{!! Form::label('description', 'Descripción') !!}
	</div>
	<div class="w-100">
		{!! Form::textarea('description', null, ['class' => '', 'rows' => 4]) !!}
	</div>

	@error('description')
		<small class="text-danger">{{ $message }}</small>
	@enderror
</div>

<div>
	<div class="text-secondary">
		{!! Form::label('status', 'Estado') !!}
	</div>
	<div class="w-100">
		{!! Form::select('status', ['active' => 'Activo', 'draft' => 'Borrador'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione un estado...']) !!}

		@error('status')
			<small class="text-danger">{{ $message }}</small>
		@enderror
	</div>
</div>
