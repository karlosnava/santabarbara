@extends('admin.layouts.app')

@section('content')
	<div class="mb-3">
		<a href="{{ route('admin.banners.index') }}" class="text-sky-500"><i class="fas fa-arrow-left"></i> Regresar</a>	
	</div>

	<div class="flex items-center justify-between mb-10">
		<h1 class="text-2xl font-bold f-montserrat text-gray-700">Banner</h1>
		<div>
			<x-form.link href="{{ route('admin.banners.edit', $banner) }}" bg="bg-green-600" text="<i class='fas fa-pencil'></i> Editar" />
		</div>
	</div>

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
	</div>
@endsection
