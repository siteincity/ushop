@extends('admin.layout.main')


@section('content')
	
	
	@if (isset($product))

		{{-- Header --}}
		@include('admin.layout.title', ['name' => 'Редактор'])
	
		{{ Form::model($product, ['route' => ['product.update', $product->id], 'method'=>'POST']) }}
		
		@include('admin.product.form', ['disabled' => 'disabled'])

	@else

		{{-- Header --}}
		@include('admin.layout.title', ['name' => 'Новый товар'])

		{{ Form::open(['route' => 'product.store', 'method'=>'POST']) }}
		
		@include('admin.product.form', ['disabled' => ''])

	@endif
	

	{{ Form::close() }}


@endsection


{{-- JS:Code --}}
@section('js')	
	<script>
		$(function(){

			$('.app-input__select').material_select();
			
			$('.btn-delete').appButtonDelete({
				token: _token,
				success: function(response) {
					if (response.type == 'success') {
						window.location.href = '{{ route('product') }}'   
					}
				}
			});

		})
	</script>	
@endsection

