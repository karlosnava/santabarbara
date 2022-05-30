@extends('adminlte::page')

@section('content')
	<h3 class="font-weight-bold py-3">Banners <a href="{{ route('admin.banners.create') }}" class="btn btn-success rounded-circle ml-2"><i class='fas fa-plus'></i></a></h3>
	<hr class="my-4">

	@forelse($banners as $banner)
    <div style="height: 300px; background-image: linear-gradient(to top, rgba(0, 0, 0, .3) 50%, transparent), url({{ Storage::url($banner->image); }});
    	@if($banner->priority == "highlight")
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

    	<div style="position: absolute; top: 20px; right: 20px;" class="text-white">
    		<div class="d-flex align-items-center">
    			<a href="{{ route('admin.banners.show', $banner) }}" class="bg-white px-2 py-1 rounded-circle text-secondary mx-1"><i class="fas fa-eye"></i></a>
    			<a href="{{ route('admin.banners.edit', $banner) }}" class="bg-white px-2 py-1 rounded-circle text-secondary mx-1"><i class="fas fa-pen"></i></a>

    			<form action="{{ route('admin.banners.destroy', $banner) }}" method="POST">
    				@csrf
    				@method("DELETE")
    				<div class="deleteBtn d-flex align-items-center bg-white p-2 text-secondary mx-1">
	    				<i class="fas fa-trash"></i>
    					
	    				<button type="submit" class="text-sm ml-2" style="display: none">Presiona aquí para confirmar</button>
    				</div>
    			</form>
    		</div>
    	</div>
  	</div>
  @empty
  	Todavía no hay Banners creados, empieza a crear uno.
  @endforelse
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
