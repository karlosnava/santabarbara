@extends('admin.layouts.app')

@section('content')
	<div class="flex items-center justify-between mb-10">
		<h1 class="text-2xl font-bold f-montserrat text-gray-700">Publicaciones</h1>
		<div>
			<x-form.link href="{{ route('admin.posts.create') }}" bg="bg-green-600" text="<i class='fas fa-plus'></i> Crear publicación" />
		</div>
	</div>

	@foreach($posts as $post)
		<x-postadmin :post="$post" />
	@endforeach

	{{ $posts->links() }}
@endsection
