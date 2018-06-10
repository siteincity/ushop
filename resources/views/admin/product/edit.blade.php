@extends('admin.layout.main')


@section('content')
	
	
	@if (isset($product))

		{{-- Header --}}
		@include('admin.layout.title', ['name' => 'Редактор'])
	
		{{ Form::model($product, ['route' => ['product.update', $product->id], 'method'=>'POST']) }}

	@else

		{{-- Header --}}
		@include('admin.layout.title', ['name' => 'Новый товар'])

		{{ Form::open(['route' => 'product.store', 'method'=>'POST']) }}

	@endif
	
	@include('admin.product.form')
	
	{{ Form::close() }}


@endsection


{{-- JS:Code --}}
@section('js')	
	<script>
		$(function(){

			$('.app-input__select').select2();
			
			$('.btn-delete').appButtonDelete({
				token: _token,
				success: function(response) {
					if (response.type == 'success') {
						window.location.href = '{{ route('product') }}'   
					}
				}
			});

			$('#group_id').on('change', function(){
				var group_id = $(this).val();
				window.location.href = _current_url + '?group_id=' + group_id;
			})

		})
	</script>	
@endsection

