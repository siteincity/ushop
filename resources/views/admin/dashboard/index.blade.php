@extends('admin.layout.main')

@section('content')

{{-- Header --}}
@include('admin.layout.title', ['name' => 'Панель управления', 'description' => '1.0'])
	
{{-- Content --}}
<section class="section">
	<div class="card">
		<div class="card-body">
			

			{{ Form::open(['method'=>'GET', 'autocomplete' => 'off']) }}

			<pre>@php
	
				$data = [
				    1 => [
				      0 => "1",
				    ],
				    2 => [
				      0 => "4",
				      1 => "5",
				      2 => "6",
				    ],
				    3 => [
				      16 => "65767676767",
				    ],
				    4 => [
				      17 => "5454545gfgfgfgf",
				    ],
				    5 => [
				      18 => "6565",
				    ],
				];

				// $product = App\Product::prepareFeatures($features);
				// $data = collect($data);
				// $features = App\Group::find(1)->features;

				// foreach ($data as $feature_id => $values) {
				// 	foreach ($values as $feature_value_id => $value) {
				// 		switch ($features->find($feature_id)->type) {
	   //                      case 'text':
	   //                      case 'textarea':
	                        	
	   //                      	$featureValue = App\FeatureValue::updateOrCreate(
	   //                      		['id' => $feature_value_id],
	   //                      		['feature_id' => $feature_id, 'value' => $value]
	   //                      	);

	   //                      	if ($featureValue)
	   //                      		$result[] = $featureValue->id;
	                        		
	   //                      break;
	   //                      default:
		  //       				$result[] = $value;	
	   //                      break;
	   //                  }	
				// 	}	
				// }

				// dd(App\Product::find(1)->saveFormFeatures($data));


			@endphp</pre>


			{{ Form::button('Сохранить', ['type'=>'submit','class' => 'btn btn-default']) }}
			{{ Form::close() }}


		</div>
	</div>
</section>


@endsection




@php

	// $request = request()->all();
	// if (!empty($request)) dd($request);
	

@endphp










