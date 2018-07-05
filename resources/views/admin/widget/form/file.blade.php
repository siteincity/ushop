@php
	$name = isset($name) ? $name : '';	
	$attributes_default = [
		'class' => 'form-control app-input__file',
	];
	$attributes = isset($attributes) ? array_merge($attributes_default, $attributes) : $attributes_default;	
@endphp
	{{ Form::file($name, $attributes) }}
