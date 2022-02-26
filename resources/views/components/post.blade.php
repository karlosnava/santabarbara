<div class="hover:bg-gray-100">
	<a href="{{ route('posts.show', $post) }}" class="rounded-md">
	  <div class="p-3">
	    <img src="{{ Storage::url($post->images->first()->url) }}" class="rounded-lg object-cover object-center w-full h-36 shadow-md" alt="{{ $post->title }}">
	    <article class="mt-3">
				<small class="text-gray-600"><i class="fas fa-calendar"></i> {{ parseDate($post->created_at) }}</small>
				<h1 class="font-semibold text-base text-gray-700 mb-3 line-clamp-1">{{ $post->title }}</h1>
			</article>
	  </div>
	</a>
</div>