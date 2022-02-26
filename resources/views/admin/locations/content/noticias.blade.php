@forelse($news as $new)
	<x-noticiaadmin :new="$new" />
@empty
	No hay noticias para mostrar.
@endforelse
