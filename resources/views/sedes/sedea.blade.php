<div class="w-full">
	<hr class="my-2">
	{{-- <div class="flex items-center justify-around flex-wrap">
		<a href="" class="rounded-full my-2 py-2 px-8 text-orange-500 bg-orange-200 transition duration-300 hover:bg-orange-500 hover:text-white"><i class="fas fa-newspaper"></i> Noticias</a>
		<a href="" class="rounded-full my-2 py-2 px-8 text-emerald-500 bg-emerald-200 transition duration-300 hover:bg-emerald-500 hover:text-white"><i class="fas fa-microphone"></i> Podcasts</a>
		<a href="" class="rounded-full my-2 py-2 px-8 text-indigo-500 bg-indigo-200 transition duration-300 hover:bg-indigo-500 hover:text-white"><i class="fas fa-medal"></i> Actividades</a>
		<a href="" class="rounded-full my-2 py-2 px-8 text-pink-500 bg-pink-200 transition duration-300 hover:bg-pink-500 hover:text-white"><i class="fas fa-image"></i> Galería</a>
	</div> --}}

	<div class="grid grid-cols-5">
		<div class="col-span-5 sm:col-span-2">
			<img src="{{ Storage::url($locationA->image) }}" class="w-full object-cover object-center shadow-lg rounded-lg" alt="{{ $locationA->name }}">
		</div>
		<div class="col-span-5 px-2 mt-3 sm:col-span-3 sm:mt-0 sm:px-4">
			<div class="font-bold text-xl mb-2">{{ $locationA->name }} <span class="text-gray-700 text-sm"> | {{ $locationA->opens }} - {{ $locationA->closes }}</span></div>
			<p class="text-gray-700 text-sm">{{ $locationA->description }}</p>
			<hr class="my-3">
			<div class="text-gray-700 text-sm text-right"><i class="fas fa-map-marker-alt"></i> {{ $locationA->direction }} <span class="mx-2">|</span> <a href="tel:{{ $locationA->phone }}"><i class="fas fa-phone rotate-90"></i> {{ $locationA->phone }}</a></div>
		</div>
	</div>

	<div class="mt-10">
		<div class="font-bold mb-2"><i class="fas fa-newspaper text-blue-500"></i> Publicaciones</div>
    <hr class="mb-2">

    @if(count($locationA->posts->where('status', 'active')) > 0)
	    <div class="grid grid-cols-9 gap-5">
		    @foreach($locationA->posts->where('status', 'active') as $post)
		    	<div class="col-span-9 md:col-span-3 shadow-sm rounded-lg p-2 border hover:bg-gray-100">
		    		<a href="{{ route('posts.show', $post) }}">
		    			<img src="{{ Storage::url($post->images->first()->url) }}" class="w-full rounded-lg h-36 object-center object-cover" alt="Error cargando: {{ $post->title }}">
		    			<div class="line-clamp-1 text-xs text-gray-500 mt-2"><i class="fas fa-calendar-day"></i> {{ parseDate($post->created_at) }}</div>
		    			<div class="font-bold line-clamp-2 text-gray-800">{{ $post->title }}</div>
		    		</a>
		    	</div>
		    @endforeach
	    </div>
	  @else
	  	<div class="bg-purple-100 rounded-lg py-4 px-6 mb-4 text-base text-purple-700 mb-3" role="alert">
			  Esta sede aún no tiene publicaciones. ¡Pero seguro mañana sí!
			</div>
    @endif
	</div>
</div>
