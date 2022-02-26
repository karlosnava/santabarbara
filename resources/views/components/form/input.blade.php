@props([
	'name',
	'type' => 'text',
	'margin' => 'my-2',
	'label',
	'required' => true,
	'autofocus' => false,

	/*DATE*/
	'min' => false,
	'max' => false,
	'minnow' => false,
	'maxnow' => false,
])

@if ($minnow)
	@php
		$min = date("Y-m-d");
	@endphp
@endif

@if ($maxnow)
	@php
		$max = date("Y-m-d");
	@endphp
@endif

<div class="w-full relative {{ $margin }}">
	<input
		type="{{ $type }}"
		name="{{ $name }}"
		@if($type !== "password") value="{{ old($name) }}" @endif
		@if($min || $minnow) min="{{ $min }}" @endif
		@if($max || $maxnow) max="{{ $max }}" @endif
		placeholder=" "
		class="inp rounded-t-md px-5 pb-3 pt-8 w-full @error($name) inp-error @enderror"
		required="{{ $required }}"
		autofocus="{{ $autofocus }}" />
	
	<label for="{{ $name }}" class="inp-label">{{ $label }} @if(!$required) (opcional) @endif</label>

	@error($name)
		<small class="red-color">{{ $message }}</small>
  @enderror
</div>
