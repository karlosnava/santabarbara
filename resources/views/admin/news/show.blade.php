@extends('admin.layouts.app')
@section('title', $newspaper->title)

@section('content')
	
	<div class="mb-5">
		<a href="{{ route('admin.locations.index') }}" class="text-xl text-sky-500">Regresar</a>
	</div>

	<div class="w-full relative">
		<img src="{{ Storage::url($newspaper->image) }}" class="object-cover w-full h-96 object-center rounded-2xl">

		<div class="absolute left-0 right-0 -translate-y-32 mx-auto bg-white shadow-md rounded-2xl border p-8 w-11/12 md:9/12">
			
			@if($newspaper->status == 'draft')
				<span data-tippy-content="Porque ha sido marcada como borrador." class="bg-red-500 text-sm text-white px-4 rounded-md">La noticia no está siendo mostrada.</span>
			@endif

			<h1 class="font-bold text-gray-700 text-3xl">{{ $newspaper->title }}</h1>
			<hr class="mt-4">

			<div class="flex items-center justify-between flex-wrap">
				<div class="bg-pink-100 text-pink-800 rounded-full py-1 px-4 my-2"><i class="fas fa-eye"></i> {{ $newspaper->views }}</div>
				<div class="bg-emerald-100 text-emerald-800 rounded-full py-1 px-4 my-2"><i class="fas fa-school"></i> {{ $newspaper->location->name }}</div>
				<div class="bg-sky-100 text-sky-800 rounded-full py-1 px-4 my-2"><i class="fas fa-user"></i> {{ $newspaper->user->name }}</div>
				<div class="bg-orange-100 text-orange-800 rounded-full py-1 px-4 my-2"><i class="fas fa-calendar-day"></i> {{ parseDate($newspaper->created_at) }}</div>
			</div>

			<hr class="mb-4">
			<p class="text-gray-600">{!! $newspaper->description !!}</p>

			<div class="flex items-center justify-end mt-8">
				<x-form.link href="{{ route('admin.newspapers.edit', [$newspaper, 'location_id' => $newspaper->location_id]) }}" icon="fas fa-pen" text="Editar noticia" />
			</div>
		</div>
	</div>

@endsection