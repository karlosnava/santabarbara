@extends('admin.layouts.app')

@section('content')
	<div class="mb-3">
		<a href="{{ route('admin.directories.index') }}" class="text-sky-500"><i class="fas fa-arrow-left"></i> Regresar</a>	
	</div>

	<div class="flex items-center justify-between mb-10">
		<h1 class="text-2xl font-bold f-montserrat text-gray-700">{{ $directory->name }}</h1>
		<div>
			<x-form.link href="{{ route('admin.newsletters.create', $directory) }}" bg="bg-green-600" text="<i class='fas fa-plus'></i> Añadir archivo" />
		</div>
	</div>
	<hr class="my-2">

	<div>
		@if(count($directory->newsletters) > 0)
			<table class="table-auto w-full">
			  <thead>
			    <tr align="left">
			      <th>Tipo</th>
			      <th>Nombre</th>
			      <th>Estado</th>
			      <th>Acciones</th>
			    </tr>
			  </thead>
			  <tbody>
			  	@foreach($directory->newsletters as $newsletter)
				    <tr>
				      <td><a href="{{ Storage::url($newsletter->url) }}" download><img src="{{ asset("myicons/{$newsletter->type}.png") }}" width="25px"></a></td>
				      <td>{{ $newsletter->name }}</td>
				      <td>{{ $newsletter->status }}</td>
				      <td class="flex items-center">
				      	<a href="{{ route('admin.newsletters.edit', ['directory' => $directory, 'newsletter' => $newsletter]) }}"><i class="fas fa-pencil"></i></a>

				      	<form action="{{ route('admin.newsletters.destroy', ['directory' => $directory, 'newsletter' => $newsletter]) }}" method="POST">
			    				@csrf
			    				@method("DELETE")
			    				<div class="deleteBtn flex items-center bg-white p-2 rounded-full text-gray-700 mx-1 cursor-pointer">
				    				<i class="fas fa-trash"></i>
			    					
				    				<button type="submit" class="text-sm ml-2" style="display: none">Presiona aquí para confirmar</button>
			    				</div>
			    			</form>
				      </td>
				    </tr>
			  	@endforeach
			  </tbody>
			</table>
		@else
			SIN ARCHIVOS
		@endif
	</div>
@endsection

@section("js")
	<script>
		$(".deleteBtn").click(function () {
			$(this).removeClass("text-gray-700");
			$(this).addClass("text-red-700");
			$(this).children()[1].style.display = "block";
		});
	</script>
@endsection
