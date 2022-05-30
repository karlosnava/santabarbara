@extends('adminlte::page')

@section('content')
	<div class="pt-3">
		<a href="{{ route('admin.banners.index') }}"><i class="fas fa-arrow-left"></i> Regresar</a>
	</div>
	<h3 class="font-weight-bold pb-3">Crear banner</h3>

	<div class="pb-5">
		{!! Form::open(['route' => 'admin.banners.store', 'files' => true]) !!}
		
			@include('admin.banners.form')

			<hr class="my-8">
			<div class="d-flex alig-items-center justify-content-end" x-data="{ submited : false }">
				<button x-bind:disabled="submited" x-on:click="submited = true" class="btn btn-success" type="submit"><i class="fas fa-plus"></i> Crear banner</button>
			</div>

		{!! Form::close() !!}
	</div>
@endsection
