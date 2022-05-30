@extends('layouts.app')

@section('content')
	<h2 class="font-bold text-4xl"><i class="fas fa-project-diagram text-red-500"></i> Proyectos</h2>

	<div class="bg-white rounded-lg mt-5 py-5 px-8">
		<div class="grid grid-cols-9 gap-5">
			@forelse($projects as $project)
				<div class="col-span-9 md:col-span-3 shadow-md relative">
					<a href="{{ route('projects.show', $project) }}">
						<img src="{{ Storage::url($project->cover) }}" class="w-full h-44 object-cover object-center rounded-lg" alt="{{ $project->title }}">
						<div class="absolute bottom-0 left-0 p-4 w-full text-white rounded-lg bg-gradient-to-t from-black">
							<div class="text-sm text-gray-200"><i class="fas fa-eye"></i> {{ $project->views }}</div>
							<hr class="my-1">
							<div class="font-semibold line-clamp-2">{{ $project->title }}</div>
						</div>
					</a>
				</div>
			@empty
				<div class="col-span-9 md:col-span-4">
					<img src="{{ asset('img/empty.jpg') }}" class="w-full" alt="">
				</div>
				<div class="col-span-9 md:col-span-5">
					<div class="font-bold text-2xl">Todavía no hay proyectos</div>
					<hr class="my-2">
					<p class="text-gray-700">Aún no tenemos proyectos para mostrarte, cuando tengamos uno o más te los mostraremos justo aquí.</p>
				</div>
			@endforelse
		</div>
	</div>
@endsection
