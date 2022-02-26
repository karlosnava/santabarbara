@props([
	'name',
	'label',
	'value' => '',
	'class' => '',
	'required' => false,
	'checked' => false
])

<div>
	<div>
		<input
			type="checkbox"
			name="{{ $name }}"
			@if($value) value="{{ $value }}" @endif
			id="{{ $name }}"
			@if($class) class="{{ $class }}" @endif
			@if($required) required @endif
			@if($checked) checked @endif />
	    <label for="{{ $name }}">{{ $label }}</label>
	    
	    @error($name)
			<small class="red-color">{{ $message }}</small>
	    @enderror
	</div>
</div>
