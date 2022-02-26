<div class="grid grid-cols-2 gap-5">
	<div>
		<div class="font-semibold mb-1 text-gray-500">
			{!! Form::label('name', 'Nombre del archivo') !!}
		</div>
		<div class="w-full">
			{!! Form::text('name', null, ['class' => 'border rounded-md py-2 text-lg px-5 w-full focus:border-sky-500']) !!}
		</div>

		@error('name')
			<small class="text-red-500">{{ $message }}</small>
		@enderror
	</div>

	<div>
		<div class="font-semibold mb-1 text-gray-500">
			{!! Form::label('slug', 'Slug') !!}
		</div>
		<div class="w-full">
			{!! Form::text('slug', null, ['class' => 'border rounded-md py-2 text-lg px-5 w-full', 'readonly' => true]) !!}
		</div>

		@error('slug')
			<small class="text-red-500">{{ $message }}</small>
		@enderror
	</div>
</div>

<div>
	<div class="font-semibold mb-1 text-gray-500">
		{!! Form::label('file', 'Archivo') !!}
	</div>
	<div class="w-full">
		{!! Form::file('file') !!}
	</div>

	@error('file')
		<small class="text-red-500">{{ $message }}</small>
	@enderror
</div>
