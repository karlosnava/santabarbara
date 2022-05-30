@extends('adminlte::page')

@section('content')
	<h3 class="font-weight-bold py-3">Configuración del sitio</h3>
	<hr class="my-2">

	@error('value')
		<div class="text-danger">{{ $message }}</div>
	@enderror
	@error('image')
		<div class="text-danger">{{ $message }}</div>
	@enderror

	@foreach($configs as $config)
		<form method="POST" action="{{ route('admin.configs.update', $config->id) }}" enctype="multipart/form-data">
			@csrf
			@method('PATCH')

			<div class="shadow-sm bg-white rounded-lg p-3 mb-2">
				<div class="d-flex align-items-center justify-content-between">
					<div><b>{{ $config->name }}</b></div>	
					<div>
						<button type="submit" class="btn btn-sm btn-success"><i class="fas fa-save"></i></button>
					</div>
				</div>
				<div class="text-secondary my-2">{{ $config->details }}</div>

				@if($config->type == "boolean")
					<select name="value" class="form-control">
						<option {{ $config->value == "1" ? "selected" : '' }} value="1">Verdadero</option>
						<option {{ $config->value == "0" ? "selected" : '' }} value="0">Falso</option>
					</select>
				@elseif($config->type == "textarea")
					<textarea name="value" class="form-control">{{ old($config->name, $config->value) }}</textarea>
				@elseif($config->type == "custom" && $config->name == "site_topic")
					<select name="value" class="form-control">
						<option {{ $config->value == 'none' ? 'selected' : '' }} value="none">Ninguno</option>
						<option {{ $config->value == 'event' ? 'selected' : '' }} value="event">Evento</option>
						<option {{ $config->value == 'halloween' ? 'selected' : '' }} value="halloween">Halloween</option>
						<option {{ $config->value == 'christmas' ? 'selected' : '' }} value="christmas">Navidad</option>
					</select>
				@elseif($config->type == "color")
					<input type="{{ $config->type }}" value="{{ old($config->name, $config->value) }}" name="value" class="form-control">
				@elseif($config->type == "file")
					<input type="{{ $config->type }}" name="image" class="form-control">
				@else
					<input type="{{ $config->type }}" value="{{ old($config->name, $config->value) }}" name="value" class="form-control">
				@endif
			</div>
		</form>
	@endforeach
@endsection
