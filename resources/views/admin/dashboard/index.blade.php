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
	
	

				//dd(App\Product::find(1)->getFormFeatures());
                

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










