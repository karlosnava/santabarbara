@php
	$links = [
		'Institucional' => '/',
		'Proyectos'     =>'/',
		'Plataforma'    => route('admin.index')
	];
@endphp

<nav class="shadow-md bg-white mb-5">
	<div class="flex items-center md:block md:grid md:grid-cols-2 container py-2 flex items-center justify-between">
		<div class="flex items-center">		
			<a href="/"><img src="{{ asset(config('settings.page_icon')) }}" class="w-10 md:w-12" alt="{{ config('settings.app_name') }}"></a>
			<a href="/"><h1 class="text-sm line-clamp-1 ml-3 roboto-500 text-gray-800 md:text-lg"> | {{ config('settings.app_name') }}</h1></a>
		</div>

		<div class="block md:hidden">
			<i class="fas fa-bars p-3 rounded-md cursor-pointer hover:bg-gray-200" id="navmenu"></i>

			<div class="f-montserrat" id="dropcontent" style="display:none">
				@foreach($links as $key => $link)
					<a href="{{ $link }}"
						class="text-base font-semibold text-gray-600 py-2 px-4 mb-1 inline-flex rounded-md w-full hover:bg-gray-200 hover:text-gray-800">
					{{ $key }}</a>
				@endforeach
			</div>
		</div>

		<div class="f-montserrat hidden md:block">
			<ul class="w-full flex items-center justify-between">
				@foreach($links as $key => $link)
					<li><a href="{{ $link }}" class="text-base text-gray-600 hover:text-gray-800">{{ $key }}</a></li>
				@endforeach
			</ul>
		</div>
	</div>
</nav>

@section('js')
	<script>
		const template = document.getElementById('dropcontent').innerHTML;

		tippy('#navmenu', {
		  content: template,
		  arrow: true,
		  allowHTML: true,
		  interactive: true,
		  trigger: 'click',
		  placement: 'bottom',
		  theme: 'light-border',
		});
	</script>
@endsection
