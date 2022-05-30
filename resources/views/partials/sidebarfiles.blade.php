<div x-data="{
  @foreach ($directories as $directory)
    {{ str()->snake($directory->name) }} : true,
  @endforeach }">

  @foreach ($directories as $directory)
    @if($directory->newsletters->first())
      <div
        x-on:click="{{ str()->snake($directory->name) }} = !{{ str()->snake($directory->name) }}"
        :class="{{ str()->snake($directory->name) }} ? 'text-sky-600' : 'text-gray-600'"
        title="{{ $directory->name }}"
        class="transition duration-300 hover:text-sky-600 cursor-pointer mb-3">
          {{ $directory->name }}
          <i :class="{{ str()->snake($directory->name) }} ? 'rotate-90' : ''" class="fas fa-chevron-right ml-2 transition duration-300"></i>
      </div>
      <div class="mt-3 mb-5 ml-3 line-clamp-1" x-show="{{ str()->snake($directory->name) }}" x-transition>
        @forelse($directory->newsletters as $newsletter)
          <a href="{{ Storage::url($newsletter->url) }}" title="{{ $newsletter->name }}" class="flex items-center text-gray-600 my-1 py-2 px-4 rounded-md hover:text-sky-800 hover:bg-sky-200" download>
            <i class="fas fa-level-up text-xs text-gray-400 rotate-90 mr-2"></i>
            <img src="{{ asset("myicons/{$newsletter->type}.png") }}" class="w-5" alt="{{$newsletter->type}}">
            <small class="ml-2 line-clamp-1">{{$newsletter->name}}</small>
          </a>
        @empty
          <small class="text-gray-700">No hay archivos.</small>
        @endforelse
      </div>
    @endif
  @endforeach
</div>
