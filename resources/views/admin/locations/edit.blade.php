@extends('adminlte::page')

@section('content')
	<form action="{{ route('admin.locations.update', $location) }}" enctype="multipart/form-data" method="POST">
		@csrf
		@method('PUT')

		<div class="row bg-white p-3 rounded-md border shadow-md">
			<div class="col-12 col-md-6">
				<img src="{{ Storage::url($location->image) }}" class="w-100 img-fluid shadow-sm rounded">
				<input type="file" name="file" id="file" class="mt-2" accept="image/*">
				<div>
					<small class="text-secondary">(La imagen debe tener minimo una resolucion 1280x720)</small>
				</div>
				@error('file')
					<small class="text-danger">{{ $message }}</small>	
				@enderror
			</div>

			<div class="col-12 col-md-6">
				<input type="text" name="name" placeholder="Nombre de la sede" id="name" value="{{ old('name', $location->name) }}" class="form-control">
				@error('name')
					<small class="text-danger">{{ $message }}</small>	
				@enderror

				<textarea name="description" placeholder="Descripción" class="form-control mt-3">{{ old('description', $location->description) }}</textarea>

				<div class="row m-0 mt-3">
					<div class="col-6 border p-2">Dirección:</div>
					<div class="col-6 border p-2">
						<input type="text" name="direction" placeholder="Dirección" value="{{ old('direction', $location->direction) }}" class="form-control">
						@error('direction')
							<small class="text-danger">{{ $message }}</small>	
						@enderror
					</div>
					<div class="col-6 border p-2">Teléfono:</div>
					<div class="col-6 border p-2">
						<input type="text" name="phone" placeholder="Teléfono" value="{{ old('phone', $location->phone) }}" class="form-control">
						@error('phone')
							<small class="text-danger">{{ $message }}</small>	
						@enderror
					</div>
					<div class="col-6 border p-2">Horario:</div>
					<div class="col-6 border p-2 d-flex align-items-center">
						<input type="text" name="opens" placeholder="Desde" value="{{ old('opens', $location->opens) }}" class="form-control">
						@error('opens')
							<small class="text-danger">{{ $message }}</small>	
						@enderror
						-
						<input type="text" name="closes" placeholder="Hasta" value="{{ old('closes', $location->closes) }}" class="form-control">
						@error('closes')
							<small class="text-danger">{{ $message }}</small>	
						@enderror
					</div>
						
					<div class="d-flex align-items-center mt-3">
						<a href="{{ route('admin.locations.show', $location->slug) }}" class="btn btn-link"><i class="fas fa-arrow-left"></i> Regresar</a>
						<button type="submit" class="btn btn-success ml-3">Actualizar información</button>
					</div>
				</div>
			</div>
		</div>
	</form>
@endsection
