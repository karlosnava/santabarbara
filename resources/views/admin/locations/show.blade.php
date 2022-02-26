@extends('admin.layouts.app')

@section('content')	
	<div class="grid grid-cols-5 gap-5">
		<div class="col-span-5 md:col-span-3">
			<div x-data="{ noticias: true, podcasts: false, actividades: false, galeria: false }" class="flex items-center justify-around flex-wrap">
				<div x-on:click="galeria = false, actividades = false, podcasts = false, noticias = true" :class="noticias ? 'bg-orange-500 text-white' : 'text-orange-500 bg-orange-200'" class="rounded-full my-2 py-2 px-8 cursor-pointer transition duration-300 hover:bg-orange-500 hover:text-white"><i class="fas fa-newspaper"></i> Noticias</div>
				<div x-on:click="galeria = false, actividades = false, noticias = false, podcasts = true" :class="podcasts ? 'bg-emerald-500 text-white' : 'text-emerald-500 bg-emerald-200'" class="rounded-full my-2 py-2 px-8 cursor-pointer transition duration-300 hover:bg-emerald-500 hover:text-white"><i class="fas fa-microphone"></i> Podcasts</div>
				<div x-on:click="galeria = false, noticias = false, podcasts = false, actividades = true" :class="actividades ? 'bg-indigo-500 text-white' : 'text-indigo-500 bg-indigo-200'" class="rounded-full my-2 py-2 px-8 cursor-pointer transition duration-300 hover:bg-indigo-500 hover:text-white"><i class="fas fa-medal"></i> Actividades</div>
				<div x-on:click="noticias = false, podcasts = false, actividades = false, galeria = true" :class="galeria ? 'bg-pink-500 text-white' : 'text-pink-500 bg-pink-200'" class="rounded-full my-2 py-2 px-8 cursor-pointer transition duration-300 hover:bg-pink-500 hover:text-white"><i class="fas fa-image"></i> Galería</div>

				<div class="my-4 w-full" x-show="noticias" x-transition>
					<div class="flex items-center justify-end">
						<x-form.link href="{{ route('admin.newspapers.create', ['location_id' => $location->id]) }}" bg="bg-orange-500" icon="fas fa-plus" text="Crear noticia" />
					</div>
					@include('admin.locations.content.noticias')
				</div>

				<div class="my-4 w-full" x-show="podcasts" x-transition>
					<x-form.link href="#" bg="bg-emerald-500" icon="fas fa-plus" text="Crear podcast" />
					@include('admin.locations.content.podcasts')
				</div>

				<div class="my-4 w-full" x-show="actividades" x-transition>
					<x-form.link href="#" bg="bg-indigo-500" icon="fas fa-plus" text="Crear actividad" />
					@include('admin.locations.content.actividades')
				</div>

				<div class="my-4 w-full" x-show="galeria" x-transition>
					<x-form.link href="#" bg="bg-pink-500" icon="fas fa-plus" text="Crear album" />
					@include('admin.locations.content.galeria')
				</div>
			</div>
		</div>
		
		<div class="col-span-5 md:col-span-2">
			<img src="https://images.pexels.com/photos/10860933/pexels-photo-10860933.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" class="w-full h-56 rounded-md object-cover object-center shadow-md" alt="SEDE A">
			<div class="flex items-center justify-between mt-3">
				<h1 class="font-bold text-3xl mb-3 text-gray-700">{{ $location->name }}</h1>
				<a href="{{ route('admin.locations.edit', $location) }}" class="bg-sky-500 text-white rounded-md py-1 px-3"><i class="fas fa-edit"></i> Editar</a>
			</div>
		</div>
	</div>
@endsection
