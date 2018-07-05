@extends('admin.layout.main')

@section('content')

{{-- Header --}}
@include('admin.layout.title', ['name' => 'Панель управления', 'description' => '1.0'])
	
{{-- Content --}}
<section class="section">
	<div class="card">
		<div class="card-body">
			

			{{ Form::open(['method'=>'GET', 'files' => 'true', 'autocomplete' => 'off']) }}

			<pre>@php
	
			//dd(Request::all());
			// Storage::disk('public')->put('images/product/file.txt', '5555');

			// dd(Storage::url('images/product/file.txt'));	
            
            print_r(Request::all());    

			@endphp</pre>
			


			<div class="form-group" id="product-images">
				<div class="apg-item" data-id="0">
					<div class="apg-num">0</div>
					@include('admin.widget.form.file', ['name' => 'images[0][file]'])
					@include('admin.widget.form.text', ['name' => 'images[0][title]'])
					<div class="item-preview"></div>
					{{ Form::button('remove', ['type'=>'button','class' => 'btn btn-danger button-remove']) }}	
				</div>
				{{-- {{ Form::button('+', ['type'=>'button','class' => 'btn btn-default']) }} --}}
			</div>





			{{ Form::button('Сохранить', ['type'=>'submit','class' => 'btn btn-default']) }}
			{{ Form::close() }}


		</div>
	</div>
</section>


@endsection


{{-- JS:Code --}}
@section('js')	
	
	<script>
		$(function(){
		
			
			$('#product-images').appProductGallery();
			

		})
	</script>

@endsection










