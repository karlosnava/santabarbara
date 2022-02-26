<div>
	<ul>
		<li><a href="{{ route('admin.index') }}" class="{{ (request()->is('admin/index')) ? 'bg-zinc-600 text-white' : 'text-zinc-300' }} inline-flex w-full mb-2 rounded-md px-8 py-3 hover:text-white hover:bg-zinc-600">Dashboard</a></li>
		<li><a href="{{ route('admin.posts.index') }}" class="{{ (request()->is('admin/posts*')) ? 'bg-zinc-600 text-white' : 'text-zinc-300' }} inline-flex w-full mb-2 rounded-md px-8 py-3 hover:text-white hover:bg-zinc-600">Publicaciones</a></li>
		<li><a href="{{ route('admin.locations.index') }}" class="{{ (request()->is('admin/locations*')) ? 'bg-zinc-600 text-white' : 'text-zinc-300' }} inline-flex w-full mb-2 rounded-md px-8 py-3 hover:text-white hover:bg-zinc-600">Sedes</a></li>
		<li><a href="{{ route('admin.banners.index') }}" class="{{ (request()->is('admin/banners*')) ? 'bg-zinc-600 text-white' : 'text-zinc-300' }} inline-flex w-full mb-2 rounded-md px-8 py-3 hover:text-white hover:bg-zinc-600">Banners</a></li>
		<li><a href="{{ route('admin.directories.index') }}" class="{{ (request()->is('admin/directories*')) ? 'bg-zinc-600 text-white' : 'text-zinc-300' }} inline-flex w-full mb-2 rounded-md px-8 py-3 hover:text-white hover:bg-zinc-600">Directorios</a></li>
		<li><a href="{{ route('admin.configs.index') }}" class="{{ (request()->is('admin/configs*')) ? 'bg-zinc-600 text-white' : 'text-zinc-300' }} inline-flex w-full mb-2 rounded-md px-8 py-3 hover:text-white hover:bg-zinc-600">Configuración</a></li>
	</ul>
</div>