<a href="{{ route('news.show', $new) }}" class="inline-flex w-full bg-white p-4 rounded-md shadow-md border mt-5 hover:bg-gray-100">
	<div class="grid grid-cols-5 gap-5">
		<div class="col-span-2">
			<img src="{{ Storage::url($new->image) }}" class="w-full h-42 object-cover object-center shadow-md rounded-md">
		</div>

		<div class="col-span-3">
			<article>
				<h1 class="font-semibold text-xl">{{ $new->title }}</h1>
				<p class="text-sm text-gray-600 line-clamp-3">{!! $new->description !!}</p>
			</article>
		</div>
	</div>
</a>