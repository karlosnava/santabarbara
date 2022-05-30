@extends('layouts.app')

@section('content')
  <div class="grid grid-cols-10 gap-5">
    <div class="col-span-10 md:col-span-7 bg-white rounded-md border shadow-md p-4">
      <div x-data="{ sedea: false, sedeb: false, sedec: false, todas: true }">
        <div class="grid grid-cols-4 gap-1 md:gap-3">
          <div x-on:click="sedeb = false, sedec = false, todas = true, sedea = false" :class="todas ? 'text-sky-600 bg-sky-200 hover:bg-sky-200' : 'text-gray-600 hover:bg-gray-200'" class="cursor-pointer font-bold text-center rounded-md py-4">Todas</div>
          <div x-on:click="sedeb = false, sedec = false, sedea = true, todas = false" :class="sedea ? 'text-sky-600 bg-sky-200 hover:bg-sky-200' : 'text-gray-600 hover:bg-gray-200'" class="cursor-pointer font-bold text-center rounded-md py-4">Sede A</div>
          <div x-on:click="sedea = false, sedec = false, sedeb = true, todas = false" :class="sedeb ? 'text-sky-600 bg-sky-200 hover:bg-sky-200' : 'text-gray-600 hover:bg-gray-200'" class="cursor-pointer font-bold text-center rounded-md py-4">Sede B</div>
          <div x-on:click="sedea = false, sedeb = false, sedec = true, todas = false" :class="sedec ? 'text-sky-600 bg-sky-200 hover:bg-sky-200' : 'text-gray-600 hover:bg-gray-200'" class="cursor-pointer font-bold text-center rounded-md py-4">Sede C</div>
        </div>

        <div class="my-4" x-show="todas" x-transition>
          @include('sedes.todas')
        </div>

        <div class="my-4" x-show="sedea" x-transition>
          @include('sedes.sedea')
        </div>

        <div class="my-4" x-show="sedeb" x-transition>
          @include('sedes.sedeb')
        </div>

        <div class="my-4" x-show="sedec" x-transition>
          @include('sedes.sedec')
        </div>
      </div>
    </div>

    <div class="col-span-10 relative md:col-span-3 bg-white rounded-md border shadow-md p-4">
      <div class="sticky top-5">
        <div class="font-bold mb-2"><i class="fas fa-folder text-yellow-500"></i> Directorios</div>
        <hr class="mb-2">
        @include('partials.sidebarfiles')
      </div>
    </div>
  </div>
@endsection

@section('js')
@append
