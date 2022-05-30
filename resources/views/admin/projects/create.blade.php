@extends('adminlte::page')

@section('content')
	<div class="py-3">
		<div class="pb-3">
			<a href="{{ route('admin.projects.index') }}"><i class="fas fa-arrow-left"></i> Regresar</a>
		</div>

		{!! Form::open(['route' => 'admin.projects.store', 'files' => true]) !!}
		
			@include('admin.projects.form')

			<div class="d-flex align-items-center justify-content-end">
				<button type="submit" class="btn btn-success"><i class="fas fa-plus"></i> Crear proyecto</button>
			</div>
		{!! Form::close() !!}
	</div>
@endsection
