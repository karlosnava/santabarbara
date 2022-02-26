<div class="grid grid-cols-2 gap-5">
	<div>
		<div class="font-semibold mb-1 text-gray-500">
			{!! Form::label('title', 'Titulo del banner') !!}
		</div>
		<div class="w-full">
			{!! Form::text('title', null, ['class' => 'border rounded-md py-2 text-lg px-5 w-full focus:border-sky-500']) !!}
		</div>

		@error('title')
			<small class="text-red-500">{{ $message }}</small>
		@enderror
	</div>

	<div>
		<div class="font-semibold mb-1 text-gray-500">
			{!! Form::label('priority', '¿El banner será destacado?') !!}
		</div>
		<div class="w-full">
			{!! Form::select('priority', ['normal' => 'Establecer como prioridad normal', 'highlight' => 'Destacar este banner'], null, ['class' => 'border rounded-md py-2 text-lg px-5 w-full focus:border-sky-500']) !!}
		</div>

		@error('priority')
			<small class="text-red-500">{{ $message }}</small>
		@enderror
	</div>
</div>

<div class="mt-4">
	<div class="font-semibold mb-1 text-gray-500">
		{!! Form::label('description', 'Descripción') !!}
	</div>
	<div class="w-full">
		{!! Form::textarea('description', null, ['class' => 'border rounded-md py-2 text-lg px-5 w-full focus:border-sky-500', 'rows' => 3]) !!}
	</div>

	@error('description')
		<small class="text-red-500">{{ $message }}</small>
	@enderror
</div>

<div class="grid grid-cols-2 gap-5 mt-4">
	<div>
		<div class="font-semibold mb-1 text-gray-500">
			{!! Form::label('text_url', 'Texto del enlace (opcional)') !!}
		</div>
		<div class="w-full">
			{!! Form::text('text_url', null, ['class' => 'border rounded-md py-2 text-lg px-5 w-full focus:border-sky-500']) !!}
		</div>

		@error('text_url')
			<small class="text-red-500">{{ $message }}</small>
		@enderror
	</div>

	<div>
		<div class="font-semibold mb-1 text-gray-500">
			{!! Form::label('url', 'Enlace (opcional)') !!}
		</div>
		<div class="w-full">
			{!! Form::text('url', null, ['class' => 'border rounded-md py-2 text-lg px-5 w-full focus:border-sky-500']) !!}
		</div>

		@error('url')
			<small class="text-red-500">{{ $message }}</small>
		@enderror
	</div>
</div>

<div class="mt-4">
	<div class="font-semibold mb-1 text-gray-500">
		{!! Form::label('media', 'Portada del banner') !!}
	</div>

	<div class="font-semibold mb-1 text-gray-500">
		<input type="file" name="media" id="image" accept="image/*">
	</div>

	@error('media')
		<small class="text-red-500">{{ $message }}</small>
	@enderror
</div>