@extends('admin.layouts.app')

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
	<div class="grid grid-cols-2 gap-5 mb-5">
		<div><x-form.link href="{{ route('admin.posts.index') }}" bg="bg-blue-200" textcolor="text-blue-500" padding="py-5" text="Regresar" /></div>
		<div><x-form.link href="{{ route('admin.posts.edit', $post) }}" bg="bg-green-200" textcolor="text-green-500" padding="py-5" text="Editar" /></div>
	</div>

	<div class="grid grid-cols-5 gap-5">
		<div class="col-span-3">
			<div class="swiper myBanner" style="height:350px!important">
			  <div class="swiper-wrapper">
			  	@php $totalsize = 0; @endphp
			    @foreach($post->images as $image)
			    	<div class="swiper-slide w-full">
			    		<img src="{{ Storage::url($image->url) }}" class="w-full h-full object-cover object-center rounded-md">
			  		</div>

			  		@php $totalsize += $image->size @endphp
			    @endforeach
			  </div>

			  <div class="swiper-pagination"></div>
			  <div class="swiper-button-next"></div>
			  <div class="swiper-button-prev"></div>
			</div>

			<h1 class="my-5 font-bold text-gray-800 text-3xl">{{ $post->title }}</h1>
			<p class="text-gray-700">{!! $post->extract !!}</p>
			<p class="text-gray-700 mt-8">{!! $post->description !!}</p>
		</div>

		<div class="col-span-2">
			<div class="border rounded-md mb-3 p-5">
				<div class="text-gray-600">Publicado por:</div>
				<div class="font-bold text-xl">{{ $post->user->name }}</div>
			</div>
			<div class="border rounded-md mb-3 p-5">
				<div class="text-gray-600">Vistas:</div>
				<div class="font-bold text-xl">{{ $post->views }}</div>
			</div>
			<div class="border rounded-md mb-3 p-5">
				<div class="text-gray-600">Fecha de publicación:</div>
				<div class="font-bold text-xl">{{ parseDate($post->created_at, true) }}</div>
			</div>
			<div class="border rounded-md mb-3 p-5">
				<div class="text-gray-600">Última actualización:</div>
				<div class="font-bold text-xl">{{ parseDate($post->updated_at, true) }}</div>
			</div>

			<div class="border rounded-md mb-3 p-5">
				<div class="text-gray-600">Tamaño del post:</div>
				<div class="font-bold text-xl">{{ parseSize($totalsize) }}</div>
			</div>

			<form action="{{ route('admin.posts.destroy', $post) }}" method="POST">
				@csrf
				@method('DELETE')
				<x-form.button type="submit" bg="bg-transparent" fontsize="text-sm" textcolor="text-red-500" text="Eliminar" />
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
