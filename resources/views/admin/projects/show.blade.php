@extends('adminlte::page')

@section('content')
	<div class="pt-3 d-flex align-items-center justify-content-between">
		<a href="{{ route('admin.projects.index') }}"><i class="fas fa-arrow-left"></i> Regresar</a>
		<div>
			<form action="{{ route('admin.projects.destroy', $project) }}" method="POST">
				@csrf
				@method('DELETE')

				<button type="submit" class="btn btn-sm btn-outline-{{ $project->status == 'inactive' ? 'success' : 'danger'}}">
					{{ $project->status == 'inactive' ? 'Activar proyecto' : 'Desactivar proyecto' }}
				</button>
			</form>
		</div>
	</div>

	@if(session('info'))
		<div class="alert alert-success mt-3 w-100" role="alert">{{ session('info') }}</div>
	@endif

	<div class="row py-4">
		<div class="col-12">
			<img src="{{ Storage::url($project->cover) }}" class="shadow-sm rounded-lg w-100" height="300px" style="object-fit: cover; object-position: center;">

			<div class="my-3">
				<h1 class="font-weight-bold text-center px-5">{{ $project->title }} <a href="{{ route('admin.projects.edit', $project) }}" class="btn btn-sm btn-outline-primary"><i class="fas fa-pen"></i></a></h1>
			</div>

			<div class="text-secondary w-75">{!! $project->description !!}</div>
		</div>

		@if($project->purpose)
			<div class="col-12 col-md-6">
				<div class="bg-white border rounded-lg py-3 px-4">
					<b>Propósitos</b>
					<div class="text-secondary">{!! $project->purpose !!}</div>
				</div>
			</div>
		@endif
		@if($project->objectives)
			<div class="col-12 col-md-6">
				<div class="bg-white border rounded-lg py-3 px-4">
					<b>Objetivos</b>
					<div class="text-secondary">{!! $project->objectives !!}</div>
				</div>
			</div>
		@endif
	</div>
@endsection
