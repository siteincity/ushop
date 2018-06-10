@php
	$name = isset($name) ? $name : '';	
	$value = isset($value) ? $value : '';
	$attributes = isset($attributes) ? $attributes : [];	
@endphp
	{{ Form::label($name, $value, $attributes) }}
