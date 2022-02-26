@extends('admin.layouts.app')

@section('content')
	<div class="flex items-center justify-between mb-10">
		<h1 class="text-2xl font-bold f-montserrat text-gray-700">Directorios</h1>
		<div>
			<x-form.link href="{{ route('admin.directories.create') }}" bg="bg-green-600" text="<i class='fas fa-plus'></i> Crear directorio" />
		</div>
	</div>
	<hr class="my-4">

	@foreach($directories as $directory)
    <div class="flex items-center shadow-md rounded-md px-4 py-2 mb-4 justify-between w-full">
      <h5 class="text-base font-bold">{{ $directory->name }} @if($directory->status == "forgotten") <span class="text-red-500 font-normal text-sm">(Oculto)</span> @endif</h5>

  		<div class="flex items-center">
  			<a href="{{ route('admin.directories.show', $directory) }}" class="bg-white px-2 py-1 rounded-full text-gray-700 mx-1"><i class="fas fa-eye"></i></a>
  			<a href="{{ route('admin.directories.edit', $directory) }}" class="bg-white px-2 py-1 rounded-full text-gray-700 mx-1"><i class="fas fa-pencil"></i></a>

  			@if($directory->status == "forgotten")
  				<form action="{{ route('admin.directories.reactivate', $directory) }}" method="POST">
	  				@csrf
	  				@method("PUT")
	  				<div class="activateBtn flex items-center bg-white p-2 rounded-full text-gray-700 mx-1 cursor-pointer">
	    				<i class="fas fa-arrow-up"></i>
	  					<button type="submit" class="text-sm ml-2" style="display: none">Presiona aquí para confirmar</button>
	  				</div>
  			@else
  				<form action="{{ route('admin.directories.destroy', $directory) }}" method="POST">
	  				@csrf
	  				@method("DELETE")
	  				<div class="deleteBtn flex items-center bg-white p-2 rounded-full text-gray-700 mx-1 cursor-pointer">
	    				<i class="fas fa-trash"></i>
	  					<button type="submit" class="text-sm ml-2" style="display: none">Presiona aquí para confirmar</button>
	  				</div>
  			@endif
  			</form>
  		</div>
  	</div>
  @endforeach
@endsection

@section("js")
	<script>
		$(".deleteBtn").click(function () {
			$(this).removeClass("text-gray-700");
			$(this).addClass("text-red-700");
			$(this).children()[1].style.display = "block";
		});

		$(".activateBtn").click(function () {
			$(this).removeClass("text-gray-700");
			$(this).addClass("text-green-700");
			$(this).children()[1].style.display = "block";
		});
	</script>
@endsection
