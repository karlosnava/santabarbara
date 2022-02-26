<div x-data="{
  @foreach ($directories as $directory)
    {{ str()->snake($directory->name) }} : false,
  @endforeach }">

  @foreach ($directories as $directory)
    <div
      x-on:click="{{ str()->snake($directory->name) }} = !{{ str()->snake($directory->name) }}"
      :class="{{ str()->snake($directory->name) }} ? 'text-sky-600' : 'text-gray-600'"
      class="transition duration-300 hover:text-sky-600 cursor-pointer mb-3">
        {{ $directory->name }}
        <i :class="{{ str()->snake($directory->name) }} ? 'rotate-90' : ''" class="fas fa-chevron-right ml-2 transition duration-300"></i>
    </div>
    <div class="mt-3 mb-5 ml-5" x-show="{{ str()->snake($directory->name) }}" x-transition>
      @forelse($directory->newsletters as $newsletter)
        <a href="{{ Storage::url($newsletter->url) }}" class="flex items-center text-gray-600 my-3 hover:text-gray-800" download>
          <img src="{{ asset("myicons/{$newsletter->type}.png") }}" class="w-5" alt="{{$newsletter->type}}">
          <small class="ml-2">{{$newsletter->name}}</small>
        </a>
      @empty
        <small class="text-gray-700">No hay archivos.</small>
      @endforelse
    </div>

  @endforeach
</div>
