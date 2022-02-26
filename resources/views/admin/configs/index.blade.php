@extends('admin.layouts.app')

@section('content')
	<h1 class="text-2xl font-bold f-montserrat text-gray-700">Configuración del sitio</h1>
	<hr class="my-4">

	@foreach($configs as $config)
		<div class="shadow-md rounded-md p-4 mb-3">
			<div class="flex items-center justify-between">
				<div class="font-bold">{{ $config->name }}</div>	
				<div>
					<i class="fas fa-pencil"></i>
				</div>
			</div>
			<div class="text-gray-700 my-2">{{ $config->details }}</div>

			<div class="bg-gray-100 rounded-md py-3 px-4">{{ $config->value }}</div>
		</div>
	@endforeach
@endsection

