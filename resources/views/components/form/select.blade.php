@props([
	'name' => '',
	'margin' => 'my-2',
	'label',
	'id' => '',
	'required' => true,
	'autofocus' => false
])

<div class="w-full relative {{ $margin }}">
	<select
		name="{{ $name }}"
		class="inp @error($name) inp-error @enderror rounded-t-md px-5 pb-3 pt-8 w-full"
		@if($id) id="{{ $name }}" @endif
		@if($required) required="true" @endif
		@if($autofocus) autofocus="true" @endif >

		<option disabled>Seleccione...</option>
		{{ $slot }}
	</select>

	<label for="{{ $name }}" class="inp-label">{{ $label }} @if(!$required) (opcional) @endif</label>

	@error($name)
		<small class="red-color">{{ $message }}</small>
    @enderror
</div>
