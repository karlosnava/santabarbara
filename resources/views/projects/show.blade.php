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

	<div class="grid grid-cols-10 gap-5">
		<div class="col-span-10 md:col-span-7">
			<img src="{{ Storage::url($project->cover) }}" class="w-full rounded-lg shadow-md h-96 object-cover object-center" alt="{{ $project->title }}">

			<div class="my-5">
				<div class="flex items-center">
					<div class="text-orange-500"><i class="fas fa-calendar-day"></i> {{ parseDate($project->created_at) }}</div>
					<div class="text-sky-500 ml-5"><i class="fas fa-eye"></i> {{ $project->views }}</div>
				</div>
				<h1 class="font-bold text-3xl mt-1">{{ $project->title }}</h1>

				<div class="mt-10">
					<div class="font-bold mb-2"><i class="fas fa-newspaper text-blue-500"></i> Descripción</div>
			    <hr class="mb-2">
			    <div>{!! $project->description !!}</div>

			    <div class="grid grid-cols-2 gap-5 mt-7">
				    @if($project->reach)
				    	<div class="col-span-2 md:col-span-1 bg-white py-4 px-5 shadow-md rounded-lg">
								<div class="font-bold mb-2"><i class="fas fa-user-chart text-indigo-500"></i> Alcance</div>
			    			<hr class="mb-2">
				    		<div>{!! $project->reach !!}</div>
				    	</div>
				    @endif

				    @if($project->objectives)
				    	<div class="col-span-2 md:col-span-1 bg-white py-4 px-5 shadow-md rounded-lg">
								<div class="font-bold mb-2"><i class="fas fa-bullseye-arrow text-red-500"></i> Objetivos</div>
			    			<hr class="mb-2">
				    		<div>{!! $project->objectives !!}</div>
				    	</div>
				    @endif
			    </div>
			  </div>
			</div>
		</div>

		<div class="col-span-10 md:col-span-3 relative">
			<div class="top-5 sticky">
				@if(count($projects) > 0)
					<div class="font-bold mb-2"><i class="fas fa-project-diagram text-red-500"></i> Otros proyectos</div>
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
				@elseif(count($posts) > 0)
					<div class="font-bold mb-2"><i class="fas fa-newspaper text-blue-500"></i> Mira estas publicaciones</div>
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
				@else
					<div class="font-bold mb-2"><i class="fas fa-folder text-yellow-500"></i> Directorios</div>
		      <hr class="mb-2">
		      @include('partials.sidebarfiles')
				@endif
			</div>
		</div>
	</div>

@endsection