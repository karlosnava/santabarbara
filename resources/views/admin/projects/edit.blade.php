@extends('adminlte::page')

@section('content')
	<div class="py-3">
		<a href="{{ route('admin.projects.show', $project) }}"><i class="fas fa-arrow-left"></i> Regresar</a>
	</div>

	<div class="pb-5">
		{!! Form::model($project, ['route' => ['admin.projects.update', $project], 'files' => true, 'method' => 'PUT']) !!}
		
			@include('admin.projects.form')

			<div class="d-flex align-items-center justify-content-between">
				<button type="submit" class="btn btn-success"><i class="fas fa-plus"></i> Actualizar proyecto</button>
			</div>
		{!! Form::close() !!}
	</div>
@endsection
