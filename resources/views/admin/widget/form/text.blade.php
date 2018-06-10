@php
	$name = isset($name) ? $name : '';	
	$value = isset($value) ? $value : null;
	$attributes_default = [
		'class' => 'form-control app-input__text',
	];
	$attributes = isset($attributes) ? array_merge($attributes_default, $attributes) : $attributes_default;	
@endphp
	{{ Form::text($name, $value, $attributes) }} 