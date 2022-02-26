@extends('admin.layouts.app')

@section('content')
	<h1 class="text-2xl font-bold f-montserrat text-gray-700"><i class="fas fa-school"></i> Sedes</h1>

	<div class="grid grid-cols-3 gap-5 mt-5">
		@foreach($sedes as $sede)
			<a href="{{ route('admin.locations.show', $sede) }}" class="rounded-md p-3 shadow-md border cursor-pointer hover:bg-gray-200">
				<article>
					<img src="https://images.pexels.com/photos/10860933/pexels-photo-10860933.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" class="w-full h-56 rounded-md shadow-md object-cover object-center " alt="Sede A">
					<h1 class="font-bold text-2xl text-gray-800 my-3">{{ $sede->name }}</h1>
					<p class="my-3 text-sm text-gray-700">{{ $sede->description }}</p>
					<div class="my-2 text-gray-700 font-semibold text-sm">{{ $sede->direction }}</div>
					<hr class="mb-4">
					<div class="flex items-center text-gray-700 text-sm justify-between">
						<div><i class="fas fa-phone"></i> {{ $sede->phone }}</div>
						<div><i class="fas fa-clock"></i> {{ $sede->opens }} {{ $sede->closes }}</div>
					</div>
				</article>
			</a>
		@endforeach
	</div>
@endsection
