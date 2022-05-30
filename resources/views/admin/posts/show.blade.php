@extends('adminlte::page')

@section('css')
	<style>
		table, tr, th, td{
			border: 1px solid rgba(0, 0, 0, .3);
		}

		td, th{
			padding: 10px 15px;
		}
	</style>
@endsection

@section('content')
	<div class="pt-3">
		<a href="{{ route('admin.locations.show', $location) }}"><i class="fas fa-arrow-left"></i> Regresar</a>	
	</div>

	<div class="row py-4">
		<div class="col-12 col-md-6">
			<div class="swiper myBanner">
			  <div class="swiper-wrapper">
			  	@php $totalsize = 0; @endphp
			    @foreach($post->images as $image)
			    	<div class="swiper-slide w-full">
			    		<img src="{{ Storage::url($image->url) }}" class="img-fluid rounded-lg">
			  		</div>

			  		@php $totalsize += $image->size @endphp
			    @endforeach
			  </div>

			  <div class="swiper-pagination"></div>
			  <div class="swiper-button-next"></div>
			  <div class="swiper-button-prev"></div>
			</div>

			<div class="d-flex align-items-center">
				<h1 class="my-3">{{ $post->title }}</h1>
				<div class="ml-3">
					<a href="{{ route('admin.posts.edit', [$location, $post]) }}" class="btn btn-sm btn-outline-primary"><i class="fas fa-pen"></i> Editar post</a>
				</div>
			</div>
			<p class="text-secondary">{!! $post->extract !!}</p>
			<hr class="my-3">
			<p class="text-secondary">{!! $post->description !!}</p>
		</div>

		<div class="col-12 col-md-6">
			<div class="border rounded-md mb-3 p-3">
				<div class="text-secondary">Publicado por:</div>
				<div class="font-bold text-lg">{{ $post->user->name }}</div>
			</div>
			<div class="border rounded-md mb-3 p-3">
				<div class="text-secondary">Vistas:</div>
				<div class="font-bold text-lg">{{ $post->views }}</div>
			</div>
			<div class="border rounded-md mb-3 p-3">
				<div class="text-secondary">Fecha de publicación:</div>
				<div class="font-bold text-lg">{{ parseDate($post->created_at, true) }}</div>
			</div>
			<div class="border rounded-md mb-3 p-3">
				<div class="text-secondary">Última actualización:</div>
				<div class="font-bold text-lg">{{ parseDate($post->updated_at, true) }}</div>
			</div>

			<div class="border rounded-md mb-3 p-3">
				<div class="text-secondary">Tamaño del post:</div>
				<div class="font-bold text-lg">{{ parseSize($totalsize) }}</div>
			</div>

			<form action="{{ route('admin.posts.destroy', [$location, $post]) }}" method="POST">
				@csrf
				@method('DELETE')
				<button type="submit" class="btn btn-outline-danger">Eliminar post</button>
			</form>
		</div>
	</div>
@endsection

@section('js')
	<script>
		var swiper = new Swiper(".myBanner", {
			spaceBetween: 15,
			pagination: {
        el: ".swiper-pagination",
        dynamicBullets: true,
      },
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
    });
	</script>
@append
