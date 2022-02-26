@extends('layouts.app')

@section('css')
  <style>
    .swiperPosts .swiper-slide {
      background: white;
      height: auto;
      max-height: 240px;
      border-radius: 15px;
      width: 80%;
    }
  </style>
@endsection

@section('content')

  <div class="grid grid-cols-10 gap-5">
    <div class="col-span-10 md:col-span-7 bg-white rounded-md border shadow-md p-4">
      <div x-data="{ sedea: true, sedeb: false, sedec: false }">
        <div class="grid grid-cols-3 gap-2 md:gap-5">
          <div x-on:click="sedeb = false, sedec = false, sedea = true" :class="sedea ? 'text-sky-600 bg-sky-200 hover:bg-sky-200' : 'text-gray-600 hover:bg-gray-200'" class="cursor-pointer font-bold text-center rounded-md py-4">Sede A</div>
          <div x-on:click="sedea = false, sedec = false, sedeb = true" :class="sedeb ? 'text-sky-600 bg-sky-200 hover:bg-sky-200' : 'text-gray-600 hover:bg-gray-200'" class="cursor-pointer font-bold text-center rounded-md py-4">Sede B</div>
          <div x-on:click="sedea = false, sedeb = false, sedec = true" :class="sedec ? 'text-sky-600 bg-sky-200 hover:bg-sky-200' : 'text-gray-600 hover:bg-gray-200'" class="cursor-pointer font-bold text-center rounded-md py-4">Sede C</div>
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

    <div class="col-span-10 md:col-span-3 bg-white rounded-md border shadow-md p-4">
      <h1 class="text-gray-600 font-semibold text-md mb-3">Publicaciones</h1>
      <div class="swiper swiperPosts mb-7">
        <div class="swiper-wrapper">
          @forelse($posts as $post)
            <div class="swiper-slide border rounded-md">
              <x-post :post="$post" />
            </div>
          @empty
            No hay publicaciones.
          @endforelse
        </div>
        <div class="swiper-pagination"></div>
      </div>
      <hr class="my-5">

      @include('partials.sidebarfiles')
    </div>
  </div>
@endsection

@section('js')
  <script>
    var swiper = new Swiper(".swiperPosts", {
      slidesPerView: 'auto',
      spaceBetween: 15,
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
    });
  </script>
@append
