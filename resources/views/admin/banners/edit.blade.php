@extends('adminlte::page')

@section('content')
	<div class="py-3">
		<a href="{{ route('admin.banners.index') }}"><i class="fas fa-arrow-left"></i> Regresar</a>
	</div>
	<h3 class="font-weight-bold pb-3">Editar banner</h3>

	<div class="pb-5">
		{!! Form::model($banner, ['route' => ['admin.banners.update', $banner], 'files' => true, 'method' => 'PUT']) !!}
		
			@include('admin.banners.form')

			<hr class="my-8">
			<div class="d-flex align-items-center justify-content-end" x-data="{ submited : false }">
				<button x-bind:disabled="submited" x-on:click="submited = true" class="btn btn-success" type="submit">Actualizar</button>
			</div>

		{!! Form::close() !!}
	</div>
@endsection
