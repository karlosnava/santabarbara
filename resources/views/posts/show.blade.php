@extends('layouts.app')

@section('css')
	<style>
		h1, h2, h3, h4, h5, h6 { font-weight: bold; }
		h1, h2, h3 { font-size: 25px; }
		h4, h5, h6 { font-size: 18px; }
		table, tr, td { border: 1px solid rgba(0, 0, 0, .3); }
		td { padding: 5px 10px; }
		table a, p a { color: #007BFF; text-decoration: underline; }
	</style>
@append

@section('content')
	<div class="bg-white p-8 mb-12 rounded-md shadow-md border">
		<div class="grid grid-cols-5 gap-5">
			<div class="col-span-5 md:col-span-3">
				<div class="flex items-center">
					<div class="text-orange-500"><i class="fas fa-calendar-day"></i> {{ parseDate($post->created_at) }}</div>
					<div class="text-sky-500 ml-3"><i class="fas fa-eye"></i> {{ $post->views }}</div>
				</div>
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

			<div class="col-span-5 md:col-span-2 relative">
				<div class="top-5 sticky">
					@if(count($posts) > 0)
						<div class="font-bold mb-2"><i class="fas fa-newspaper text-blue-500"></i> Otras publicaciones</div>
						<hr class="mb-2">
					
						@foreach($posts as $post)
							<a href="{{ route('posts.show', $post) }}">
								<div class="grid grid-cols-6 gap-2 bg-white rounded-lg p-1 mb-2 hover:bg-gray-100">
										<div class="col-span-3">
											<img src="{{ Storage::url($post->images->first()->url) }}" class="w-full rounded-lg shadow-md h-20 object-cover object-center" alt="">
										</div>
										<div class="col-span-3">
											<div class="flex items-center">
												<div class="text-xs text-gray-500"><i class="fas fa-school"></i> {{ $post->location->name }}</div>
												<div class="text-xs text-gray-500 ml-3"><i class="fas fa-eye"></i> {{ $post->views }}</div>
											</div>
											<div class="font-semibold line-clamp-1">{{ $post->title }}</div>
										</div>
								</div>
							</a>
						@endforeach
					@elseif(count($projects) > 0)
						<div class="font-bold mb-2"><i class="fas fa-project-diagram text-red-500"></i> Mira estos proyectos</div>
						<hr class="mb-2">

						@foreach($projects as $recomendedProject)
							<a href="{{ route('projects.show', $recomendedProject) }}">
								<div class="grid grid-cols-6 gap-2 bg-white rounded-lg p-1 mb-2 hover:bg-gray-100">
									<div class="col-span-3">
										<img src="{{ Storage::url($recomendedProject->cover) }}" class="w-full rounded-lg shadow-md h-20 object-cover object-center" alt="">
									</div>
									<div class="col-span-3">
										<div class="text-xs text-gray-500"><i class="fas fa-eye"></i> {{ $recomendedProject->views }}</div>
										<div class="font-semibold line-clamp-1">{{ $recomendedProject->title }}</div>
									</div>
								</div>
							</a>
						@endforeach
					@else
						<div class="font-bold mb-2"><i class="fas fa-folder text-yellow-500"></i> Directorios</div>
			      <hr class="mb-2">
			      @include('partials.sidebarfiles')
					@endif
				</div>
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
