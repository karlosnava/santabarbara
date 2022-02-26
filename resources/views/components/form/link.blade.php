@props([
	'bg' => 'bg-sky-600',
	'textcolor' => 'text-white',
	'href' => '#',
	'attr' => '',
	'newtab' => false,
	'full' => false,
	'id' => '',
	'class' => '',
	'css' => '',
	'icon' => '',
	'text',
	'rounded' => 'rounded-md',
	'padding' => 'px-5 py-2',
	'margin' => 'm-0',
	'fontsize' => 'text-md',
])

<a
	href="{{ $href }}"
	{{ $attr }}
	@if($id) id="{{ $id }}" @endif
	@if($css) style="{{ $css }}" @endif
	@if($newtab) target="_blank" @endif
	class="{{ $bg }} {{ $padding }} {{ $margin }} {{ $rounded }} {{ $fontsize }} {{ $class }} {{ $textcolor }} @if($full) w-full @endif font-semibold inline-flex items-center justify-center duration-300 hover:opacity-90" >
	
	<i class="{{ $icon }}"></i> <div class="@if($icon) ml-2 @endif">{!! $text !!}</div>
</a>
