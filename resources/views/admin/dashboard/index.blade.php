@extends('admin.layout.main')

@section('content')

{{-- Header --}}
@include('admin.layout.title', ['name' => 'Панель управления', 'description' => '1.0'])
	
{{-- Content --}}
<section class="section">
	<div class="card">
		<div class="card-body">
			

			{{ Form::open(['method'=>'GET', 'autocomplete' => 'off']) }}

			
			{{-- @php
				$request = request()->all();
				if (!empty($request)) dd($request);
            @endphp --}}
			
			@include('admin.widget.form.label', ['name' => 'text','value' => 54534534545,])
            @include('admin.widget.form.select', [
            	'name' => 'text',
            	'options' => [1,2,3],
            	'values' => [1],
            ])



			{{ Form::button('Сохранить', ['type'=>'submit','class' => 'btn btn-default']) }}
			{{ Form::close() }}


		</div>
	</div>
</section>


@endsection




@php

	// $request = request()->all();
	// if (!empty($request)) dd($request);
	

	// $product = App\Product::find(1);

	// $group_attributes = $product->group->attributes;
	
	// //dd($group_attributes);

	// $values = [];
	// foreach ($product->attributes as $attribute) {
	// 	$values[$attribute->id][] = $attribute->pivot->value;
	// }

	// //dd($product->attributes);
	
	// foreach ($group_attributes as $attribute) {
	// 	echo '<h2>attribute = '.$attribute->id.'</h2>';
	// 	$current = [];
	// 	if (isset($values[$attribute->id]))
	// 		$current = $values[$attribute->id];
			
	// 	echo '<div class="form-group">';
	// 	echo Form::select($attribute->slug.'[]', $current, null, ['id' => $attribute->slug, 'class' => 'form-control', 'multiple' => true]);	
	// 	echo Form::label($attribute->slug, $attribute->caption);
	// 	echo '</div>';

	// }

@endphp










