<div class="w-full">
	<hr class="my-2">
	<div class="flex items-center justify-around flex-wrap">
		<a href="" class="rounded-full my-2 py-2 px-8 text-orange-500 bg-orange-200 transition duration-300 hover:bg-orange-500 hover:text-white"><i class="fas fa-newspaper"></i> Noticias</a>
		<a href="" class="rounded-full my-2 py-2 px-8 text-emerald-500 bg-emerald-200 transition duration-300 hover:bg-emerald-500 hover:text-white"><i class="fas fa-microphone"></i> Podcasts</a>
		<a href="" class="rounded-full my-2 py-2 px-8 text-pink-500 bg-pink-200 transition duration-300 hover:bg-pink-500 hover:text-white"><i class="fas fa-image"></i> Galería</a>

	</div>
	<hr class="my-2">

	@forelse($newsSedeB as $new)
		<x-noticia :new="$new" />
	@empty
		No hay noticias para mostrar.
	@endforelse

	{{ $newsSedeB->links() }}
</div>