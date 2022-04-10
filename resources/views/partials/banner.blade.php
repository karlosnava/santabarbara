<div class="swiper myBanner">
  <div class="swiper-wrapper">
    @foreach($banners as $banner)
      <div class="
        @if($banner->priority == "highlight")
          border-4 border-orange-500
        @endif
        relative swiper-slide shadow-lg rounded-lg bg-cover bg-center w-full"

        style="height: 300px; background-image: linear-gradient(to top, rgba(0, 0, 0, .3) 50%, transparent), url({{ Storage::url($banner->image) }});">
      	<div class="absolute bottom-10 left-10 text-white w-5/6 md:left-16">
      		@if($banner->priority == "highlight")
            <span class="text-white bg-orange-500 rounded-full text-sm">
              <i class="fas fa-star bg-white p-2 rounded-full text-orange-500"></i>
              <span class="px-2">Destacado</span>
            </span>
          @endif
          <h5 class="text-2xl font-bold mb-2">{{ $banner->title }}</h5>
      		<p class="text-white text-base leading-5 line-clamp-3 w-full md:w-1/2">{{ $banner->description }}</p>
          
          @if($banner->text_url)
            @if($banner->priority == "highlight")
              <x-form.link href="{{ $banner->url }}" margin="mt-3" bg="bg-orange-500" newtab="true" text="{{ $banner->text_url }}" />
            @else
              <x-form.link href="{{ $banner->url }}" margin="mt-3" newtab="true" text="{{ $banner->text_url }}" />
            @endif
          @endif
      	</div>
    	</div>
    @endforeach
  </div>

  <div class="swiper-pagination"></div>
  <div class="swiper-button-next"></div>
  <div class="swiper-button-prev"></div>
</div>

@section('js')
	<script>
		var swiper = new Swiper(".myBanner", {
      spaceBetween: 8,
			pagination: {
        el: ".swiper-pagination",
        dynamicBullets: true,
      },
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
    });
  </script>
@append