@extends('layouts.app')

@section('content')
	<div class="block">
		<div class="relative -z-10">
			<img src="{{ Storage::url($newspaper->image) }}" class="object-cover w-full h-96 object-center rounded-2xl">
		</div>

		<div class="mx-auto -mt-28 bg-white shadow-md rounded-2xl border p-8 w-11/12 md:9/12">
			<h1 class="font-bold text-gray-700 text-3xl">{{ $newspaper->title }}</h1>
			<hr class="mt-4">

			<div class="flex items-center justify-around flex-wrap">
				<div class="bg-pink-100 text-pink-800 rounded-full py-1 px-4 my-2"><i class="fas fa-eye"></i> {{ $newspaper->views }}</div>
				<div class="bg-emerald-100 text-emerald-800 rounded-full py-1 px-4 my-2"><i class="fas fa-school"></i> {{ $newspaper->location->name }}</div>
				<div class="bg-sky-100 text-sky-800 rounded-full py-1 px-4 my-2"><i class="fas fa-user"></i> {{ $newspaper->user->name }}</div>
				<div class="bg-orange-100 text-orange-800 rounded-full py-1 px-4 my-2"><i class="fas fa-calendar-day"></i> {{ parseDate($newspaper->created_at) }}</div>
			</div>

			<hr class="mb-4">
			<p class="text-gray-600">{!! $newspaper->description !!}</p>
		</div>
	</div>
@endsection