<div class="w-full">
	<hr class="my-2">
	
	<div class="mt-5">
		<div class="font-bold mb-2"><i class="fas fa-newspaper text-blue-500"></i> Publicaciones para todas las sedes</div>
    <hr class="mb-2">

    @if(count($todas->posts->where('status', 'active')) > 0)
	    <div class="grid grid-cols-9 gap-5">
		    @foreach($todas->posts->where('status', 'active') as $post)
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
			  Todovía no hay publicaciones.
			</div>
    @endif
	</div>
</div>
