@extends('adminlte::page')

@section('content')
	@if(session('info'))
		<div class="alert alert-info mt-3 w-100" role="alert">{{ session('info') }}</div>
	@endif

	<div class="row bg-white p-3 rounded-md border shadow-md">
		<div class="col-12 col-md-6">
			<img src="{{ Storage::url($location->image) }}" class="w-100 img-fluid shadow-sm rounded">
		</div>
		<div class="col-12 col-md-6">
			<div class="d-flex align-items-center justify-content-between mb-3">
				<h2>{{ $location->name }}</h2>
				<a href="{{ route('admin.locations.edit', $location->slug) }}" class="btn btn-success"><i class="fas fa-pen"></i> Editar información</a>
			</div>
			<p class="text-secondary">{{ $location->description }}</p>

			<div class="row">
				<div class="col-6 border p-2">Dirección:</div>
				<div class="col-6 border p-2">{{ $location->direction }}</div>
				<div class="col-6 border p-2">Teléfono:</div>
				<div class="col-6 border p-2">{{ $location->phone }}</div>
				<div class="col-6 border p-2">Horario:</div>
				<div class="col-6 border p-2">{{ $location->opens }} - {{ $location->closes }}</div>
			</div>
		</div>
	</div>
	<hr>
	<div class="d-flex align-items-center">
		<h4 class="font-weight-bold">Publicaciones de esta sede <a href="{{ route('admin.posts.create', $location) }}" class="btn btn-success rounded-circle ml-2" title="Crear nueva"><i class="fas fa-plus"></i></a></h4>
	</div>

	<div class="row pb-5">
		@forelse($location->posts as $post)
			<div class="col-3">
				<a href="{{ route('admin.posts.show', [$location, $post]) }}" target="_blank">
					<div class="bg-white shadow-sm rounded-lg">
						<img src="{{ Storage::url($post->images->first()->url ) }}" class="w-100" height="150px" style="object-fit: cover; object-position: center">
						<div class="px-3 py-2">
							<div class="d-flex align-items-center justify-content-between text-secondary small">
								<div><i class="fas fa-eye"></i> {{ $post->views }}</div>
								<div>{{ $post->status }}</div>
							</div>
							<b>{{ $post->title }}</b>
						</div>
					</div>
				</a>
			</div>
		@empty
			<div class="col-12">
				<div class="alert alert-info">
					Esta sede todavía no tiene publicaciones. ¡Empieza a crearlas!
				</div>
			</div>
		@endforelse
	</div>
@endsection
