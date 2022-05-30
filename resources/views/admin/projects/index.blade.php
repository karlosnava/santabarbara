@extends('adminlte::page')

@section('content')
	<h3 class="font-weight-bold pt-3">Proyectos <a href="{{ route('admin.projects.create') }}" class="btn btn-success rounded-circle ml-2" title="Nuevo"><i class="fas fa-plus"></i></a></h3>

	@if(session('info'))
		<div class="alert alert-success mt-3 w-100" role="alert">{{ session('info') }}</div>
	@endif

	<div class="row mt-4">
		@forelse($projects as $project)
			<div class="col-12 col-md-3">
				<a href="{{ route('admin.projects.show', $project) }}">
					<div class="bg-white rounded shadow-sm rounded-lg">
						<img src="{{ Storage::url($project->cover) }}" class="w-100" height="150px" style="object-fit: cover; object-position: center;">
						
						<div class="p-2">
							<div class="d-flex align-items-center justify-content-between">
								<b>{{ $project->title }}</b>
								<div>{{ $project->status }}</div>
							</div>
						</div>
					</div>
				</a>
			</div>
		@empty
			<div>Todavía no hay proyectos, empieza a crearlos!</div>
		@endforelse
	</div>
@endsection
