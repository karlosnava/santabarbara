<a href="{{ route('admin.posts.show', $post) }}" class="grid grid-cols-7 gap-5 p-3 rounded-md border mb-5 hover:bg-gray-100">
	<div class="col-span-7 sm:col-span-2">
		<img src="{{ Storage::url($post->images->first()->url) }}" class="rounded-lg shadow-md w-100 object-cover object-center" alt="{{ $post->title }}">
	</div>
	<div class="col-span-7 sm:col-span-5">
		<article>
			<div class="flex items-center">
				<div class="mr-5">					
					<small class="text-gray-600"><i class="fas fa-user"></i> {{ $post->user->name }}</small>
				</div>
				<div class="mr-5">					
					<small class="text-gray-600"><i class="fas fa-calendar"></i> {{ $post->created_at }}</small>
				</div>
				<div>
					<small class="text-gray-600"><i class="fas fa-eye"></i> {{ $post->views }}</small>
				</div>
			</div>

			<h1 class="font-semibold text-xl text-gray-700 mb-3">{{ $post->title }}</h1>
			<p class="text-gray-600 text-sm lin-clamp-4">{!! $post->extract !!}</p>
		</article>
	</div>
</a>