@props([
	'bg' => 'bg-sky-600',
	'textcolor' => 'text-white',
	'type' => 'button',
	'id' => '',
	'class' => '',
	'full' => false,
	'text',
	'rounded' => 'rounded-md',
	'padding' => 'px-5 py-4',
	'margin' => 'm-0',
	'fontsize' => 'text-md',
])

<div>
	<button
		{{ $attributes }}
		type="{{ $type }}"
		@if($id) id="{{ $id }}" @endif
		class="{{ $bg }} {{ $padding }} {{ $margin }} {{ $rounded }} {{ $fontsize }} {{ $class }} {{ $textcolor }} @if($full) w-full @endif font-semibold duration-300 hover:opacity-90 disabled:opacity-50 disabled:cursor-not-allowed" >
		
		{!! $text !!}
	</button>
</div>
