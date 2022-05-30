@extends('adminlte::page')

@section('content')
	<div class="py-3">
		<a href="{{ route('admin.banners.index') }}"><i class="fas fa-arrow-left"></i> Regresar</a>	
	</div>

	<div class="d-flex align-items-center justify-content-between mb-4">
		<div class="d-flex align-items-center">
			<h1 class="text-secondary mr-3">Banner</h1>
			<a href="{{ route('admin.banners.edit', $banner) }}" class="btn btn-success"><i class='fas fa-pencil'></i> Editar</a>
		</div>
	</div>

	<div style="height: 300px; border-radius: 15px; background-image: linear-gradient(to top, rgba(0, 0, 0, .3) 50%, transparent), url({{ Storage::url($banner->image); }});
		@if($banner->priority == 'highlight')
      border: 4px solid orange;
    @endif
    	position: relative; box-shadow: 0px 0px 0px rgba(0, 0, 0, .5); background-position: center; background-size: cover; width: 100%; margin-bottom: 5px;">
  	<div style="position: absolute; bottom:30px; left: 40px;" class="text-white">
  		@if($banner->priority == "highlight")
        <span class="text-white bg-warning rounded-full text-sm">
          <i class="fas fa-star bg-white p-2 rounded-full text-warning"></i>
          <span class="px-2">Destacado</span>
        </span>
      @endif
      <h1 style="font-weight: bold;" class="mb-2">{{ $banner->title }}</h1>
  		<p class="text-white w-100">{{ $banner->description }}</p>
      
      @if($banner->text_url)
        <a href="{{ $banner->url }}" class="btn btn-warning mt-1" target="_blank">{{ $banner->text_url }}</a>
      @endif
  	</div>
	</div>
@endsection
