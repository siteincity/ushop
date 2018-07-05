@php
	$name = isset($name) && is_string($name) ? $name : '';	
	$options = isset($options) ? $options : [];
	$values = isset($values) ? $values : null;	
	$attributes_default = [
		'class' => 'form-control app-input__select',
	];
	$attributes = isset($attributes) ? array_merge($attributes_default, $attributes) : $attributes_default;
@endphp
{{ Form::select($name, $options, $values, $attributes) }}