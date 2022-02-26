@extends('admin.layouts.app')

@section('content')
	<div class="flex items-center justify-between mb-10">
		<h1 class="text-2xl font-bold f-montserrat text-gray-700">Banners</h1>
		<div>
			<x-form.link href="{{ route('admin.banners.create') }}" bg="bg-green-600" text="<i class='fas fa-plus'></i> Crear banner" />
		</div>
	</div>
	<hr class="my-4">

	@foreach($banners as $banner)
    <div class="
      @if($banner->priority == "highlight")
        border-4 border-orange-500
      @endif
      relative shadow-lg rounded-lg bg-cover bg-center w-full mb-3"

      style="height: 300px; background-image: linear-gradient(to top, rgba(0, 0, 0, .3) 50%, transparent), url({{ Storage::url($banner->image); }});">
    	<div class="absolute bottom-10 left-10 text-white w-5/6 md:left-16">
    		@if($banner->priority == "highlight")
          <span class="text-white bg-orange-500 rounded-full text-sm">
            <i class="fas fa-star bg-white p-2 rounded-full text-orange-500"></i>
            <span class="px-2">Destacado</span>
          </span>
        @endif
        <h5 class="text-2xl font-bold mb-2">{{ $banner->title }}</h5>
    		<p class="text-white text-base leading-5 line-clamp-3 w-full md:w-1/2">{{ $banner->description }}</p>
        
        @if($banner->text_url)
          <x-form.link href="{{ $banner->url }}" margin="mt-3" newtab="true" text="{{ $banner->text_url }}" />
        @endif
    	</div>

    	<div class="absolute top-10 right-10 text-white md:right-16">
    		<div class="flex items-center">
    			<a href="{{ route('admin.banners.show', $banner) }}" class="bg-white px-2 py-1 rounded-full text-gray-700 mx-1"><i class="fas fa-eye"></i></a>
    			<a href="{{ route('admin.banners.edit', $banner) }}" class="bg-white px-2 py-1 rounded-full text-gray-700 mx-1"><i class="fas fa-pencil"></i></a>

    			<form action="{{ route('admin.banners.destroy', $banner) }}" method="POST">
    				@csrf
    				@method("DELETE")
    				<div class="deleteBtn flex items-center bg-white p-2 rounded-full text-gray-700 mx-1 cursor-pointer">
	    				<i class="fas fa-trash"></i>
    					
	    				<button type="submit" class="text-sm ml-2" style="display: none">Presiona aquí para confirmar</button>
    				</div>
    			</form>
    		</div>
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
	</script>
@endsection
