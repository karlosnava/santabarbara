@extends('layouts.app')

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
	<div class="bg-white p-8 mt-10 mb-12 rounded-md shadow-md border">
		<div class="grid grid-cols-5 gap-5">
			<div class="col-span-5 md:col-span-3">
				<h1 class="mb-5 font-bold text-gray-800 text-3xl">{{ $post->title }}</h1>

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

				<p class="text-gray-700 my-8">{!! $post->extract !!}</p>
				<p class="text-gray-700">{!! $post->description !!}</p>
			</div>

			<div class="col-span-5 md:col-span-2">
				b
			</div>
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
