{!! Form::hidden('location_id', (INT)$location_id, ['readonly']) !!}

<div class="grid grid-cols-2 gap-5">
	<div>
		<div class="font-semibold mb-1 text-gray-500">
			{!! Form::label('title', 'Titulo de la noticia') !!}
		</div>
		<div class="w-full">
			{!! Form::text('title', null, ['class' => 'border rounded-md py-2 text-lg px-5 w-full focus:border-sky-500', 'placeholder' => '']) !!}
		</div>

		@error('title')
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

	<div class="col-span-2">
		<div class="font-semibold mb-1 text-gray-500">
			{!! Form::label('description', 'Descripción') !!}
		</div>
		<div class="w-full">
			{!! Form::textarea('description', null, ['class' => 'border rounded-md py-2 text-lg px-5 w-full focus:border-sky-500', 'rows' => 4]) !!}
		</div>

		@error('description')
			<small class="text-red-500">{{ $message }}</small>
		@enderror
	</div>

	<div>
		<div class="font-semibold mb-1 text-gray-500">
			{!! Form::label('media', 'Portada de la noticia') !!}
		</div>

		<input type="file" name="media" id="images" accept="image/*">

		@error('media')
			<small class="text-red-500">{{ $message }}</small>
		@enderror
	</div>

	<div>
		<div>
			<div class="font-semibold mb-1 text-gray-500">
				{!! Form::label('status', 'Estado') !!}
			</div>
			<div class="w-full">
				{!! Form::select('status', ['active' => 'Activo', 'draft' => 'Borrador'], null, ['class' => 'border rounded-md py-2 text-lg px-5 w-full focus:border-sky-500', 'placeholder' => 'Seleccione un estado...']) !!}
			</div>
		</div>

		@error('status')
			<small class="text-red-500">{{ $message }}</small>
		@enderror
	</div>
</div>